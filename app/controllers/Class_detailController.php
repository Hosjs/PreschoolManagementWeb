<?php 
/**
 * class_detail Page Controller
 * @category  Controller
 */
class class_detailController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "class_detail";
	}

	public function mark_attendance($id = null, $status = null){
		if (!$id || !in_array($status, ['yes', 'no'])) {
			$this->set_flash_msg("Dữ liệu không hợp lệ", "danger");
			return $this->redirect("class_detail");
		}

		$db = $this->GetModel();
		$current_user = $this->get_current_user();
		$today = date('Y-m-d');

		// Nếu là headteacher → Kiểm tra xem có đúng assigned_teacher của học sinh này không
		if ($current_user && $current_user['role'] == 'headteacher') {
			$assigned_teacher = $current_user['assigned_teacher'];

			// Kiểm tra học sinh có thuộc quyền quản lý không
			$db->where("id", $id);
			$db->where("assigned_teacher", $assigned_teacher);
			$check = $db->getOne("class_detail");

			if (!$check) {
				$this->set_flash_msg("Bạn không có quyền điểm danh học sinh này!", "danger");
				return $this->redirect("class_detail");
			}
		}

		// Kiểm tra xem đã điểm danh hôm nay chưa
		$db->where("id_class_detail", $id);
		$db->where("attendance_date", $today);
		$exists = $db->has("attendance_log");

		if ($exists) {
			// Đã có → Cập nhật
			$db->where("id_class_detail", $id);
			$db->where("attendance_date", $today);
			$updated = $db->update("attendance_log", ["status" => $status]);
		} else {
			// Chưa có → Thêm mới
			$updated = $db->insert("attendance_log", [
				"id_class_detail" => $id,
				"attendance_date" => $today,
				"status" => $status,
			]);
		}

		if ($updated) {
			// Cập nhật lại trạng thái attendance trong class_detail
			$db->where("id", $id);
			$db->update("class_detail", ["attendance" => $status]);

			$msg = ($status == 'yes') ? "Điểm danh thành công" : "Đã ghi vắng";
			$this->set_flash_msg($msg, "success");
		} else {
			$this->set_flash_msg("Lỗi khi ghi điểm danh: " . $db->getLastError(), "danger");
		}

		return $this->redirect("class_detail");
	}

	protected function get_current_user(){
		return $_SESSION[APP_ID.'user'] ?? null;
	}

	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = "class_detail";
	
		$current_user = $this->get_current_user();
	
		if ($current_user && $current_user['role'] == 'headteacher') {
<<<<<<< HEAD
=======
			// Lấy danh sách các lớp giáo viên phụ trách
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
			$teacher_name = $current_user['assigned_teacher'];
			$class_list = $db->rawQuery("SELECT class_name FROM class WHERE assigned_teacher = ?", [$teacher_name]);
			$class_names = array_column($class_list, "class_name");
		
			if (!empty($class_names)) {

				$db->where("class_detail.class", $class_names, "IN");
			}
			// Luôn loại các bản ghi class null
			$db->where("class_detail.class", null, "IS NOT NULL");
		}
		
<<<<<<< HEAD
		$fields = array("id AS id_class_detail", "id_student", "student_name","photo", "class", "gender", "assigned_teacher", "note", "attendance");
=======
		$fields = array("id AS id_class_detail", "id_student", "student_name", "class", "gender", "assigned_teacher", "note", "attendance");
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
	
		$pagination = $this->get_pagination(MAX_RECORD_COUNT);
	
		if(!empty($request->search)){
			$text = "%" . trim($request->search) . "%";
			$db->where("(student_name LIKE ? OR class LIKE ?)", array($text, $text));
			$this->view->search_template = "class_detail/search.php";
		}
	
		if(!empty($request->orderby)){
			$db->orderBy($request->orderby, (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE));
		}else{
			$db->orderBy("id", ORDER_TYPE);
		}
	
		if($fieldname){
			$db->where($fieldname , $fieldvalue);
		}
	
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
	
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
	
		if($db->getLastError()){
			$this->set_page_error();
		}
	
		$page_title = $this->view->page_title = "Danh sách học sinh";
		$this->render_view("class_detail/list.php", $data);
	}
		
}