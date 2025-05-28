<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("class/add");
$can_edit = ACL::is_allowed("class/edit");
$can_view = ACL::is_allowed("class/view");
$can_delete = ACL::is_allowed("class/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list" data-display-type="grid"
    data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Thông tin lớp</h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <a class="btn btn btn-primary my-1" href="<?php print_link("class/add") ?>">
                        <i class="material-icons">add</i>
                        Thêm lớp
                    </a>
                    <?php } ?>
                </div>
                <div class="col-sm-4 ">
                    <form class="search" action="<?php print_link('class'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text"
                                name="search" placeholder="Tìm kiếm" />
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
                                    <a class="text-decoration-none" href="<?php print_link('class'); ?>">
                                        <i class="material-icons">arrow_back</i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                </li>
                                <li class="breadcrumb-item active text-capitalize font-weight-bold">
                                    <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                </li>
                                <?php 
                                    }   
                                    ?>
                                <?php
                                    if(get_value("search")){
                                    ?>
                                <li class="breadcrumb-item">
                                    <a class="text-decoration-none" href="<?php print_link('class'); ?>">
                                        <i class="material-icons">arrow_back</i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item text-capitalize">
                                    Search
                                </li>
                                <li class="breadcrumb-item active text-capitalize font-weight-bold">
                                    <?php echo get_value("search"); ?></li>
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
    <div class="">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div class=" animated fadeIn page-content">
                        <div id="class-list-records">
                            <?php
                                if(!empty($records)){
                                ?>
                            <div id="page-report-body">
                                <div class="row sm-gutters page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <!--record-->
                                    <?php
                                        $counter = 0;
                                        foreach($records as $data){
                                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                                        $counter++;
                                        ?>
<<<<<<< HEAD
                                    <div class="col-sm-4">
                                        <div class="card-small p-2 mb-3 animated bounceIn">
                                            <div class="mb-2">
                                                <span>
                                                    <span class="font-weight-light text-muted">Mã lớp:</span>
                                                    <?php echo $data['class_ID']; ?>
                                                </span>
                                            </div>
                                            <div class="mb-2">
                                                <span>
                                                    <span class="font-weight-light text-muted">Tên lớp:</span>
                                                    <?php echo $data['class_name']; ?>
                                                </span>
                                            </div>
                                            <div class="mb-2">
                                                <span>
                                                    <span class="font-weight-light text-muted">Độ tuổi:</span>
                                                    <?php echo $data['age']; ?>
                                                </span>
                                            </div>
                                            <div class="mb-2">
                                                <span>
                                                    <span class="font-weight-light text-muted">Sĩ số lớp:</span>
                                                    <?php echo $data['number_of_pupil']; ?>
                                                </span>
                                            </div>
                                            <div class="mb-2">
                                                <span>
                                                    <span class="font-weight-light text-muted">Giáo viên chủ
                                                        nhiệm:</span>
                                                    <?php echo $data['assigned_teacher']; ?>
                                                </span>
                                            </div>
                                            <div class="mb-2">
                                                <span>
                                                    <span class="font-weight-light text-muted">Trợ giảng:</span>
                                                    <?php echo $data['assistant']; ?>
                                                </span>
                                            </div>
                                            <div class="mb-2">
                                                <span>
                                                    <span class="font-weight-light text-muted">Phòng học:</span>
                                                    <?php echo $data['room']; ?>
                                                </span>
                                            </div>
                                            <div class="mb-2">
                                                <span>
                                                    <span class="font-weight-light text-muted">Điểm thi đua:</span>
                                                    <?php echo $data['class_score']; ?>
                                                </span>
                                            </div>
                                            <div class="mb-2">
                                                <span>
                                                    <span class="font-weight-light text-muted">Năm học:</span>
                                                    <?php echo $data['study_time']; ?>
                                                </span>
                                            </div>
                                            <div class="mb-2">
                                                <span>
                                                    <span class="font-weight-light text-muted">Ghi chú:</span>
                                                    <?php echo $data['note']; ?>
                                                </span>
                                            </div>

                                            <div class="td-btn">
                                                <?php if($can_view){ ?>
                                                <a class="btn btn-sm btn-success has-tooltip" title="View Record"
                                                    href="<?php print_link("class/view/$rec_id"); ?>">
                                                    <i class="material-icons">visibility</i> Xem
                                                </a>
                                                <?php } ?>
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record"
                                                    href="<?php print_link("class/edit/$rec_id"); ?>">
                                                    <i class="material-icons">edit</i> Sửa
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger has-tooltip record-delete-btn"
                                                    title="Delete this record"
                                                    href="<?php print_link("class/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>"
                                                    data-prompt-msg="Bạn có chắc chắn muốn xóa dữ liệu này không?"
                                                    data-display-style="modal">
                                                    <i class="material-icons">clear</i>
                                                    Xóa
                                                </a>
                                                <?php } ?>
=======
                                        <div class="col-sm-4">
                                            <div class="card-small p-2 mb-3 animated bounceIn">
                                                <div class="mb-2">  
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['class_ID']; ?>" 
                                                        data-pk="<?php echo $data['id'] ?>" 
                                                        data-url="<?php print_link("class/editfield/" . urlencode($data['id'])); ?>" 
                                                        data-name="class_ID" 
                                                        data-title="Nhập mã lớp" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="text" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <span class="font-weight-light text-muted ">
                                                            Mã lớp:  
                                                        </span>
                                                        <?php echo $data['class_ID']; ?> 
                                                    </span>
                                                </div>
                                                <div class="mb-2">  
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['class_name']; ?>" 
                                                        data-pk="<?php echo $data['id'] ?>" 
                                                        data-url="<?php print_link("class/editfield/" . urlencode($data['id'])); ?>" 
                                                        data-name="class_name" 
                                                        data-title="Nhập tên lớp" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="text" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <span class="font-weight-light text-muted ">
                                                            Tên lớp:  
                                                        </span>
                                                        <?php echo $data['class_name']; ?> 
                                                    </span>
                                                </div>
                                                <div class="mb-2">  
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['age']; ?>" 
                                                        data-pk="<?php echo $data['id'] ?>" 
                                                        data-url="<?php print_link("class/editfield/" . urlencode($data['id'])); ?>" 
                                                        data-name="age" 
                                                        data-title="Nhập tuổi" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="text" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <span class="font-weight-light text-muted ">
                                                            Độ tuổi:  
                                                        </span>
                                                        <?php echo $data['age']; ?> 
                                                    </span>
                                                </div>
                                                <div class="mb-2">  
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['number_of_pupil']; ?>" 
                                                        data-pk="<?php echo $data['id'] ?>" 
                                                        data-url="<?php print_link("class/editfield/" . urlencode($data['id'])); ?>" 
                                                        data-name="number_of_pupil" 
                                                        data-title="Nhập sĩ số lớp" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="text" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <span class="font-weight-light text-muted ">
                                                            Sĩ số lớp:  
                                                        </span>
                                                        <?php echo $data['number_of_pupil']; ?> 
                                                    </span>
                                                </div>
                                                <div class="mb-2">  
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['assistant']; ?>" 
                                                        data-pk="<?php echo $data['id'] ?>" 
                                                        data-url="<?php print_link("class/editfield/" . urlencode($data['id'])); ?>" 
                                                        data-name="assistant" 
                                                        data-title="Trợ giảng" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="text" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <span class="font-weight-light text-muted ">
                                                            Trợ giảng:  
                                                        </span>
                                                        <?php echo $data['assistant']; ?> 
                                                    </span>
                                                </div>
                                                <div class="mb-2">  
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['room']; ?>" 
                                                        data-pk="<?php echo $data['id'] ?>" 
                                                        data-url="<?php print_link("class/editfield/" . urlencode($data['id'])); ?>" 
                                                        data-name="room" 
                                                        data-title="Phòng học" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="text" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <span class="font-weight-light text-muted ">
                                                            Phòng học:  
                                                        </span>
                                                        <?php echo $data['room']; ?> 
                                                    </span>
                                                </div>
                                                <div class="mb-2">  
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['class_score']; ?>" 
                                                        data-pk="<?php echo $data['id'] ?>" 
                                                        data-url="<?php print_link("class/editfield/" . urlencode($data['id'])); ?>" 
                                                        data-name="class_score" 
                                                        data-title="Điểm thi đua" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="text" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <span class="font-weight-light text-muted ">
                                                            Điểm thi đua:  
                                                        </span>
                                                        <?php echo $data['class_score']; ?> 
                                                    </span>
                                                </div>
                                                <div class="mb-2">  
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['study_time']; ?>" 
                                                        data-pk="<?php echo $data['id'] ?>" 
                                                        data-url="<?php print_link("class/editfield/" . urlencode($data['id'])); ?>" 
                                                        data-name="study_time" 
                                                        data-title="Thời gian học" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="text" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <span class="font-weight-light text-muted ">
                                                            Thời gian học:  
                                                        </span>
                                                        <?php echo $data['study_time']; ?> 
                                                    </span>
                                                </div>
                                                <div class="mb-2">  
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['assigned_teacher']; ?>" 
                                                        data-pk="<?php echo $data['id'] ?>" 
                                                        data-url="<?php print_link("class/editfield/" . urlencode($data['id'])); ?>" 
                                                        data-name="assigned_teacher" 
                                                        data-title="Giáo viên chủ nhiệm" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="text" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <span class="font-weight-light text-muted ">
                                                            Giáo viên chủ nhiệm
                                                        </span>
                                                        <?php echo $data['assigned_teacher']; ?> 
                                                    </span>
                                                </div>
                                                <div class="mb-2">  
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['note']; ?>" 
                                                        data-pk="<?php echo $data['id'] ?>" 
                                                        data-url="<?php print_link("class/editfield/" . urlencode($data['id'])); ?>" 
                                                        data-name="note" 
                                                        data-title="Ghi chú" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="text" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <span class="font-weight-light text-muted ">
                                                            Ghi chú:  
                                                        </span>
                                                        <?php echo $data['note']; ?> 
                                                    </span>
                                                </div>
                                                <div class="td-btn">
                                                    <?php if($can_view){ ?>
                                                    <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("class/view/$rec_id"); ?>">
                                                        <i class="material-icons">visibility</i> Xem
                                                    </a>
                                                    <?php } ?>
                                                    <?php if($can_edit){ ?>
                                                    <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("class/edit/$rec_id"); ?>">
                                                        <i class="material-icons">edit</i> Sửa
                                                    </a>
                                                    <?php } ?>
                                                    <?php if($can_delete){ ?>
                                                    <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("class/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                        <i class="material-icons">clear</i>
                                                        Xóa
                                                    </a>
                                                    <?php } ?>
                                                </div>
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                        }
                                        ?>
                                    <!--endrecord-->
                                </div>
                                <div class="row sm-gutters search-data"
                                    id="search-data-<?php echo $page_element_id; ?>"></div>
                                <div>
                                </div>
                            </div>
                            <?php
                                if($show_footer == true){
                                ?>
                            <div class=" border-top mt-2">
                                <div class="row justify-content-center">
                                    <div class="col-md-auto">
                                    </div>
                                    <div class="col">
                                        <?php
                                            if($show_pagination == true){
                                            $pager = new Pagination($total_records, $record_count);
                                            $pager->route = $this->route;
                                            $pager->show_page_count = true;
                                            $pager->show_record_count = true;
                                            $pager->show_page_limit =true;
                                            $pager->limit_count = $this->limit_count;
                                            $pager->show_page_number_list = true;
                                            $pager->pager_link_range=5;
                                            $pager->render();
                                            }
                                            ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                                }
                                else{
                                ?>
                            <div class="text-muted  animated bounce p-3">
                                <h4><i class="material-icons">block</i> Không tìm thấy dữ liệu</h4>
                            </div>
                            <?php
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>