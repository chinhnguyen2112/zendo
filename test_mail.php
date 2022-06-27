<?php
// error_reporting(E_ALL);
// require_once 'core/init.php';
// $sql_his = "SELECT created_at,count FROM `history_luotquay_free`  WHERE `user_id` = 1572 AND `count` = 3 ORDER BY id DESC";
// $check_his = $db->fetch_assoc($sql_his, 1);
// // var_dump(count($check_his));
// $date_check = date('H:i:s', time());
// if ($date_check >= '20:00:00' && $date_check < '22:50:00') {
//     if (count($check_his) > 0) { // nếu đã có data
//         $event = 0;
//         if (strtotime(date('d-m-Y', $check_his['created_at'])) < strtotime(date('d-m-Y', time()))) { // nếu hôm nay chưa nhận
//             $event = 1; //  
//         } elseif (date('d-m-Y', $check_his['created_at']) == date('d-m-Y', time())) { // nếu hôm nay đã nhận
// echo 'ne';
//             if (date('H:i:s', $check_his['created_at']) < '20:00:00' && date('H:i:s', $check_his['created_at']) > '22:50:00') { // nếu hôm nay đã nhận khung giờ vàng thứ hai
//                 echo 'hi';
//                 $event = 0; // 
//             } else { // nếu chưa nhận vào khung giờ vàng  thứ 2
//                 $event = 1; // 
//             }
//         }
//     } else { // nếu chưa có data
//         $event = 1;
//     }
// }
// echo $event;

ini_set('max_execution_time', '0');


$arr_album = glob("assets/files/thumb/*");
foreach ($arr_album as $img) {
    $name = str_replace('assets/files/thumb/', '', $img);
    // $new_name = str_replace('png', 'jpg', $name);
    // $num= str_replace('.jpg', '', $new_name_2);
    // if($i > '1000'){
    // echo $new_name."<br>";
    resize_image('https://zendo.vn/' . $img, $name, 700, 700, 100, $type = "", $new_path = "assets/files/thumbs/");

    // }
}

function resize_image($path, $filename, $maxwidth, $maxheight, $quality, $type = "", $new_path = "")
{
    $sExtension = substr($filename, (strrpos($filename, ".") + 1));
    $sExtension = strtolower($sExtension);
    // Get new dimensions
    list($width, $height) = getimagesize($path);
    if ($width != 0 && $height != 0) {
        if ($maxwidth / $width > $maxheight / $height) $percent = $maxheight / $height;
        else $percent = $maxwidth / $width;
    }
    if ($height == 375) {



        $new_width    = 375;
        $new_height    = 200;
        // Resample
        $image_p = imagecreatetruecolor($new_width, $new_height);
        //check extension file for create
        switch ($sExtension) {
            case "gif":
                $image = imagecreatefromgif($path);
                break;
            case $sExtension == "jpg" || $sExtension == "jpe" || $sExtension == "jpeg":
                $image = imagecreatefromjpeg($path);
                break;
            case "png":
                $image = imagecreatefrompng($path);
                imagealphablending($image_p, false);
                imagesavealpha($image_p, true);
                $transparent = imagecolorallocatealpha($image_p, 255, 255, 255, 127);
                imagefilledrectangle($image_p, 0, 0, $new_width, $new_height, $transparent);
                break;
        }
        //Copy and resize part of an image with resampling
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        // Output

        // check new_path, nếu new_path tồn tại sẽ save ra đó, thay path = new_path
        if ($new_path != "") $path = $new_path;
        // echo $path;die;
        switch ($sExtension) {
            case "gif":
                imagegif($image_p, $path . $type . $filename);
                break;
            case $sExtension == "jpg" || $sExtension == "jpe" || $sExtension == "jpeg":
                imagejpeg($image_p, $path . $type . $filename, $quality);
                break;
            case "png":
                imagejpeg($image_p, $path . $type . $filename, $quality);
                break;
        }
        imagedestroy($image_p);
    }
}
?>
<!-- <!DOCTYPE html>
<html>

<body>

    <form action="test_mail.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    <?php

    ?>
</body>

</html> -->