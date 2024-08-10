<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequestQuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'mobile' => 'required|string|regex:/^[6789]\d{9}$/|max:10',
            'request_type' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'address' => 'nullable|string|max:250',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 100 characters.',

            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 100 characters.',

            'mobile.required' => 'The mobile field is required.',
            'mobile.string' => 'The mobile number must be a string.',
            'mobile.regex' => 'The mobile number must start with 6, 7, 8, or 9 and be exactly 10 digits.',
            'mobile.max' => 'The mobile number may not be greater than 10 digits.',

            'request_type.required' => 'The request type field is required.',
            'request_type.string' => 'The request type must be a string.',
            'request_type.max' => 'The request type may not be greater than 255 characters.',

            'message.required' => 'The message field is required.',
            'message.string' => 'The message must be a string.',
            'message.max' => 'The message may not be greater than 1000 characters.',

            'address.string' => 'The address must be a string.',
            'address.max' => 'The address may not be greater than 250 characters.',
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }
}
