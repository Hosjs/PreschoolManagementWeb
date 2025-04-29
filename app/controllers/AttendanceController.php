<?php
/**
 * Attendance Page Controller
 * @category  Controller
 */
class AttendanceController extends SecureController
{
    function __construct()
    {
        parent::__construct();
        $this->tablename = "attendance";
    }

    /**
     * Ghi nhận điểm danh cho học sinh
     * Route: /attendance/mark
     */
    function mark()
    {
        $request = $this->request;
        $db = $this->GetModel();

        $student_id = $request->student_id ?? null;
        $status = $request->status ?? null;
        $today = date('Y-m-d');

        if (!$student_id || !$status) {
            $this->set_flash_msg("Thiếu thông tin điểm danh", "danger");
            return $this->redirect("class_detail");
        }

        // Lấy lớp học từ bảng student
        $student = $db->where("id", $student_id)->getOne("student", ["class"]);
        if (!$student) {
            $this->set_flash_msg("Không tìm thấy học sinh", "danger");
            return $this->redirect("class_detail");
        }

        // Kiểm tra xem học sinh đã điểm danh hôm nay chưa
        $db->where("student_id", $student_id);
        $db->where("date", $today);
        $existing = $db->getOne("attendance");

        if ($existing) {
            // Nếu đã điểm danh → cập nhật lại
            $db->where("id", $existing['id']);
            $success = $db->update("attendance", [
                "status" => $status,
                "class" => $student['class']
            ]);

            if ($success) {
                $this->set_flash_msg("Cập nhật điểm danh thành công", "success");
            } else {
                $this->set_flash_msg("Lỗi khi cập nhật điểm danh", "danger");
            }
        } else {
            // Nếu chưa điểm danh → thêm mới
            $success = $db->insert("attendance", [
                "student_id" => $student_id,
                "class" => $student['class'],
                "status" => $status,
                "date" => $today
            ]);

            if ($success) {
                $this->set_flash_msg("Điểm danh thành công", "success");
            } else {
                $this->set_flash_msg("Lỗi khi lưu điểm danh", "danger");
            }
        }

        return $this->redirect("class_detail");
    }

    /**
     * Hiển thị danh sách điểm danh
     * Route: /attendance
     */
    function index($fieldname = null, $fieldvalue = null)
    {
        $request = $this->request;
        $db = $this->GetModel();
        $fields = array("id", "student_id", "class", "status", "date");
        $pagination = $this->get_pagination(MAX_RECORD_COUNT);

        if (!empty($request->search)) {
            $text = trim($request->search);
            $search_condition = "(
                student_id LIKE ? OR 
                class LIKE ? OR 
                status LIKE ? OR 
                date LIKE ?
            )";
            $search_params = array_fill(0, 4, "%$text%");
            $db->where($search_condition, $search_params);
            $this->view->search_template = "attendance/search.php";
        }

        if (!empty($request->orderby)) {
            $orderby = $request->orderby;
            $ordertype = $request->ordertype ?? ORDER_TYPE;
            $db->orderBy($orderby, $ordertype);
        } else {
            $db->orderBy("date", "DESC");
        }

        if ($fieldname) {
            $db->where($fieldname, $fieldvalue);
        }

        $tc = $db->withTotalCount();
        $records = $db->get("attendance", $pagination, $fields);
        $data = new stdClass;
        $data->records = $records;
        $data->record_count = count($records);
        $data->total_records = $tc->totalCount;
        $data->total_page = ceil($tc->totalCount / $pagination[1]);

        $this->view->page_title = "Danh sách điểm danh";
        $this->view->report_title = "Báo cáo điểm danh";
        $this->view->report_filename = "Attendance_" . date("Y-m-d");
        $this->view->report_layout = "report_layout.php";
        $this->view->report_paper_size = "A4";
        $this->view->report_orientation = "portrait";

        $this->render_view("attendance/list.php", $data);
    }
}
