<?php

// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$animal = strip_tags(htmlspecialchars($_POST['animal'])); 
 
if ($animal == "Cat") {          
  $to = "paule.matthews@outlook.com";  // This is where the form will send a message from a human to. 
  // $to = "lovithobbie@hotmail.com";  // This is where the form will send a message from a human to. 
  echo "Human";  
}
else {
  $to = "nothuman@example.com"; // This is where the form will send a message from a BOT to. 
  echo "Bot";  
}

// Create the email and send the message

$subject = "Kats Home for Cats enquiry from $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nPhone: $phone\n\nMessage:\n$message";
$header = "From: noreply@katshomeforcats.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);

?>

