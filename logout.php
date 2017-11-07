<?php
  session_start();
  // did the user's browser send a cookie for the session?
  if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time()-3600, '/');
  }
  session_unset();
  session_destroy();

include 'includes/header.php';
?>

<h1>Logged out</h1>

<p class="lead">You've been logged out. See you!</p>

<?php
include 'includes/footer.php';
?>