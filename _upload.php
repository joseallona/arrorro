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
	
	
	// where ffmpeg is located, such as /usr/sbin/ffmpeg
	$ffmpeg = '/usr/bin/ffmpeg';
	
	// the input video file
	$video  = $targetFile;
	
	// where you'll save the image
	$image  = $rootPath . $_GET['folder'] . '/demo.jpg';
	
	// default time to get the image
	$second = 1;
	
	// get the duration and a random place within that
	$cmd = "$ffmpeg -i $video 2>&1";
	if (preg_match('/Duration: ((\d+):(\d+):(\d+))/s', `$cmd`, $time)) {
		$total = ($time[2] * 3600) + ($time[3] * 60) + $time[4];
		$second = rand(1, ($total - 1));
	}
	
	// get the screenshot
	$cmd = "$ffmpeg -i $video -deinterlace -an -ss $second -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $image 2>&1";
	$return = `$cmd`;
	
	// done! <img src="http://blog.amnuts.com/wp-includes/images/smilies/icon_wink.gif" alt=";-)" class="wp-smiley">
	echo '1';

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
	
	$video  = $targetPath.'mariela1.mov';
	
	$mov = new ffmpeg_movie($video);
	$img = $targetPath.'mariela1.jpg';

	$ff_frame = $mov->getFrame(25); // Fix tirar error si grabo menos de un seg
	if ($ff_frame) {
		$ff_frame->resize(68,50);
		$gd_image = $ff_frame->toGDImage();
		if ($gd_image) {
			imagejpeg($gd_image, $img);
			imagedestroy($gd_image);
		}
		
	}

	echo $ff_frame;
	}

?>