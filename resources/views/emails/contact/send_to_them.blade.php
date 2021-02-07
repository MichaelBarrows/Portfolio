<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <p>Hi {{ $name }}</p>
    <p>Thanks for contacting me, I will get back to you as soon as possible.</p>
    <p>Many thanks,</p>
    <p>Michael Barrows</p>
    <p><a style="color: #0099CC;" href="mailto:contact@michaelbarrows.com">contact@michaelbarrows.com</a></p>
    <br>
    <p style="color: #0099CC;font-weight: 700;">--- Your message ---</p>
    <p>{!! nl2br(e($user_message)) !!}</p>
  </body>
</html>
