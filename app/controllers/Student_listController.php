<?php 
/**
 * student_list Page Controller
 * @category  Controller
 */
class Student_listController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "student_list";
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
			"surname", 
			"last_name", 
			"first_name", 
			"year_of_birth", 
			"photo", 
			"gender", 
			"class", 
			"with_birth_certificate", 
			"note", 
			"resdence", 
			"special_conditions", 
			"parent_contact_no", 
			"mother_full_name", 
			"father_full_name", 
			"home_county");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				student_list.id LIKE ? OR 
				student_list.surname LIKE ? OR 
				student_list.last_name LIKE ? OR 
				student_list.first_name LIKE ? OR 
				student_list.year_of_birth LIKE ? OR 
				student_list.photo LIKE ? OR 
				student_list.gender LIKE ? OR 
				student_list.class LIKE ? OR 
				student_list.with_birth_certificate LIKE ? OR 
				student_list.note LIKE ? OR 
				student_list.resdence LIKE ? OR 
				student_list.special_conditions LIKE ? OR 
				student_list.parent_contact_no LIKE ? OR 
				student_list.mother_full_name LIKE ? OR 
				student_list.father_full_name LIKE ? OR 
				student_list.home_county LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "student_list/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("student_list.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Thêm thông tin học sinh";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("student_list/list.php", $data); //render the full page
	}
}
