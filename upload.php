<?php
// Uploadify v1.6.2
// Copyright (C) 2009 by Ronnie Garcia
// Co-developed by Travis Nickels
if (!empty($_FILES)) {
	$newName =$_GET['videoId'];
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$rootPath = substr($_SERVER['SCRIPT_FILENAME'],0, strrpos($_SERVER['SCRIPT_FILENAME'],$_SERVER['SCRIPT_NAME'])). '/';
	$targetPath = $rootPath . $_GET['folder'] . '/';

	$ext = substr($_FILES['Filedata']['name'], strrpos($_FILES['Filedata']['name'], '.') + 1);
	$targetFile =  str_replace('//','/',$targetPath) . $newName.'.'.$ext;
	
	// Uncomment the following line if you want to make the directory if it doesn't exist
	//mkdir(str_replace('//','/',$targetPath), 0755, true);	
	move_uploaded_file($tempFile,$targetFile);
	
	
	$ffmpeg = '/usr/bin/ffmpeg';
	
	$video  = $targetPath.$newName.'.'.$ext;
	
	$image  = $rootPath . '_thumbs/'.$newName.'.jpg';

	$second = 1;
	
	$cmd = "$ffmpeg -i $video 2>&1";
	if (preg_match('/Duration: ((\d+):(\d+):(\d+))/s', `$cmd`, $time)) {
		$total = ($time[2] * 3600) + ($time[3] * 60) + $time[4];
		$second = rand(1, ($total - 1));
	}
	
	$cmd = "$ffmpeg -i $video -deinterlace -an -ss $second -t 00:00:01 -r 1 -y -s 320x240 -vcodec mjpeg -f mjpeg $image 2>&1";
	$return = `$cmd`;
	
	//echo $video;

}else{
	//$newName ='jenny';
	//$tempFile = $_FILES['Filedata']['tmp_name'];
	//$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_GET['folder'] . '/';
	//$targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
	//$ext = substr($_FILES['Filedata']['name'], strrpos($_FILES['Filedata']['name'], '.') + 1);
	//$targetFile =  str_replace('//','/',$targetPath) . $newName.'.'.$ext;
	
	// Uncomment the following line if you want to make the directory if it doesn't exist
	//mkdir(str_replace('//','/',$targetPath), 0755, true);	
	//move_uploaded_file($tempFile,$targetFile);
	echo "<pre>";
	print_r($_SERVER);
	echo "</pre>";
	echo "<pre>";
	$rootPath = substr($_SERVER['SCRIPT_FILENAME'],0, strrpos($_SERVER['SCRIPT_FILENAME'],$_SERVER['SCRIPT_NAME'])). '/';
	echo $rootPath;
	echo "</pre>";


	$newName =$_GET['videoId'];
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$rootPath = substr($_SERVER['SCRIPT_FILENAME'],0, strrpos($_SERVER['SCRIPT_FILENAME'],$_SERVER['SCRIPT_NAME'])). '/';
	$targetPath = $rootPath . $_GET['folder'] . '/';

	$ext = substr($_FILES['Filedata']['name'], strrpos($_FILES['Filedata']['name'], '.') + 1);
	$targetFile =  str_replace('//','/',$targetPath) . $newName.'.'.$ext;
	
	// Uncomment the following line if you want to make the directory if it doesn't exist
	//mkdir(str_replace('//','/',$targetPath), 0755, true);	
	
	
	//move_uploaded_file($tempFile,$targetFile);
	
	
	$ffmpeg = '/usr/bin/ffmpeg';
	
	$video  = $targetPath.'mariela1.mov';
	
	$image  = $rootPath . $_GET['folder'] . '/mariela_thumb.jpg';

	$second = 1;
	
	$cmd = "$ffmpeg -i $video 2>&1";
	if (preg_match('/Duration: ((\d+):(\d+):(\d+))/s', `$cmd`, $time)) {
		$total = ($time[2] * 3600) + ($time[3] * 60) + $time[4];
		$second = rand(1, ($total - 1));
	}
	
	$cmd = "$ffmpeg -i $video -deinterlace -an -ss $second -t 00:00:01 -r 1 -y -s 320x240 -vcodec mjpeg -f mjpeg $image 2>&1";
	//$cmd = "ffmpeg -i foo.avi -r 1 -s WxH -f image2 foo-%03d.jpeg";
	$return = `$cmd`;
	
	echo $video;







	}

?>