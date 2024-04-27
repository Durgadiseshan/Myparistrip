<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <form id="verifyCodeForm">
        <input type="text" name="phone_number" placeholder="Enter Phone Number">
        <input type="text" name="verification_code" placeholder="Enter Verification Code">
        <button type="submit">Verify Code</button>
    </form>

    <div id="verificationResult"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#verifyCodeForm').submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/verify-code',
                    data: formData,
                    success: function (response) {
                       // $('#verificationResult').text(response.message);
                       setTimeout(function() {
            window.location.href = "{{ route('dashboard') }}";
        }, 3000); 

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

