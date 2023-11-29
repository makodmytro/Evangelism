<?php include 'inc/header.php' ?>
<?php include 'inc/nav.php' ?>

<?php
    $msg = "";
?>

<section class="container h-100">
    <?php include 'inc/top.php' ?>
    <div class="main-container">
        <div class="row w-100 mt-5 ms-0">
            <div class="col-lg-7 col-md-12 border border-1 border-solid px-5 pt-3 pb-3 mb-5">
                <input type="text" class="form-control mt-3" name="event" placeholder="* Enter Your Event Name" required>
                <input type="text" class="form-control mt-3" name="street" placeholder="Enter Your Street">
                <div class="d-flex gap-3">
                    <input type="text" class="form-control mt-3" name="zip" placeholder="* Enter Your Zip" required>
                    <input type="text" class="form-control mt-3" name="city" placeholder="* Enter Your City" required>
                </div>
                <input type="text" class="form-control mt-3" name="country" placeholder="* Enter Your Country" required>
                <input type="text" class="form-control mt-3" name="eventDate" placeholder="Enter Your Dates of Event">
                <input type="text" class="form-control mt-3" name="website" placeholder="Enter Your Website">
                <input type="text" class="form-control mt-3" name="facebook" placeholder="Enter Your Facebook">
                <input type="text" class="form-control mt-3" name="instagram" placeholder="Enter Your Instagram">
            </div>
            <div class="col-lg-1 col-md-12"></div>
            <div class="col-lg-4 col-md-12 border border-1 border-solid px-4 pt-3 pb-3 mb-5 text-break">
                <textarea class="form-control mt-3" rows="8" placeholder="message"></textarea>
                <input type="text" class="form-control mt-3" name="kmRadius" placeholder="KM Radius to invite">
                <hr>
                <button name="submit" class="btn btn-primary mt-5 w-100" type="submit">Send Data</button>
            </div>
        </div>

    </div>
</section>

<?php include 'inc/footer.php' ?>