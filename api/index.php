<?php
	$mysql_host = ""; //Withheld
	$mysql_database = ""; //Withheld
	$mysql_user = ""; //Withheld
	$mysql_password = ""; //Withheld

	//conection
	$link=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database) or die("Error " . mysqli_error($link));

	$request=escape_get_post($link,"request");
	$json = safe_get_post("json");
	$access_id = escape_get_post($link, "access_id");
	$delete_code = escape_get_post($link, "delete_code");
	//echo $json;
	if(string_empty($request)){
		end_func("Empty request");
	}

	if($request=='ADD_DATA'){
		$return = array('error'=>'','data'=>[]);
		array_push($return['data'],add_data_header($link));

		$id = $return['data'][0]['id'];
		add_data($link, $id, $json);
		echo json_encode($return);
	}

	if($request == 'LOAD_DATA') {
		$return = array('error'=>'', 'data'=>[]);
		$header_data = load_header_data($link, escape_get_post($link, "access_id"));
		$id = $header_data[0]['id'];
		$data = load_data($link, $id);
		array_push($return['data'],$data);
		if($return == []) {
			end_func("Invalid access_id");
		}
		echo json_encode($return);
	}

	if($request == 'DELETE_DATA') {
		$return = array('error'=>'', 'data'=>[]);
		$header_data = load_header_data($link, escape_get_post($link, "access_id"));
		$id = $header_data[0]['id'];
		delete_header_data($link, $delete_code);
		delete_data($link, $id);
		if(($header_data == []) || (load_header_for_deletion($link, $delete_code) == [])) {
			end_func("Invalid access_id or delete_code");
		}

	}

	if($request == 'UPDATE_DATA') {
		$return = array('error'=>'', 'data'=>[]);
		$header_data = load_header_data($link, escape_get_post($link, "access_id"));
		$id = $header_data[0]['id'];
		delete_data($link, $id);
		array_push($return['data'], $header_data);
		echo json_encode($return);
	}

	function load_header_for_deletion($link, $delete_code){
		$sql = "SELECT * FROM `impact`.`header_data` WHERE `delete_code` LIKE '$delete_code'";
		$result = $link->query($sql);
		$return = [];
		while($row=mysqli_fetch_assoc($result)) {
			array_push($return, $row);
		}
		return $result;
	}

	#Working :D
	function add_data_header($link){
		$access_id=gen_uuid();
		$delete_code = gen_uuid();
		$sql="INSERT INTO `impact`.`header_data` (`id`, `access_id`, `delete_code`, `created`) VALUES (NULL, '".$access_id."', '".$delete_code."', CURRENT_TIMESTAMP)";
		$result = $link->query($sql);
		return array("id"=>mysqli_insert_id($link), "access_id"=>$access_id, "delete_code"=>$delete_code);
	}

	#Working :D
	function load_header_data($link, $access_id) {
		$sql = "SELECT * FROM `impact`.`header_data` WHERE `access_id` LIKE '$access_id'";
		$result =  $link->query($sql);
		$return=[];
		while($row=mysqli_fetch_assoc($result)){
			array_push($return,$row);
		}
		return $return;
	}

	#Working :D
	function delete_header_data($link, $delete_id) {
		$sql = "DELETE FROM `impact`.`header_data` WHERE `delete_code` LIKE '$delete_id'";
		$link->query($sql);
	}


	function delete_data($link, $header_id) {
		$sql = "DELETE FROM `impact`.`header_data` WHERE `header_id` = $header_id";
		$link->query($sql);
	}

	#Working :D
	function load_data($link, $header_id) {
		$sql = "SELECT * FROM `impact`.`data` WHERE `header_id` = $header_id";
		$result = $link->query($sql);
		$return=[];
		$show = true;
		while($row=mysqli_fetch_assoc($result)){
			$row["show"] = true;
			array_push($return, $row);
		}

		return $return;
	}

	#Working :D
	function add_data($link, $header_id, $json) {
		$decoded = json_decode($json);
		$sql = "INSERT INTO `impact`.`data` (`id`, `header_id`, `unique_id`, `category`, `model`, `brand`, `rating`, `power`, `time`) VALUES";
		for($i = 0; $i < sizeof($decoded); $i++) {
			$dec_array=objectToArray($decoded[$i]);
			//print_r($dec_array);
			if($header_id == NULL) {
				$header_id = 0;
			}
			$sql .= " (NULL, ".int_empty($header_id).", '".$dec_array['id']."', '".$dec_array['category']."', '".$dec_array['model']."', '".$dec_array['brand']."', ".int_empty($dec_array['rating']).", ".int_empty($dec_array['power']).", ".int_empty($dec_array['time']).")";
			if(($i+1)<sizeof($decoded)){
				$sql .=",";
			}
		}
		//echo $sql;
		$link->query($sql) or die(mysqli_error($link));
	}

	function string_empty($string){
		if($string==""){
			return true;
		}
		return false;
	}

	function int_empty($int) {
		if($int == null) {
			return 0;
		}else {
			return $int;
		}
	}

	function end_func($error=""){
		echo("{'error':'".$error."','data':[]}");
		die();
	}
	function get_post($var){
		if(isset($_POST[$var])){
			return $_POST[$var];
		}else if(isset($_GET[$var])){
			return $_GET[$var];
		}
		return null;
	}


	function safe_get_post($var){
		$gp=get_post($var);
		$return="";
		if(isset($gp)){
			$return=$gp;
		}
		return $return;
	}

	function escape_get_post($link, $var){
		return mysqli_real_escape_string($link,strip_tags(safe_get_post($var)));
	}

	function gen_uuid() {
	    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
	        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
	        mt_rand( 0, 0xffff ),
	        mt_rand( 0, 0x0fff ) | 0x4000,
	        mt_rand( 0, 0x3fff ) | 0x8000,
	        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
	    );
	}

	function objectToArray($d) {
    if (is_object($d)) {
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        return array_map(__FUNCTION__, $d);
    }
    else {
        // Return array
        return $d;
    }
	}
?>
