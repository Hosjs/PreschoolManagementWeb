<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbarsideleft = array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => '<i class="material-icons ">dashboard</i>'
		),
		array(
			'path' => 'Message', 
			'label' => 'Tin nhắn', 
			'icon' => '<i class="material-icons ">mail</i>'
		),
		
		array(
			'path' => 'users', 
			'label' => 'Users', 
			'icon' => '<i class="material-icons mi-xxs">verified_user</i>'
		),

		array(
			'path' => 'admission', 
			'label' => 'Học sinh', 
			'icon' => '<i class="material-icons mi-sm">airline_seat_recline_extra</i>'
		),
		
		array(
			'path' => 'announcement', 
			'label' => 'Thông báo', 
			'icon' => '<i class="material-icons mi-xs">rowing</i>'
		),
		
		array(
			'path' => 'feestracture', 
			'label' => 'Các môn học', 
			'icon' => '<i class="material-icons mi-md">attach_file</i>'
		),
		
		array(
			'path' => 'apply_for_admission', 
			'label' => 'Quản lý học sinh', 
			'icon' => '<i class="material-icons mi-md">touch_app</i>'
		),
		
		array(
			'path' => 'assignment', 
			'label' => 'Bài tập', 
			'icon' => '<i class="material-icons mi-md">arrow_drop_down_circle</i>'
		),
		
		array(
			'path' => 'event', 
			'label' => 'Sự kiện', 
			'icon' => '<i class="material-icons mi-md">beenhere</i>'
		),
		
		array(
			'path' => 'enrolment', 
			'label' => 'Thông tin lớp', 
			'icon' => '<i class="material-icons mi-md">bubble_chart</i>'
		),
		
		array(
			'path' => 'perfomance', 
			'label' => 'Thành tích', 
			'icon' => '<i class="material-icons mi-md">call_merge</i>'
		),
		array(
			'path' => 'rollcall', 
			'label' => 'Điểm danh', 
			'icon' => '<i class="material-icons mi-md">call_merge</i>'
		),
		array(
			'path' => 'how_to_make_payment', 
			'label' => 'Cách thức thành toán', 
			'icon' => '',
		),);
			public static $role = array(
		array(
			"value" => "headteacher", 
			"label" => "Giáo viên", 
		),
		array(
			"value" => "pupils", 
			"label" => "Học sinh", 
		),);
		
			public static $account_status = array(
		array(
			"value" => "Active", 
			"label" => "Active", 
		),
		array(
			"value" => "Pending", 
			"label" => "Pending", 
		),
		array(
			"value" => "Blocked", 
			"label" => "Blocked", 
		),);
		
			public static $class = array(
		array(
			"value" => "Lớp 1 tuổi", 
			"label" => "Lớp 1 tuổi", 
		),
		array(
			"value" => "Lớp 2 tuổi", 
			"label" => "Lớp 2 tuổi", 
		),
		array(
			"value" => "Lớp 3 tuổi", 
			"label" => "Lớp 3 tuổi", 
		),
		array(
			"value" => "Lớp 4 tuổi", 
			"label" => "Lớp 4 tuổi", 
		),
		);
		
			public static $gender = array(
		array(
			"value" => "Male", 
			"label" => "Nam", 
		),
		array(
			"value" => "Female", 
			"label" => "Nữ", 
		),);
		
			public static $special_need = array(
		array(
			"value" => "Không", 
			"label" => "Không", 
		),
		array(
			"value" => "Có", 
			"label" => "Có", 
		),);
		
			public static $bording = array(
		array(
			"value" => "yes", 
			"label" => "Yes", 
		),
		array(
			"value" => "no", 
			"label" => "No", 
		),);
		
			public static $author = array(
		array(
			"value" => "Giáo viên", 
			"label" => "Giáo viên", 
		),
		array(
			"value" => "Hiệu trưởng", 
			"label" => "Hiệu trưởng", 
		),);
		
			public static $class2 = array(
		array(
			"value" => "Lớp 1 tuổi", 
			"label" => "Lớp 1 tuổi", 
		),
		array(
			"value" => "Lớp 2 tuổi", 
			"label" => "Lớp 2 tuổi", 
		),
		array(
			"value" => "Lớp 3 tuổi", 
			"label" => "Lớp 3 tuổi", 
		),
		array(
			"value" => "Lớp 4 tuổi", 
			"label" => "Lớp 4 tuổi", 
		),
		);
		
			public static $assignment_type = array(
		array(
			"value" => "midterm", 
			"label" => "Midterm", 
		),
		array(
			"value" => "cat", 
			"label" => "Cat", 
		),
		array(
			"value" => "edterm", 
			"label" => "Edterm", 
		),
		array(
			"value" => "holyday assigment", 
			"label" => "Bài tập ngày lễ", 
		),
		array(
			"value" => "others", 
			"label" => "Khác", 
		),);
		
			public static $author2 = array(
		array(
			"value" => "Hiệu trưởng", 
			"label" => "Hiệu trưởng", 
		),
		array(
			"value" => "Giáo viên", 
			"label" => "Giáo viên", 
		),);
		
			public static $term = array(
		array(
			"value" => "Cần cố gắng", 
			"label" => "Cần cố gắng", 
		),
		array(
			"value" => "Đạt yêu cầu", 
			"label" => "Đạt yêu cầu", 
		),
		array(
			"value" => "Xuất sắc", 
			"label" => "Xuất sắc", 
		),);
		
			public static $comment = array(
		array(
			"value" => "improved", 
			"label" => "Tiến bộ", 
		),
		array(
			"value" => "can do better", 
			"label" => "Có thể tiến bộ", 
		),
		array(
			"value" => "fair", 
			"label" => "Khá", 
		),
		array(
			"value" => "good", 
			"label" => "Tốt", 
		),);
		
			public static $payment_method = array(
		array(
			"value" => "m-pesa", 
			"label" => "VISA", 
		),
		array(
			"value" => "bank", 
			"label" => "Chuyển khoản", 
		),
		array(
			"value" => "cash", 
			"label" => "Tiền mặt", 
		),);
		
}