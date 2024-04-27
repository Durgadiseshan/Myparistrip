<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Verification Code</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <form id="sendVerificationForm" method="post">
        <input type="text" name="phone_number" placeholder="Enter Phone Number">
        <button type="submit">Send Verification Code</button>
    </form>

    <div id="verificationResult"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#sendVerificationForm').submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/send-verification',
                    data: formData,
                    success: function (response) {
                        $('#verificationResult').text(response.message);
                    },
                    error: function (xhr, status, error) {
                        $('#verificationResult').text(xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>
</body>
</html>
