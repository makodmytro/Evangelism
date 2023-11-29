<?php include 'inc/header.php' ?>
<?php include 'inc/nav.php' ?>

<section class="container h-100">
    <?php include 'inc/top.php' ?>
    <div class="main-container pt-5">
        <div class="border border-1 border-solid pt-4 pb-4 position-relative">
            <button class="btn btn-primary position-absolute" data-bs-toggle="modal" data-bs-target="#addFilterModal" style="top: -20px; left: 10px">Search Event</button>
            <div class="mt-2 ms-5">Fullname:&nbsp;*Johnson&nbsp;&nbsp;&nbsp;Zip code: 9654</div>
            <div class="mt-3">
                <div class="member-container bg-primary text-white">
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
                </div>
            </div>
        </div>

        <div class="modal fade" id="addFilterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Filters</h5>
                </div>
                <div class="modal-body">
                    <div class="row px-3">
                        <div class="col-sm-4">
                            <input type="text" class="form-control mt-3" name="typeuser" placeholder="Typeuser">
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mt-3" name="fullname" placeholder="Full name">
                        </div>
                    </div>
                    <div class="row px-3">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mt-3" name="organization" placeholder="Organization">
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
                            <input type="text" class="form-control mt-3" name="country  " placeholder="Country">
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

<?php include 'inc/footer.php' ?>