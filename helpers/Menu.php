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
			'icon' => '<i class="material-icons mi-md">dashboard</i>'
		),
		array(
			'path' => 'Message', 
			'label' => 'Tin nhắn', 
			'icon' => '<i class="material-icons mi-md">message</i>'
		),
		
		array(
			'path' => 'users', 
			'label' => 'Users', 
			'icon' => '<i class="material-icons mi-md">verified_user</i>'
		),

		array(
			'path' => 'student', 
			'label' => 'Học sinh', 
			'icon' => '<i class="material-icons mi-md">face</i>'
		),
		
		array(
			'path' => 'announcement', 
			'label' => 'Thông báo', 
			'icon' => '<i class="material-icons mi-md">notifications</i>'
		),
		
		array(
			'path' => 'subject', 
			'label' => 'Các môn học', 
			'icon' => '<i class="material-icons mi-md">share</i>'
		),
		
		array(
			'path' => 'class_detail', 
			'label' => 'Chi tiết lớp', 
			'icon' => '<i class="material-icons mi-md">archive</i>'
		),
		
		array(
			'path' => 'assignment', 
			'label' => 'Bài tập', 
			'icon' => '<i class="material-icons mi-md">trending_down</i>'
		),
		
		array(
			'path' => 'event', 
			'label' => 'Sự kiện', 
			'icon' => '<i class="material-icons mi-md">event_note</i>'
		),
		
		array(
			'path' => 'class', 
			'label' => 'Thông tin lớp', 
			'icon' => '<i class="material-icons mi-md">assignment_ind</i>'
		),
		array(
			'path' => 'meal', 
			'label' => 'Thực đơn', 
			'icon' => '<i class="material-icons mi-md">restaurant_menu</i>'
		),
		array(
			'path' => 'health_care', 
			'label' => 'Theo dõi sức khỏe', 
			'icon' => '<i class="material-icons mi-md">assignment_turned_in</i>'
		),
		array(
			'path' => 'rollcall', 
			'label' => 'Điểm danh', 
			'icon' => '<i class="material-icons mi-md">call_merge</i>'
		),
		array(
			'path' => 'bill', 
			'label' => 'Hóa đơn', 
			'icon' => '<i class="material-icons mi-md">attach_money</i>'
		),
		array(
			'path' => 'how_to_make_payment', 
			'label' => 'Cách thức thành toán', 
		),);
			public static $role = array(
		array(
			"value" => "admin", 
			"label" => "Admin", 
		),
		array(
			"value" => "headteacher", 
			"label" => "Giáo viên", 
		),
		array(
			"value" => "parents", 
			"label" => "Phụ huynh", 
		),
		array(
			"value" => "accountant", 
			"label" => "Kế toán", 
		),
		array(
			"value" => "kitchen_staff", 
			"label" => "Nhân viên bếp ăn", 
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
			"value" => "Lớp 1A1", 
			"label" => "Lớp 1A1", 
		),
		array(
			"value" => "Lớp 2A1", 
			"label" => "Lớp 2A1", 
		),
		array(
			"value" => "Lớp 3A1", 
			"label" => "Lớp 3A1", 
		),
		array(
			"value" => "Lớp 4A1", 
			"label" => "Lớp 4A1", 
		),
		array(
			"value" => "Lớp 5A1", 
			"label" => "Lớp 5A1", 
		),);
		
			public static $gender = array(
		array(
			"value" => "Nam", 
			"label" => "Nam", 
		),
		array(
			"value" => "Nữ", 
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
			"value" => "Lớp 1A1", 
			"label" => "Lớp 1A1", 
		),
		array(
			"value" => "Lớp 2A1", 
			"label" => "Lớp 2A1", 
		),
		array(
			"value" => "Lớp 3A1", 
			"label" => "Lớp 3A1", 
		),
		array(
			"value" => "Lớp 4A1", 
			"label" => "Lớp 4A1", 
		),
		array(
			"value" => "Lớp 5A1", 
			"label" => "Lớp 5A1", 
		),
		);
		
			public static $assignment_type = array(
		array(
			"value" => "Bài tập ngày lễ", 
			"label" => "Bài tập ngày lễ", 
		),
		array(
			"value" => "Bài tập cuối tuần", 
			"label" => "Bài tập cuối tuần", 
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
			public static $terms = array(
		array(
			"value" => "Tất cả học sinh", 
			"label" => "Tất cả học sinh", 
		),
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
		array(
			"value" => "Lớp 5 tuổi",
			"label" => "Lớp 5 tuổi",
		),);
			public static $age = array(
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
		array(
			"value" => "Lớp 5 tuổi",
			"label" => "Lớp 5 tuổi",
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
			"value" => "visa", 
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