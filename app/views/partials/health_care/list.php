<?php 
$can_add = ACL::is_allowed("health_care/add");
$can_view = ACL::is_allowed("health_care/view_chart");

$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$csrf_token = Csrf::$token;
$view_data = $this->view_data;
$records = $view_data->records ?? [];

// Lấy thông tin người dùng đang đăng nhập
$current_user = $_SESSION[APP_ID.'user_data'] ?? null;
$current_teacher = $current_user['assigned_teacher'] ?? null;
?>
<<<<<<< HEAD
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list" data-display-type="grid"
    data-page-url="<?php print_link($current_page); ?>">
    <?php if($show_header): ?>
=======
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list" data-display-type="grid" data-page-url="<?php print_link($current_page); ?>">
<?php if($show_header): ?>
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
    <div class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="record-title">Sức khỏe học sinh</h4>
                </div>
                <div class="col-sm-3">
                    <?php if($can_add): ?>
                    <a class="btn btn-primary my-1" href="<?php print_link("health_care/add") ?>">
                        <i class="material-icons">add</i> Nhập dữ liệu sức khỏe
                    </a>
                    <?php endif; ?>
                </div>
                <div class="col-sm-4">
                    <form class="search" action="<?php print_link('health_care'); ?>" method="get">
                        <div class="input-group">
<<<<<<< HEAD
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text"
                                name="search" placeholder="Tìm kiếm học sinh..." />
=======
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search" placeholder="Tìm kiếm học sinh..." />
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
                            <div class="input-group-append">
                                <button class="btn btn-primary"><i class="material-icons">search</i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 comp-grid">
                    <?php if(!empty($field_name) || !empty($_GET['search'])): ?>
<<<<<<< HEAD
                    <hr class="sm d-block d-sm-none" />
                    <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                        <ul class="breadcrumb m-0 p-1">
                            <?php if(!empty($field_name)): ?>
                            <li class="breadcrumb-item"><a href="<?php print_link('health_care'); ?>"><i
                                        class="material-icons">arrow_back</i></a></li>
                            <li class="breadcrumb-item"><?= make_readable($field_name); ?></li>
                            <li class="breadcrumb-item active font-weight-bold">
                                <?= make_readable(urldecode($field_value)); ?></li>
                            <?php endif; ?>
                            <?php if(get_value("search")): ?>
                            <li class="breadcrumb-item"><a href="<?php print_link('health_care'); ?>"><i
                                        class="material-icons">arrow_back</i></a></li>
                            <li class="breadcrumb-item">Tìm</li>
                            <li class="breadcrumb-item active font-weight-bold"><?= get_value("search"); ?></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
=======
                        <hr class="sm d-block d-sm-none" />
                        <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                            <ul class="breadcrumb m-0 p-1">
                                <?php if(!empty($field_name)): ?>
                                    <li class="breadcrumb-item"><a href="<?php print_link('health_care'); ?>"><i class="material-icons">arrow_back</i></a></li>
                                    <li class="breadcrumb-item"><?= make_readable($field_name); ?></li>
                                    <li class="breadcrumb-item active font-weight-bold"><?= make_readable(urldecode($field_value)); ?></li>
                                <?php endif; ?>
                                <?php if(get_value("search")): ?>
                                    <li class="breadcrumb-item"><a href="<?php print_link('health_care'); ?>"><i class="material-icons">arrow_back</i></a></li>
                                    <li class="breadcrumb-item">Tìm</li>
                                    <li class="breadcrumb-item active font-weight-bold"><?= get_value("search"); ?></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <?php
=======
<?php endif; ?>

<div class="container">
    <div class="row">
        <?php
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
            $current_user = $_SESSION[APP_ID.'user_data'] ?? null;

            foreach ($records as $record):
            if ($current_user && ($current_user['role'] ?? '') === 'headteacher') {
                if (!isset($record['class']) || !isset($current_user['assigned_teacher'])) continue;
        
                    $class_name = $record['class'];
                    $teacher = $current_user['assigned_teacher'];

                    $db = new SharedController();
                    $class_info = $db->GetModel()->rawQueryOne("SELECT assigned_teacher FROM class WHERE class_name = ?", [$class_name]);

                if (!$class_info || $class_info['assigned_teacher'] !== $teacher) continue;
            }
        ?>
<<<<<<< HEAD
            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <img src="<?= $record['photo'] ?>" class="card-img-top" height="200" style="object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $record['student_name'] ?></h5>
                        <p class="card-text">
                            <strong>Lớp:</strong> <?= $record['class'] ?><br>
                            <strong>Năm học:</strong> <?= $record['month'] ?><br>
                            <strong>Chiều cao:</strong> <?= $record['height'] ?> cm<br>
                            <strong>Cân nặng:</strong> <?= $record['weight'] ?> kg<br>
                            <strong>Thị lực:</strong> <?= $record['eye_sight'] ?> độ
                        </p>
                        <?php if($can_view): ?>
                        <a href="<?= SITE_ADDR ?>health_care/view_chart/<?= $record['student_id'] ?>"
                            class="btn btn-primary btn-sm">Xem biểu đồ</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php if(empty($shown_ids)): ?>
            <?php endif; ?>
        </div>
    </div>
</section>
=======
        <div class="col-md-4 mb-3">
            <div class="card shadow">
                <img src="<?= $record['photo'] ?>" class="card-img-top" height="200" style="object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?= $record['student_name'] ?></h5>
                    <p class="card-text">
                        <strong>Lớp:</strong> <?= $record['class'] ?><br>
                        <strong>Năm học:</strong> <?= $record['year'] ?><br>
                        <strong>Chiều cao:</strong> <?= $record['height'] ?> cm<br>
                        <strong>Cân nặng:</strong> <?= $record['weight'] ?> kg<br>
                        <strong>Thị lực:</strong> <?= $record['eye_sight'] ?> độ
                    </p>
                    <?php if($can_view): ?>
                    <a href="<?= SITE_ADDR ?>health_care/view_chart/<?= $record['student_id'] ?>" class="btn btn-primary btn-sm">Xem biểu đồ</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php if(empty($shown_ids)): ?>
        <div class="col-12 text-center text-muted p-4">
            <h5>Không có dữ liệu sức khỏe nào được tìm thấy.</h5>
        </div>
        <?php endif; ?>
    </div>
</div>
</section>
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
