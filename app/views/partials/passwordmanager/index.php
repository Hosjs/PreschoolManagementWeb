<div class="container">
    <div>
        <h3>Xác nhận email </h3>
        <small class="text-muted">
            Vui lòng cung cấp địa chỉ email hợp lệ mà bạn đã sử dụng để đăng ký.
        </small>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-8">
            <?php 
				$this :: display_page_errors(); 
			?>
            <form method="post"
                action="<?php print_link("passwordmanager/postresetlink?csrf_token=" . Csrf::$token); ?>">
                <div class="row">
                    <div class="col-9">
                        <input value="<?php echo get_form_field_value('email'); ?>"
                            placeholder="Nhập địa chỉ email của bạn" required="required" class="form-control default"
                            name="email" type="email" />
                    </div>
                    <div class="col-3">
                        <button class="btn btn-success" type="submit"> Gửi <i class="material-icons">email</i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br />
    <div class="text-info">
        Một liên kết sẽ được gửi đến địa chỉ email của bạn với hướng dẫn để đặt lại mật khẩu tài khoản của bạn.
    </div>
</div>