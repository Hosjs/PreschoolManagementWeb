<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card card-body">
                <h2>Thông báo </h2>
                <hr />
                <h4 class="animated bounce text-success">
                    <i class="material-icons">check_circle</i> Mật khẩu của bạn đã được thay đổi thành công
                </h4>
                <hr />
            </div>
            <br />
            <a href="<?php print_link("index/index"); ?>" class="btn btn-info">Nhấn vào đây để đăng nhập</a>
            <?php 
				if(DEVELOPMENT_MODE){ 
			?>
            <!-- <div class="text-muted">To edit the email template, browse to :-
                <i>app/view/partials/passwordmanager/password_reset_completed.php</i>
            </div> -->
            <?php 
				} 
			?>
        </div>
    </div>
</div>