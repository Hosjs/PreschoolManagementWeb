<?php 
/**
 * Account Page Controller
 * @category  Controller
 */
class AccountController extends SecureController{
	function __construct(){
		parent::__construct(); 
		$this->tablename = "users";
	}
	/**
		* Index Action
		* @return null
		*/
	function index(){
		$db = $this->GetModel();
		$rec_id = $this->rec_id = USER_ID; //get current user id from session
		$db->where ("id", $rec_id);
		$tablename = $this->tablename;
		$fields = array("id", 
			"first_name", 
			"last_name", 
			"birth_day", 
			"resdence", 
			"username", 
			"email", 
			"role", 
			"account_status");
		$user = $db->getOne($tablename , $fields);
		if(!empty($user)){
			$page_title = $this->view->page_title = "Tài khoản của tôi";
			$this->render_view("account/view.php", $user);
		}
		else{
			$this->set_page_error();
			$this->render_view("account/view.php");
		}
	}
	/**
     * Update user account record with formdata
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = USER_ID;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id","first_name","last_name","photo","birth_day","resdence","phone","username","role","account_status");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'first_name' => 'required',
				'last_name' => 'required',
				'photo' => 'required',
				'birth_day' => 'required',
				'resdence' => 'required',
				'phone' => 'required',
				'username' => 'required',
				'role' => 'required',
				'account_status' => 'required',
			);
			$this->sanitize_array = array(
				'first_name' => 'sanitize_string',
				'last_name' => 'sanitize_string',
				'photo' => 'sanitize_string',
				'birth_day' => 'sanitize_string',
				'resdence' => 'sanitize_string',
				'phone' => 'sanitize_string',
				'username' => 'sanitize_string',
				'role' => 'sanitize_string',
				'account_status' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			//Check if Duplicate Record Already Exit In The Database
			if(isset($modeldata['username'])){
				$db->where("username", $modeldata['username'])->where("id", $rec_id, "!=");
				if($db->has($tablename)){
					$this->view->page_error[] = $modeldata['username']." Already exist!";
				}
			} 
			if($this->validated()){
				$db->where("users.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Bản ghi được cập nhật thành công", "success");
					$db->where ("id", $rec_id);
					$user = $db->getOne($tablename , "*");
					set_session("user_data", $user);// update session with new user data
					return $this->redirect("account");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$this->set_flash_msg("Không có bản ghi nào được cập nhật", "warning");
						return	$this->redirect("account");
					}
				}
			}
		}
		$db->where("users.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Tài khoản của tôi";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("account/edit.php", $data);
	}
	/**
     * Change account email
     * @return BaseView
     */
	function change_email($formdata = null){
		if($formdata){
			$email = trim($formdata['email']);
			$db = $this->GetModel();
			$rec_id = $this->rec_id = USER_ID; //get current user id from session
			$tablename = $this->tablename;
			$db->where ("id", $rec_id);
			$result = $db->update($tablename, array('email' => $email ));
			if($result){
				$this->set_flash_msg("Địa chỉ email đã thay đổi thành công", "success");
				$this->redirect("account");
			}
			else{
				$this->set_page_error("Email không thay đổi được");
			}
		}
		return $this->render_view("account/change_email.php");
	}

		/**
	 * Change account password
	 * @return BaseView
	 */
	function change_password($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$rec_id = $this->rec_id = USER_ID; // lấy user hiện tại
			$current_password = trim($formdata['current_password']);
			$new_password = trim($formdata['new_password']);
			$confirm_password = trim($formdata['confirm_password']);

			// Kiểm tra mật khẩu hiện tại có đúng không
			$db->where("id", $rec_id);
			$user = $db->getOne($this->tablename, array("password"));

			if(!password_verify($current_password, $user['password'])){
				$this->set_page_error("Mật khẩu hiện tại không đúng");
				
			}
			elseif($current_password === $new_password){
				$this->set_page_error("Mật khẩu mới không được giống mật khẩu hiện tại");
			}
			elseif($new_password !== $confirm_password){
				$this->set_page_error("Mật khẩu mới và mật khẩu xác nhận không khớp");
			}
			elseif(strlen($new_password) < 6){
				$this->set_page_error("Mật khẩu mới phải có ít nhất 6 ký tự");
			}
			else{
				// Cập nhật mật khẩu
				$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
				$db->where("id", $rec_id);
				$result = $db->update($this->tablename, array("password" => $password_hash));

				if($result){
					$this->set_flash_msg("Mật khẩu đã được thay đổi thành công", "success");
					return $this->redirect("account");
				}
				else{
					$this->set_page_error("Không thể cập nhật mật khẩu");
				}
			}
		}
		$this->view->page_title = "Đổi mật khẩu";
		return $this->render_view("account/change_password.php");
	}

}