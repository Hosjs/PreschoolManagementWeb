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
                    <h4 class="record-title">Sửa thông tin lớp</h4>
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
                            action="<?php print_link("class/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="class_ID">Mã lớp <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-class_ID" value="<?php  echo $data['class_ID']; ?>"
                                                    type="text" placeholder="Nhập mã lớp" required="" name="class_ID"
                                                    class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="class_name">Tên lớp <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select required="" id="ctrl-class_name" name="class_name"
                                                placeholder="Chọn tên lớp...." class="custom-select">
                                                <option value="">Chọn tên lớp ...</option>
                                                <?php
                                                    $class_options = Menu::$class;
                                                    if(!empty($class_options)){
                                                        foreach($class_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            $selected = $this->set_field_selected('class_name', $value, $data['class_name']);
                                                        ?>
                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                    <?php echo $label ?>
                                                </option>
                                                <?php }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="age">Độ tuổi <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select required="" id="ctrl-age" name="age" placeholder="Chọn độ tuổi ...."
                                                class="custom-select">
                                                <option value="">Chọn độ tuổi ...</option>
                                                <?php
                                                    $age_options = Menu::$age;
                                                    if(!empty($age_options)){
                                                        foreach($age_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            $selected = $this->set_field_selected('age', $value, $data['age']);
                                                        ?>
                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                    <?php echo $label ?>
                                                </option>
                                                <?php }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="number_of_pupil">Sĩ số lớp <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-number_of_pupil"
                                                    value="<?php  echo $data['number_of_pupil']; ?>" type="text"
                                                    placeholder="Nhập sĩ số lớp" required="" name="number_of_pupil"
                                                    class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="assigned_teacher">Giáo viên chủ nghiệm
                                                <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-assigned_teacher"
                                                    value="<?php  echo $data['assigned_teacher']; ?>" type="text"
                                                    placeholder="Giáo viên chủ nhiệm" required=""
                                                    name="assigned_teacher" class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="assistant">Trợ giảng <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-assistant" value="<?php  echo $data['assistant']; ?>"
                                                    type="text" placeholder="Trợ giảng" required="" name="assistant"
                                                    class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="room">Phòng học <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-room" value="<?php  echo $data['room']; ?>" type="text"
                                                    placeholder="Phòng học" required="" name="room"
                                                    class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="class_score">Điểm thi đua <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-class_score"
                                                    value="<?php  echo $data['class_score']; ?>" type="text"
                                                    placeholder="Điểm thi đua" required="" name="class_score"
                                                    class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="study_time">Năm học <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-study_time" value="<?php  echo $data['study_time']; ?>"
                                                    type="text" placeholder="Năm học" required="" name="study_time"
                                                    class="form-control " />
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
                                                    placeholder="Ghi chú" required="" name="note"
                                                    class="form-control " />
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