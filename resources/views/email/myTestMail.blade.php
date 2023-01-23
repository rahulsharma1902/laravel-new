<!DOCTYPE html>
<html>
<head>
    <title>Pefectstix.com</title>
</head>
<body>
    <div style="font-family: Helvetica,Arial,sans-serif;line-height:2">
  <div style="">
    <div style="border-bottom:1px solid #eee">
      <a href="{{ url('') }}" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">PERFECTSTIX</a>
    </div>
    <h1>{{ $details['title'] }}</h1>
    <p style="font-size:1.1em">Hi,</p>
    <p>{{ $details['body'] }}</p>
    <p>This password reset CODE will expire in 60 seconds.</p>
    <h2 style="background: #00466a;width: max-content;color: #fff;border-radius: 4px;">{{$details['OTP']}}</h2>
    <p>If you did not request a password reset, no further action is required.</p>
    <p style="font-size:0.9em;">Regards,<br />Perfectstix.com</p>
    <hr style="border:none;border-top:1px solid #eee" />
    <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
      <p>Perfectstix Inc</p>

    </div>
  </div>
</div>
</body>
</html