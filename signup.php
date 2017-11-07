<?php
session_start();

include('includes/func.php');
include('includes/conn.php');

$formEmail = "";
$loginError = "";

// if signup form was submitted
if (isset($_POST['signup'])) {
    // wrap data with validate function
    $formEmail = validateFormData($_POST['email']);
    $formName = validateFormData($_POST['name']);
    $formPass = validateFormData($_POST['password']);

    $hashedPass = password_hash($formPass, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (email, name, password) VALUES ('$formEmail','$formName','$hashedPass')";
    $result = mysqli_query($conn, $query);

    header("Location: index.php");
}

mysqli_close($conn);

include 'includes/header.php';
?>

<h1>Client Address Book</h1>
<?php echo $loginError; ?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
  <div class="form-group">
    <label for="signup-email">Email</label>
    <input type="text" class="form-control" id="signup-email" placeholder="email" name="email" value="<?php echo $formEmail; ?>">
  </div>
  <div class="form-group">
    <label for="signup-name">Name</label>
    <input type="text" class="form-control" id="signup-name" placeholder="name" name="name" >
  </div>
  <div class="form-group">
    <label for="signup-password">Password</label>
    <input type="password" class="form-control" id="signup-password" placeholder="password" name="password" >
  </div>
  <button class="btn btn-primary" type="submit" name="signup">Sign Up</button>
</form>

<?php include 'includes/footer.php'; ?>