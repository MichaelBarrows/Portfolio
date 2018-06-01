<?php

/**
* Mailer object
* Used to send the email, process all user data, create project objects and
* output the sent email
*/
class Mailer {
  public $fromName = "michaelbarrows.co.uk";
  public $fromEmail = "no-reply@michaelbarrows.co.uk";
  public $to = "contact@michaelbarrows.co.uk";
  public $subject = "New portfolio message";

  /**
  * getUserInput()
  * Gets all submitted user input from the form using the $_POST variable,
  * and assigns as properties of the Mailer object
  */
  function getUserInput() {
    $this->name = $_POST['name'];
    $this->email = $_POST['email'];
    $this->phone = $_POST['phone'];
    $this->message = $_POST['message'];
    return;
  }

  /**
  * prepareEmail()
  * The prepareEmail() method calls all other functions to create the email
  */
  function prepareEmail() {
    $this->getUserInput();
    // make the user input safe
    $this->name = $this->makeUserInputSafe($this->name);
    $this->email = $this->makeUserInputSafe($this->email);
    $this->phone = $this->makeUserInputSafe($this->phone);
    $this->message = $this->makeUserInputSafe($this->message);

    // replace end of line with breaks
    $this->message = $this->replaceEndOfLine($this->message);

    // Sets email headers, generates the HTML message and sends the email
    $this->headers = $this->setHeaders();
    $this->emailContent = $this->createMessage();
    $this->sendEmail($this->to, $this->subject, $this->emailContent, $this->headers);
  }
  /**
  * createMessage()
  * The createMessage() method assembles the HTML email to be sent to the
  * recipient.
  * The user submitted content is placed into the email in a location relevant
  * for that information.
  */
  function createMessage() {
    $name = $this->name;
    $content = $this->content;
    $signature = $this->signature;
    $message = '
    <!DOCTYPE html>
    <html>
    <head>
      <!-- Makes the email appear better on mobile -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>New portfolio message</title>
    </head>
    <body style="background-color: #333333; padding-top: 30px; padding-bottom: 60px;">
      <h1 style="margin-left: 30px; color: #0099CC; font-size: 3em;">New Message!</h1>
      <p style="margin-left: 30px; color: #DDDDDD; font-size: 2em;">' . $this->name . ' has sent you the following message:</p>
      <p style="margin-left: 30px; padding-left: 30px; color: #DDDDDD; font-size: 1.5em; border-left: solid 5px #0099CC;">' . $this->message . '</p>
      <br><br>
      <p style="margin-left: 30px; color: #DDDDDD; font-size: 1.5em;">Email address: ' . $this->email . '</p>
      <p style="margin-left: 30px; color: #DDDDDD; font-size: 1.5em;">Phone number: ' . $this->phone . '</p>
    </body>
    </html>';

    $this->message = $message;
    return $message;
  }

  /**
  * replaceEndOfLine($text)
  * The replaceEndOfLine() method uses the str_replace function to identify
  * line breaks in the user submitted data, and replaces these line breaks with
  * the HTML <br> tag so they are not ignored in the email.
  */
  function replaceEndOfLine($text) {
    return str_replace(PHP_EOL, "<br>", $text);
  }

  /**
  * makeUserInputSafe($userInput)
  * The makeUserInputSafe() method removes whitespace &other characters from the
  * userInput, removes backslashes, and converts special HTML charachtes such
  * as quotes and ampersands to HTML entities
  */
  function makeUserInputSafe($userInput) {
    $userInput = trim($userInput);
    $userInput = stripslashes($userInput);
    $userInput = htmlspecialchars($userInput);
    return $userInput;
  }

  /**
  * setHeaders()
  * The setHeaders() method is used to set the email's headers, such as
  * Mime type, type of email (HTML) and sets the sender
  */
  function setHeaders() {
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: " . $this->fromName . "<$this->fromEmail>" . "\r\n";
    $headers .= "Reply-to: " . $this->email . "\r\n";
    return $headers;
  }

  /**
  * sendEmail($to, $subject, $message, $headers)
  * The sendEmail() method is used to send the prepared email to the recipient
  */
  function sendEmail($to, $subject, $message, $headers) {
    mail($to,$subject,$message,$headers);
  }
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // Creates the new mailer object
  $email = new Mailer();
  // Calls the prepareEmail function to process all user input and send the email
  $email->prepareEmail();
}