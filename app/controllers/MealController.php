<?php 
/**
 * meal Page Controller
 * @category  Controller
 */
class mealController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "meal";
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
		$fields = array("id_meal", 
			"date", 
			"lunch", 
			"lunch_img",
			"afternoon",
            "afternoon_img",
            "created_by"
        );
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				meal.id_meal LIKE ? OR 
				meal.date LIKE ? OR 
				meal.lunch LIKE ? OR 
				meal.lunch_img LIKE ? OR 
                meal.afternoon LIKE ? OR 
                meal.afternoon_img LIKE ? OR 
				meal.created_by LIKE ?
			)";
			$search_params = array(
<<<<<<< HEAD
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
=======
				"%$text%","%$text%","%$text%","%$text%","%$text%"
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "meal/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("meal.id_meal", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Thực đơn";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("meal/list.php", $data); //render the full page
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
		$fields = array("id_meal", 
			"date", 
			"lunch", 
			"lunch_img",
			"afternoon",
            "afternoon_img",
            "created_by");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("meal.id_meal", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "Xem thực đơn";
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
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("meal/view.php", $record);
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
<<<<<<< HEAD
=======

>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
		// Danh sách các trường hợp lệ
		$fields = $this->fields = array(
			"date", 
			"lunch", 
			"lunch_img", 
			"afternoon", 
			"afternoon_img", 
			"created_by"
		);

		$postdata = $this->format_request_data($formdata);

		$this->rules_array = array(
			'date' => 'required',
			'lunch' => 'required',
<<<<<<< HEAD
			'lunch_img' => 'required',
			'afternoon' => 'required',
			'afternoon_img' => 'required',
=======
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
			'created_by' => 'required'
		);

		$this->sanitize_array = array(
			'date' => 'sanitize_string',
			'lunch' => 'sanitize_string',
			'lunch_img' => 'sanitize_string',
			'afternoon' => 'sanitize_string',
			'afternoon_img' => 'sanitize_string',
			'created_by' => 'sanitize_string'
		);

		$this->filter_vals = true;

		$modeldata = $this->modeldata = $this->validate_form($postdata);

		if($this->validated()){
			$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
			if($rec_id){
				$this->set_flash_msg("Thêm thực đơn thành công", "success");
				return	$this->redirect("meal");
			}
			else{
				$this->set_page_error();
			}
		}
        
	}

	$page_title = $this->view->page_title = "Thêm thực đơn";
	$this->render_view("meal/add.php");
}
<<<<<<< HEAD
/**
 * Update record to the database table
 * @param $rec_id (select record by table primary key) 
 * @param $formdata array() from $_POST
 * @return BaseView
 */
function edit($rec_id = null, $formdata = null){
	$request = $this->request;
	$db = $this->GetModel();
	$this->rec_id = $rec_id;
	$tablename = $this->tablename;

	// Các trường có thể chỉnh sửa
	$fields = $this->fields = array("id_meal", "date", "lunch","lunch_img", "afternoon", "afternoon_img","created_by");

	if($formdata){
		$postdata = $this->format_request_data($formdata);

		// Luật kiểm tra dữ liệu
		$this->rules_array = array(
			'date' => 'required',
			'lunch' => 'required',
			'lunch_img' => 'required',
			'afternoon' => 'required',
			'afternoon_img' => 'required',
			'created_by' => 'required',
		);

		// Làm sạch dữ liệu nhập
		$this->sanitize_array = array(
			'date' => 'sanitize_string',
			'lunch' => 'sanitize_string',
			'lunch_img' => 'sanitize_string',
			'afternoon' => 'sanitize_string',
			'afternoon_img' => 'sanitize_string',
			'created_by' => 'sanitize_string',
		);

		$modeldata = $this->modeldata = $this->validate_form($postdata);

		if($this->validated()){
			$db->where("meal.id_meal", $rec_id);
			$bool = $db->update($tablename, $modeldata);
			$numRows = $db->getRowCount();

			if($bool && $numRows){
				$this->set_flash_msg("Cập nhật thực đơn thành công", "success");
				return $this->redirect("meal");
			} else {
				if($db->getLastError()){
					$this->set_page_error();
				} elseif(!$numRows){
					$page_error = "Không có dữ liệu nào được cập nhật";
					$this->set_page_error($page_error);
					$this->set_flash_msg($page_error, "warning");
					return $this->redirect("meal");
				}
			}
		}
	}

	// Lấy dữ liệu hiện tại của bản ghi
	$db->where("meal.id_meal", $rec_id);
	$data = $db->getOne($tablename, $fields);

	$page_title = $this->view->page_title = "Chỉnh sửa thực đơn";

	if(!$data){
		$this->set_page_error();
	}

	return $this->render_view("meal/edit.php", $data);
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
		$tablename = $this->tablename = "meal";
		$fields = $this->fields = array("date", "lunch", "lunch_img", "afternoon", "afternoon_img", "created_by");
		$page_error = null;

		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;

			// Định dạng dữ liệu đầu vào
			$postdata = $this->format_request_data($postdata);

			// Xác thực dữ liệu đầu vào
			$this->rules_array = array(
				"date" => "required",
				"lunch" => "required",
				"lunch_img" => "required",
				"afternoon" => "required",
				"afternoon_img" => "required",
				"created_by" => "required",
			);

			$this->sanitize_array = array(
				"date" => "sanitize_string",
				"lunch" => "sanitize_string",
				"lunch_img" => "sanitize_string",
				"afternoon" => "sanitize_string",
				"afternoon_img" => "sanitize_string",
				"created_by" => "sanitize_string",
			);

			$this->filter_rules = true;
			$modeldata = $this->modeldata = $this->validate_form($postdata);

			if($this->validated()){
				$db->where("id_meal", $rec_id);
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();

				if($bool && $numRows){
					return render_json([
						'num_rows' => $numRows,
						'rec_id' => $rec_id,
					]);
				} else {
					if($db->getLastError()){
						$page_error = $db->getLastError();
					} elseif(!$numRows){
						$page_error = "Không có dữ liệu nào được cập nhật";
					}
					render_error($page_error);
				}
			} else {
				render_error($this->view->page_error);
			}
		}
		return null;
	}
/**
 * Update record in the database table
 * @param $rec_id (select record by table primary key) 
 * @param $formdata array() from $_POST
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
		$db->where("meal.id_meal", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Xóa dữ liệu thành công", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("meal");
	}
}
=======
}
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
