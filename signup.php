<?php
include 'assets/connection.php';

if (isset($_POST['email'])) {
  // Get image name
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $rpassword = $_POST['rpassword'];
  // $password = md5($password_1);
  $phone = $_POST['phone'];

  $sql = "SELECT * FROM users";
  $result = mysqli_query($db, $sql);
  $username_already_exist = false;
  $email_already_exist = false;

  $six_digit_number = random_int(100000, 999999);



//   $subject = "Kashmir Zakat - OTP (One Time Password)";
//   $from = 'info@kashmirzakat.com';
//   $to = $email;
//   $emailFrom = 'Kashmir zakat';
//   $headers = 'From: ' . $emailFrom . "\r\n";
//   $headers .= 'Reply-To: ' . $to . "\r\n";


$to      = $email;
$subject = 'Kashmir Zakat - OTP (One Time Password)';

  $mailBody = '<html><body>
  <div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
    <div><h1>OTP Verification Number</h1></div>
    <div>Hi, ' . $name . '</div>
    <div style="margin: 20px 0px;"><h2 style=" padding: 10px; font-size:30px; color:#E8582E;">' . $six_digit_number . '</h2></div>
    <div>Please use the above OTP to complete registration</div>
    </div>
    </body>
    </html>';
    $headers = 'From: Kashmirzakat ' . "\r\n" ;
  $headers=  'Reply-To: '.$email . "\r\n" ;
  $headers .= 'MIME-Version: 1.0' . "\r\n";
  $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();





  if ($email != '') {
    if(mail($to, $subject, $mailBody, $headers))
    echo $six_digit_number;
    else
    echo 'otp not sent';

  } else {
    echo ("mail send faild");
  }
}
    ?>
