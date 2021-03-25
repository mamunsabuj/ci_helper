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


if ( ! function_exists('remove_space')){
    function remove_space($str, $limit = false) {
        if ($limit) {
            $str = mb_substr($str, 0, $limit, "utf-8");
        }
        $text = html_entity_decode($str, ENT_QUOTES, 'UTF-8');
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        // trim
        $text = trim($text, '-');
        return $text;
    }
}
if ( ! function_exists('get_unspace_text'))
{
    function get_unspace_text($var = '')    {
       $string = str_replace(' ','_', $var);
        return preg_replace('/[^A-Za-z0-9\_]/', '', $string);
    }
}

if ( ! function_exists('remove_hyphen'))
{
    function remove_hyphen($var = '')    {
     return  $string = str_replace('-',' ', $var);
    }
}

//remove special character
function clean($string) {
    return preg_replace('/[^A-Za-z0-9\-\ ]/', '', $string); // Removes special chars.
}

//This function is used to Generate Key
    function generator($lenth)
    {
        $number=array("A","B","C","D","E","F","G","H","I","J","K","L","N","M","O","P","Q","R","S","U","V","T","W","X","Y","Z","1","2","3","4","5","6","7","8","9","0");
    
        for($i=0; $i<$lenth; $i++)
        {
            $rand_value=rand(0,34);
            $rand_number=$number["$rand_value"];
        
            if(empty($con))
            { 
            $con=$rand_number;
            }
            else
            {
            $con="$con"."$rand_number";}
        }
        return $con;
    }
   // Check server alive or not
if ( ! function_exists('serverAliveOrNot')){

    function serverAliveOrNot($host = '', $port = 80){
        if(empty($host)){
            $host = base_url();
        }
        $socket = fsockopen($host, $port, $errno, $errstr, 15);
          if(!$socket)
          {
            return false;
          }
          else
          {
            return true;
          }
    }
}

// check module enabled or not 
if ( ! function_exists('check_module_status')){
    function check_module_status($module){
       $CI =& get_instance();
       $result = $CI->db->where('directory',$module)->where('status',1)->get('module')->num_rows();
       if($result>0){
        return TRUE;
       }else{
        return FALSE;
       }
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
