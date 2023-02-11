{{-- {!! $body !!} --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edukar Gensan Scholarship</title>
    <style>
        .container {
            width: 600px;
            margin: 0 auto;
            border: 1px solid;
            padding: 30px;
            text-align: center;
        }

        h1, h3 {
            color: black;
        }

        body {
            background-color: rgb(215, 221, 221)
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 style="font-weight: 25px; color">RESET PASSWORD</h1>
        <h2 style="font-weight: bold; color">Click the link below to reset your password.</h2>
        <p>Note: Please do not share your password reset link to others.</p>
        <a href="{!! $link !!}" style="font-weight: bold; ">Reset Password</a>
    </div>

</body>
</html>