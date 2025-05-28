<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("meal/add");
$can_edit = ACL::is_allowed("meal/edit");
$can_view = ACL::is_allowed("meal/view");
$can_delete = ACL::is_allowed("meal/delete");
?>
<<<<<<< HEAD
<?php 
=======
<?php
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
<<<<<<< HEAD
$data = $this->view_data;
$page_id = $this->route->page_id; 
=======
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<<<<<<< HEAD
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view" data-display-type="table"
    data-page-url="<?php print_link($current_page); ?>">
    <?php if($show_header): ?>
    <div class="bg-light p-3 mb-3">
=======
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Xem thực đơn</h4>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    <?php endif; ?>
    <div>
=======
    <?php
    }
    ?>
    <div  class="">
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
<<<<<<< HEAD
                    <div class="card animated fadeIn page-content">
                        <?php if(!empty($data)): ?>
                        <div id="page-report-body">
                            <table class="table table-hover table-borderless table-striped">
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr class="td-date">
                                        <th class="title">Ngày tạo</th>
                                        <td class="value"><?php echo $data['date']; ?></td>
                                    </tr>
                                    <tr class="td-lunch">
                                        <th class="title">Bữa trưa</th>
                                        <td class="value"><?php echo $data['lunch']; ?></td>
                                    </tr>
                                    <tr class="td-photo">
                                        <th class="title"> Ảnh: </th>
                                        <td class=""><img class="img img-thumbnail" alt="lunch image" width="200"
                                                height="200" src="<?php echo $data['lunch_img']; ?>"></img></td>
                                    </tr>
                                    <tr class="td-afternoon">
                                        <th class="title">Bữa xế</th>
                                        <td class="value"><?php echo $data['afternoon']; ?></td>
                                    </tr>
                                    <tr class="td-photo">
                                        <th class="title"> Ảnh: </th>
                                        <td class=""><img class="img img-thumbnail" alt="afternoon image" width="200"
                                                height="200" src="<?php echo $data['afternoon_img']; ?>"></img></td>
                                    <tr class="td-created_by">
                                        <th class="title">Người tạo</th>
                                        <td class="value"><?php echo $data['created_by']; ?></td>
                                    </tr>
                                </tbody>
=======
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                <tr  class="td-date">
                                        <th class="title"> Ngày tạo </th>
                                        <td class="value">
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
                                                <?php echo $data['date']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-title">
                                        <th class="title"> Bữa trưa </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['title']; ?>" 
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
                                                <?php echo $data['title']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <div><?php echo $data['content']; ?></div>
                                   
                                </tbody>
                                <!-- Table Body End -->
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
                            </table>
                        </div>
                        <div class="p-3 d-flex">
                            <div class="dropup export-btn-holder mx-1">
<<<<<<< HEAD
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">save</i> Lưu & Xuất
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="print"
                                        href="<?php print_link($export_print_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                    </a>
                                    <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="pdf"
                                        href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                    </a>
                                    <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="word"
                                        href="<?php print_link($export_word_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                    </a>
                                    <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="csv"
                                        href="<?php print_link($export_csv_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                    </a>
                                    <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="excel"
                                        href="<?php print_link($export_excel_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                    </a>
                                </div>
                            </div>
                            <?php if($can_edit): ?>
                            <a class="btn btn-sm btn-info"
                                href="<?php print_link("meal/edit/" . urlencode($data['id_meal'])); ?>">
                                <i class="material-icons">edit</i> Sửa
                            </a>
                            <?php endif; ?>
                            <?php if($can_delete): ?>
                            <a class="btn btn-sm btn-danger record-delete-btn mx-1"
                                href="<?php print_link("meal/delete/" . urlencode($data['id_meal']) . "/?csrf_token=$csrf_token&redirect=$current_page"); ?>"
                                data-prompt-msg="Bạn có chắc chắn muốn xóa bản ghi này?" data-display-style="modal">
                                <i class="material-icons">clear</i> Xóa
                            </a>
                            <?php endif; ?>
                        </div>
                        <?php else: ?>
                        <div class="text-muted p-3">
                            <i class="material-icons">block</i> Không có bản ghi nào
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
=======
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">save</i> Export
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                        </a>
                                        <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                        <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                            <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                            </a>
                                            <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                            <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                </a>
                                                <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                    <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                    </a>
                                                    <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                    <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                        <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("meal/edit/$rec_id"); ?>">
                                                    <i class="material-icons">edit</i> Sửa
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("meal/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="material-icons">clear</i> Xóa
                                                </a>
                                                <?php } ?>
                                            </div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="material-icons">block</i> No Record Found
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
