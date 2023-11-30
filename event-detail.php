<?php include 'inc/header.php' ?>
<?php $navTitle = "Event Details"; ?>
<?php include 'inc/nav.php' ?>

<section class="container h-100">
    <?php include 'inc/top.php' ?>
    <div class="main-container pt-5">
        <div class="map-container">
            <div class="border border-1 border-solid map-content">
                <img src="assets/images/map.png" alt="" class="w-100">
            </div>
            <div class="member-detail pt-0 pb-3 text-white text-center">
                <h2 class="mb-0 pt-3">Church</h2>
                <hr>
                <h3>Will Johnson</h3>
                <h3 class="fst-italic">Jesus Church</h3>
                <h6>Wegenstr 12</h6>
                <h6>98653, Certerville</h6>
                <h6>Deutschiand</h6>
                <h6>+49 6598 65989</h6>
                <h6>+49 6598 65989</h6>
                <hr>
                <button class="btn btn-default mx-auto w-75 mt-1 mb-1" data-bs-toggle="modal" data-bs-target="#emailModal">Email</button>
                <button class="btn btn-default mx-auto w-75 mt-1 mb-1" data-bs-toggle="modal" data-bs-target="#whatsappModal">Whatsapp</button>
                <button class="btn btn-default mx-auto w-75 mt-1 mb-1" onclick="gotoEvent()">Events</button>
                <button class="btn btn-default mx-auto w-75 mt-1 mb-1" data-bs-toggle="modal" data-bs-target="#allowModal">Add me</button>
                <button class="btn btn-default mx-auto w-75 mt-1 mb-1" data-bs-toggle="modal" data-bs-target="#memberModal">Who is comming</button>
                <button class="btn btn-default mx-auto w-75 mt-1 mb-1" data-bs-toggle="modal" data-bs-target="#memberModal">Details</button>
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
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request Connection</h5>
            </div>
            <div class="modal-footer justify-content-center pt-5 pb-3">
                <button type="button" class="btn btn-default px-5" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-default px-5" data-bs-dismiss="modal">Yes</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Who is coming</h5>
            </div>
            <div class="modal-body">
            <div class="mt-3">
                <div class="member-container bg-white text-primary text-break">
                    <div class="member-image"><img src="assets/images/member.png" alt=""></div>
                    <div class="member-info">
                        <div>Will Johnson</div>
                        <div>98653</div>
                        <div>Certerville</div>
                        <div>Deutschiand</div>
                        <div>09685356478</div>
                    </div>
                </div>
                <div class="member-container bg-white text-primary text-break">
                    <div class="member-image"><img src="assets/images/member.png" alt=""></div>
                    <div class="member-info">
                        <div>Will Johnson</div>
                        <div>98653</div>
                        <div>Certerville</div>
                        <div>Deutschiand</div>
                        <div>09685356478</div>
                    </div>
                </div>
                <div class="member-container bg-white text-primary text-break">
                    <div class="member-image"><img src="assets/images/member.png" alt=""></div>
                    <div class="member-info">
                        <div>Will Johnson</div>
                        <div>98653</div>
                        <div>Certerville</div>
                        <div>Deutschiand</div>
                        <div>09685356478</div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>

</section>
<script>
    function gotoEvent() {
        window.location.href = "<?= DOMAIN ?>/searth-event.php"
    }
</script>

<?php include 'inc/footer.php' ?>