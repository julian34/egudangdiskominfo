<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form method="POST" id="form" enctype="multipart/form-data">
                        <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>"
                            value="<?= csrf_hash() ?>" />
                        <div class="form-group row">
                            <label for="fullname" class="col-sm-5 col-form-label" id="label-fullname">Full Name</label>
                            <div class="col-sm-7">
                                <input name="fullname" type="text" class="form-control" id="fullname" value=""
                                    placeholder="Fullname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-5 col-form-label" id="label-username">Username *</label>
                            <div class="col-sm-7">
                                <input name="username" type="text" class="form-control" id="username" value=""
                                    placeholder="Username">
                                <div class="invalid-feedback">
                                    <p id="invalid-feedback-username"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-5 col-form-label" id="label-email">E-mail *</label>
                            <div class="col-sm-7">
                                <input name="email" type="email" class="form-control" id="email" value=""
                                    placeholder="E-email">
                                <div class="invalid-feedback">
                                    <p id="invalid-feedback-email"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-5 col-form-label" id="label-password">Password</label>
                            <div class="col-sm-7 input-group">
                                <input name="password" type="password" class="form-control" id="password"
                                    placeholder="Password">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-info bg-info" type="button"><span
                                            class="icon  text-white-50"><i class="fas fa-eye"></i></span></button>
                                </div>
                                <div class="invalid-feedback">
                                    <p id="invalid-feedback-password"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-5 col-form-label" id="label-repeatpassword">Repeat
                                Password</label>
                            <div class="col-sm-7 input-group">
                                <input name="repeatpassword" type="password" class="form-control" id="repeatpassword"
                                    placeholder="Password Repeat">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-info bg-info" type="button"><span
                                            class="icon  text-white-50"><i class="fas fa-eye"></i></span></button>
                                </div>
                                <div class="invalid-feedback">
                                    <p id="invalid-feedback-repeatpassword"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="picture" class="col-sm-5 col-form-label" id="label-picture">Picture</label>
                            <div class="col-sm-7">
                                <!-- <input type="file" name="file" multiple="true" accept="image/*" id="finput" onchange="readURL(this);"></br></br> -->
                                <input type="file" name="picture" multiple="true" accept="image/*" id="picture"
                                    onchange="readURL(this);">
                                <div class="invalid-feedback">
                                    <p id="invalid-feedback-picture"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 text-center">
                                <img class="img-fluid img-thumbnail card-img-top" id="blah"
                                    src="<?= base_url(); ?>/icon/Upload-PNG-Images.png" alt="your image" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btnSave" onclick="save()" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>