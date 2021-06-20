<?php

// Thumbnail Generator
if (isset($_POST["overlay"])) {

	$ffmpeg = '/ffmpeg/bin/';
	$image = $_POST['imagefile'];           //'C:/Users/truong.vu/Downloads/watermark2.png';;
	$fileout = 'overlay/output'.rand(9,999).'.mp4'; // Comment if rename same video
	$video = $_POST['videofile'];
	$command1 = " -filter_complex \" ";
 	// now we need to tell the position of overlay in video
	$command2 = " overlay=1:1\""; // closing double quotes


	// Only thumb
	shell_exec("ffmpeg -i $video -i $image $command1 $command2 $fileout");
}

echo 'File Overlay created' ;
?>
<br>
    <video id="vid" autostart="false" loop="" style="margin-top: 10px; margin-left: 10px; width: 400px;">
    <source src="<?php echo $fileout; ?>" type="video/mp4">
    </video>
