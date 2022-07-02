@component('mail::message')
# Card Order Delivered

Your Card Successfully Delivered!

@component('mail::button', ['url' => env('APP_URL')])
Go to {{ env('APP_NAME') }}
@endcomponent

Please Contact us if you have any quetion.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
