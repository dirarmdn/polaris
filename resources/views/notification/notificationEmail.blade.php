<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Email</title>
</head>
<body>
<p>Hello, {{ $submission->submitter->user->name }}</p>
    <p>Here is the status of your submission titled "<strong>{{ $submission->submission_title }}</strong>":</p>

    <ul>
        <li>Status: <strong>{{ $submission->status }}</strong></li>
        <li>Description: {{ $submission->problem_description }}</li>
        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
    </ul>

    <p>Thank you for your submission!</p>
</body>
</html>
