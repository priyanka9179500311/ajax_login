<?php
	if($_GET['action'] =='login'){
		//echo 'login block';
		//Recive data
		
		//1. Always filter the incomming data
		
		$email = filter_var($_GET['eml'], FILTER_SANITIZE_EMAIL);
		$password = md5(filter_var($_GET['pwd'], FILTER_SANITIZE_STRING));
		
		//message digest 5 is a one way hasing algoritham 32 chracters
		//SHA1 secure hash algorith 40 characters
		
		//1.DB connection open
		$con = mysqli_connect('localhost','root','','ajax_db') or die ('could not connect');
		
		//2. build the query
		sql = "SELECT * FROM users_tbl WHERE email='$email' AND password='$password'";
		
		//3. Execute the query
		$result = mysqli_query($con,$sql);
		
		//4. Display the result
		$nor = mysqli_num_rows($result);
		/* if(nor == 0){
			echo 'invalid';
		
		}else{
			echo 'valid';
		}*/
		echo ($nor == 0) ?'invalid':'valid';
		
		//5. DB connection close
		mysqli_close($con);
	}
	if($_GET['action'] == 'registration'){
		echo 'registration block';
	}
	

?>