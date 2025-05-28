<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="" data-display-type=""
    data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Sửa</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div class="bg-light p-3 animated fadeIn page-content">
                        <form novalidate id="" role="form" enctype="multipart/form-data"
                            class="form page-form form-horizontal needs-validation"
                            action="<?php print_link("users/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="first_name">Họ và tên đệm: <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-first_name" value="<?php  echo $data['first_name']; ?>"
                                                    type="text" placeholder="Nhập họ và tên đệm:" required=""
                                                    name="first_name" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="last_name">Tên: <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-last_name" value="<?php  echo $data['last_name']; ?>"
                                                    type="text" placeholder="Nhập Tên" required="" name="last_name"
                                                    class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="photo">Ảnh <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <div class="dropzone required" input="#ctrl-photo" fieldname="photo"
                                                    data-multiple="false"
                                                    dropmsg="Chọn tệp hoặc kéo và thả tệp để tải lên" btntext="Browse"
                                                    extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                    <input name="photo" id="ctrl-photo" required=""
                                                        class="dropzone-input form-control"
                                                        value="<?php  echo $data['photo']; ?>" type="text" />
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                    <div
                                                        class="dz-file-limit animated bounceIn text-center text-danger">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php Html :: uploaded_files_list($data['photo'], '#ctrl-photo'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="birth_day">Ngày sinh <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-birth_day" class="form-control datepicker  datepicker"
                                                    required="" value="<?php  echo $data['birth_day']; ?>"
                                                    type="datetime" name="birth_day" placeholder="Nhập ngày sinh"
                                                    data-enable-time="false" data-min-date="" data-max-date=""
                                                    data-date-format="Y-m-d" data-alt-format="F j, Y"
                                                    data-inline="false" data-no-calendar="false" data-mode="single" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i
                                                            class="material-icons">date_range</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="resdence">Địa chỉ <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-resdence" value="<?php  echo $data['resdence']; ?>"
                                                    type="text" placeholder="Nhập địa chỉ" required="" name="resdence"
                                                    class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="phone">Số điện thoại <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-phone" value="<?php  echo $data['phone']; ?>"
                                                    type="text" placeholder="Nhập số điện thoại" required=""
                                                    name="phone" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="username">Tên đăng nhập <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-username" value="<?php  echo $data['username']; ?>"
                                                    type="text" placeholder="Nhập tên đăng nhập" required=""
                                                    name="username" data-url="api/json/users_username_value_exist/"
                                                    data-loading-msg="Checking availability ..."
                                                    data-available-msg="Available" data-unavailable-msg="Not available"
                                                    class="form-control  ctrl-check-duplicate" />
                                                <div class="check-status"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="role">Vai trò <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <select required="" id="ctrl-role" name="role"
                                                    placeholder="Select a value ..." class="custom-select">
                                                    <option value="">Chọn 1 vai trò ...</option>
                                                    <?php
                                                                                $role_options = Menu :: $role;
                                                                                $field_value = $data['role'];
                                                                                if(!empty($role_options)){
                                                                                foreach($role_options as $option){
                                                                                $value = $option['value'];
                                                                                $label = $option['label'];
                                                                                $selected = ( $value == $field_value ? 'selected' : null );
                                                                                ?>
                                                    <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                        <?php echo $label ?>
                                                    </option>
                                                    <?php
                                                                                }
                                                                                }
                                                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="account_status">Trạng thái tài khoản <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <select required="" id="ctrl-account_status" name="account_status"
                                                    placeholder="Select a value ..." class="custom-select">
                                                    <option value="">Chọn 1 giá trị ...</option>
                                                    <?php
                                                                                    $account_status_options = Menu :: $account_status;
                                                                                    $field_value = $data['account_status'];
                                                                                    if(!empty($account_status_options)){
                                                                                    foreach($account_status_options as $option){
                                                                                    $value = $option['value'];
                                                                                    $label = $option['label'];
                                                                                    $selected = ( $value == $field_value ? 'selected' : null );
                                                                                    ?>
                                                    <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                        <?php echo $label ?>
                                                    </option>
                                                    <?php
                                                                                    }
                                                                                    }
                                                                                    ?>
                                                </select>
                                            </div>
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