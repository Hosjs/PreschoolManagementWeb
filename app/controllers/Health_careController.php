<?php
class Health_careController extends SecureController {

    function __construct(){
        parent::__construct();
        $this->tablename = "health_care";
    }

    function index() {
    $db = $this->GetModel();
    $current_user = $_SESSION[APP_ID . 'user_data'] ?? null;

    $db->join("student s", "h.student_id = s.id", "INNER");

    if ($current_user && $current_user['role'] == 'headteacher') {
        $db->join("class c", "s.class = c.class_name", "INNER");
        $db->where("c.assigned_teacher", $current_user['assigned_teacher']);
    }

    $db->orderBy("h.year", "DESC");
    $fields = "h.*, s.pupils_full_name AS student_name, s.class, s.photo, s.id AS student_id";
    $all = $db->get("health_care h", null, $fields);

    $students = [];
    foreach ($all as $row) {
        if (!isset($students[$row['student_id']])) {
            $students[$row['student_id']] = $row;
        }
    }

    $data = new stdClass();
    $data->records = array_values($students);
    $this->view->records = $data->records;

    $this->render_view("health_care/list.php", $data);
}


    function view_chart($student_id = null){
    $db = $this->GetModel();

    $records = $db->rawQuery("
        SELECT * FROM health_care 
        INNER JOIN student ON student.id = health_care.student_id 
        WHERE student.id = ?
        ORDER BY year ASC
    ", [$student_id]);

    $latest = $db->rawQueryOne("
        SELECT * FROM health_care 
        INNER JOIN student ON student.id = health_care.student_id 
        WHERE student.id = ?
        ORDER BY year DESC
        LIMIT 1
    ", [$student_id]);

    if ($records && $latest) {
        $this->view->records = $records;
        $this->view->student_name = $latest['pupils_full_name'];
        $this->view->photo = $latest['photo'];
    }

    $this->render_view("health_care/view_chart.php");
}

function add($formdata = null){
	if($formdata){
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$request = $this->request;

		$fields = $this->fields = array("student_id", "year", "height", "weight", "eye_sight");
		$postdata = $this->format_request_data($formdata);

		$this->rules_array = array(
			"student_id" => "required|numeric",
			"year" => "required|numeric",
			"height" => "required|numeric",
			"weight" => "required|numeric",
			"eye_sight" => "required|numeric"
		);

		$this->sanitize_array = array(
			"student_id" => "sanitize_string",
			"year" => "sanitize_string",
			"height" => "sanitize_string",
			"weight" => "sanitize_string",
			"eye_sight" => "sanitize_string"
		);

		$this->filter_vals = true;
		$modeldata = $this->modeldata = $this->validate_form($postdata);

		if($this->validated()){
			$rec_id = $db->insert($tablename, $modeldata);
			if($rec_id){
				$this->set_flash_msg("Đã thêm dữ liệu sức khỏe thành công", "success");
				return $this->redirect("health_care");
			}
			else{
				$this->set_page_error();
			}
		}
	}

	$page_title = $this->view->page_title = "Thêm dữ liệu sức khỏe";
	$this->render_view("health_care/add.php");
}

}
