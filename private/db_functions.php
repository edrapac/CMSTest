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
?>