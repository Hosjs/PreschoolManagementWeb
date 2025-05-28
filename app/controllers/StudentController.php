<?php 
/**
 * student Page Controller
 * @category  Controller
 */
class studentController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "student";
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
    $current_user = $this->get_current_user();

    // Nếu là headteacher → chỉ xem học sinh của mình
    if($current_user && $current_user['role'] == 'headteacher'){
        $db->where("assigned_teacher", $current_user['assigned_teacher']);
    }

    $fields = array(
        "id", "pupils_full_name", "pupils_ID", "birth_day", "class", "gender", "photo", "note",
        "special_need", "father_name", "mother_name", "father_contact", "mother_contact",
        "guardian_name", "guardian_contact", "assigned_teacher", "class_ID"
    );

    $pagination = $this->get_pagination(MAX_RECORD_COUNT);

    // Tìm kiếm
    if(!empty($request->search)){
        $text = "%" . trim($request->search) . "%";
        $search_condition = "(
            pupils_full_name LIKE ? OR 
            pupils_ID LIKE ? OR 
            birth_day LIKE ? OR 
            class LIKE ? OR 
            gender LIKE ? OR 
            note LIKE ? OR 
            special_need LIKE ? OR 
            father_name LIKE ? OR 
            mother_name LIKE ? OR 
            guardian_name LIKE ?
        )";
        $search_params = array_fill(0, 10, $text);
        $db->where($search_condition, $search_params);
        $this->view->search_template = "student/search.php";
    }

    if(!empty($request->orderby)){
        $db->orderBy($request->orderby, (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE));
    } else {
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

    $page_title = $this->view->page_title = "Học sinh";
    $this->render_view("student/list.php", $data);
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
			"pupils_full_name", 
			"pupils_ID", 
			"birth_day", 
			"class", 
			"photo", 
			"gender", 
			"note", 
			"father_name", 
			"mother_name", 
			"father_contact", 
			"mother_contact", 
			"special_need", 
			"guardian_name", 
			"guardian_contact");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("student.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "Xem học sinh";
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
		return $this->render_view("student/view.php", $record);
	}

	protected function get_current_user(){
		return $_SESSION[APP_ID.'user'] ?? null;
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
            "pupils_full_name", "pupils_ID", "birth_day", "photo", "gender", "class", 
            "note", "father_name", "mother_name", "father_contact", "mother_contact", 
            "special_need", "guardian_name", "guardian_contact", "assigned_teacher", "class_ID"
        );

        $postdata = $this->format_request_data($formdata);

        $this->rules_array = array(
            'pupils_full_name' => 'required',
            'pupils_ID' => 'required',
            'birth_day' => 'required',
            'photo' => 'required',
            'gender' => 'required',
            'class' => 'required',
            'note' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'father_contact' => 'required|numeric',
            'mother_contact' => 'required|numeric',
            'special_need' => 'required',
            'guardian_name' => 'required',
            'guardian_contact' => 'required',
            'assigned_teacher' => 'notrequired'
        );

        $this->sanitize_array = array_fill_keys($fields, 'sanitize_string');
        $this->filter_vals = true;
        $modeldata = $this->modeldata = $this->validate_form($postdata);

        if($this->validated()){
            // Lấy thông tin lớp từ bảng class theo tên lớp
            $class_data = $db->rawQueryOne("SELECT id AS id_class, assigned_teacher FROM class WHERE class_name = ?", [$modeldata['class']]);

            if(!$class_data){
                $this->set_flash_msg("Tên lớp không tồn tại", "danger");
                return $this->redirect("student/add");
            }

            // Cập nhật vào dữ liệu học sinh
            $modeldata['class_ID'] = $class_data['id_class'];
            $modeldata['assigned_teacher'] = $class_data['assigned_teacher'];

            // Thêm học sinh vào bảng student
            $rec_id = $db->insert($tablename, $modeldata);

            if ($rec_id) {
                $student = $db->rawQueryOne("SELECT * FROM student WHERE id = ?", [$rec_id]);

                $class_detail_data = [
                    "id_student" => $student['id'],
                    "student_name" => $student['pupils_full_name'],
                    "gender" => $student['gender'],
                    "photo" => $student['photo'],
                    "class" => $student['class'],
                    "note" => $student['note'],
                    "attendance" => "no",
                    "assigned_teacher" => $class_data['assigned_teacher'],
                    "id_class" => $class_data['id_class'],
                    "year" => date("Y")
                ];

                // Xóa bản ghi class_detail trống nếu có
                $db->where("id_student", $student['id']);
                $db->where("(class IS NULL OR class = '')");
                $db->delete("class_detail");

                // Thêm mới vào class_detail
                $db->insert("class_detail", $class_detail_data);

                $this->set_flash_msg("Đã thêm học sinh thành công", "success");
                return $this->redirect("student");
            }
        }
    }

    $page_title = $this->view->page_title = "Thêm học sinh";
    $this->render_view("student/add.php");
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

    $fields = $this->fields = array(
        "id", "pupils_full_name", "pupils_ID", "birth_day", "photo", "gender", "class", "note",
        "father_name", "mother_name", "father_contact", "mother_contact", "special_need",
        "guardian_name", "guardian_contact", "assigned_teacher", "class_ID"
    );

    if($formdata){
        $postdata = $this->format_request_data($formdata);
        $this->rules_array = array(
            'pupils_full_name' => 'required',
            'pupils_ID' => 'required',
            'birth_day' => 'required',
            'photo' => 'required',
            'gender' => 'required',
            'class' => 'required',
            'note' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'father_contact' => 'required|numeric',
            'mother_contact' => 'required|numeric',
            'special_need' => 'required',
            'guardian_name' => 'required',
            'guardian_contact' => 'required',
            'assigned_teacher' => 'notrequired'
        );

        $this->sanitize_array = array_fill_keys($fields, 'sanitize_string');
        $modeldata = $this->modeldata = $this->validate_form($postdata);

        if($this->validated()){
            // Tìm lớp theo tên để lấy id_class & assigned_teacher
            $class_data = $db->rawQueryOne("SELECT id AS id_class, assigned_teacher FROM class WHERE class_name = ?", [$modeldata['class']]);
            if(!$class_data){
                $this->set_flash_msg("Tên lớp không tồn tại", "danger");
                return $this->redirect("student/edit/$rec_id");
            }

            $modeldata['class_ID'] = $class_data['id_class'];
            $modeldata['assigned_teacher'] = $class_data['assigned_teacher'];

            $db->where("student.id", $rec_id);
            $bool = $db->update($tablename, $modeldata);
            $numRows = $db->getRowCount();

            if($bool && $numRows){
                // Đồng bộ sang class_detail
                $student = $db->rawQueryOne("SELECT * FROM student WHERE id = ?", [$rec_id]);
                $class_detail_data = [
                    "student_name" => $student['pupils_full_name'],
                    "gender" => $student['gender'],
                    "photo" => $student['photo'],
                    "class" => $student['class'],
                    "note" => $student['note'],
                    "assigned_teacher" => $student['assigned_teacher'],
                    "id_class" => $student['class_ID'],
                    "year" => date("Y")
                ];
                $db->where("id_student", $rec_id);
                $db->update("class_detail", $class_detail_data);

                $this->set_flash_msg("Cập nhật thông tin học sinh thành công", "success");
                return $this->redirect("student");
            }
            else{
                if($db->getLastError()){
                    $this->set_page_error();
                } elseif(!$numRows){
                    $msg = "Không có thay đổi nào được thực hiện";
                    $this->set_flash_msg($msg, "warning");
                    return $this->redirect("student");
                }
            }
        }
    }

    $db->where("student.id", $rec_id);
    $data = $db->getOne($tablename, $fields);
    $page_title = $this->view->page_title = "Sửa học sinh";
    if(!$data){
        $this->set_page_error();
    }
    return $this->render_view("student/edit.php", $data);
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
		$fields = $this->fields = array("id","pupils_full_name","pupils_ID","birth_day","photo","gender","class","note","father_name","mother_name","father_contact","mother_contact","special_need","guardian_name","guardian_contact","assigned_teacher");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'pupils_full_name' => 'required',
				'pupils_ID' => 'required',
				'birth_day' => 'required',
				'photo' => 'required',
				'gender' => 'required',
				'class' => 'required',
				'note' => 'required',
				'father_name' => 'required',
				'mother_name' => 'required',
				'father_contact' => 'required|numeric',
				'mother_contact' => 'required|numeric',
				'special_need' => 'required',
				'guardian_name' => 'required',
				'guardian_contact' => 'required',
				'assigned_teacher' => 'notrequired'
			);
			$this->sanitize_array = array(
				'pupils_full_name' => 'sanitize_string',
				'pupils_ID' => 'sanitize_string',
				'birth_day' => 'sanitize_string',
				'photo' => 'sanitize_string',
				'gender' => 'sanitize_string',
				'class' => 'sanitize_string',
				'note' => 'sanitize_string',
				'father_name' => 'sanitize_string',
				'mother_name' => 'sanitize_string',
				'father_contact' => 'sanitize_string',
				'mother_contact' => 'sanitize_string',
				'special_need' => 'sanitize_string',
				'guardian_name' => 'sanitize_string',
				'guardian_contact' => 'sanitize_string',
				'assigned_teacher' => 'sanitize_string'
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("student.id", $rec_id);;
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
						$page_error = "Không có thay đổi nào được thực hiện";
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
	$arr_rec_id = array_map('trim', explode(",", $rec_id));

	$db->where("id_student", $arr_rec_id, "in");
	$classDetailIds = $db->getValue("class_detail", "id", null);

	if (!empty($classDetailIds)) {
		$db->where("id_class_detail", $classDetailIds, "in");
		$db->delete("attendance_log");
	}

	$db->where("id_student", $arr_rec_id, "in");
	$db->delete("class_detail");

	$db->where("student.id", $arr_rec_id, "in");
	$bool = $db->delete($tablename);

	if($bool){
		$this->set_flash_msg("Xóa dữ liệu thành công", "success");
	}
	elseif($db->getLastError()){
		$page_error = $db->getLastError();
		$this->set_flash_msg($page_error, "danger");
	}

	return $this->redirect("student");
}
}