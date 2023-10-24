<?php
$sub = false;
if(isset($_POST["Name"])){
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "project";

  $con = mysqli_connect($server, $username, $password, $database);

  if(!$con){
    die("connection to this database failed due to". mysqli_connect_error());
  }

  $Name = $_POST['Name'];
  $Email = $_POST['Email'];
  $Phone = $_POST['Phone'];
  $Message = $_POST['Message'];
  $sql = "INSERT INTO `project.tour-travel` (`Name`, `Email`, `Phone`, `Message`, `Date`) VALUES ($Name, $Email, $Phone, $Message, current_timestamp())";
  // echo $sql;

  if($con->query($sql) == true){
    // echo "Succesfull";
    $sub = true;
  }
  else{
    echo "ERROR : $sql <br> $con->error";
  }

  $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="Contact.css">
</head>
<body>
  <div class="container">
    <div class="backimg">
      <div class="back-button">
            <a href="index.html"><img class="back" src="https://cdn-icons-png.flaticon.com/512/93/93634.png" title="Back" alt=""></a>
        </div>
        <section class="contact">
            <h1 class="contact-heading">Contact Us</h1>
            <div class="sub">
              <?php
              if($sub == true){
                echo "<p>Thanks for submitting your form</p>";
              }
              ?>
            </div>
            <style>
              .sub{
                display: inline-block;
                background-color: aliceblue;
                position: relative;
                bottom: 2rem;
                font-size: 3rem;
                text-shadow: 0 0.5rem 0.7rem black;
              }
            </style>
            <form action="" method="POST" class="contact-form center">
              <div class="input-group">
                <label>Name</label>
                <input
                name="Name"
                  type="text"
                  class="contact-input"
                  placeholder="Enter Your Name"
                  autocomplete="off"
                />
              </div>
              <div class="input-groups">
                <div class="input-group">
                  <label>Email</label>
                  <input
                  name="Email"
                    type="email"
                    class="contact-input"
                    placeholder="Enter Your Email"
                    autocomplete="off"
                  />
                </div>
                <div class="input-group">
                  <label>Phone</label>
                  <input 
                  name="Phone"
                    type="text"
                    class="contact-input"
                    placeholder="Enter Phone Number"
                    autocomplete="off"
                  />
                </div>
              </div>
              <div class="input-group">
                <label>Message</label>
                <textarea 
                    name="Message"
                  class="form-textarea"
                  placeholder="Your Message Here..."
                  autocomplete="off"
                ></textarea>
              </div>
              <input type="Submit" name="Submit" value="Submit" class="form-btn" />
            </form>
          </section>
        </div>
        <footer class="footer">
          <div class="footer-list">
            <a href="index.html" class="footer-link">Home</a>
            <a href="tour.html" class="footer-link">Tours</a>
            <a href="Aboutus.html" class="footer-link">About Us</a>
            <a href="Contact.html" class="footer-link">Contact</a>
          </div>
        </footer>
    </div>
</body>
</html>