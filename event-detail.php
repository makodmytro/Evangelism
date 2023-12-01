<?php include 'inc/header.php' ?>
<?php $navTitle = "Event Details"; ?>
<?php include 'inc/nav.php' ?>

<?php
if ($_SESSION["usernr"]) {
    $usernr = $_SESSION["usernr"];
}

$msg = "";
if ($_GET['eventnr']) {
    $eventnr = $_GET['eventnr'];
    try {
        $res = select_event_detail($conn, $eventnr);
        $detail_event = mysqli_fetch_assoc($res);
    } catch (\Throwable $th) {
        $msg = "<div class='alert alert-danger'>{$th->getMessage()}</div>";
    }
    try {
        $res_eventmembers = select_eventMembers($conn, $eventnr);
    } catch (\Throwable $th) {
        $msg = "<div class='alert alert-danger'>{$th->getMessage()}</div>";
    }
} else {
    header('Location: search-event.php');
}



try {
    $addInfo = select_meFromEvent($conn, $eventnr, $usernr);
} catch (\Throwable $th) {
    //throw $th;
}

try {
    // $members = select_members($conn);
    // $members = mysqli_fetch_assoc($res);
} catch (\Throwable $th) {
    $msg = "<div class='alert alert-danger'>{$th->getMessage()}</div>";
}

if (isset($_POST["addme"])) {
    try {
        $res = attend_meToEvent($conn, $usernr, $eventnr);
        try {
            $addInfo = select_meFromEvent($conn, $eventnr, $usernr);
        } catch (\Throwable $th) {
            $msg = "<div class='alert alert-danger'>{$th->getMessage()}</div>";
        }
    } catch (\Throwable $th) {
        $msg = "<div class='alert alert-danger'>{$th->getMessage()}</div>";
    }
    header("Location: event-detail.php?eventnr=".$eventnr);
}

if (isset($_POST["removeme"])) {
    try {
        $res = delete_meFromEvent($conn, $usernr, $eventnr);
        try {
            $addInfo = select_meFromEvent($conn, $eventnr, $usernr);
        } catch (\Throwable $th) {
            $msg = "<div class='alert alert-danger'>{$th->getMessage()}</div>";
        }
    } catch (\Throwable $th) {
        $msg = "<div class='alert alert-danger'>{$th->getMessage()}</div>";
    }
    header("Location: event-detail.php?eventnr=".$eventnr);
}

if(isset($_POST["whoiscomming"])) {
    try {
        $res_eventmembers = select_eventMembers($conn, $eventnr);
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
                <h2 class="mb-0 pt-3">
                    <?= strtoupper($detail_event["type"]) ?>
                </h2>
                <hr>
                <h3>
                    <?= $detail_event["fullname"] ?>
                </h3>
                <h3 class="fst-italic">Jesus Church</h3>
                <h6>
                    <?= $detail_event["street"] ?>
                </h6>
                <h6>
                    <?= $detail_event["zip"] ?>,
                    <?= $detail_event["city"] ?>
                </h6>
                <h6>
                    <?= $detail_event["country"] ?>
                </h6>
                <h6>
                    <?= $detail_event["cellphone"] ?>
                </h6>
                <h6>
                    <?= $detail_event["telephone"] ?>
                </h6>
                <hr>
                <button class="btn btn-default mx-auto w-75 mt-1 mb-1" data-bs-toggle="modal"
                    data-bs-target="#emailModal">
                    <div class="d-flex justify-content-center">
                        <div>
                            <img src='<?php echo DOMAIN . "/assets/images/email.png"; ?>' alt="" />
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
                            <img src='<?php echo DOMAIN . "/assets/images/wapp.png"; ?>' alt="" />
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            Whatsapp
                        </div>
                    </div>
                </button>
                <button class="btn btn-default mx-auto w-75 mt-1 mb-1" onclick="gotoEvent()">
                    <div class="d-flex justify-content-center">
                        <div>
                            <img src='<?php echo DOMAIN . "/assets/images/events.png"; ?>' alt="" />
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            Events
                        </div>
                    </div>
                </button>
                <button class="btn btn-default mx-auto w-75 mt-1 mb-1" data-bs-toggle="modal"
                    data-bs-target="#allowModal">
                    <div class="d-flex justify-content-center">
                        <?php if ($addInfo->num_rows > 0) { ?>
                            <div>
                                <img src='<?php echo DOMAIN . "/assets/images/delete.png"; ?>' alt="" />
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                Remove me
                            </div>
                        <?php } else { ?>
                            <div>
                                <img src='<?php echo DOMAIN . "/assets/images/active.png"; ?>' alt="" />
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                Add me
                            </div>
                        <?php } ?>
                    </div>
                </button>
                <form action="" method="post"></form>
                <button type="submit" name="whoiscomming" class="btn btn-default mx-auto w-75 mt-1 mb-1" data-bs-toggle="modal"
                    data-bs-target="#memberModal">
                    <div class="d-flex justify-content-center">
                        <div>
                            <img src='<?php echo DOMAIN . "/assets/images/comming.png"; ?>' alt="" />
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            Who is comming
                        </div>
                    </div>
                </button>
                <button class="btn btn-default mx-auto w-75 mt-1 mb-1" onclick="gotoMemberDetail(<?= $detail_event['usernr'] ?>)">
                    <div class="d-flex justify-content-center">
                        <div>
                            <img src='<?php echo DOMAIN . "/assets/images/member.png"; ?>' alt="" />
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            Details
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
                    <button class="btn btn-default ps-3 pe-3 mt-1 mb-1" style="width: fit-content">
                        <img src="assets/images/delete.png" alt="" style="width: 30px">
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
            <form action="" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Request Connection</h5>
                    </div>
                    <div class="modal-footer justify-content-center pt-5 pb-3">
                        <button type="button" class="btn btn-default px-5" data-bs-dismiss="modal">No</button>
                        <button type="submit" <?php if ($addInfo->num_rows > 0) {
                            echo "name='removeme'";
                        } else {
                            echo "name='addme'";
                        } ?> class="btn btn-default px-5" data-bs-dismiss="modal">Yes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Who is coming</h5>
                </div>
                <div class="modal-body" style="backgroud: white !important;">
                    <div class="mt-3 bg-white">
                        <?php $lop = 0;
                        if ($res_eventmembers->num_rows > 0) {
                            while ($row = $res_eventmembers->fetch_assoc()) {
                                $lop = $lop + 1; ?>
                                <div class="member-container <?= $lop % 2 == 0 ? "bg-primary text-white" : "text-primary"; ?> "
                                    onclick="gotoMemberDetail(<?= $row['usernr'] ?>)">
                                    <div class="member-image"><img src="assets/images/member.png" alt=""></div>
                                    <div class="member-info">
                                        <div>
                                            <?= $row["fullname"] ?>
                                        </div>
                                        <div>
                                            <?= $row["zip"] ?>
                                        </div>
                                        <div>
                                            <?= $row["city"] ?>
                                        </div>
                                        <div>
                                            <?= strtoupper($row["country"]) ?>
                                        </div>
                                        <div>
                                            <?= $row["cellphone"] ?>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <div class="member-container bg-white text-primary text-break">
                                <div class="member-image"><img src="assets/images/member.png" alt=""></div>
                                <div class="member-info text-center">
                                    No record members
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<script>
    function gotoEvent() {
        window.location.href = "<?= DOMAIN ?>/search-event.php"
    }

    function gotoMemberDetail(id) {
        window.location.href = '<?= DOMAIN . "/member-detail.php?usernr=" ?>' + id;
    }
</script>

<?php include 'inc/footer.php' ?>