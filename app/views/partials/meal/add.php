<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<<<<<<< HEAD
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add" data-display-type=""
    data-page-url="<?php print_link($current_page); ?>">
=======
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
    <?php if ($show_header == true) { ?>
    <div class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Thêm thực đơn</h4>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div>
        <div class="container">
            <div class="row ">
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div class="bg-light p-3 animated fadeIn page-content">
<<<<<<< HEAD
                        <form id="meal-add-form" role="form" novalidate enctype="multipart/form-data"
                            class="form page-form form-horizontal needs-validation"
                            action="<?php print_link("meal/add?csrf_token=$csrf_token") ?>" method="post">
=======
                        <form id="meal-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("meal/add?csrf_token=$csrf_token") ?>" method="post">
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
                            <div>
                                <!-- Ngày -->
                                <div class="form-group">
                                    <div class="row">
<<<<<<< HEAD
                                        <div class="col-sm-4"><label class="control-label" for="date">Ngày <span
                                                    class="text-danger">*</span></label></div>
                                        <div class="col-sm-8">
                                            <input id="ctrl-date" class="form-control datepicker" required
                                                value="<?php echo $this->set_field_value('date', ""); ?>" type="date"
                                                name="date" />
=======
                                        <div class="col-sm-4"><label class="control-label" for="date">Ngày <span class="text-danger">*</span></label></div>
                                        <div class="col-sm-8">
                                            <input id="ctrl-date" class="form-control datepicker" required value="<?php echo $this->set_field_value('date', ""); ?>" type="date" name="date" />
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
                                        </div>
                                    </div>
                                </div>

                                <!-- Bữa trưa -->
                                <div class="form-group">
                                    <div class="row">
<<<<<<< HEAD
                                        <div class="col-sm-4"><label class="control-label" for="lunch">Bữa trưa <span
                                                    class="text-danger">*</span></label></div>
                                        <div class="col-sm-8">
                                            <textarea placeholder="Nhập món bữa trưa" id="ctrl-lunch" required rows="3"
                                                name="lunch"
                                                class="form-control"><?php echo $this->set_field_value('lunch', ""); ?></textarea>
=======
                                        <div class="col-sm-4"><label class="control-label" for="lunch">Bữa trưa <span class="text-danger">*</span></label></div>
                                        <div class="col-sm-8">
                                            <textarea placeholder="Nhập món bữa trưa" id="ctrl-lunch" required rows="3" name="lunch" class="form-control"><?php echo $this->set_field_value('lunch', ""); ?></textarea>
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
                                        </div>
                                    </div>
                                </div>

                                <!-- Ảnh bữa trưa -->
<<<<<<< HEAD
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="lunch_img">Ảnh bữa trưa <span
                                                    class="text-danger">*</span>
                                            </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <div class="dropzone required" input="#ctrl-lunch_img" fieldname="photo"
                                                    data-multiple="false"
                                                    dropmsg="Chọn tệp hoặc kéo và thả tệp để tải lên" btntext="Browse"
                                                    extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                    <input name="lunch_img" id="ctrl-lunch_img" required=""
                                                        class="dropzone-input form-control"
                                                        value="<?php  echo $this->set_field_value('lunch_img',""); ?>"
                                                        type="text" />
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                    <div
                                                        class="dz-file-limit animated bounceIn text-center text-danger">
                                                    </div>
                                                </div>
                                            </div>
=======
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4"><label class="control-label" for="lunch_img">Ảnh bữa trưa</label></div>
                                        <div class="col-sm-8">
                                            <input id="ctrl-lunch_img" class="form-control" value="<?php echo $this->set_field_value('lunch_img', ""); ?>" type="file" name="lunch_img" accept="image/*" />
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
                                        </div>
                                    </div>
                                </div>

                                <!-- Bữa chiều -->
                                <div class="form-group">
                                    <div class="row">
<<<<<<< HEAD
                                        <div class="col-sm-4"><label class="control-label" for="afternoon">Bữa
                                                chiều <span class="text-danger">*</span></label></div>
                                        <div class="col-sm-8">
                                            <textarea placeholder="Nhập món bữa trưa" id="ctrl-afternoon" required
                                                rows="3" name="afternoon"
                                                class="form-control"><?php echo $this->set_field_value('afternoon', ""); ?></textarea>
=======
                                        <div class="col-sm-4"><label class="control-label" for="afternoon">Bữa chiều</label></div>
                                        <div class="col-sm-8">
                                            <textarea placeholder="Nhập món bữa chiều" id="ctrl-afternoon" rows="3" name="afternoon" class="form-control"><?php echo $this->set_field_value('afternoon', ""); ?></textarea>
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
                                        </div>
                                    </div>
                                </div>

                                <!-- Ảnh bữa chiều -->
                                <div class="form-group">
                                    <div class="row">
<<<<<<< HEAD
                                        <div class="col-sm-4">
                                            <label class="control-label" for="afternoon_img">Ảnh bữa chiều <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <div class="dropzone required" input="#ctrl-afternoon_img"
                                                    fieldname="photo" data-multiple="false"
                                                    dropmsg="Chọn tệp hoặc kéo và thả tệp để tải lên" btntext="Browse"
                                                    extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                    <input name="afternoon_img" id="ctrl-afternoon_img" required=""
                                                        class="dropzone-input form-control"
                                                        value="<?php  echo $this->set_field_value('afternoon_img',""); ?>"
                                                        type="text" />
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                    <div
                                                        class="dz-file-limit animated bounceIn text-center text-danger">
                                                    </div>
                                                </div>
                                            </div>
=======
                                        <div class="col-sm-4"><label class="control-label" for="afternoon_img">Ảnh bữa chiều</label></div>
                                        <div class="col-sm-8">
                                            <input id="ctrl-afternoon_img" class="form-control" value="<?php echo $this->set_field_value('afternoon_img', ""); ?>" type="file" name="afternoon_img" accept="image/*" />
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
                                        </div>
                                    </div>
                                </div>

                                <!-- Người tạo -->
                                <div class="form-group">
                                    <div class="row">
<<<<<<< HEAD
                                        <div class="col-sm-4"><label class="control-label" for="created_by">Người tạo
                                                <span class="text-danger">*</span></label></div>
                                        <div class="col-sm-8">
                                            <input id="ctrl-created_by" class="form-control" required
                                                value="<?php echo $this->set_field_value('created_by', ""); ?>"
                                                type="text" name="created_by" />
=======
                                        <div class="col-sm-4"><label class="control-label" for="created_by">Người tạo <span class="text-danger">*</span></label></div>
                                        <div class="col-sm-8">
                                            <input id="ctrl-created_by" class="form-control" required value="<?php echo $this->set_field_value('created_by', ""); ?>" type="text" name="created_by" />
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
                                        </div>
                                    </div>
                                </div>

                                <!-- Nút submit -->
                                <div class="form-group form-submit-btn-holder text-center mt-3">
                                    <div class="form-ajax-status"></div>
                                    <button class="btn btn-primary" type="submit">
                                        Thêm thực đơn
                                        <i class="material-icons">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</section>
=======
</section>
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
