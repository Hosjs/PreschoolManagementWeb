<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 >Danh mục</h4>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_users();  ?>
                    <a class="animated zoomIn record-count card bg-warning text-white"  href="<?php print_link("users/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons mi-xxxlg">verified_user</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Users</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_student();  ?>
                    <a class="animated rubberBand record-count card bg-success text-white"  href="<?php print_link("student/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons mi-xxxlg">face</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Học sinh</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_student();  ?>
                    <a class="animated rubberBand record-count card bg-light text-dark"  href="<?php print_link("Message/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons mi-xxxlg">message</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Tin nhắn</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_announcement();  ?>
                    <a class="animated rubberBand record-count card bg-light text-dark"  href="<?php print_link("announcement/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons mi-xxxlg">notifications</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Thông báo</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_feestructure();  ?>
                    <a class="animated rubberBand record-count alert alert-primary"  href="<?php print_link("subject/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons mi-xxxlg">share</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Môn học</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_applyforstudent();  ?>
                    <a class="animated zoomIn record-count alert alert-info"  href="<?php print_link("class_detail/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons mi-xxxlg">archive</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Quản lý lớp học</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_event();  ?>
                    <a class="animated zoomIn record-count alert alert-primary"  href="<?php print_link("event/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons mi-xxxlg">event_note</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Sự kiện</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_assignment();  ?>
                    <a class="animated rubberBand record-count card bg-secondary text-white"  href="<?php print_link("assignment/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons mi-xxxlg">trending_down</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Bài tập</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class=" comp-grid">
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_enrollment();  ?>
                    <a class="animated zoomIn record-count card bg-danger text-white"  href="<?php print_link("class/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons mi-xxxlg">assignment_ind</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Thông tin lớp</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_howtomakepayment();  ?>
                    <a class="animated rollIn record-count card bg-danger text-white"  href="<?php print_link("how_to_make_payment/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons">extension</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Cách thức thanh toán</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_health_care();  ?>
                    <a class="animated slideInRight record-count card bg-info text-white card-white"  href="<?php print_link("health_care/") ?>">
                    <div class="row">
                            <div class="col-2">
                                <i class="material-icons mi-xxxlg">assignment_turned_in</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Theo dõi sức khỏe</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</div>
