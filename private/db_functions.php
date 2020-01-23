<?php
	require_once('db_credentials.php');

	function db_connect() {
		$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		if(mysqli_connect_errno()){ //tests for error else returns connection
			$msg = "Database connection failed: ";
			$msg .= mysqli_connect_error();
			$msg .= " Error code: ";
			$msg .= mysqli_connect_errno();
			exit($msg);

		}
		return $connection;
	}

	function db_disconnect($conn){
		mysqli_close($conn);
	}

	function join_tables(){
  	$sql = "SELECT a.asset_id,s.menu_name ";
  	$sql .= "FROM assets AS a JOIN subjects s ON ";
  	$sql .= "a.asset_id = s.asset_id";
  	return $sql;
  }
  function pop_array($result){
  	$count = mysqli_num_rows($result);
  	$subj_arr = [];
  	while($subj = mysqli_fetch_assoc($result)) { 
  		array_push($subj_arr,$subj['menu_name']);
  	}
  	return $subj_arr;		
  }

  function show_subj($id){
  	$sql = "SELECT * from subjects ";
  	$sql .= "WHERE subject_id= ".$id;
  	return $sql;
  }
  function new_subject($name,$position,$visible,$content,$assetid){
  	$sql = "INSERT INTO subjects ";
  	$sql .= "(menu_name,position,visible,content,asset_id) ";
  	$sql .= "VALUES ";
  	$sql .= "(";
  	$sql .= "'".$name."'".",";
  	$sql .= "'".$position."'".",";
  	$sql .= "'".$visible."'".",";
  	$sql .= "'".$content."'".",";
  	$sql .= "'".$assetid."'".")";
  	return $sql;
  }
  function return_assoc_SELECT($id,$conn){
  	$query = show_subj($id); // used for mysqli_query
  	$result = mysqli_query($conn,$query);
  	$assoc = mysqli_fetch_assoc($result);
  	return $assoc;
  }
  function update_subj($conn,$name,$position,$visible,$content,$id){
  	$sql = "UPDATE subjects SET ";
  	$sql .= "menu_name='".$name."', ";
  	$sql .= "position='".$position."', ";
  	$sql .= "visible='".$visible."', ";
  	$sql .= "content='".$content."' ";
  	$sql .= "WHERE subject_id={$id} ";
  	$sql .= "LIMIT 1";
  	mysqli_query($conn,$sql);
  }
?>