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
		$today = date('Y-m-d');
	
		$db->where("id_class_detail", $id);
		$db->where("attendance_date", $today);
		$exists = $db->has("attendance_log");
	
		if ($exists) {
			$db->where("id_class_detail", $id);
			$db->where("attendance_date", $today);
			$updated = $db->update("attendance_log", ["status" => $status]);
		} else {
			$updated = $db->insert("attendance_log", [
				"id_class_detail" => $id,
				"attendance_date" => $today,
				"status" => $status,
			]);
		}
						
		if ($updated) {
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

	function index($fieldname = null, $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$db -> groupBy("s.id");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT);
		$offset = $pagination[0];
		$limit = $pagination[1];
		
		
		$fields = [
			"s.id",
			"s.pupils_full_name AS first_name",
			"s.pupils_full_name AS student_name",
			"s.gender",
			"s.class",
			"YEAR(CURDATE()) - s.age AS year_of_birth",
			"s.photo",
			"s.note",
			"cd.id AS id_class_detail",
			"IFNULL(al.status, 'no') AS attendance_status"
		];
	
		$db->join("class_detail cd", "s.id = cd.id_student", "LEFT");
		$db->join("attendance_log al", "cd.id = al.id_class_detail AND al.attendance_date = CURDATE()", "LEFT");
	
		
		$user = $this->get_current_user();

		if($user && $user['role'] == 'headteacher'){
    	$db->where("cd.assigned_teacher", $user['username']);
		}

		if (!empty($request->search)) {
			$text = "%" . trim($request->search) . "%";
			$search_condition = "(
				s.pupils_full_name LIKE ? OR 
				s.gender LIKE ? OR 
				s.class LIKE ? OR 
				s.note LIKE ?
				s.attendance LIKE ? OR
			)";
			$search_params = array_fill(0, 4, $text);
			$db->where($search_condition, $search_params);
			$this->view->search_template = "class_detail/search.php";
		}
	
		if ($fieldname) {
			$db->where($fieldname, $fieldvalue);
		}
	
		if (!empty($request->orderby)) {
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		} else {
			$db->orderBy("s.id", ORDER_TYPE);
		}
	
		$tc = $db->withTotalCount();
		$records = $db->get("student s", $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
	
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		
		if ($db->getLastError()) {
			$this->set_page_error();
		}
	
		$page_title = $this->view->page_title = "Danh sách học sinh";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
	
		$this->render_view("class_detail/list.php", $data);
	}
		
}