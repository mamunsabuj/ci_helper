<?php 

/**
 *Custom Debug function
 *
 **/
if(!function_exists('d')){

	function d($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
}

/**
 *Custom Debug and Die function
 *
 **/
if(!function_exists('dd')){

	function dd($data)
	{
		d($data);
		die();
	}
}

/**
 *Check last query in codeigniter
 *
 **/

if(!function_exists('dt')){

	function dt()
	{
		$CI =& get_instance();
		$rr = $CI->db->last_query();
		dd($rr);
	}
}


/**
 * Get amount 
 *
 **/
if (!function_exists("get_amount")) {
	function get_amount ($amount)
	{
		$result = number_format($amount, 2 ,'.','');

		return $result;
        
	}
}

/**
 * Get Round amount 
 *
 **/
if (!function_exists("get_round_amount")) {
	function get_round_amount ($amount)
	{
		$result = round($amount, 2 ,'.','');

		return $result;
        
	}
}

/**
 * Get Round amount 
 *
 **/
if (!function_exists("get_ceil_amount")) {
	function get_ceil_amount ($amount)
	{
		$result = ceil($amount);

		return $result;
        
	}
}



/**
 * make checked value
 *
 **/
if(!function_exists('makeChecked')){

	function makeChecked($val)
	{
		switch ($val) {
			case '1':
				return 'checked';
				break;
			
			default:
				return '';
				break;
		}
	}
}



/**
 * make dropdown selected value
 *
 **/
if(!function_exists('makeSelected')){

	function makeSelected($val1, $val2)
	{
		if ($val1 == $val2) {
			return "selected";
		} else {
			return "";
		}
	}
}



/**
 * Get active/inactive Status with Label 
 **/
if (!function_exists("getStatus")) {
	function getStatus ($status)
	{
		if ($status == 1) {
			return "<label class='label label-success'>Active</label>";
		} else {
			return "<label class='label label-danger'>Inactive</label>";
		}
	}
}

/**
 * Status showing format
 *
 **/
if(!function_exists('showStatus')){

	function showStatus($val)
	{
		switch ($val) {
			case '1':
				return display('yes');
				break;
			
			default:
				return display('no');
				break;
		}
	}
}


/**
 * Invoice Status
 **/
if (!function_exists("invoiceStatus")) {
	function invoiceStatus ($status)
	{
		if($status == 0) {
			return '<label class="label label-danger">Unpaid</label>';
	 	} else if($status == 1) {

	 		return '<label class="label label-success">Paid</label>';

        } else if($status == 2) {

        	return '<label class="label label-warning">Partial Paid</label>';

        } else if($status == 3) {
        	return '<label class="label label-danger">Cancelled</label>';
        } else {
            return '<label class="label label-danger">Expired</label>';
        }
        
	}
}

/**
 * Get Actions buttons
 **/
if (!function_exists("actionbtns")) {
	function actionbtns ($actionbtns = [], $id = false)
	{

		$output = "";

		if (in_array('view', $actionbtns))
		{
			$output .= '<a href="#" class="btn btn-info btn-sm viewbtn" data-item_id="'.$id.'"><span class="glyphicon glyphicon-search"></span></a> ';
		}

		if (in_array('edit', $actionbtns))
		{
			$output .= '<a href="#" class="btn btn-primary btn-sm editbtn"  data-item_id="'.$id.'"><span class="glyphicon glyphicon-edit"></span></a> ';
		}

		if (in_array('delete', $actionbtns))
		{
			$output .= '<button class="btn btn-danger btn-sm deletebtn"  data-item_id="'.$id.'"><span class="glyphicon glyphicon-trash"></span></a> ';
		}
		return $output;
	}
}

/**
 * Date showing format
 *
 **/
if(!function_exists('showDate')){

	function showDate($date)
	{
		return date("d-m-Y", strtotime($date));
	}
}

/**
 * Current Datetime
 **/
if (!function_exists("DateTime")) {
	function DateTime($format = false)
	{
		
		if (!empty($format)) {

			$date = date("$format");

		} else {
			$date = date("Y-m-d h:i:s");
		}
		
		return $date;
	}
}

// get clean string
if(!function_exists('clean')){

	function clean($string)
	{
		$signs = array(" ", ",", "'", "-");
		$string = str_replace($signs, '', strtolower($string)); // Replaces all spaces with nospace.
   		return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
}
