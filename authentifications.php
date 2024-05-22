<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <?php
require_once 'vendor/autoload.php';

// init configuration
$clientID = '1023679346084-n2hbijl4cjqaui6pes67bmp0b2b839pk.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/PHP/brief/';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;

  // now you can use this profile info to create account in your website and make user logged in.
} else {
?>
  <div class="container">
    <h4>Login</h4>
    <form action="">
      <div>
        <i class="fa-solid fa-user"></i>
        <input type="email" name="email" id="">
      </div>
      <div>
        <i class="fa-solid fa-lock"></i>
        <input type="password" name="password" id="">
      </div>
      <div>
        <button type="submit"><i class="fa-solid fa-key"></i>Submit</button>
        <span><a href="">Forgot your password?</a></span>
      </div>
    </form>
    <div class="lien"><a href="<?php echo $client->createAuthUrl()?>"><img src="google.png" alt="" style="width: 40px;">Google Account</a></div>
  </div>
  <?php } ?>
</body>
</html>