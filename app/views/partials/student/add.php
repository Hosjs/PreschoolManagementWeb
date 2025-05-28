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
                    <h4 class="record-title">Thêm học sinh</h4>
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
                        <form id="student-add-form" role="form" novalidate enctype="multipart/form-data"
                            class="form page-form form-horizontal needs-validation"
                            action="<?php print_link("student/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="pupils_full_name">Tên đầy đủ của bé <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-pupils_full_name"
                                                    value="<?php  echo $this->set_field_value('pupils_full_name',""); ?>"
                                                    type="text" placeholder="Nhập họ tên" required=""
                                                    name="pupils_full_name" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="pupils_ID">Mã học sinh <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-pupils_ID"
                                                    value="<?php  echo $this->set_field_value('pupils_ID',""); ?>"
                                                    type="text" placeholder="Nhập mã học sinh" required=""
                                                    name="pupils_ID" class="form-control " />
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
                                            <label class="control-label" for="gender">Giới tính <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <?php
                                                    $gender_options = Menu :: $gender;
                                                    if(!empty($gender_options)){
                                                    foreach($gender_options as $option){
                                                        $value = $option['value'];
                                                        $label = $option['label'];
                                                        //check if current option is checked option
                                                        $checked = $this->set_field_checked('gender', $value, "");
                                                        ?>
                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input id="ctrl-gender" class="custom-control-input"
                                                        <?php echo $checked ?> value="<?php echo $value ?>" type="radio"
                                                        required="" name="gender" />
                                                    <span class="custom-control-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="class">Lớp <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <select required="" id="ctrl-class" name="class"
                                                    placeholder="Select a value ..." class="custom-select">
                                                    <option value="">Chọn 1 giá trị ...</option>
                                                    <?php
                                                        $class_options = Menu :: $class;
                                                        if(!empty($class_options)){
                                                            foreach($class_options as $option){
                                                                $value = $option['value'];
                                                                $label = $option['label'];
                                                                $selected = $this->set_field_selected('class', $value, "");
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
                                            <label class="control-label" for="note">Ghi chú <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-note"
                                                    value="<?php  echo $this->set_field_value('note',""); ?>"
                                                    type="text" placeholder="Nhập ghi chú" required="" name="note"
                                                    class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="father_name">Tên bố <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-father_name"
                                                    value="<?php  echo $this->set_field_value('father_name',""); ?>"
                                                    type="text" placeholder="Nhập họ tên bố" required=""
                                                    name="father_name" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="mother_name">Tên mẹ <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-mother_name"
                                                    value="<?php  echo $this->set_field_value('mother_name',""); ?>"
                                                    type="text" placeholder="Nhập họ tên mẹ" required=""
                                                    name="mother_name" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="father_contact">Phương thức liên hệ của bố
                                                <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-father_contact"
                                                    value="<?php  echo $this->set_field_value('father_contact',""); ?>"
                                                    type="number" placeholder="Nhập số điện thoại bố" step="1"
                                                    required="" name="father_contact" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="mother_contact">Phương thức liên hệ của mẹ
                                                <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-mother_contact"
                                                    value="<?php  echo $this->set_field_value('mother_contact',""); ?>"
                                                    type="number" placeholder="Nhập số điện thoại mẹ" step="1"
                                                    required="" name="mother_contact" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="special_need">Hoàn cảnh đặc biệt <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <?php
                                                    $special_need_options = Menu :: $special_need;
                                                    if(!empty($special_need_options)){
                                                        foreach($special_need_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            //check if current option is checked option
                                                            $checked = $this->set_field_checked('special_need', $value, "");
                                                        ?>
                                                <label class="custom-control custom-radio custom-control-inline">
                                                    <input id="ctrl-special_need" class="custom-control-input"
                                                        <?php echo $checked ?> value="<?php echo $value ?>" type="radio"
                                                        required="" name="special_need" />
                                                    <span class="custom-control-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                        }   
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="guardian_name">Tên người giám hộ <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-guardian_name"
                                                    value="<?php  echo $this->set_field_value('guardian_name',""); ?>"
                                                    type="text" placeholder="Nhập tên người giám hộ" required=""
                                                    name="guardian_name" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="guardian_contact">Phương thức liên hệ
                                                người giám hộ <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-guardian_contact"
                                                    value="<?php  echo $this->set_field_value('guardian_contact',""); ?>"
                                                    type="text" placeholder="Nhập số điện thoại người dám hộ"
                                                    required="" name="guardian_contact" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <div class="form-ajax-status"></div>
                                <button class="btn btn-primary" type="submit">
                                    Xác nhận
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>