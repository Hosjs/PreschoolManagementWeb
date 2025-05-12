<?php 
// Kiểm tra phân quyền
$can_add = ACL::is_allowed("class_detail/add");
$can_edit = ACL::is_allowed("class_detail/edit");
$can_view = ACL::is_allowed("class_detail/view");
$can_delete = ACL::is_allowed("class_detail/delete");

$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;

// Dữ liệu từ controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title ?? "Danh sách học sinh";
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>

<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="grid" data-page-url="<?php print_link($current_page); ?>">
    
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Điểm danh</h4>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('class_detail'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 p-1">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('class_detail'); ?>">
                                            <i class="material-icons">arrow_back</i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                        <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                    </li>
                                    <?php 
                                    }   
                                    ?>
                                    <?php
                                    if(get_value("search")){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('event'); ?>">
                                            <i class="material-icons">arrow_back</i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        Tìm 
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <!--End of Page bread crumbs components-->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
<div class="container">
    <div class="row">
        <?php 
        $current_user = $_SESSION[APP_ID.'user_data'] ?? null;

        foreach ($records as $data):
            if ($current_user && $current_user['role'] == 'headteacher') {
                if ($data['assigned_teacher'] !== $current_user['assigned_teacher']) {
                    continue;
                }
            }            
        ?>

        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card shadow-sm h-100">
                
                <img src="<?= $data['photo'] ?? 'uploads/default-avatar.png' ?>" class="card-img-top" alt="Ảnh học sinh" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                <h5 class="card-title text-primary"><?= $data['student_name'] ?? '' ?></h5>
                <p class="card-text">
                    <strong>Lớp:</strong> <?= $data['class'] ?? '' ?><br>
                    <strong>Giới tính:</strong> <?= $data['gender'] ?? '' ?><br>
                    <strong>Ghi chú:</strong> <?= $data['note'] ?? '' ?><br>
                    <strong>Điểm danh:</strong> <?= $data['attendance'] == 'yes' ? 'Có mặt' : ($data['attendance'] == 'no' ? 'Vắng mặt' : 'Chưa điểm danh') ?>
                </p>

                    <div class="d-flex justify-content-between">
                    <?php include(__DIR__ . "/yes.php"); ?>
                    <?php include(__DIR__ . "/no.php"); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>
