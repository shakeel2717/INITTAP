@component('mail::message')
# Recent Order Invoice

Payment Successfull for your order.

@component('mail::button', ['url' => env('APP_URL')])
Go to {{ env('APP_NAME') }}
@endcomponent

@component('mail::table')
| Product | Type | Price |
| ------------- |:-------------:| --------:|
| {{ $task->pricing->title }} | {{ $task->pricing->category }} | ${{ number_format($task->pricing->price, 2) }} |
@endcomponent

@component('mail::panel')
Total Amount Paid: ${{ number_format($task->pricing->price, 2) }}
@endcomponent

Please Contact us if you have any questions.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
