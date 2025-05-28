<?php
$comp_model = new SharedController;
$page_element_id = "change-password-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
?>

<section class="page" id="change-password-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h4 class="text-center">Đổi mật khẩu</h4>
                <?php $this::display_page_errors(); ?>
                <form method="post" action="<?php print_link("account/change_password/?csrf_token=$csrf_token"); ?>"
                    class="form-horizontal">

                    <!-- Mật khẩu hiện tại -->
                    <div class="form-group">
                        <label for="current_password">Mật khẩu hiện tại</label>
                        <div class="input-group">
                            <input type="password" id="current_password" name="current_password" class="form-control"
                                required placeholder="Nhập mật khẩu hiện tại">
                            <div class="input-group-append">
                                <span class="input-group-text"
                                    onclick="togglePassword(this, 'current_password')">👁</span>
                            </div>
                        </div>
                    </div>

                    <!-- Mật khẩu mới -->
                    <div class="form-group">
                        <label for="new_password">Mật khẩu mới</label>
                        <div class="input-group">
                            <input type="password" id="new_password" name="new_password" class="form-control" required
                                placeholder="Nhập mật khẩu mới">
                            <div class="input-group-append">
                                <span class="input-group-text" onclick="togglePassword(this, 'new_password')">👁</span>
                            </div>
                        </div>
                    </div>

                    <!-- Nhập lại mật khẩu mới -->
                    <div class="form-group">
                        <label for="confirm_password">Xác nhận mật khẩu</label>
                        <div class="input-group">
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control"
                                required placeholder="Nhập lại mật khẩu mới">
                            <div class="input-group-append">
                                <span class="input-group-text"
                                    onclick="togglePassword(this, 'confirm_password')">👁</span>
                            </div>
                        </div>
                    </div>

                    <!-- Nút Gửi -->
                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Cập nhật mật khẩu </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>


<script>
function togglePassword(el, inputId) {
    const input = document.getElementById(inputId);
    if (input.type == "password") {
        input.type = "text";
        el.textContent = "🔐"; // đang hiển thị mật khẩu
    } else {
        input.type = "password";
        el.textContent = "👁"; // đang ẩn mật khẩu
    }
}
</script>