<?php 
    include 'inc/header.php';
    include 'inc/nav.php';
    include 'functions.php';

    $email = $_SESSION['SESSION_EMAIL'];

    $userInfo = select_userByEmail($conn, $email);
    if($userInfo){
        echo $userInfo;
    }

    $msg = "";
?>

<section class="container h-100">
    <div style="height: 70px"></div>
    <div style="height: calc(100% - 70px)">
        <div class="d-flex justify-content-between mt-5 px-5">
            <div class="border border-1 border-solid p-5" style="width: 60%">
                <input type="text" class="form-control mt-3" name="street" placeholder="Enter Your Street">
                <div class="d-flex gap-3">
                    <input type="text" class="form-control mt-3" name="zip" placeholder="Enter Your Zip" required>
                    <input type="text" class="form-control mt-3" name="city" placeholder="Enter Your City" required>
                </div>
                <select type="text" class="form-control mt-3" name="country" required style="padding: 12px">
                    <option value="" disabled selected>Enter Your Country</option>
                </select>
                <input type="text" class="form-control mt-3" name="cellphone" placeholder="Enter Your Cellphone">
                <input type="text" class="form-control mt-3" name="website" placeholder="Enter Your Website">
                <input type="text" class="form-control mt-3" name="telephone" placeholder="Enter Your Telephone">
                <input type="text" class="form-control mt-3" name="instagram" placeholder="Enter Your Instagram">
                <input type="text" class="form-control mt-3" name="facebook" placeholder="Enter Your Facebook">
            </div>
            <div class="border border-1 border-solid p-5" style="width: 35%">
                <select type="text" class="form-control mt-3" name="type" style="padding: 12px">
                    <option value="" disabled selected>Select Your Type</option>
                    <option value="church">Chruch</option>
                    <option value="evengalize">Evangalism</option>
                    <option value="newborn" disabled>Newborn</option>
                </select>
                <input type="text" class="form-control mt-3" name="fullname" placeholder="Enter Your Full Name" required>
                <input type="text" class="form-control mt-3" name="email" placeholder="Enter Your Email Address">
                <input type="text" class="form-control mt-3" name="password" placeholder="Enter Your Password">
                <input type="text" class="form-control mt-3" name="confirm-password" placeholder="Enter Your Retype Password">
                <?php echo $msg; ?>
                <button name="submit" class="btn btn-primary mt-5 w-100" type="submit">Update Profile</button>
            </div>
        </div>
    </div>
</section>

<?php include 'inc/footer.php' ?>