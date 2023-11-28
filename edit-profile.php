<?php include 'inc/header.php' ?>
<?php include 'inc/nav.php' ?>

<?php
    $msg = "";
?>

<section class="container h-100">
    <div style="height: 70px"></div>
    <div style="height: calc(100% - 70px)">
        <div class="d-flex justify-content-between mt-5 px-5">
            <div class="border border-1 border-solid p-5" style="width: 60%">
                <input type="text" class="form-control mt-3" name="street" placeholder="Enter Your Street" required>
                <div class="d-flex gap-3">
                    <input type="text" class="form-control mt-3" name="zip" placeholder="Enter Your Zip" required>
                    <input type="text" class="form-control mt-3" name="city" placeholder="Enter Your City" required>
                </div>
                <input type="text" class="form-control mt-3" name="country" placeholder="Enter Your Country" required>
                <input type="text" class="form-control mt-3" name="cellphone" placeholder="Enter Your Cellphone">
                <input type="text" class="form-control mt-3" name="website" placeholder="Enter Your Website">
                <input type="text" class="form-control mt-3" name="telephone" placeholder="Enter Your Telephone">
                <input type="text" class="form-control mt-3" name="instagram" placeholder="Enter Your Instagram">
                <input type="text" class="form-control mt-3" name="facebook" placeholder="Enter Your Facebook">
            </div>
            <div class="border border-1 border-solid p-5" style="width: 35%">
                <input type="text" class="form-control mt-3" name="type" placeholder="Enter Your Type" required>
                <input type="text" class="form-control mt-3" name="fullname" placeholder="Enter Your Full Name" required>
                <input type="text" class="form-control mt-3" name="email" placeholder="Enter Your Email Address" required>
                <input type="text" class="form-control mt-3" name="password" placeholder="Enter Your Password" required>
                <input type="text" class="form-control mt-3" name="confirm-password" placeholder="Enter Your Retype Password" required>
                <?php echo $msg; ?>
                <button name="submit" class="btn btn-primary mt-5 w-100" type="submit">Register</button>
            </div>
        </div>
    </div>
</section>

<?php include 'inc/footer.php' ?>