<?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $subjects = strip_tags(trim($_POST["subjects"]));
				$subjects = str_replace(array("\r","\n"),array(" "," "),$subjects);
        $message = trim($_POST["message"]);
		 
		

       
        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "developer_kehinde@outlook.com";

        // Set the email subject.
        $subject = "New Feedback from $name";
			
        // Build the email content.
        $email_content = "Name: $name\n";
        $email_content .= "Email: $subjects\n\n";
        $email_content .= "Message:\n$message\n";

         // Send the email.
        if (mail($recipient, $subject, $email_content)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
           header('HTTP/1.0 500 Internal server error');
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
       header('HTTP/1.0 404 Not Found');
        echo "There was a problem with your submission, please try again.";
    }
 ?>
