<?php
	if(!$file = fopen("blog.txt","a+")){    
		echo ("could not open file"); 
	}else{    
		echo fgets($file)."<br>".fgets($file);
		fputs($file, "\nCong ty Framgia");
		fclose($file);
	}	
?>