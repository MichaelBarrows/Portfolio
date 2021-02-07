<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <h2 style="color:#0099CC;">New message from {{ $name }}.</h2>

    <p>{!! nl2br(e($user_message)) !!}</p>
    <br>
    <p>{{ $name }}</p>
    <p><a style="color:#0099CC;" href="mailto:{{ $email_address }}">{{ $email_address }}</a></p>
    <p>{{ $phone_number }}</p>
  </body>
</html>
