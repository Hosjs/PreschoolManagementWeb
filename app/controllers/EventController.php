<?php 
/**
 * Event Page Controller
 * @category  Controller
 */
class EventController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "event";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id", 
			"title", 
			"content", 
			"date",
			"terms",
			"fee");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				event.id LIKE ? OR 
				event.title LIKE ? OR 
				event.content LIKE ? OR 
				event.date LIKE ? OR
				event.terms LIKE ? OR
				event.fee LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "event/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("event.id", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
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
		$page_title = $this->view->page_title = "Sự kiện";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("event/list.php", $data);
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("id", 
			"title", 
			"content",  
			"date",
			"terms",
			"fee");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("event.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "Xem sự kiện";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("Không tìm thấy dữ liệu");
			}
		}
		return $this->render_view("event/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("title","content","date","terms","fee");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'content' => 'required',
				'date' => 'required',
				'terms' => 'required',
				'fee' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'date' => 'sanitize_string',
				'terms' => 'sanitize_string',
				'fee' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Thêm dữ liệu thành công", "success");
					return	$this->redirect("event");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Thêm sự kiện";
		$this->render_view("event/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id","title","content","date","terms","fee");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'content' => 'required',
				'date' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'author' => 'sanitize_string',
				'date' => 'sanitize_string',
				'terms' => 'sanitize_string',
				'fee' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("event.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Cập nhật dữ liệu thành công", "success");
					return $this->redirect("event");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "Không có dữ liệu nào được cập nhật";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("event");
					}
				}
			}
		}
		$db->where("event.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Sửa sự kiện";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("event/edit.php", $data);
	}
	/**
     * Update single field
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfield($rec_id = null, $formdata = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		//editable fields
		$fields = $this->fields = array("id","title","content","date","terms","fee");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'title' => 'required',
				'content' => 'required',
				'date' => 'required',
				'terms' => 'required',
				'fee' => 'required',
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'date' => 'sanitize_string',
				'terms' => 'sanitize_string',
				'fee' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("event.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					return render_json(
						array(
							'num_rows' =>$numRows,
							'rec_id' =>$rec_id,
						)
					);
				}
				else{
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "Không có dữ liệu nào được cập nhật";
					}
					render_error($page_error);
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		return null;
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("event.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Xóa dữ liệu thành công", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("event");
	}
	/**
	 * Register for event
	 * @param $formdata array() from $_POST
	 * @return BaseView
	 */
	public function register($event_id) {
	$db = $this->GetModel();
	Csrf::cross_check();
	$user = get_active_user();

	if (!$user) {
		$this->set_flash_msg("Bạn cần đăng nhập để đăng ký sự kiện", "danger");
		return $this->redirect("event");
	}

	// Đọc event + parent
	$event = $db->where("id", $event_id)->getOne("event");
	$parent = $db->where("id_user", $user['id'])->getOne("parents");

	// Danh sách học sinh
	$db->where("pc.id_parent", $parent['id_parent']);
	$db->join("student s", "pc.id_pupils = s.id", "LEFT");
	$pupils = $db->get("parent_child pc", null, [
		"s.id AS id_pupils",
		"s.pupils_full_name AS full_name"
	]);

	$success_message = null;

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$formdata = $this->format_request_data($this->request->post);
		$pupil_id = $formdata['pupil_id'] ?? null;

		// Kiểm tra
		if (!$pupil_id) {
			$this->page_error = "Vui lòng chọn học sinh.";
		} else {
			$db->where("event_id", $event_id);
			$db->where("pupil_id", $pupil_id);
			$exists = $db->getOne("event_registration");

			if ($exists) {
				$this->page_error = "Học sinh này đã đăng ký sự kiện.";
			} else {
				$result = $db->insert("event_registration", [
					"event_id" => $event_id,
					"parent_id" => $parent['id_parent'],
					"pupil_id" => $pupil_id,
					"registration_date" => date("Y-m-d H:i:s")
				]);

				if ($result) {
					$success_message = "🎉 Bạn đã đăng ký sự kiện thành công!";
				} else {
					$this->page_error = "Lỗi khi đăng ký: " . $db->getLastError();
				}
			}
		}
	}

	return $this->view->render("event/register.php", [
		'event' => $event,
		'parent' => $parent,
		'pupils' => $pupils,
		'success_message' => $success_message
	]);
	}


	public function confirm_register() {
	$db = $this->GetModel();
	Csrf::cross_check();
	$request = $this->request;

	$formdata = $this->format_request_data($request->post);
	// Lấy các giá trị
	$event_id = $formdata['event_id'] ?? null;
	$parent_id = $formdata['parent_id'] ?? null;
	$pupil_id = $formdata['pupil_id'] ?? null;

	if (!$event_id || !$parent_id || !$pupil_id) {
		$this->set_flash_msg("Dữ liệu không hợp lệ", "danger");
		return $this->redirect("event/register/$event_id");
	}

	$db->where("event_id", $event_id);
	$db->where("pupil_id", $pupil_id);
	$exists = $db->getOne("event_registration");

	if ($exists) {
		$this->set_flash_msg("Học sinh này đã đăng ký rồi.", "warning");
		return $this->redirect("event/register/$event_id");
	}

	// Thêm mới
	$result = $db->insert("event_registration", [
		"event_id" => $event_id,
		"parent_id" => $parent_id,
		"pupil_id" => $pupil_id,
		"registration_date" => date("Y-m-d H:i:s")
	]);

	if ($result) {
		$this->set_flash_msg("🎉 Đăng ký thành công!", "success");
	} else {
		$this->set_flash_msg("Lỗi khi đăng ký: " . $db->getLastError(), "danger");
	}

	return $this->redirect("event/register/$event_id");
}

}