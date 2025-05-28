<?php 
/**
 * subject Page Controller
 * @category  Controller
 */
class subjectController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "subject";
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
		$fields = array(
			"id", 
			"title", 
			"content", 
			"date", 
			"terms",     
			"fee"        
		);
		
		$pagination = $this->get_pagination(MAX_RECORD_COUNT);
		// search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				subject.id LIKE ? OR 
				subject.title LIKE ? OR 
				subject.content LIKE ? OR 
				subject.date LIKE ? OR
				subject.terms LIKE ? OR       
				subject.fee LIKE ?            
			)";
			$search_params = array(
				"%$text%",
				"%$text%",
				"%$text%",
				"%$text%",
				"%$text%", 
				"%$text%"  
			);
			$db->where($search_condition, $search_params);
			$this->view->search_template = "subject/search.php";
		}

		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		} else {
			$db->orderBy("subject.id", ORDER_TYPE);
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

		$page_title = $this->view->page_title = "Môn học";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";

		$this->render_view("subject/list.php", $data);
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

		$fields = array(
			"id", 
			"title", 
			"content", 
			"date", 
			"terms",    
			"fee"      
		);
		if($value){
			$db->where($rec_id, urldecode($value));
		}
		else{
			$db->where("subject.id", $rec_id);
		}
		$record = $db->getOne($tablename, $fields);		
		if($record){
			$page_title = $this->view->page_title = "Xem môn học";
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
		return $this->render_view("subject/view.php", $record);
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
			$fields = $this->fields = array(
				"title",
				"content",
				"date",
				"terms",   
				"fee"      
			);
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				"title" => "required",
				"content" => "required",
				"date" => "required",
				"terms" => "required",        
				"fee" => "required|numeric"  
			);
			$this->sanitize_array = array(
				"title" => "sanitize_string",
				"content" => "sanitize_string",
				"date" => "sanitize_string",
				"terms" => "sanitize_string",
				"fee" => "sanitize_string" // hoặc sanitize_numbers
			);
			$this->filter_vals = true;
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Thêm dữ liệu thành công", "success");
					return $this->redirect("subject");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Thêm môn học";
		$this->render_view("subject/add.php");
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
		$fields = $this->fields = array("id", "title", "content", "date", "terms", "fee");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'title' => 'required',
				'content' => 'required',
				'date' => 'required',
				'terms' => 'required',
				'fee' => 'required|numeric'
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'content' => 'sanitize_string',
				'date' => 'sanitize_string',
				'terms' => 'sanitize_string',
				'fee' => 'sanitize_string' 
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("subject.id", $rec_id);
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					$this->set_flash_msg("Cập nhật dữ liệu thành công", "success");
					return $this->redirect("subject");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						$page_error = "Không có dữ liệu nào được cập nhật";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return $this->redirect("subject");
					}
				}
			}
		}
		$db->where("subject.id", $rec_id);
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Sửa môn học";

		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("subject/edit.php", $data);
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
		$fields = $this->fields = array("id", "title", "content", "date", "terms", "fee");
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
				'fee' => 'required|numeric'
			);
			$this->sanitize_array = array(
				'title' => 'sanitize_string',
				'content' => 'sanitize_string',
				'date' => 'sanitize_string',
				'terms' => 'sanitize_string',
				'fee' => 'sanitize_string'
			);
			$this->filter_rules = true;
			$modeldata = $this->modeldata = $this->validate_form($postdata);

			if($this->validated()){
				$db->where("subject.id", $rec_id);
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();

				if($bool && $numRows){
					return render_json(array(
						'num_rows' => $numRows,
						'rec_id' => $rec_id,
					));
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
		$db->where("subject.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Xóa dữ liệu thành công", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("subject");
	}
	public function register($subject_id) {
		$request = $this->request;
		Csrf::cross_check();
			$request = $this->request;
			$this->set_flash_msg("Đã đăng ký môn học, chờ thông tin phê duyệt", "success");
			return	$this->redirect("subject");
	}
}