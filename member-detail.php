<?php include 'inc/header.php' ?>
<?php $navTitle = "Member Details"; ?>
<?php include 'inc/nav.php' ?>
<?php
if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: index.php");
}
$msg = '';

if ($_GET["usernr"]) {
    $m_usernr = $_GET['usernr'];
} else {
    header("Location: search-members.php");
}
try {
    $res = select_userById($conn, $m_usernr);
    $e_user = mysqli_fetch_assoc($res);
} catch (\Throwable $th) {
    $msg = "<div class='alert alert-danger'>{$th->getMessage()}</div>";
}

try {
    $res_connect = select_connectMembers($conn, $_SESSION['usernr'], $m_usernr);
    $conn_stt = $res_connect->num_rows == 0 ? false : true;
    if($conn_stt){
        $sql_stt = mysqli_fetch_assoc($res_connect)['status'] == 1 ? true: false;
    }
} catch (\Throwable $th) {
    //throw $th;
}

if (isset($_POST["deactive"])) {
    $res_updateActive = update_activeMember($conn, $m_usernr, 0);
    try {
        $res = select_userById($conn, $m_usernr);
        $e_user = mysqli_fetch_assoc($res);
    } catch (\Throwable $th) {
        $msg = "<div class='alert alert-danger'>{$th->getMessage()}</div>";
    }
}
if (isset($_POST["active"])) {
    $res_updateActive = update_activeMember($conn, $m_usernr, 1);
    try {
        $res = select_userById($conn, $m_usernr);
        $e_user = mysqli_fetch_assoc($res);
    } catch (\Throwable $th) {
        $msg = "<div class='alert alert-danger'>{$th->getMessage()}</div>";
    }
}

