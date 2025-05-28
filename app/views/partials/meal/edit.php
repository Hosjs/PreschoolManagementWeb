<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit" data-display-type=""
    data-page-url="<?php print_link($current_page); ?>">
    <?php if( $show_header ){ ?>
    <div class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Sửa thực đơn</h4>
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
                        <form novalidate role="form" enctype="multipart/form-data"
                            class="form page-form form-horizontal needs-validation"
                            action="<?php print_link("meal/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="lunch">Bữa sáng <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input id="ctrl-lunch" value="<?php echo $data['lunch']; ?>" type="text"
                                                placeholder="Nhập bữa sáng" required name="lunch"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="lunch_img">Ảnh bữa sáng <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <div class="dropzone required" input="#lunch_img" fieldname="photo"
                                                    data-multiple="false"
                                                    dropmsg="Chọn tệp hoặc kéo và thả tệp để tải lên" btntext="Browse"
                                                    extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                    <input name="lunch_img" id="lunch_img" required=""
                                                        class="dropzone-input form-control"
                                                        value="<?php  echo $data['lunch_img']; ?>" type="text" />
                                                    <div
                                                        class="dz-file-limit animated bounceIn text-center text-danger">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php Html :: uploaded_files_list($data['lunch_img'], '#ctrl-lunch_img'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="afternoon">Bữa chiều <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input id="ctrl-afternoon" value="<?php echo $data['afternoon']; ?>"
                                                type="text" placeholder="Nhập bữa chiều" required name="afternoon"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="lunch_img">Ảnh bữa chiều <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <div class="dropzone required" input="#afternoon_img" fieldname="photo"
                                                    data-multiple="false"
                                                    dropmsg="Chọn tệp hoặc kéo và thả tệp để tải lên" btntext="Browse"
                                                    extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                    <input name="afternoon_img" id="afternoon_img" required=""
                                                        class="dropzone-input form-control"
                                                        value="<?php  echo $data['afternoon_img']; ?>" type="text" />
                                                    <div
                                                        class="dz-file-limit animated bounceIn text-center text-danger">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php Html :: uploaded_files_list($data['afternoon_img'], '#ctrl-afternoon_img'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="date">Ngày tạo <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-date" class="form-control datepicker" required
                                                    value="<?php echo $data['date']; ?>" type="datetime" name="date"
                                                    placeholder="Chọn ngày giờ" data-enable-time="true"
                                                    data-date-format="Y-m-d H:i:S" data-alt-format="F j, Y - H:i" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i
                                                            class="material-icons">date_range</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="created_by">Người tạo <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input id="ctrl-created_by" value="<?php echo $data['created_by']; ?>"
                                                type="text" placeholder="Nhập tên người tạo" required name="created_by"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit">
                                    Cập nhật
                                    <i class="material-icons">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>