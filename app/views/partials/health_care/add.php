<?php 
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
?>
<section class="page" id="<?= $page_element_id ?>" data-page-type="add" data-page-url="<?= $current_page ?>">
    <?php if($show_header){ ?>
    <div class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Thêm dữ liệu sức khỏe</h4>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-7 comp-grid">
                    <?php $this::display_page_errors(); ?>
                    <div class="bg-light p-3 animated fadeIn page-content">
                        <form id="health-care-add-form" role="form" novalidate enctype="multipart/form-data"
                            class="form page-form form-horizontal needs-validation"
                            action="<?= print_link("health_care/add?csrf_token=$csrf_token") ?>" method="post">

                            <div>
                                <!-- student_id -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4"><label for="student_id" class="control-label">Học sinh
                                                <span class="text-danger">*</span></label></div>
                                        <div class="col-sm-8">
                                            <select required id="ctrl-student_id" name="student_id"
                                                class="form-control custom-select">
                                                <option value="">Chọn học sinh</option>
                                                <?php 
                                                $db = new SharedController;
                                                $students = $db->GetModel()->rawQuery("SELECT id, pupils_full_name FROM student ORDER BY pupils_full_name");
                                                foreach($students as $student){
                                                    $id = $student['id'];
                                                    $name = $student['pupils_full_name'];
                                                    echo "<option value=\"$id\">$name</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- month -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4"><label for="month" class="control-label">Tháng đo <span
                                                    class="text-danger">*</span></label></div>
                                        <div class="col-sm-8">
                                            <input id="ctrl-month" name="month" type="number" class="form-control"
                                                value="<?= date('M') ?>" required />
                                        </div>
                                    </div>
                                </div>

                                <!-- height -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4"><label for="height" class="control-label">Chiều cao (cm)
                                                <span class="text-danger">*</span></label></div>
                                        <div class="col-sm-8">
                                            <input id="ctrl-height" name="height" type="number" step="0.1"
                                                class="form-control" required />
                                        </div>
                                    </div>
                                </div>

                                <!-- weight -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4"><label for="weight" class="control-label">Cân nặng (kg)
                                                <span class="text-danger">*</span></label></div>
                                        <div class="col-sm-8">
                                            <input id="ctrl-weight" name="weight" type="number" step="0.1"
                                                class="form-control" required />
                                        </div>
                                    </div>
                                </div>

                                <!-- eye_sight -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4"><label for="eye_sight" class="control-label">Thị lực (độ)
                                                <span class="text-danger">*</span></label></div>
                                        <div class="col-sm-8">
                                            <input id="ctrl-eye_sight" name="eye_sight" type="number" step="0.1"
                                                class="form-control" required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <button class="btn btn-primary" type="submit">
                                    <i class="material-icons">save</i> Lưu dữ liệu
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>