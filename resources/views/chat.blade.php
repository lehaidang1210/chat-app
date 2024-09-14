<!DOCTYPE html>
<html>
<head>
    <title>Chat App</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Chat Room</h1>
    <div id="messages"></div>
    <input type="text" id="message" placeholder="Type a message">
    <button id="send">Send</button>

    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="{{ asset('bootstrap/app.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            Echo.channel('chat')
                .listen('MessageSent', (event) => {
                    $('#messages').append('<p><strong>' + event.user + ':</strong> ' + event.message + '</p>');
                });

            $('#send').click(function() {
                const message = $('#message').val();
                $.post(`{{ route("sendmessage") }}`, {
                    message: message,
                    _token: '{{ csrf_token() }}'
                });
                $('#message').val('');
            });
        });
    </script>
</body>
</html>
