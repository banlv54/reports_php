<?php

function data_ninit () {
	$connect = mysql_connect ('localhost', 'root', 'levanban');
	mysql_select_db ('db_reports', $connect);
	mysql_query ('CREATE TABLE IF NOT EXISTS framgia_members( id VARCHAR (10), name VARCHAR(255), join_date DATE, primary key (id) )');
}

function add_row ($ma, $ten, $join_date='') {
	mysql_query ("insert into framgia_members (id, name, join_date) values ('$ma', '$ten', '$join_date')");
}

function update_row ($key, $ma, $ten, $join_date='') {
	mysql_query ("update framgia_members set id='$ma', name='$ten', join_date = $join_date where id='$key' ");
}

function delete_row ($key) {
	mysql_query ("delete from framgia_members where id='$key'");
}

function read_one ($key) {
	return mysql_query ("select * from framgia_members where id = '$key'");
}

function read_some ($ma='', $ten='', $join_date='') {
	return mysql_query ("select * from framgia_members where id like '%$ma%' and name like '%$ten%' and join_date like '%$join_date%'");
}


?>