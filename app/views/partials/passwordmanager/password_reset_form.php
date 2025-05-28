<div class="container">
    <h3>Đăt lại mật khẩu </h3>
    <hr />
    <div class="row">
        <div class="col-sm-6">
            <?php $page_link = $this->set_current_page_link(); ?>
            <form method="post" action="<?php print_link($page_link); ?>">
                <?php Html::csrf_token(); ?>
                <?php 
					$this :: display_page_errors();			
				?>
                <div class="form-group">
                    <label>Mật khẩu mới</label>
                    <input placeholder="Nhập mật khẩu mới" required value="" class="form-control default"
                        name="password" id="txtpass" type="password" />
                </div>
                <div class="form-group">
                    <label>Xác nhận lại mật khẩu mới</label>
                    <input placeholder="Nhập lại mật khẩu mới" required class="form-control default" name="cpassword"
                        id="txtcpass" type="password" />
                </div>
                <div class="mt-2 "><button class="Passwordbtn btn-success" type="submit">THAY ĐỔI MẬT KHẨU</button>
                </div>
            </form>
        </div>
    </div>
</div>