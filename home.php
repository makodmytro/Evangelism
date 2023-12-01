<?php include 'inc/header.php' ?>
<?php $navTitle = "Main Menu"; ?>
<?php include 'inc/nav.php' ?>

<?php
    if(!isset($_SESSION["SESSION_EMAIL"])){
        header("Location: index.php");
    }
    
    $msg = "";

    if($_SESSION["SESSION_EMAIL"]){
        try {
            $res = select_userByEmail($conn, $_SESSION["SESSION_EMAIL"]);
            if($res){
                $user = mysqli_fetch_assoc($res);
                $_SESSION["usernr"] = $user["usernr"];
            }
        } catch (\Throwable $th) {
            $msg = "<div class='alert alert-danger'>{$th->getMessage()}</div>";
        }
    }
?>

<section class="container h-100">
    <?php include 'inc/top.php' ?>
    <div class="main-container d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <?= $msg ?>
            <div class="col-md-4 col-sm-12">
                <a href="evangelise.php">
                    <button class="btn btn-primary w-100 mt-5 mb-5 h-50">
                        <div class="d-flex justify-content-center">
                            <div>
                                <img src="<?= DOMAIN ?>/assets/images/home1.png" alt="">
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                Evangelism
                            </div>
                        </div>
                    </button>
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="add-convert.php">
                    <button class="btn btn-primary w-100 mt-5 mb-5 h-50">
                        <div class="d-flex justify-content-center">
                            <div>
                                <img src="<?= DOMAIN ?>/assets/images/home2.png" alt="">
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                Add Convert
                            </div>
                        </div>
                    </button>
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="search-members.php">
                    <button class="btn btn-primary w-100 mt-5 mb-5 h-50">
                        <div class="d-flex justify-content-center">
                            <div>
                                <img src="<?= DOMAIN ?>/assets/images/home3.png" alt="">
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                Search Members
                            </div>
                        </div>
                    </button>
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="create-event.php">
                    <button class="btn btn-primary w-100 mt-5 mb-5 h-50">
                        <div class="d-flex justify-content-center">
                            <div>
                                <img src="<?= DOMAIN ?>/assets/images/events.png" alt="">
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                Create Event
                            </div>
                        </div>
                    </button>
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="search-event.php">
                    <button class="btn btn-primary w-100 mt-5 mb-5 h-50">
                        <div class="d-flex justify-content-center">
                            <div>
                                <img src="<?= DOMAIN ?>/assets/images/home5.png" alt="">
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                Search Event
                            </div>
                        </div>
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>

<?php include 'inc/footer.php' ?>