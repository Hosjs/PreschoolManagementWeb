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
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit" data-display-type=""
    data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Sửa thông tin học sinh</h4>
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
                            action="<?php print_link("student/edit/$page_id/?csrf_token=$csrf_token"); ?>"
                            method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="pupils_full_name">Tên đầy đủ <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-pupils_full_name"
                                                    value="<?php  echo $data['pupils_full_name']; ?>" type="text"
                                                    placeholder="Nhập tên học sinh" required="" name="pupils_full_name"
                                                    class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="pupils_ID">Mã học sinh<span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-pupils_ID" value="<?php  echo $data['pupils_ID']; ?>"
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
                                            <label class="control-label" for="gender">Giới tính <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <?php
                                                    $gender_options = Menu :: $gender;
                                                    $field_value = $data['gender'];
                                                    if(!empty($gender_options)){
                                                        foreach($gender_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            //check if value is among checked options
                                                            $checked = $this->check_form_field_checked($field_value, $value);
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
                                            <label class="control-label" for="class">Class <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <select required="" id="ctrl-class" name="class"
                                                    placeholder="Select a value ..." class="custom-select">
                                                    <option value="">Chọn 1 giá trị ...</option>
                                                    <?php
                                                        $class_options = Menu :: $class;
                                                        $field_value = $data['class'];
                                                        if(!empty($class_options)){
                                                            foreach($class_options as $option){
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
                                            <label class="control-label" for="note">Ghi chú <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-note" value="<?php  echo $data['note']; ?>" type="text"
                                                    placeholder="Nhập ghi chú" required="" name="note"
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
                                                    value="<?php  echo $data['father_name']; ?>" type="text"
                                                    placeholder="Nhập tên bố" required="" name="father_name"
                                                    class="form-control " />
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
                                                    value="<?php  echo $data['mother_name']; ?>" type="text"
                                                    placeholder="Nhập tên mẹ" required="" name="mother_name"
                                                    class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="father_contact">Phương thức liên lạc với
                                                bố <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-father_contact"
                                                    value="<?php  echo $data['father_contact']; ?>" type="number"
                                                    placeholder="Nhập số điện thoại bố" step="1" required=""
                                                    name="father_contact" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="mother_contact">Phương thức liên lạc với
                                                mẹ <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-mother_contact"
                                                    value="<?php  echo $data['mother_contact']; ?>" type="number"
                                                    placeholder="Nhập số điện thoại mẹ" step="1" required=""
                                                    name="mother_contact" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="special_need">Trẻ có hoàn cảnh đặc biệt
                                                <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <?php
                                                    $special_need_options = Menu :: $special_need;
                                                    $field_value = $data['special_need'];
                                                    if(!empty($special_need_options)){
                                                        foreach($special_need_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            //check if value is among checked options
                                                            $checked = $this->check_form_field_checked($field_value, $value);
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
                                                    value="<?php  echo $data['guardian_name']; ?>" type="text"
                                                    placeholder="Nhập tên người giám hộ" required=""
                                                    name="guardian_name" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="guardian_contact">Phương thức liên lạc với
                                                người giám hộ <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-guardian_contact"
                                                    value="<?php  echo $data['guardian_contact']; ?>" type="number"
                                                    placeholder="Nhập số điện thoại người giám hộ" required=""
                                                    name="guardian_contact" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit">
                                    Cập nhật
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