<?php include 'inc/header.php' ?>
<?php $navTitle = "Search Events"; ?>
<?php include 'inc/nav.php' ?>
<?php
include 'db_conn.php';
include 'functions.php';
include 'inc/country.php';
session_start();
if(!isset($_SESSION["SESSION_EMAIL"])){
    header("Location: index.php");
}

$msg = "";
$search_name = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$search_zip = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$sname = "";
$sorg= "";
$szip =""; 
$scity = ""; 
$scountry = "";
$sstartDate = ""; 
$sendDate = "";

if (isset($_POST['submit'])) {
    $sname = mysqli_real_escape_string($conn, $_POST['event']);
    $sorg = mysqli_real_escape_string($conn, $_POST['organization']);
    $szip = mysqli_real_escape_string($conn, $_POST['zip']);
    $scity = mysqli_real_escape_string($conn, $_POST['city']);
    $scountry = mysqli_real_escape_string($conn, $_POST['country']);
    $sstartDate = mysqli_real_escape_string($conn, $_POST['startDate']);
    $sendDate = mysqli_real_escape_string($conn, $_POST['endDate']);
    try {
        $res = select_events($conn, $sname, $sorg, $szip, $scity, $scountry, $sstartDate, $sendDate);
    } catch (\Throwable $th) {
        $msg = "<div class='alert alert-danger'>$th->getMessage()</div>";
    }
}

try {
    $res = select_events($conn, $sname, $sorg, $szip, $scity, $scountry, $sstartDate, $sendDate);
} catch (\Throwable $th) {
    $msg = "<div class='alert alert-danger'>$th->getMessage()</div>";
}

?>

<section class="container h-100">
    <?php include 'inc/top.php' ?>
    <div class="main-container pt-5">
        <div class="border border-1 border-solid pt-4 pb-4 position-relative">
            <button class="btn btn-primary position-absolute" data-bs-toggle="modal" data-bs-target="#addFilterModal"
                style="top: -20px; left: 10px">Filters</button>
            <div class="mt-2 ms-5">Name of Event:&nbsp;<?= $search_name ?>&nbsp;&nbsp;&nbsp;Zip code: <?= $search_zip ?></div>
            <div class="mt-3">
                <?php $lop = 0; while($row = $res->fetch_assoc()) { $lop = $lop + 1; ?>
                    <div class="member-container <?= $lop % 2 == 1 ? "bg-primary text-white": "";  ?> " onclick="gotoMemberDetail(<?= $row['eventnr'] ?>)">
                        <div class="member-image"><img src="assets/images/member.png" alt=""></div>
                        <div class="member-info">
                            <div><?= $row["fullname"] ?></div>
                            <div><?= $row["zip"] ?></div>
                            <div><?= $row["city"] ?></div>
                            <div><?= strtoupper($row["country"]) ?></div>
                            <div><?= $row["cellphone"] ?></div>
                        </div>
                    </div>
                <?php } ?>
                <!-- <div class="member-container bg-primary text-white">
                    <div class="member-image"><img src="assets/images/member.png" alt=""></div>
                    <div class="member-info">
                        <div>Will Johnson</div>
                        <div>98653</div>
                        <div>Certerville</div>
                        <div>Deutschiand</div>
                        <div>09685356478</div>
                    </div>
                </div>
                <div class="member-container">
                    <div class="member-image"><img src="assets/images/member.png" alt=""></div>
                    <div class="member-info">
                        <div>Will Johnson</div>
                        <div>98653</div>
                        <div>Certerville</div>
                        <div>Deutschiand</div>
                        <div>09685356478</div>
                    </div>
                </div>
                <div class="member-container bg-primary text-white">
                    <div class="member-image"><img src="assets/images/member.png" alt=""></div>
                    <div class="member-info">
                        <div>Will Johnson</div>
                        <div>98653</div>
                        <div>Certerville</div>
                        <div>Deutschiand</div>
                        <div>09685356478</div>
                    </div>
                </div> -->
            </div>
        </div>

        <div class="modal fade" id="addFilterModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Filters</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row px-3">
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control mt-3" name="event" placeholder="Event Name">
                            </div>
                        </div>
                        <div class="row px-3">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control mt-3" name="organization"
                                    placeholder="Organization">
                            </div>
                        </div>
                        <div class="row px-3">
                            <div class="col-sm-4">
                                <input type="text" class="form-control mt-3" name="zip" placeholder="Zip">
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control mt-3" name="city" placeholder="City">
                            </div>
                        </div>
                        <div class="row px-3">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <select type="text" class="form-control mt-3" name="country"
                                    onchange="handle_changeCountry(event)" style="padding: 12px;" required>
                                    <option value="" disabled selected>Select Country</option>
                                    <?php foreach ($countryNames as $countryName) { ?>
                                        <option value="<?= $countryName ?>">
                                            <?= strtoupper(str_replace("_", " ", $countryName)) ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row px-3">
                            <div class="col-sm-4">
                                <input type="text" class="form-control mt-3" name="startDate" placeholder="Country">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control mt-3" name="endDate" placeholder="Country">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer pt-5">
                        <button type="button" class="btn btn-default px-5" data-bs-dismiss="modal">Clear</button>
                        <button type="button" class="btn btn-default px-5" data-bs-dismiss="modal">Search</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    function gotoMemberDetail(eventnr){
        window.location.href = '<?= DOMAINE . "/event-detail.php?eventnr=" ?>' + eventnr;
    }
</script>

<?php include 'inc/footer.php' ?>