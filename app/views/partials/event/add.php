<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add" data-display-type=""
    data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Thêm sự kiện</h4>
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
                        <form id="event-add-form" role="form" novalidate enctype="multipart/form-data"
                            class="form page-form form-horizontal needs-validation"
                            action="<?php print_link("event/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="title">Tiêu đề <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input id="ctrl-title"
                                                value="<?php echo $this->set_field_value('title',""); ?>" type="text"
                                                placeholder="Nhập tiêu đề" required name="title" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="content">Nội dung <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <textarea placeholder="Nhập nội dung" id="ctrl-content" required rows="5"
                                                name="content"
                                                class="htmleditor form-control"><?php echo $this->set_field_value('content',""); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="date">Lịch <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-date" class="form-control datepicker" required
                                                    value="<?php echo $this->set_field_value('date',""); ?>"
                                                    type="datetime" name="date" placeholder="Chọn ngày giờ"
                                                    data-enable-time="true" data-min-date="" data-max-date=""
                                                    data-date-format="Y-m-d H:i:S" data-alt-format="F j, Y - H:i"
                                                    data-inline="false" data-no-calendar="false" data-mode="single" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i
                                                            class="material-icons">date_range</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="terms">Điều kiện tham gia</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select required="" id="ctrl-terms" name="terms"
                                                placeholder="Chọn điều kiện...." class="custom-select">
                                                <option value="">Chọn điều kiện ...</option>
                                                <?php
                                                    $terms_options = Menu::$terms;
                                                    if(!empty($terms_options)){
                                                        foreach($terms_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            $selected = $this->set_field_selected('terms', $value, "");
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
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="fee">Chi phí tham gia (VNĐ)</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input id="ctrl-fee" value="<?php echo $this->set_field_value('fee',""); ?>"
                                                type="number" placeholder="Nhập chi phí" name="fee" class="form-control"
                                                min="0" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-submit-btn-holder text-center mt-3">
                                    <div class="form-ajax-status"></div>
                                    <button class="btn btn-primary" type="submit">
                                        Hoàn thành
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