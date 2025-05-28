<?php
	$data=$this->view_data;
	$user_email = $data["user_email"];
	$status = $data["status"];
?>
<div class="container">
    <?php 
		if($status==true){
			if(!empty($_GET['resend'])){
				?>
    <h4 class="text-info bold animated bounce"><i class="material-icons">email</i> Xác minh email đã được gửi lại
    </h4>
    <?php
			}
			else{
				?>
    <h4 class="text-info bold"><i class="material-icons">email</i> Đã gửi liên kết xác minh email</h4>
    <?php
			}
		?>
    <div class="text-muted">Vui lòng xác minh địa chỉ email của bạn bằng cách nhấp vào liên kết trong hộp thư của bạn
    </div>
    <hr />
    <div>
        <a href="<?php print_link("index/send_verify_email_link/$user_email?resend=true") ?>" class="btn btn-primary"><i
                class="material-icons">email</i> Gửi lại email</a>
    </div>
    <?php
		}
		else{
			?>
    <div><i class="material-icons">email</i> Vui lòng xác minh địa chỉ email của bạn bằng cách nhấp vào liên kết trong
        hộp thư của bạn
    </div>
    <hr />
    <div>
        <a href="<?php print_link("index/send_verify_email_link/$user_email?resend=true") ?>" class="btn btn-primary"><i
                class="material-icons">email</i> Gửi lại email</a>
    </div>
    <?php
		}
	?>
    <?php
		if(DEVELOPMENT_MODE){
			$mailbody = $this->view_data["mailbody"];
			?>
    <hr />
    <div class="bg-light p-4 border">
        <div class="text-danger">
            <h3>
                <b>Disclaimer:</b> You are seeing this because you published under development mode.
                <br />We understand that sending email in localhost might be problematic.
            </h3>
            <div class="text-muted">To edit the email template, browse to :-
                <i>app/view/partials/index/emailverify_template.html</i>
            </div>
        </div>
        <hr />
        <?php  echo $mailbody; ?>
    </div>

    <?php
		}
	?>
</div>