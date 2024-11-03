<?php
session_start(); // Start the session at the very beginning

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Check if the form has been submitted
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];

    require 'forms/PHPMailer/Exception.php';
    require 'forms/PHPMailer/PHPMailer.php';
    require 'forms/PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'katariyavivek166@gmail.com';
        $mail->Password   = 'mdpo hpni pzgc sswm';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('katariyavivek166@gmail.com', 'Contact Form');
        $mail->addAddress('katariyavivek166@gmail.com', 'KM Electronics');

        // Content
        $mail->isHTML(true);
        $mail->Subject = "KM Electromics";
        $mail->Body = "Sender Name - $name <br> Sender Email - $email <br> Message - $message <br> Subject - $subject <br>";
        $mail->send();
        
        // Set a session variable to indicate success
        $_SESSION['success_message'] = "Message has been sent!";
        
        // Redirect to the same page to prevent resubmission
        header("Location: index.php");
        exit();
    } catch (Exception $e) {
        echo "<div class='alert'>Message could not be sent. Mailer Error:</div>";
    }
}
?>




<head>
  <!-- Other head elements -->
  <style>
    /* Modern styling for the founder's photo */
    /* Founder photo styling */
/* Founder photo styling */
#founder img {
  max-width: 250px; /* Set a medium size */
  border-radius: 15px; /* Rounded edges for a modern look */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Soft shadow for depth */
  margin: auto; /* Center the image */
  display: block;
  transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition */
}

/* Hover effect for smooth scaling */
#founder img:hover {
  transform: scale(1.05); /* Slightly increase size on hover */
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* Increase shadow on hover */
}

  </style>
</head>


<head>
  
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>KM Electronics - Expert Electronics Repair</title>
  <meta name="description" content="KM Electronics specializes in advanced electronics repair services including waterjet machines, transistors, and circuit boards. Your trusted repair partner.">
  <meta name="keywords" content="electronics repair, waterjet machine repair, transistor repair, circuit board repair, KM Electronics">

  <!-- Favicons -->
  <link href="forms/img/favicon.png" rel="icon">
  <link href="forms/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="forms/css/main.css" rel="stylesheet">

  <!-- Include PureCounter.js -->
  <script src="https://unpkg.com/purecounterjs"></script>
</head>

<body class="index-page">
<?php
    // Display the success message if it exists
    if (isset($_SESSION['success_message'])) {
        echo "<div class='success'>" . $_SESSION['success_message'] . "</div>";
        unset($_SESSION['success_message']); // Unset the session variable after displaying the message
    }
    ?>

  <!-- Header -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <h1 class="sitename">KM Electronics</h1><span>.</span>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#founder">Founder</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <img src="forms/img/hero-bg.jpg" alt="Hero Background Image" data-aos="fade-in">
      <div class="container text-center" data-aos="fade-up">
        <h2>Welcome To KM Electronics<span>.</span></h2>
        <p>Your trusted partner in advanced electronic solutions!</p>
      </div>
    </section>


    <!-- Success Modal -->
<div class="modal" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Message Sent</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Your message has been sent successfully! We will get back to you shortly.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-lg-6">
            <img src="forms/img/about.jpg" class="img-fluid" alt="About KM Electronics">
          </div>
          <div class="col-lg-6 content">
            <h3>Expert Electronics Repair and Service</h3>
            <p class="fst-italic">At KM Electronics, we specialize in repairing complex electronics like waterjet machines and circuit boards. Our team is committed to restoring your equipment to optimal performance.</p>
            <ul>
              <li><i class="bi bi-check2-all"></i> Reliable repair services for a wide range of electronic components.</li>
              <li><i class="bi bi-check2-all"></i> Skilled in waterjet machine components, transistors, and processors.</li>
              <li><i class="bi bi-check2-all"></i> Dedicated to precision, efficiency, and customer satisfaction.</li>
            </ul>
            <p>With years of experience, KM Electronics is your go-to for advanced electronics repair solutions. Let us handle your repair needs with the expertise your electronics deserve.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Founder & CEO Section -->
