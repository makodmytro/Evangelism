<!-- register-member.php -->
<?php
session_start();
include 'db_conn.php';
include 'functions.php';

$msg = "";

if (isset($_POST['submit'])) {
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $organization = mysqli_real_escape_string($conn, $_POST['organization']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $cellphone = mysqli_real_escape_string($conn, $_POST['cellphone']);
    $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
    $website = mysqli_real_escape_string($conn, $_POST['website']);
}

?>

<?php include 'inc/header.php' ?>
<section class="container h-100">
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="d-flex gap-5" style="max-height: 75%">
            <div class="w-50 d-flex justify-content-center align-items-center bg-primary">
                <img src="assets/images/logo.png" alt="" class="w-75">
            </div>
            <div class="w-50 pt-3 pb-3 overflow-auto pe-2">
                <h2>Complete your profile</h2>
                <p class="mt-3 mb-3">Please fill these fields.. </p>
                <?php echo $msg; ?>
                <form action="" method="post">
                    <input type="text" class="form-control mt-3" name="type" placeholder="Enter Your Type" required>
                    <input type="text" class="form-control mt-3" name="fullname" placeholder="Enter Your Full Name" required>
                    <input type="text" class="form-control mt-3" name="organization" placeholder="Enter Your Organization" required>
                    <input type="text" class="form-control mt-3" name="street" placeholder="Enter Your Street" required>
                    <input type="text" class="form-control mt-3" name="zip" placeholder="Enter Your Zip" required>
                    <input type="text" class="form-control mt-3" name="city" placeholder="Enter Your City" required>
                    <input type="text" class="form-control mt-3" name="country" placeholder="Enter Your Country" required>
                    <input type="text" class="form-control mt-3" name="cellphone" placeholder="Enter Your Cellphone">
                    <input type="text" class="form-control mt-3" name="telephone" placeholder="Enter Your Telephone">
                    <input type="text" class="form-control mt-3" name="instagram" placeholder="Enter Your Instagram">
                    <input type="text" class="form-control mt-3" name="facebook" placeholder="Enter Your Facebook">
                    <input type="text" class="form-control mt-3" name="website" placeholder="Enter Your Website">
                    <button name="submit" class="btn btn-primary mt-5 w-100" type="submit">Register</button>
                </form>
                <p class="mt-3 text-center">Have an account!&nbsp;&nbsp;&nbsp;<a href="index.php">Login</a>.</p>
            </div>
        </div>
    </div>
</section>
<?php include 'inc/footer.php' ?>