if (isset($_POST["disconnect"])) {
    try {
        $res_conn = delete_connect($conn, $_SESSION["usernr"], $m_usernr);
        try {
            $res_connect = select_connectMembers($conn, $_SESSION['usernr'], $m_usernr);
            $conn_stt = $res_connect->num_rows == 0 ? false : true;
            if($conn_stt){
                $sql_stt = mysqli_fetch_assoc($res_connect)['status'] == 1 ? true: false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    } catch (\Throwable $th) {
        $msg = "<div class='alert alert-danger'>{$th->getMessage()}</div>";
    }
}

if (isset($_POST["connect"])) {
    try {
        if ($conn_stt) {
            $res_conn = update_connect($conn, $_SESSION["usernr"], $m_usernr);
        } else {
            $res_conn = create_connect($conn, $_SESSION["usernr"], $m_usernr);
        }
        try {
            $res_connect = select_connectMembers($conn, $_SESSION['usernr'], $m_usernr);
            $conn_stt = $res_connect->num_rows == 0 ? false : true;
            if($conn_stt){
                $sql_stt = mysqli_fetch_assoc($res_connect)['status'] == 1 ? true: false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    } catch (\Throwable $th) {
        $msg = "<div class='alert alert-danger'>{$th->getMessage()}</div>";
    }
}
?>

<section class="container h-100">
    <?php include 'inc/top.php' ?>
    <div class="main-container pt-5">
        <?= $msg ?>
        <div class="map-container">
            <div class="border border-1 border-solid map-content">
                <img src="assets/images/map.png" alt="" class="w-100">
            </div>
            <div class="member-detail pt-0 pb-3 text-white text-center">
                <h2 class="mb-0 pt-3">Church</h2>
                <hr>
                <h3>
                    <?= $e_user['fullname'] ?>
                </h3>
                <h3 class="fst-italic">Jesus Church</h3>
                <h6>
                    <?= $e_user['street'] ?>
                </h6>
                <h6>
                    <?= $e_user['zip'] ?>,
                    <?= $e_user['city'] ?>
                </h6>
                <h6>
                    <?= strtoupper($e_user['country']) ?>
                </h6>
                <h6>
                    <?= $e_user['cellphone'] ?>
                </h6>
                <h6>
                    <?= $e_user['telephone'] ?>
                </h6>
                <hr>
                <button class="btn btn-default mx-auto w-75 mt-1 mb-1" data-bs-toggle="modal"
                    data-bs-target="#emailModal">
                    <div class="d-flex justify-content-center">
                        <div>
                            <img src="<?= DOMAIN ?>/assets/images/email.png" alt="">
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            Email
                        </div>
                    </div>
                </button>
                <button class="btn btn-default mx-auto w-75 mt-1 mb-1" data-bs-toggle="modal"
                    data-bs-target="#whatsappModal">
                    <div class="d-flex justify-content-center">
                        <div>
                            <img src="<?= DOMAIN ?>/assets/images/wapp.png" alt="">
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            Whatsapp
                        </div>
                    </div>
                </button>
                <button class="btn btn-default mx-auto w-75 mt-1 mb-1" onclick="gotoEventPage()">
                    <div class="d-flex justify-content-center">
                        <div>
                            <img src="<?= DOMAIN ?>/assets/images/events.png" alt="">
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            Events
                        </div>
                    </div>
                </button>
                <button class="btn btn-default mx-auto w-75 mt-1 mb-1" data-bs-toggle="modal"
                    data-bs-target="#allowModal">
                    <?php if (!!$sql_stt && $conn_stt && $sql_stt) { ?>
                        <div class="d-flex justify-content-center">
                            <div>
                                <img src="<?= DOMAIN ?>/assets/images/connection.png" alt="">
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                Remove
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="d-flex justify-content-center">
                            <div>
                                <img src="<?= DOMAIN ?>/assets/images/connection.png" alt="">
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                Connect
                            </div>
                        </div>
                    <?php } ?>
                </button>
                <button class="btn btn-default mx-auto w-75 mt-1 mb-1" data-bs-toggle="modal"
                    data-bs-target="#activeModal">
                    <div class="d-flex justify-content-center">
                        <div>
                            <img src="<?= DOMAIN ?>/assets/images/active.png" alt="">
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <?= $e_user["active"] ?>Activate
                        </div>
                    </div>
                </button>
                <div class="d-flex justify-content-between w-75 mx-auto">
                    <button class="btn btn-default ps-3 pe-3 mt-1 mb-1" style="width: fit-content">
                        <img src="assets/images/world.png" alt="" style="width: 30px">
                    </button>
                    <button class="btn btn-default ps-3 pe-3 mt-1 mb-1" style="width: fit-content">
                        <img src="assets/images/facebook.png" alt="" style="width: 30px">
                    </button>
                    <button class="btn btn-default ps-3 pe-3 mt-1 mb-1" style="width: fit-content">
                        <img src="assets/images/instagram.png" alt="" style="width: 30px">
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send E-mail</h5>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control mt-3" name="subject" placeholder="subject">
                    <textarea class="form-control mt-3" rows="5" placeholder="message"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default px-5" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-default px-5" data-bs-dismiss="modal">Send</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="whatsappModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send Whatsapp</h5>
                </div>
                <div class="modal-body">
                    <textarea class="form-control mt-3" rows="5" placeholder="message"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default px-5" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-default px-5" data-bs-dismiss="modal">Send</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="allowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Request Connection</h5>
                    </div>
                    <div class="modal-footer justify-content-center pt-5 pb-3">
                        <button type="button" class="btn btn-default px-5" data-bs-dismiss="modal">No</button>
                        <button type="submit"
                            name="<?php if (!!$sql_stt && $conn_stt && $sql_stt) {
                                echo 'disconnect';
                            } else {
                                echo 'connect';
                            } ?>"
                            class="btn btn-default px-5" data-bs-dismiss="modal">Yes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="activeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Activate Member</h4>
                    </div>
                    <div class="modal-footer justify-content-center pt-5 pb-3">
                        <button type="button" class="btn btn-default px-5" data-bs-dismiss="modal">No</button>
                        <button type="submit" name="<?php if ($e_user["active"] == 1) {
                            echo 'deactive';
                        } else {
                            echo 'active';
                        } ?>" class="btn btn-default px-5" data-bs-dismiss="modal">Yes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>

<script>
    function gotoEventPage() {
        window.location.href = "<?= DOMAIN ?>/search-event.php?usernr=<?= $m_usernr ?>"
    }
</script>

<?php include 'inc/footer.php' ?>