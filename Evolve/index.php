<?php
  include_once 'db_head.php';
  include_once 'class.member.php';

  $member = new member($dbh);
  if(isset($_GET['logout'])) {
    $member->logout();
    $url = basename($_SERVER['SCRIPT_NAME']);
    $member->redirect($url);
  }
?>
<!DOCTYPE html>
<html>
<head>
  <style>
  .btn_shop {
    background-color: #CCC;
    border: 0px none;
  }
  .btn_shop:hover,
  .btn_shop:active,
  .btn_shop:focus {
    background-color: #AAA;
  }
  </style>
  <link rel="stylesheet" href="css/css.css" type="text/css">
</head>
<body>
  <div id="top">
  </div>
  <header id="navbar" class="site-header" role="banner">
    <ul class="nav">
      <li class="one logo"><a href="#"</a></li>
      <li class="one"><a href="index.php">front page</a></li>
      <li class="one"><a href="login.php">Login</a></li>
      <li class="one"><a href="home.php">Home</a></li>
      <li class="one"><a href="members.php">Create member account</a></li>
      <?php if($member->is_loggedin()) { ?>
        <li class="one"><a href="updatemember.php">Update Member</a></li>
      <li class="one"><a href="?logout">logout</a></li>
      <?php } ?>
    </ul>
  </header>
  <div id="content">
    <?php
      $hour = date("G");
      switch(true) {
        case ($hour <= 4):
         $greet = "Good night!";
        case ($hour <= 11):
          $greet = "Good morning!";
        case ($hour <= 17):
          $greet = "Good afternoon!";
        case ($hour <= 23):
          $greet = "Good evening";
      }
      echo $greet;
    ?>
  </div>

<footer> <?php echo gmdate("F j, Y, g:i a"); ?> </footer>
</body>
</html>
