<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Confirmation</title>
    <style>
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    </style>
</head>
<body class="bg-gray-100 p-4">
<div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Report Created</h2>
    <p class="mb-4">To {{ $name }},</p>
    <p>Your Report was uploaded successfully. The Report with title {{ $title }} is going to be published at: {{ $published_at }}.
    Proposal: Edit and change everything you need before the day to come. You can delete it too if you need it.</p>

    <h3 class="text-red">Attention!</h3>
    <p>If the date is the same day as today, your Report was uploaded as the terminal warned, thus you cannot change any
    information of it or delete it. To more information, contact with an administrator.</p>
    <p class="mt-4">Glory to Mankind,<br>YoRHa.</p>
</div>
</body>
</html>
