<x-mail::message>
# New Feedback Received

You have received new feedback. Below are the details:

- **Email**: {{ $feedback['email'] }}
- **Subject**: {{ $feedback['subject'] }}
- **Message**:
{{ $feedback['message'] }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
