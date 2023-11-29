<!-- register-member.php -->
<?php
session_start();

include 'db_conn.php';
include 'functions.php';
include 'inc/country.php';

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
    
    try {
        $res = registerMember($conn, $type, $fullname, $organization, $street, $zip, $city, $country, $cellphone, $telephone, $instagram, $facebook, $website);
        if($res->$status == '200') {
            header("Location: home.php");
        } else {
            header("Location: register-member.php");
        }
    } catch (\Throwable $th) {
        throw $th;
    }
}

?>

<?php include 'inc/header.php' ?>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7qN-YI4B690-nEs3bus5EhE5DErQ4EAA&libraries=places,routes,drawing,geometry&callback=initialize" async defer></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKXDHnZU6Xwq263kX2zwV0V9tPzAXmplQ&libraries=places,routes,drawing&callback=initialize" async defer></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzjdJGgDHkwHNEugfq2z1G3o5c4RLggEg&libraries=places,routes,drawing&callback=initialize" async defer></script> -->

<section class="container h-100">
    <div>
        <?= $_SESSION["SESSION_EMAIL"] ?>
    </div>
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
                    <select type="text" class="form-control mt-3" name="type" style="padding: 12px" required>
                        <option value="" selected disabled>Select Your Type</option>
                        <option value="church">Church</option>
                        <option value="evangalize">Evangalize</option>
                        <option value="newborn">Newborn</option>
                    </select>
                    <input type="text" class="form-control mt-3" name="fullname" placeholder="Enter Your Full Name" required>
                    <input type="text" class="form-control mt-3" name="organization" placeholder="Enter Your Organization" required>
                    <input type="text" class="form-control mt-3" name="street" placeholder="Enter Your Street" required>
                    <input type="text" class="form-control mt-3" name="zip" placeholder="Enter Your Zip" required>
                    <input type="text" class="form-control mt-3" name="city" placeholder="Enter Your City" required>
                    <select type="text" class="form-control mt-3" name="country" onchange="handle_changeCountry(event)" style="padding: 12px;" required>
                        <option value="" disabled selected>Select Your Country</option>
                        <?php foreach ($countryNames as $countryName) { ?>
                            <option value="<?= $countryName ?>"><?= strtoupper(str_replace("_", " ", $countryName)) ?></option>
                        <?php } ?>
                    </select>
                    <!-- <div class="custom-select w-100">
                        <div class="select-styled form-control mt-3">
                            Select Your Country
                        </div>
                        <ul class="select-options">
                            <li><img src="path/to/image" alt="Option 1"> Iraq</li>
                        </ul>
                    </div> -->
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

<script>
    function handle_changeCountry(event) {
        console.log(event.target.value)
    }   
</script>
<?php include 'inc/footer.php' ?>