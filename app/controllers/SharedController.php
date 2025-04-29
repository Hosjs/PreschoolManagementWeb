<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * users_email_value_exist Model Action
     * @return array
     */
	function users_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("users");
		return $exist;
	}

	/**
     * users_username_value_exist Model Action
     * @return array
     */
	function users_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("users");
		return $exist;
	}

	/**
     * getcount_users Model Action
     * @return Value
     */
	function getcount_users(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM users";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_student Model Action
     * @return Value
     */
	function getcount_student(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM student";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_announcement Model Action
     * @return Value
     */
	function getcount_announcement(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM announcement";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_feestructure Model Action
     * @return Value
     */
	function getcount_feestructure(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM subject";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_applyforstudent Model Action
     * @return Value
     */
	function getcount_applyforstudent(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM class_detail";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_event Model Action
     * @return Value
     */
	function getcount_event(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM event";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_assignment Model Action
     * @return Value
     */
	function getcount_assignment(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM assignment";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_enrollment Model Action
     * @return Value
     */
	function getcount_enrollment(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM class";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_howtomakepayment Model Action
     * @return Value
     */
	function getcount_howtomakepayment(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM how_to_make_payment";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_health_care Model Action
     * @return Value
     */
	function getcount_health_care(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM health_care";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

}
