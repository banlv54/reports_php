<?php
  if (isset($_POST['first_number']) && isset($_POST['second_number'])){
    $sum = $_POST['first_number'] + $_POST['second_number'];
    echo "Sum of ".$_POST['first_number']." and ".$_POST['second_number']." is: ".$sum;
  }
  else {
?>
<form name="sum_form" action="sum.php" method="POST">
  Please enter two number:<br/>
  First number:  <input name="first_number" type="number"><br/>
  Second number: <input name="second_number" type="number"><br/>
  <input name="cmd" type="submit" value="OK">
</form>
<?php
  }
?>
