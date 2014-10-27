<?php
	include ('data_lib.php');

	data_ninit ();
	
	if (isset ($_POST['cmd']) ){
		switch ($_POST['cmd']) {
			case 'Nhập':
				if (isset ($_POST['name']) && isset ($_POST['id']) ) {
					if (isset ($_POST['rb'])) {   // nhập sửa
						update_row ( $_POST['rb'], $_POST['id'], $_POST['name'], $_POST['join_date'] );
						$_POST['rb'] = $_POST['id'] = $_POST['name'] = $_POST['join_date'] = '';
					} else {  // nhập mới
						add_row ( $_POST['id'], $_POST['name'], $_POST['join_date'] );
					}
				}
				$kq = read_some();
				break;
			case 'Xóa':
				if (isset ($_POST['cb'])) {
					foreach ( $_POST['cb'] as $key => $val) {
						delete_row ( $key );
					}
				}
				$kq = read_some();
				break;
			case 'Tìm':
				$kq = read_some ($_POST['id'], $_POST['name'], $_POST['join_date']);
				break;
		}
	} else {
		if (isset ($_POST['rb'])) {
			$kq = read_one ($_POST['rb']);
			$row = mysql_fetch_array ($kq);
			$_POST['id'] = 	$row ['id'];
			$_POST['name'] = 	$row ['name'];
			$_POST['join_date'] = 	$row ['join_date'];
		}
		$kq = read_some();
	}
?>
<form method='post' action='list_member.php' style='font-family: Verdana; font-size: 15pt'>
<h2>Quản lý danh sách môn học</h2> <hr />
<table width='100%' border='0' cellspacing='0' style='font-family: Verdana; font-size: 15pt'>
<tr>
	<td width='30%'>Tên:</td>
	<td><input type='text' name='name' value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" size='40' maxlength='64' style='font-family: Verdana; font-size: 15pt'/></td>
</tr>
<tr>
	<td>ID:</td>
	<td><input type='text' name='id' value="<?php  echo isset($_POST['id']) ? $_POST['id'] : ''; ?>" maxlength='15' style='font-family: Verdana; font-size: 15pt'/></td>
</tr>
<tr>
	<td>Ngày vào:</td>
	<td><input type='text' name='join_date' value="<?php  echo isset($_POST['join_date']) ? $_POST['join_date'] : ''; ?>" maxlength='14' style='font-family: Verdana; font-size: 15pt'/></td>
</tr>

<tr>
	<td colspan='2'><input type='submit' name='cmd' value='Nhập' style='font-family: Verdana; font-size: 15pt' /> <input type='submit' name='cmd' value='Xóa' style='font-family: Verdana; font-size: 15pt' /> <input type='submit' name='cmd' value='Tìm' style='font-family: Verdana; font-size: 15pt' /></td>
</tr>
<?php
	echo '<table width="100%" border="1" cellspacing="0" cellpadding="1" style="font-family: Verdana; font-size: 15pt">';
	echo '<tr align="center"><td width="10%">Stt</td><td width="3%">&nbsp;</td><td width="3%">&nbsp;</td><td width="20%">ID</td><td width="46%">Tên nhân viên</td><td width="46%">Ngày vào</td></tr>';
	$stt = 1;
	while ($r = mysql_fetch_array ($kq)) { 
		echo '<tr>';
		echo '<td>'. $stt++ . '</td>';
		echo '<td><input type="checkbox" name="cb[' . $r['id'] . ']" value="1" /></td>'; 
		echo '<td><input type="radio" name="rb" value="' . $r['id'] . '" onClick="submit()"' . (isset($_POST['rb']) ? ($_POST['rb']==$r['id'] ? ' checked ' : '') : '') . '/></td>';
		echo '<td>' . $r ['id'] . '</td>';
		echo '<td>'. $r ['name'] . '</td>' ;
		echo '<td>'. $r ['join_date'] . '</td>' ;
		echo '</tr>';
	}
	echo '</table>';
?>
</form>




