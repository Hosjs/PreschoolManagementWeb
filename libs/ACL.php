<?php
/**
 * Page Access Control
 * @category  RBAC Helper
 */
defined('ROOT') or exit('No direct script access allowed');
class ACL
{
	

	/**
	 * Array of user roles and page access 
	 * Use "*" to grant all access right to particular user role
	 * @var array
	 */
<<<<<<< HEAD
	public static $role_pages = array(
			'admin' =>
						array(
=======
	public static $role_pages = array( 	
			'admin' =>
					array(
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
							'users' => array('list','view','userregister','accountedit','accountview','add','edit', 'editfield','delete','import_data'),
							'student' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'announcement' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'subject' => array('list','view','add','edit', 'editfield','delete','import_data','register'),
							'class_detail' => array('list','attendance_yes','attendance_no','mark_attendance'),
							'event' => array('list','view','add','edit', 'editfield','delete','import_data','register'),
							'class' => array('list','view','add','edit', 'editfield','delete','import_data','register'),
							'health_care' => array('list','view','add','edit','editfield','delete','import_data','view_chart'),
							'how_to_make_payment' => array('list','view'),
							'meal' => array('list','view','add','edit','editfield','delete','import_data'),
							'assignment' => array('list','view','add','edit','editfield','delete','import_data'),
							//'message' => array('list','view','add','edit', 'editfield','delete','import_data','group'),
							//'bill' => array('list','view','add','edit','editfield','delete','import_data'),
						),
			'headteacher' =>
						array(
							'users' => array('userregister','accountedit','accountview','import_data'),
							'student' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'announcement' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'subject' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'class_detail' => array('list','attendance_yes','attendance_no','mark_attendance'),
							'event' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'class' => array('list','view','add','edit', 'editfield','delete','import_data'),
<<<<<<< HEAD
							'health_care' => array('list','view','add','edit','editfield','delete','import_data','view_chart'),
							'how_to_make_payment' => array('list','view','add','edit','editfield','delete','import_data'),
							//'message' => array('list','view','add','edit', 'editfield','delete','import_data','group'),
=======
							'meal' => array('list','view','add'),
							'health_care' => array('list','view_chart','add','edit', 'editfield','delete','import_data'),
							'how_to_make_payment' => array('list','view','add','edit', 'editfield','delete'),
							'message' => array('list','view','add','edit', 'editfield','delete','import_data','group'),
						),
			'headteacher' =>
						array(
							'student' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'announcement' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'subject' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'class_detail' => array('list','attendance_yes','attendance_no','mark_attendance'),
							'assignment' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'event' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'meal' => array('list','view','add'),
 							'health_care' => array('list','view_chart','add','edit', 'editfield','delete','import_data'),
							'how_to_make_payment' => array('list','view','add','edit', 'editfield','delete'),
							'message' => array('list','view','add','edit', 'editfield','delete','import_data','group'),
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
						),
			'parents' =>
						array(
							'announcement' => array('list','view'),
							'subject' => array('list','view'),
							'student' => array('list','view'),
							'class_detail' => array('list','view'),
							'assignment' => array('list','view'),
							'event' => array('list','view','register','confirm_register'),
							'class' => array('list','view','register'),
							'health_care' => array('list','view','chart'),
							'meal' => array('list','view'),
							'how_to_make_payment' => array('list','view'),
							//'message' => array('list','view','add','edit', 'editfield','delete','import_data','group'),
						),
			'accountant' =>
						array(
							'announcement' => array('list','view'),
							'subject' => array('list','view'),
							'class_detail' => array('list','view'),
							'event' => array('list','view'),
<<<<<<< HEAD
							'class' => array('list','view'),
							'how_to_make_payment' => array('list','view','add','edit','editfield','delete','import_data'),
						),
			'kitchen_staff' =>
						array(
							'meal' => array('list','view','add','edit','editfield','delete','import_data'),
						),
=======
							'meal' => array('list','view','add'),
							'how_to_make_payment' => array('list','add'),
							'message' => array('list','view','add','edit', 'editfield','delete','import_data','group'),
							'health_care' => array('list','view')
						)
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
		);

	/**
	 * Current user role name
	 * @var string
	 */
	public static $user_role = null;

	/**
	 * pages to Exclude From Access Validation Check
	 * @var array
	 */
	public static $exclude_page_check = array("", "index", "home", "account", "info", "masterdetail");

	/**
	 * Init page properties
	 */
	public function __construct()
	{	
		if(!empty(USER_ROLE)){
			self::$user_role = USER_ROLE;
		}
	}

	/**
	 * Check page path against user role permissions
	 * if user has access return AUTHORIZED
	 * if user has NO access return UNAUTHORIZED
	 * if user has NO role return NO_ROLE
	 * @return string
	 */
	public static function GetPageAccess($path)
	{
		$rp = self::$role_pages;
		if ($rp == "*") {
			return AUTHORIZED; // Grant access to any user
		} else {
			$path = strtolower(trim($path, '/'));

			$arr_path = explode("/", $path);
			$page = strtolower($arr_path[0]);

			//If user is accessing excluded access contrl pages
			if (in_array($page, self::$exclude_page_check)) {
				return AUTHORIZED;
			}

			$user_role = strtolower(USER_ROLE); // Get user defined role from session value
			if (array_key_exists($user_role, $rp)) {
				$action = (!empty($arr_path[1]) ? $arr_path[1] : "list");
				if ($action == "index") {
					$action = "list";
				}
				//Check if user have access to all pages or user have access to all page actions
				if ($rp[$user_role] == "*" || (!empty($rp[$user_role][$page]) && $rp[$user_role][$page] == "*")) {
					return AUTHORIZED;
				} else {
					if (!empty($rp[$user_role][$page]) && in_array($action, $rp[$user_role][$page])) {
						return AUTHORIZED;
					}
				}
				return FORBIDDEN;
			} else {
				return NOROLE;
			}
		}
	}

	/**
	 * Check if user role has access to a page
	 * @return Bool
	 */
	public static function is_allowed($path)
	{
		return (self::GetPageAccess($path) == AUTHORIZED);
	}

}