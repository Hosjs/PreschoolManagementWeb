<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("users/add");
$can_edit = ACL::is_allowed("users/edit");
$can_view = ACL::is_allowed("users/view");
$can_delete = ACL::is_allowed("users/delete");
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
                    <h4 class="record-title">Tài khoản của tôi</h4>
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
                        <div class="bg-primary m-2 mb-4">
                            <div class="profile">
                                <div class="avatar">
                                    <?php 
                                    if(!empty(USER_PHOTO)){
                                    Html::page_img(USER_PHOTO, 100, 100); 
                                    }
                                    ?>
                                </div>
                                <h1 class="title mt-4"><?php echo $data['username']; ?></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mx-3 mb-3">
                                    <ul class="nav nav-pills flex-column text-left">
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#AccountPageView" class="nav-link active">
                                                <i class="material-icons">account_box</i> Chi tiết tài khoản
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#AccountPageEdit" class="nav-link">
                                                <i class="material-icons">edit</i> Chỉnh sửa tài khoản
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#AccountPageChangeEmail" class="nav-link">
                                                <i class="material-icons">email</i> Thay đổi email
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#AccountPageChangePassword" class="nav-link">
                                                <i class="material-icons">lock</i> Đổi mật khẩu
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="mb-3">
                                    <div class="tab-content">
                                        <div class="tab-pane show active fade" id="AccountPageView" role="tabpanel">
                                            <table class="table table-hover table-borderless table-striped">
                                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                                    <tr class="td-id">
                                                        <th class="title"> Id: </th>
                                                        <td class="value"> <?php echo $data['id']; ?></td>
                                                    </tr>
                                                    <tr class="td-first_name">
                                                        <th class="title"> Họ và tên đệm: </th>
                                                        <td class="value">
                                                            <span>
                                                                <?php echo $data['first_name']; ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr class="td-last_name">
                                                        <th class="title"> Tên: </th>
                                                        <td class="value">
                                                            <span>
                                                                <?php echo $data['last_name']; ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr class="td-birth_day">
                                                        <th class="title"> Sinh nhật: </th>
                                                        <td class="value">
                                                            <span>
                                                                <?php echo $data['birth_day']; ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr class="td-resdence">
                                                        <th class="title"> Địa chỉ: </th>
                                                        <td class="value">
                                                            <span>
                                                                <?php echo $data['resdence']; ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr class="td-username">
                                                        <th class="title"> Tên đăng nhập: </th>
                                                        <td class="value">
                                                            <span>
                                                                <?php echo $data['username']; ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr class="td-email">
                                                        <th class="title"> Email: </th>
                                                        <td class="value"> <?php echo $data['email']; ?></td>
                                                    </tr>
                                                    <tr class="td-role">
                                                        <th class="title"> Vai trò: </th>
                                                        <td class="value">
                                                            <span>
                                                                <?php echo $data['role']; ?>
                                                            </span>
                                                        </td>
                                                    </tr>

                                                    <tr class="td-account_status">
                                                        <th class="title"> Trạng thái tài khoản: </th>
                                                        <td class="value">
                                                            <span>
                                                                <?php echo $data['account_status']; ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="AccountPageEdit" role="tabpanel">
                                            <div class=" reset-grids">
                                                <?php  $this->render_page("account/edit"); ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane  fade" id="AccountPageChangeEmail" role="tabpanel">
                                            <div class=" reset-grids">
                                                <?php  $this->render_page("account/change_email"); ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="AccountPageChangePassword" role="tabpanel">
                                            <div class=" reset-grids">
                                                <?php  $this->render_page("account/change_password"); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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