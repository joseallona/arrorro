<?PHP

require("func.php");
//include 'resize.image.class.php';

$file_name = basename( $_FILES[ 'Filedata' ][ 'name' ]);
$fileArray = explode(".", $file_name);
$unicId = $fileArray[0];
$bigPic = "b";


//$dir_path = "./thumbs/".$unicId;
//mkdir($dir_path, 0700);
//$big_dir_path = $dir_path."/b"; 
//mkdir($big_dir_path, 0700);
//$small_dir_path = $dir_path."/s/";
//mkdir($small_dir_path, 0700);

$big_last_path = "_thumbs/".basename( $_FILES[ 'Filedata' ][ 'name' ] );

if ( move_uploaded_file( $_FILES[ 'Filedata' ][ 'tmp_name' ], $big_last_path ) ){
//	$image = new Resize_Image;
//	$image->new_width = 30;
//	$image->new_height = 30;
//	$image->image_to_resize = $big_last_path;
//	$image->ratio = true; 
//	$image->new_image_name = $unicId;
//	$image->save_folder = $small_dir_path;
//	$process = $image->resize();
//	if($process['result'] && $image->save_folder){
		 //$consulta=mysql_query("INSERT INTO items (id, uid, date) VALUES ('', '$unicId', '');");
//	}
}
?>