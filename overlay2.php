<?php

// Thumbnail Generator
if (isset($_POST["overlay"])) {

	$ffmpeg = '/ffmpeg/bin/';
	$image = $_POST['imagefile'];           //'C:/Users/truong.vu/Downloads/watermark2.png';;
	$fileout = 'overlay/output'.rand(9,999).'.mp4'; // Comment if rename same video
	$video = $_POST['videofile'];
	// $command1 = " -filter_complex \" ";
 	// now we need to tell the position of overlay in video
	// $command2 = " overlay=1:1\""; // closing double quotes

	// ffmpeg -i C:\Users\truong.vu\Downloads\tanthanh.mp4 -vf "scale=1280:720:force_original_aspect_ratio=decrease,pad=1280:120:-1:-1:color=black" output.mp4 video giữa image
	// ffmpeg -i C:\Users\truong.vu\Downloads\tanthanh.mp4 -i C:\Users\truong.vu\Downloads\yu.png -filter_complex "[0:v]scale=1280:720:force_original_aspect_ratio=decrease[fg];[1][fg]overlay=(W-w)/2:(H-h)/h" output.mp4 hình giữa image

	$command1 = " -filter_complex \" ";

	$command2 = " [0:v]scale=1280:720:force_original_aspect_ratio=decrease[fg];[1][fg]overlay=(W-w)/2:(H-h)/h \"";

	// Only thumb
	shell_exec("ffmpeg -i $video -i $image $command1 $command2 $fileout");
}

echo 'File Overlay created' ;
?>
<br>
    <video id="vid" autostart="true" loop="" style="margin-top: 10px; margin-left: 10px; width: 400px;">
    <source src="<?php echo $fileout; ?>" type="video/mp4">
    </video>
