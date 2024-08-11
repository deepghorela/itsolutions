<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRequestQuoteRequest;
use App\Models\RequestQuote;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestQuoteMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class RequestQuoteController extends Controller
{
    /**
     * Capture Lead
     *
     * @param StoreRequestQuoteRequest $request
     * @return json
     */
    public function store(StoreRequestQuoteRequest $request)
    {
        try {
            // Validate the request data
            $validated = $request->validated();

            // Remove HTML tags from the address & message
            $validated['address'] = strip_tags($validated['address']);
            $validated['message'] = strip_tags($validated['message']);
            $validated['name'] = sanitizeStringMyWay($validated['name']);
            $validated['email'] = Str::stripTags($validated['email']);
            $validated['mobile'] = Str::stripTags($validated['mobile']);

            $email = $validated['email'];
            $mobile = $validated['mobile'];
            unset($validated['g-recaptcha-response']);

            // Check if the email or mobile has reached the daily limit
            $today = now()->startOfDay();
            $requestCount = RequestQuote::where(function ($query) use ($email, $mobile) {
                if ($email) {
                    $query->where('email', $email);
                }
                if ($mobile) {
                    $query->where('mobile', $mobile);
                }
            })
                ->where('created_at', '>=', $today)
                ->count();

            if ($requestCount >= 3) {
                return returnJson(['status' => false, 'message' => 'Daily limit of 3 requests reached for this email or mobile number.']);
            }
            foreach(servicesDetails() as $service){
                if(generateSeoFriendlySlug($service['heading']) == $validated['request_type']){
                    $validated['request_type'] = $service['heading'];
                }
            }

            // Create the quote
            $quote = RequestQuote::create($validated);

            // Send the email
            Mail::to('ghoreladeep@gmail.com')->send(new RequestQuoteMail($quote));

            return returnJson(['status' => true, 'message' => 'Quote request submitted successfully.']);
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Error submitting request quote: ' . $e->getMessage());

            return returnJson(['status' => false, 'message' => 'An error occurred while submitting the request. Please try again later.']);
        }
    }
}
