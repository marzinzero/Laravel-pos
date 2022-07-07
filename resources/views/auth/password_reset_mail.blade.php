<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>password reset mail</title>
</head>
<body>
    <p>We have request password reset to associtaed with this {{ $email }} mail, please click below link to reset your password</p>
    <a href="{{ route('admin.resetpassword.form', ['token'=> $token, 'email'=>$email]) }}">reset link</a>
    
</body>
</html>