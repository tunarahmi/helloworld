<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Reverb</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<!--
ws://127.0.0.1:8080/app/REVERB_APP_KEY?protocol=7&client=js&version=7.0.6&flash=false -> Connect
{
    "event": "pusher:subscribe",
    "data": {
        "channel": "public-test-channel"
    }
} -> Send Message to Subscribe

{
    "event": "client-test-event",
    "channel": "public-test-channel",
    "data": {
        "message": "Hello from Postman"
    }
} -> Send message
-->
<div id="app">
    <h1>Live Messages (Laravel Echo)</h1>
    <ul id="messages-list"></ul>
</div>

<script type="module">
    window.addEventListener('load', () => {
        window.Echo.channel('public-test-channel')
            .listen('.client-test-event', (e) => {
                const li = document.createElement('li');
                li.textContent = e.message;
                document.getElementById('messages-list').appendChild(li);
            });
    });
</script>
</body>
</html>
