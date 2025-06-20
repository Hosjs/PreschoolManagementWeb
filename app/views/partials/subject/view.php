<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("subject/add");
$can_edit = ACL::is_allowed("subject/edit");
$can_view = ACL::is_allowed("subject/view");
$can_delete = ACL::is_allowed("subject/delete");
$can_register = ACL::is_allowed("subject/register");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view" data-display-type="table"
    data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Xem thông tin môn học</h4>
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
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div class="card animated fadeIn page-content">
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
                                    <tr class="td-title">
                                        <th class="title"> Tên môn học: </th>
                                        <td class="value">
                                            <span><?php echo $data['title']; ?></span>
                                        </td>
                                    </tr>
                                    <tr class="td-content">
                                        <th class="title"> Nội dung: </th>
                                        <td class="value">
                                            <a class="btn btn-sm btn-light" href="<?php echo $data['content']; ?>">
                                                <i class="fa fa-file"></i><?php echo " " . $data['title']; ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="td-date">
                                        <th class="title"> Ngày kết thúc: </th>
                                        <td class="value">
                                            <span><?php echo $data['date']; ?></span>
                                        </td>
                                    </tr>
                                    <tr class="td-terms">
                                        <th class="title"> Điều kiện tham gia: </th>
                                        <td class="value">
                                            <span><?php echo $data['terms']; ?></span>
                                        </td>
                                    </tr>
                                    <tr class="td-fee">
                                        <th class="title"> Chi phí tham gia (VNĐ): </th>
                                        <td class="value">
                                            <span><?php echo number_format($data['fee'], 0, ',', '.') . ' VNĐ'; ?></span>
                                        </td>
                                    </tr>
                                </tbody>

                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
                            <div class="dropup export-btn-holder mx-1">
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
                            <?php if($can_edit){ ?>
                            <a class="btn btn-sm btn-info" href="<?php print_link("subject/edit/$rec_id"); ?>">
                                <i class="material-icons">edit</i> Sửa
                            </a>
                            <?php } ?>
                            <?php if($can_delete){ ?>
                            <a class="btn btn-sm btn-danger record-delete-btn mx-1"
                                href="<?php print_link("subject/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>"
                                data-prompt-msg="Bạn có chắc chắn muốn xóa dữ liệu này không?"
                                data-display-style="modal">
                                <i class="material-icons">clear</i> Xóa
                            </a>
                            <?php } ?>
                            <?php if($can_register){ ?>
                            <a class="btn btn-sm btn-info has-tooltip record-register-btn"
                                href="<?php print_link("subject/register/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>"
                                data-prompt-msg="Bạn có chắc chắn muốn đăng ký môn học này không?"
                                data-display-style="modal">
                                <i class="material-icons">event_available</i> Đăng ký
                            </a>
                            <?php } ?>
                        </div>
                        <?php
                                            }
                                            else{
                                            ?>
                        <!-- Empty Record Message -->
                        <div class="text-muted p-3">
                            <i class="material-icons">block</i> Không tìm thấy dữ liệu
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