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
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Sửa thông tin</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("apply_for_admission/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="surname">Tên đệm <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-surname"  value="<?php  echo $data['surname']; ?>" type="text" placeholder="Enter Surname"  required="" name="surname"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="last_name">Họ <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-last_name"  value="<?php  echo $data['last_name']; ?>" type="text" placeholder="Enter Last Name"  required="" name="last_name"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="first_name">Tên <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-first_name"  value="<?php  echo $data['first_name']; ?>" type="text" placeholder="Enter First Name"  required="" name="first_name"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="year_of_birth">Năm sinh <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group">
                                                            <input id="ctrl-year_of_birth" class="form-control datepicker  datepicker"  required="" value="<?php  echo $data['year_of_birth']; ?>" type="datetime" name="year_of_birth" placeholder="Enter Year Of Birth" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="Y-m-d" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="photo">Ảnh <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <div class="dropzone required" input="#ctrl-photo" fieldname="photo"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                                    <input name="photo" id="ctrl-photo" required="" class="dropzone-input form-control" value="<?php  echo $data['photo']; ?>" type="text"  />
                                                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                        <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                    </div>
                                                                </div>
                                                                <?php Html :: uploaded_files_list($data['photo'], '#ctrl-photo'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="gender">Giới tính <span class="text-danger">*</span></label>
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
                                                                        <input id="ctrl-gender" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="gender" />
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
                                                                    <label class="control-label" for="class">Lớp <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <?php
                                                                        $class_options = Menu :: $class2;
                                                                        $field_value = $data['class'];
                                                                        if(!empty($class_options)){
                                                                        foreach($class_options as $option){
                                                                        $value = $option['value'];
                                                                        $label = $option['label'];
                                                                        //check if value is among checked options
                                                                        $checked = $this->check_form_field_checked($field_value, $value);
                                                                        ?>
                                                                        <label class="custom-control custom-radio custom-control-inline">
                                                                            <input id="ctrl-class" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="class" />
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
                                                                        <label class="control-label" for="with_birth_certificate">Đăng ký cơm trưa <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <select required=""  id="ctrl-with_birth_certificate" name="with_birth_certificate"  placeholder="Select a value ..."    class="custom-select" >
                                                                                <option value="">Chọn 1 giá trị ...</option>
                                                                                <?php
                                                                                $with_birth_certificate_options = Menu :: $bording;
                                                                                $field_value = $data['with_birth_certificate'];
                                                                                if(!empty($with_birth_certificate_options)){
                                                                                foreach($with_birth_certificate_options as $option){
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
                                                                        <label class="control-label" for="upi">Ghi chú <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <input id="ctrl-upi"  value="<?php  echo $data['upi']; ?>" type="text" placeholder="Enter Upi"  required="" name="upi"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="control-label" for="resdence">Địa chỉ <span class="text-danger">*</span></label>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="">
                                                                                <input id="ctrl-resdence"  value="<?php  echo $data['resdence']; ?>" type="text" placeholder="Enter Resdence"  required="" name="resdence"  class="form-control " />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label" for="special_conditions">Có mặt trong lớp <span class="text-danger">*</span></label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="">
                                                                                    <?php
                                                                                    $special_conditions_options = Menu :: $special_need;
                                                                                    $field_value = $data['special_conditions'];
                                                                                    if(!empty($special_conditions_options)){
                                                                                    foreach($special_conditions_options as $option){
                                                                                    $value = $option['value'];
                                                                                    $label = $option['label'];
                                                                                    //check if value is among checked options
                                                                                    $checked = $this->check_form_field_checked($field_value, $value);
                                                                                    ?>
                                                                                    <label class="custom-control custom-radio custom-control-inline">
                                                                                        <input id="ctrl-special_conditions" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="special_conditions" />
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
                                                                                    <label class="control-label" for="parent_contact_no">Thông tin liên lạc với phụ huynh <span class="text-danger">*</span></label>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="">
                                                                                        <input id="ctrl-parent_contact_no"  value="<?php  echo $data['parent_contact_no']; ?>" type="text" placeholder="Enter Parent Contact No"  required="" name="parent_contact_no"  class="form-control " />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="control-label" for="father_full_name">Tên đầy đủ của bố <span class="text-danger">*</span></label>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="">
                                                                                            <input id="ctrl-father_full_name"  value="<?php  echo $data['father_full_name']; ?>" type="text" placeholder="Enter Father Full Name"  required="" name="father_full_name"  class="form-control " />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group ">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label class="control-label" for="mother_full_name">Tên đầy đủ của mẹ <span class="text-danger">*</span></label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="">
                                                                                                <input id="ctrl-mother_full_name"  value="<?php  echo $data['mother_full_name']; ?>" type="text" placeholder="Enter Mother Full Name"  required="" name="mother_full_name"  class="form-control " />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-4">
                                                                                                <label class="control-label" for="home_county">Quốc tịch <span class="text-danger">*</span></label>
                                                                                            </div>
                                                                                            <div class="col-sm-8">
                                                                                                <div class="">
                                                                                                    <input id="ctrl-home_county"  value="<?php  echo $data['home_county']; ?>" type="text" placeholder="Enter Home County"  required="" name="home_county"  class="form-control " />
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
