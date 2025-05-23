@component('mail::message')
# ⏰ Event Reminder: {{ $event->name }}

**When:** {{ $event->event_date->format('l, F j, Y \a\t g:i A') }}  
**Location:** {{ $event->location ?? 'Online' }}  

@if($event->description)
### Details:
{{ $event->description }}
@endif

@component('mail::button', ['url' => route('events.show', $event->id)])
View Event
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent