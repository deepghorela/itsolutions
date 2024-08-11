@component('mail::message')
    <h1>New Request Quote</h1>
    <p><strong>Name:</strong> {{ $quote->name }}</p>
    <p><strong>Email:</strong> {{ $quote->email }}</p>
    <p><strong>Mobile:</strong> {{ $quote->mobile }}</p>
    <p><strong>Request Type:</strong> {{ $quote->request_type }}</p>
    <p><strong>Message:</strong> {{ $quote->message }}</p>
    @if($quote->address)
        <p><strong>Address:</strong> {{ $quote->address }}</p>
    @endif

    Thanks,
    Team {{ config('app.name') }}
@endcomponent