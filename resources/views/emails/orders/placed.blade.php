@component('mail::message')
# Order Placed

Your {{ env('APP_NAME') }} Card Order Successfully Placed.!

@component('mail::button', ['url' => env('APP_URL')])
    Go to {{ env('APP_NAME') }}
@endcomponent

@component('mail::table')
    | Product | Type | Price |
    | ------------- |:-------------:| --------:|
    | {{ $task->pricing->title }} | {{ $task->pricing->category }} | ${{ number_format($task->pricing->price, 2) }} |
@endcomponent

@component('mail::panel')
Total Unpaid Amount: ${{ number_format($task->pricing->price, 2) }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
