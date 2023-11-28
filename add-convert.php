<?php include 'inc/header.php' ?>
<?php include 'inc/nav.php' ?>

<?php
    $msg = "";
?>

<section class="container h-100">
    <div style="height: 70px"></div>
    <div style="height: calc(100% - 70px)">
        <div class="d-flex justify-content-between mt-5 px-5">
            <div class="border border-1 border-solid px-5 pt-2 pb-2" style="width: 60%">
                <input type="text" class="form-control mt-3" name="fullname" placeholder="Enter Your Full Name" required>
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
                <input type="text" class="form-control mt-3" name="email" placeholder="Enter Your Email Address" required>
                <?php echo $msg; ?>
                <div class="form-check mt-5">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        That my data will be stored and processed for the purpose of contacting me and for community work in accordance with the statutory providsions on data protection. You can object to further processing at any time, as well as request correction, deletion and information about your data, insofar as this is legally permissible. Further information (incl, privacy policy) can be found at www.hopeforevangelism.com/privacy-policy
                    </label>
                </div>
                <button name="submit" class="btn btn-primary mt-5 w-100" data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit">Register</button>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Message was send</h5>
                    </div>
                    <div class="modal-body">
                        Your message has been send
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">OK</button>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include 'inc/footer.php' ?>