<section id="founder" class="founder section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <h2>Meet Our Founder & CEO</h2>
    <div class="row gy-4">
      <div class="col-lg-4 text-center">
        <img src="forms/img/yourname.jpg" class="img-fluid founder-photo" alt="Harshad Katariya">
      </div>
      <div class="col-lg-8 content">
        <h3>Harshad Katariya</h3>
        <p>
          Harshad Katariya is the visionary founder and CEO of KM Electronics. With a passion for technology and a commitment to excellence, he has dedicated his career to providing top-quality repair services for electronic systems. His leadership has been instrumental in building a team of skilled professionals who share his vision of delivering reliable and efficient solutions to customers.
        </p>
        <p>
          Under Harshad's guidance, KM Electronics has grown into a trusted name in the electronics repair industry. His focus on customer satisfaction and continuous improvement drives the company to exceed expectations and adapt to the ever-changing technological landscape.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact Us</h2>
  </div>

  <div class="container" data-aos="fade-up">
    <div class="mb-4">
      <iframe style="border:0; width: 100%; height: 270px;"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3716.819756979475!2d72.86886547424804!3d21.318137277778625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be049dda6909f93%3A0x224f1cff91bc8f9f!2sCenter%20Point%2C%20Delad!5e0!3m2!1sen!2sin!4v1729949510231!5m2!1sen!2sin"
        frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>

    <div class="row gy-4">
      <div class="col-lg-4">
        <div class="info-item d-flex">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h3>Address</h3>
            <p>Delad Patiya, Centerpoint Mall, Sayan</p>
          </div>
        </div>
        <div class="info-item d-flex">
          <i class="bi bi-telephone flex-shrink-0"></i>
          <div>
            <h3>Call Us</h3>
            <p>+919898402010</p>
          </div>
        </div>
        <div class="info-item d-flex">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h3>Email Us</h3>
            <p>katariyavivek166@gmail.com</p>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <form action="index.php" method="post" novalidate> <!-- Ensure the action points to the correct PHP file -->
          <div class="row gy-4">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="col-md-6">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required>
            </div>
            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required>
            </div>
            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
            </div>
            <div class="col-md-12 text-center">
              <div class="loading" style="display: none;">Loading...</div> <!-- Loading spinner -->
              <div class="error-message" style="display: none;"></div> <!-- Error message -->
              <div class="sent-message" style="display: none;">Your message has been sent. Thank you!</div> <!-- Success message -->
<!-- In your form, ensure the button has the 'send' name -->
<button type="submit" name="send" class="btn btn-primary">Send Message</button>   
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
  </main>

  

  <!-- Footer -->
 
  <footer id="footer" class="footer" style="background-color: rgba(0, 0, 0, 0.9); color: #ffffff; padding: 20px 0;">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6">
        <h3 style="color: #ffcc00; font-size: 1.5em; margin-bottom: 10px;">KM Electronics</h3>
        <p style="font-size: 0.95em; line-height: 1.6;">We provide expert repair services for electronic components and systems, ensuring the best performance for your devices.</p>
      </div>
      <div class="col-lg-6">
        <h3 style="color: #ffcc00; font-size: 1.5em; margin-bottom: 10px;">Contact Us</h3>
        <p style="font-size: 0.95em; line-height: 1.6;">For inquiries or support, please reach out to us using the contact form above or the information provided.</p>
      </div>
    </div>
    <div class="text-center mt-3" style="border-top: 1px solid rgba(255, 204, 0, 0.2); padding-top: 8px;">
      <p style="font-size: 0.9em; color: #ffcc00; letter-spacing: 1px; text-transform: uppercase; font-weight: 500;">
        <i class="bi bi-person-circle" style="margin-right: 5px;"></i> Designed by Vivek Katariya
      </p>
    </div>
  </div>
</footer>




  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="forms/js/main.js"></script>

</body>

</html>

