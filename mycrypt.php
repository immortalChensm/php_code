<?php
	//print_r(mcrypt_list_algorithms());
	
	//print_r(mcrypt_list_modes());
	
	$cipher = MCRYPT_RIJNDAEL_128;
	$mode   = MCRYPT_MODE_ECB;
	$key    = "12345646236523getwetewtwetwe1234";
	$data   = "hello,world";
	$iv = mcrypt_create_iv(mcrypt_get_iv_size($cipher, $mode),MCRYPT_RAND);
	
	$encrypt = mcrypt_encrypt($cipher, $key, $data, $mode,$iv);
	
	
	$decrypt = mcrypt_decrypt($cipher, $key, $encrypt, $mode,$iv);
	
	echo $encrypt;
	echo "<br />";
	echo $decrypt;
?>