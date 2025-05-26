{{-- @component('mail::message')
# Reminder: {{ $event->title }} is in 15 days!

The event **'{{ $event->title }}'** is happening on {{ $event->start_date->format('F j, Y') }}.

@component('mail::button', ['url' => url('/events/' . $event->id)])
View Event
@endcomponent

Thank you for using our service!
@endcomponent --}}





test event reminder email