<div class="container">
    <h3>Đặt lại mật khẩu </h3>
    <hr />
    <div class="">
        <h4 class="text-info bold">
            <i class="material-icons">email</i> Một tin nhắn đã được gửi đến email của bạn. Vui lòng nhấn vào đường link
            để đặt lại mật khẩu của bạn.
        </h4>
        <?php
		if (DEVELOPMENT_MODE) {
			?>
        <div class="text-muted">
            <!-- To edit this file, browse to :- <i>app/view/partials/passwordmanager/password_reset_link_sent.php</i> -->
        </div>
        <?php
		}
		?>
    </div>
    <hr />
    <a href="<?php print_link("index/index"); ?>" class="btn btn-info">Bấm vào đây để để trở lại trang đăng nhập</a>
    <?php
	if (DEVELOPMENT_MODE) {
		$mailbody = $this->view_data;
		?>
    <hr />
    <div class="bg-light p-4 border">
        <div class="text-danger">
            <!-- <h3>
                <b>Disclaimer:</b> You are seeing this because you published under development mode.
                <br />We understand that sending email in localhost might be problematic.
            </h3>
            <div class="text-muted">To edit the email template, browse to :-
                <i>app/view/partials/passwordmanager/password_reset_email_template.html</i>
            </div> -->
        </div>
        <hr />
        <?php echo $mailbody; ?>
    </div>
    <?php
	}
	?>
</div>