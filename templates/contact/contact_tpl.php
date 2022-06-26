<div class="container">
    <div class="title-main"><span><?=$title_crumb?></span></div>
    <div class="top-contact row rowrp">
        <div class="article-contact col-md-6 co-sm-6 col-xs-12"><?=(isset($lienhe['noidung'.$lang]) && $lienhe['noidung'.$lang] != '') ? htmlspecialchars_decode($lienhe['noidung'.$lang]) : ''?></div>
        <div class="form_contact col-md-6 co-sm-6 col-xs-12">
            <form class="form-contact validation-contact" novalidate method="post" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-contact col-sm-6 col-xs-12 ">
                        <input type="text" class="form-control" id="ten" name="ten" placeholder="<?=hoten?>" required />
                        <div class="invalid-feedback"><?=vuilongnhaphoten?></div>
                    </div>
                    <div class="input-contact col-sm-6 col-xs-12 ">
                        <input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?=sodienthoai?>" required />
                        <div class="invalid-feedback"><?=vuilongnhapsodienthoai?></div>
                    </div>         
                </div>
                <div class="row">
                    <div class="input-contact col-sm-6 col-xs-12 ">
                        <input type="text" class="form-control" id="diachi" name="diachi" placeholder="<?=diachi?>" required />
                        <div class="invalid-feedback"><?=vuilongnhapdiachi?></div>
                    </div>
                    <div class="input-contact col-sm-6 col-xs-12 ">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
                        <div class="invalid-feedback"><?=vuilongnhapdiachiemail?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-contact col-xs-12">
                        <input type="text" class="form-control" id="tieude" name="tieude" placeholder="<?=chude?>" required />
                        <div class="invalid-feedback"><?=vuilongnhapchude?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-contact col-xs-12">
                        <textarea class="form-control" id="noidung" name="noidung" placeholder="<?=noidung?>" required /></textarea>
                        <div class="invalid-feedback"><?=vuilongnhapnoidung?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-contact ">
                            <input type="file" class="custom-file-input" name="file">
                            <label class="custom-file-label" for="file" title="<?=chon?>"><?=dinhkemtaptin?></label>
                        </div>
                    </div>
                </div>
                <div class="btn_input-contact flex">
                    <input type="submit" class="btn btn-primary" name="submit-contact" value="<?=gui?>" disabled />
                    <input type="reset" class="btn btn-secondary" value="<?=nhaplai?>" />
                    <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
                </div>
            </form>
        </div>
    </div>
</div>