<?php include 'inc/header.php' ?>
<?php $navTitle = "Evangelize"; ?>
<?php include 'inc/nav.php' ?>
<?php 
include 'inc/language.php';
session_start();
if(!isset($_SESSION["SESSION_EMAIL"])){
    header("Location: index.php");
}
?>
<section class="container h-100">
    <?php
        if(isset($_POST['en'])){
            $d_lang = "en";
        }
        if(isset($_POST['ge'])){
            $d_lang = "ge";
        }
        if(isset($_POST['fr'])){
            $d_lang = "fr";
        }
    ?>
    <?php include 'inc/top.php' ?>
    <div class="main-container d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-md-4 col-sm-12">
                <a href="javascript:void(0)">
                    <button class="btn btn-primary w-100 mt-5 mb-5 h-50"><?= $lang[$d_lang]["muslim"] ?></button>
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="javascript:void(0)">
                    <button class="btn btn-primary w-100 mt-5 mb-5 h-50"><?= $lang[$d_lang]["catholic"] ?></button>
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="javascript:void(0)">
                    <button class="btn btn-primary w-100 mt-5 mb-5 h-50"><?= $lang[$d_lang]["hindu"] ?></button>
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="javascript:void(0)">
                    <button class="btn btn-primary w-100 mt-5 mb-5 h-50"><?= $lang[$d_lang]["buddhist"] ?></button>
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="javascript:void(0)">
                    <button class="btn btn-primary w-100 mt-5 mb-5 h-50"><?= $lang[$d_lang]["jewisch"] ?></button>
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="javascript:void(0)">
                    <button class="btn btn-primary w-100 mt-5 mb-5 h-50"><?= $lang[$d_lang]["confucianism"] ?></button>
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="javascript:void(0)">
                    <button class="btn btn-primary w-100 mt-5 mb-5 h-50"><?= $lang[$d_lang]["jainism"] ?></button>
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="javascript:void(0)">
                    <button class="btn btn-primary w-100 mt-5 mb-5 h-50"><?= $lang[$d_lang]["atheism"] ?></button>
                </a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a href="javascript:void(0)">
                    <button class="btn btn-primary w-100 mt-5 mb-5 h-50"><?= $lang[$d_lang]["mormonism"] ?></button>
                </a>
            </div>
        </div>
    </div>
</section>

<?php include 'inc/footer.php' ?>
    </div>
</section>

<?php include 'inc/footer.php' ?>