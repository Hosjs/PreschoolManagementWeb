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
				"%$text%","%$text%","%$text%","%$text%","%$text%"
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
}
