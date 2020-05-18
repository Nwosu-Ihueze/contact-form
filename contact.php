<?php
// define variables and set to empty values
$nameErr = $emailErr = $subjectErr = $messageErr = "";
$name = $email = $subject = $message = "";
$myemail = 'rittenhub@gmail.com';//<-----Put Your email address here.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["subject"])) {
    $subject = "";
  } else {
    $subject = test_input($_POST["subject"]);
  }

  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }
}

    
$to = $myemail;

$email_subject = "Contact form submission: $name";

$email_body = "You have received a new message. ".

" Here are the details:\n Name: $name \n ".

"Email: $email\n Message \n $message";

$headers = "From: $myemail\n";

$headers .= "Reply-To: $email";

if(mail($to,$email_subject,$email_body,$headers)){
    echo "Message sent";
} else{
    echo "Message failed";
}
    

    


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/png" href="./assets/favicon.png" />

    <!-- Put here your site title -->
    <title>Rosemary Nwosu-Ihueze | Developer</title>
    <!-- Add some coding keywords below, Ex: (javascript, yourusername, etc) -->
    <meta name="keywords" content="Ada-Ihueze, Rosemary Nwosu-Ihueze, HTML, css, javascript" />
    <!-- Improve your SEO by adding a small descrption of you -->
    <meta name="description" content="Rosemary Nwosu-Ihueze | Developer" />

    <!-- Required librarys -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
      ScrollReveal({ reset: false });
    </script>
  </head>
  <body>
 <section id="contact">
      <div class="container">
        <h2 class="section-title">
          Contact
        </h2>
        <div class="contact-wrapper">
          <p class="contact-wrapper__text">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
     <div class="row">
        <div class="col-25">
          <label for="fname"></label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="<?php echo $name;?>" placeholder="Your name..">
             <span class="error">* <?php echo $nameErr;?></span>
        </div>
      </div>
  <div class="row">
        <div class="col-25">
          <label for="email"></label>
        </div>
        <div class="col-75">
          <input type="text" id="email" name="<?php echo $email;?>" placeholder="Email..">
            <span class="error">* <?php echo $emailErr;?></span>
        </div>
      </div>
    <div class="row">
                <div class="col-25">
                    <label for="subject"></label>
                    </div>
                <div class="col-75">
                    <input type="text" id="subject" name="<?php echo $subject;?>" placeholder="How may I be of assistance?..">
                     <span class="error">* <?php echo $subjectErr;?></span>
                    </div>
                </div>
 <div class="row">
        <div class="col-25">
          <label for="message"></label>
        </div>
        <div class="col-75">
          <textarea id="message" name="<?php echo $message;?>" placeholder="Write something.." style="height:100px"></textarea>
             <span class="error">* <?php echo $messageErr;?></span>
        </div>
      </div>
    <div class="center-row">
          <p class="hero-btn" class="load-hidden">
            <div class="col-75">
            <input id="submit" name="submit" type="submit" value="Submit">
            </div>
    </div>
</form>
          </div>
     </div>
    </section> 
    <footer class="footer navbar-static-bottom">
      <div class="container">
        <a href="#top" class="back-to-top">
          <i class="fa fa-arrow-up fa-2x" aria-hidden="true"></i>
        </a>
          <a href="https://www.linkedin.com/in/rosemary-nwosu-ihueze-b07638aa/" target="_blank">
            <i class="fa fa-linkedin fa-inverse"></i>
          </a>
          <a href="https://nwosu-ihueze.github.io/E-folio/" target="_blank">
            <i class="fa fa-github fa-inverse"></i>
          </a>
        </div>

        <hr />

        <!-- If you give me some credit, will be huge for me :) -->
        <p class="footer__text">
          © 2020 - Template developed by <a href="https://github.com/cobidev" target="_blank">Jacobo Martínez</a><br>
          designed by <a href="https://github.com/Nwosu-Ihueze" target="_blank">Ada-Ihueze</a>
          </a>
        </p>
      </div>
    </footer>
    <!-- /END Footer Section -->
  </body>
</html>
