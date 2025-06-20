<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add" data-display-type=""
    data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Đăng ký tài khoản</h4>
                </div>
                <div class="col-sm-6 comp-grid">
                    <div class="">
                        <div class="text-center">
                            Đã có tài khoản? <a class="btn btn-primary" href="<?php print_link('') ?>"> Đăng nhập</a>
                        </div>
                    </div>
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
                        <form id="users-userregister-form" role="form" novalidate enctype="multipart/form-data"
                            class="form page-form form-horizontal needs-validation"
                            action="<?php print_link("index/register?csrf_token=$csrf_token") ?>" method="post">
                            <!--[main-form-start]-->
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="first_name">Họ và tên đệm <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-first_name"
                                                    value="<?php  echo $this->set_field_value('first_name',""); ?>"
                                                    type="text" placeholder="Nhập họ và tên đệm" required=""
                                                    name="first_name" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="last_name">Tên <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-last_name"
                                                    value="<?php  echo $this->set_field_value('last_name',""); ?>"
                                                    type="text" placeholder="Nhập Tên" required="" name="last_name"
                                                    class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="email">Email <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-email"
                                                    value="<?php  echo $this->set_field_value('email',""); ?>"
                                                    type="email" placeholder="Nhập Email" required="" name="email"
                                                    data-url="api/json/users_email_value_exist/"
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
                                            <label class="control-label" for="photo">Ảnh<span
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
                                                        value="<?php  echo $this->set_field_value('photo',""); ?>"
                                                        type="text" />
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                    <div
                                                        class="dz-file-limit animated bounceIn text-center text-danger">
                                                    </div>
                                                </div>
                                            </div>
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
                                            <label class="control-label" for="resdence">Nơi cư chú <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-resdence"
                                                    value="<?php  echo $this->set_field_value('resdence',""); ?>"
                                                    type="text" placeholder="Nhập địa chỉ" required="" name="resdence"
                                                    class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="phone">SĐT <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-phone"
                                                    value="<?php  echo $this->set_field_value('phone',""); ?>"
                                                    type="number" placeholder="Nhập số điện thoại" step="1" required=""
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
                                                <input id="ctrl-username"
                                                    value="<?php  echo $this->set_field_value('username',""); ?>"
                                                    type="text" placeholder="Nhập tên tài khoản" required=""
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
                                            <label class="control-label" for="password">Mật khẩu <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-password"
                                                    value="<?php  echo $this->set_field_value('password',""); ?>"
                                                    type="password" placeholder="Nhập mật khẩu" required=""
                                                    name="password" class="form-control  password password-strength" />
                                                <div class="input-group-append cursor-pointer btn-toggle-password">
                                                    <span class="input-group-text"><i
                                                            class="material-icons">visibility</i></span>
                                                </div>
                                            </div>
                                            <div class="password-strength-msg">
                                                <small class="font-weight-bold">Nên chứa</small>
                                                <small class="length chip">Chứa ít nhất 6 ký tự</small>
                                                <small class="caps chip">Chữ cái viết hoa</small>
                                                <small class="number chip">Số</small>
                                                <small class="special chip">Ký tự đặc biệt</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="confirm_password">Xác nhận mật khẩu <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-password-confirm" data-match="#ctrl-password"
                                                    class="form-control password-confirm " type="password"
                                                    name="confirm_password" required placeholder="Xác nhận mật khẩu" />
                                                <div class="input-group-append cursor-pointer btn-toggle-password">
                                                    <span class="input-group-text"><i
                                                            class="material-icons">visibility</i></span>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Mật khẩu không khớp
                                                </div>
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
                                                    placeholder="Chọn vai trò ..." class="custom-select">
                                                    <option value="">Chọn vai trò ...</option>
                                                    <?php
                                                                                            $role_options = Menu :: $role;
                                                                                            if(!empty($role_options)){
                                                                                            foreach($role_options as $option){
                                                                                            $value = $option['value'];
                                                                                            $label = $option['label'];
                                                                                            $selected = $this->set_field_selected('role', $value, "");
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
                            <!--[main-form-end]-->
                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <button class="btn btn-primary" type="submit">
                                    Xác nhận
                                    <i class="material-icons"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>