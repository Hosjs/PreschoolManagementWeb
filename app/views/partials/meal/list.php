<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("meal/add");
$can_edit = ACL::is_allowed("meal/edit");
$can_view = ACL::is_allowed("meal/view");
<<<<<<< HEAD
$can_delete = ACL::is_allowed("meal/delete");
=======
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
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
<<<<<<< HEAD
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list" data-display-type="grid"
    data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div class="bg-light p-3 mb-3">
=======
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="grid" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Thực đơn</h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
<<<<<<< HEAD
                    <a class="btn btn btn-primary my-1" href="<?php print_link("meal/add") ?>">
                        <i class="material-icons">add</i>
=======
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("meal/add") ?>">
                        <i class="material-icons">add</i>                               
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
                        Thêm thực đơn
                    </a>
                    <?php } ?>
                </div>
                <div class="col-sm-4 ">
<<<<<<< HEAD
                    <form class="search" action="<?php print_link('meal'); ?>" method="get">
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
                                    <a class="text-decoration-none" href="<?php print_link('meal'); ?>">
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
                                    <a class="text-decoration-none" href="<?php print_link('meal'); ?>">
                                        <i class="material-icons">arrow_back</i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item text-capitalize">
                                    Tìm
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
=======
                    <form  class="search" action="<?php print_link('meal'); ?>" method="get">
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
                                        <a class="text-decoration-none" href="<?php print_link('meal'); ?>">
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
                                        <a class="text-decoration-none" href="<?php print_link('meal'); ?>">
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
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
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
                        <div id="meal-list-records">
                            <?php
                                if(!empty($records)){
                                ?>
                            <div id="page-report-body">
                                <div class="row sm-gutters page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <!--record-->
                                    <?php
=======
        <?php
        }
        ?>
        <div  class="">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        <div  class=" animated fadeIn page-content">
                            <div id="meal-list-records">
                                <?php
                                if(!empty($records)){
                                ?>
                                <div id="page-report-body">
                                    <div class="row sm-gutters page-data" id="page-data-<?php echo $page_element_id; ?>">
                                        <!--record-->
                                        <?php
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
                                        $counter = 0;
                                        foreach($records as $data){
                                        $rec_id = (!empty($data['id_meal']) ? urlencode($data['id_meal']) : null);
                                        $counter++;
                                        ?>
<<<<<<< HEAD
                                    <div class="col-sm-4">
                                        <div class="card-small p-2 mb-3 animated bounceIn">
                                            <div class="mb-2">
                                                <span>
                                                    <span class="font-weight-light text-muted">
                                                        Bữa sáng :
                                                    </span>
                                                    <?php echo $data['lunch']; ?>
                                                </span>
                                            </div>

                                            <tr class="td-photo">
                                                <th class="title"> </th>
                                                <td class="">
                                                    <img class="img img-thumbnail" alt="lunch image" width="200"
                                                        height="200" src="<?php echo $data['lunch_img']; ?>">
                                                </td>
                                            </tr>
                                            <div class="mb-2">
                                                <span>
                                                    <span class="font-weight-light text-muted">
                                                        Bữa chiều :
                                                    </span>
                                                    <?php echo $data['afternoon']; ?>
                                                </span>
                                            </div>

                                            <tr class="td-photo">
                                                <th class="title"> </th>
                                                <td class="">
                                                    <img class="img img-thumbnail" alt="afternoon image" width="200"
                                                        height="200" src="<?php echo $data['afternoon_img']; ?>">
                                                </td>
                                            </tr>

                                            <div class="mb-2">
                                                <span>
                                                    <span class="font-weight-light text-muted">
                                                        Ngày tạo:
                                                    </span>
                                                    <?php echo $data['date']; ?>
                                                </span>
                                            </div>

                                            <div class="mb-2">
                                                <span>
                                                    <span class="font-weight-light text-muted">
                                                        Người tạo :
                                                    </span>
                                                    <?php echo $data['created_by']; ?>
                                                </span>
                                            </div>

                                            <div class="td-btn">
                                                <?php if($can_view){ ?>
                                                <a class="btn btn-sm btn-success has-tooltip" title="View Record"
                                                    href="<?php print_link("meal/view/$rec_id"); ?>">
                                                    <i class="material-icons">visibility</i> Xem
                                                </a>
                                                <?php } ?>
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record"
                                                    href="<?php print_link("meal/edit/$rec_id"); ?>">
                                                    <i class="material-icons">edit</i> Sửa
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger has-tooltip record-delete-btn"
                                                    title="Delete this record"
                                                    href="<?php print_link("meal/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>"
                                                    data-prompt-msg="Bạn có chắc chắn muốn xóa dữ liệu không?"
                                                    data-display-style="modal">
                                                    <i class="material-icons">clear</i>
                                                    Xóa
                                                </a>
                                                <?php } ?>
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
=======
                                        <div class="col-sm-4">
                                            <div class="card-small p-2 mb-3 animated bounceIn">
                                                <div class="mb-2">  
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['lunch']; ?>" 
                                                        data-pk="<?php echo $data['id_meal'] ?>" 
                                                        data-url="<?php print_link("meal/editfield/" . urlencode($data['id_meal'])); ?>" 
                                                        data-name="lunch" 
                                                        data-title="Enter Lunch" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="text" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <span class="font-weight-light text-muted ">
                                                            Bữa sáng :  
                                                        </span>
                                                        <?php echo $data['lunch']; ?> 
                                                    </span>
                                                </div>
                                                <tr  class="td-photo">
                                                    <th class="title">  </th>
                                                    <td class=""><img class="img img-thumbnail" alt="nngf" width="200" height="200" src="<?php echo $data['lunch_img']; ?>"></img></td>
                                                </tr>
                                                <div class="mb-2">  
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['afternoon']; ?>" 
                                                        data-pk="<?php echo $data['id_meal'] ?>" 
                                                        data-url="<?php print_link("meal/editfield/" . urlencode($data['id_meal'])); ?>" 
                                                        data-name="afternoon" 
                                                        data-title="Enter Afternoon" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="text" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <span class="font-weight-light text-muted ">
                                                            Bữa chiều :  
                                                        </span>
                                                        <?php echo $data['afternoon']; ?> 
                                                    </span>
                                                </div>
                                                <tr  class="td-photo">
                                                    <th class="title">  </th>
                                                    <td class=""><img class="img img-thumbnail" alt="nngf" width="200" height="200" src="<?php echo $data['afternoon_img']; ?>"></img></td>
                                                </tr>

                                                <div class="mb-2">  
                                                    <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                        data-value="<?php echo $data['date']; ?>" 
                                                        data-pk="<?php echo $data['id_meal'] ?>" 
                                                        data-url="<?php print_link("meal/editfield/" . urlencode($data['id_meal'])); ?>" 
                                                        data-name="date" 
                                                        data-title="Enter Date" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="flatdatetimepicker" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <span class="font-weight-light text-muted ">
                                                            Ngày tạo:  
                                                        </span>
                                                        <?php echo $data['date']; ?> 
                                                    </span>
                                                </div>
                                                <div class="mb-2">  
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['created_by']; ?>" 
                                                        data-pk="<?php echo $data['id_meal'] ?>" 
                                                        data-url="<?php print_link("meal/editfield/" . urlencode($data['id_meal'])); ?>" 
                                                        data-name="created_by" 
                                                        data-title="Enter Creator" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="text" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <span class="font-weight-light text-muted ">
                                                            Người tạo :  
                                                        </span>
                                                        <?php echo $data['created_by']; ?> 
                                                    </span>
                                                </div>
                                                <div class="td-btn">
                                                    <?php if($can_view){ ?>
                                                    <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("meal/view/$rec_id"); ?>">
                                                        <i class="material-icons">visibility</i> Xem
                                                    </a>
                                                    <?php } ?>
                                                    <?php if($can_edit){ ?>
                                                    <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("meal/edit/$rec_id"); ?>">
                                                        <i class="material-icons">edit</i> Sửa
                                                    </a>
                                                    <?php } ?>
                                                    <?php if($can_delete){ ?>
                                                    <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("meal/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                        <i class="material-icons">clear</i>
                                                        Xóa
                                                    </a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                        }
                                        ?>
                                        <!--endrecord-->
                                    </div>
                                    <div class="row sm-gutters search-data" id="search-data-<?php echo $page_element_id; ?>"></div>
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
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
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
<<<<<<< HEAD
                                    </div>
                                </div>
                            </div>
                            <?php
=======
                                        </div>
                                    </div>
                                </div>
                                <?php
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
                                }
                                }
                                else{
                                ?>
<<<<<<< HEAD
                            <div class="text-muted  animated bounce p-3">
                                <h4><i class="material-icons">block</i> No record found</h4>
                            </div>
                            <?php
                                }
                                ?>
=======
                                <div class="text-muted  animated bounce p-3">
                                    <h4><i class="material-icons">block</i> No record found</h4>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
                        </div>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
    </div>
</section>
=======
    </section>
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
