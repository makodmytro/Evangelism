<?php include 'inc/header.php' ?>
<?php $navTitle = "Evangelize"; ?>
<?php include 'inc/nav.php' ?>
<?php
    if(!isset($_SESSION["SESSION_EMAIL"])){
        header("Location: index.php");
    }
?>

<section class="container h-100">
    <?php include 'inc/top.php' ?>
    <div class="main-container d-flex justify-content-center align-items-center">
        <div class="row text-center">
            <div class="col-sm-12">
                <form action="detail-evangelize.php" method="post">
                    <button class="btn btn-primary w-50 mt-5 mb-5 h-50" type="submit" name="en">
                        <div class="d-flex justify-content-center gap-5">
                            <div>
                                <img src="assets/images/flags/flag_usa.png" class="btn-img">
                            </div>
                            <div class="d-flex align-items-center  justify-content-center">
                                <h4 style="margin: 0px">English</h4>
                            </div>
                        </div>
                    </button>
                </form>
            </div>
            <div class="col-sm-12">
                <form action="detail-evangelize.php" method="post">
                    <button class="btn btn-primary w-50 mt-5 mb-5 h-50" type="submit" name="ge">
                        <div class="d-flex justify-content-center gap-5">
                            <div>
                                <img src="assets/images/flags/flag_germany.png" class="btn-img">
                            </div>
                            <div class="d-flex align-items-center  justify-content-center">
                                <h4 style="margin: 0px">German</h4>
                            </div>
                        </div>
                    </button>
                </form>
            </div>
            <div class="col-sm-12">
                <form action="detail-evangelize.php" method="post">
                    <button class="btn btn-primary w-50 mt-5 mb-5 h-50" type="submit" name="fr">
                        <div class="d-flex justify-content-center gap-5">
                            <div>
                                <img src="assets/images/flags/flag_france.png" class="btn-img">
                            </div>
                            <div class="d-flex align-items-center  justify-content-center">
                                <h4 style="margin: 0px">French</h4>
                            </div>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function setLang(str){

    }
</script>

<?php include 'inc/footer.php' ?>