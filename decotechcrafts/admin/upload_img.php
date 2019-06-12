<?php //Image Upload
	$target_file = $path . basename($_FILES["fileToUpload"]["name"]);

    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$randomname= date("d-m-y")."-".time()."-".mt_rand(1000,999999).".".$imageFileType;
    $newtarget=$path .$randomname;
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

if (($_FILES["fileToUpload"]["size"]) > 15728650) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" &&$imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newtarget)) {
		list($width,$height)=getimagesize($newtarget);
		$newwidth= 800;
		$newheight= 500;
        $thumb=imagecreatetruecolor($newwidth,$newheight);		$source=imagecreatefromjpeg($newtarget);
		imagecopyresized($thumb,$source,0,0,0,0,$newwidth,$newheight,$width,$height);
        imagejpeg($thumb,$newtarget,100);
		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		$uploadOk = 1;
    } else {
        echo "Sorry, there was an error uploading your file.";
    };
};
?>