<?php
//Function for get one
function get_one($query) {
	$result = mysql_query($query);
	if (!$result) {
		echo 'Could not run query: ' . mysql_error();
		exit;
	}else{
		$key = mysql_fetch_array($result);
	}
	return $key;
}

//Function for get all
function get_all($query) {
	$result = mysql_query($query);
	if(!$result){
		echo 'Could not run query: ' . mysql_error();
		exit;
	}else{
		while($value=mysql_fetch_array($result)) {
			$key[] = $value;
		}
	}
	return $key;
}

//Function for count num rows
function count_rows($query){
	$count_num = mysql_num_rows(mysql_query($query));
	return $count_num;
}

//Function Insert and Update
function insert_update($table,$fields,$id=NULL)
{
    if($id===NULL)
    {
        $sql="INSERT INTO $table (id) VALUES(NULL);UPDATE $table SET $fields WHERE id = LAST_INSERT_ID()";
    }else{
        $sql="UPDATE $table SET $fields WHERE id = $id";
    }
    return $sql;
}

//Function Get Full URL 
function get_full_url($ssl = FALSE){
	if($ssl === FALSE){
		$http = 'http://';
	}
	elseif($ssl === TRUE){
		$http = 'https://';
	}
	$full_url = $http . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	return $full_url;
}
?>