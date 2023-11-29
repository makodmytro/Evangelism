<?php
session_start();
include 'db_conn.php';
include 'functions.php';

$msg = "";

if (isset($_SESSION['SESSION_EMAIL'])) {
  header("Location: home.php");
  die();
}

if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $code = md5(uniqid(rand(), true));

  if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_users WHERE email='{$email}'")) > 0) {
    $query = mysqli_query($conn, "UPDATE tb_users SET rcode='{$code}' WHERE email='{$email}'");

    if ($query) {
      if (send_email($email, $code, 'reset_pwd')) {
        $msg = "<div class='alert alert-info'>We've sent a password reset link to your email address.</div>";
      } else {
        $msg = "<div class='alert alert-danger'>Failed to send password reset email.</div>";
      }
    }
  } else {
    $msg = "<div class='alert alert-danger'>$email - This email address was not found.</div>";
  }
}
?>

<?php include 'inc/header.php' ?>

<section class="container h-100">
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="d-flex gap-5">
            <div class="w-50 d-flex justify-content-center align-items-center bg-primary">
                <img src="assets/images/logo.png" alt="" class="w-75">
            </div>
            <div class="w-50 pt-3 pb-3">
                <h2>Forgot Password</h2>
                <p class="mt-3 mb-3">Plese fill these fields.. </p>
                <?php echo $msg; ?>
                <form action="" method="post">
                    <input type="email" class="form-control mt-3" name="email" placeholder="Enter Your Email" required>
                    <button name="submit" class="btn btn-primary mt-5 w-100" type="submit">Send Reset Link</button>
                </form>
                <p class="mt-3 text-center">Back to!&nbsp;&nbsp;&nbsp;<a href="index.php">Login</a>.</p>
            </div>
        </div>
    </div>
</section>

<?php include 'inc/footer.php' ?>