<?php
if(true) {
    include "config.php";
$target_dir = "img/";
/* img/stdentone.jpg */
$target_file = $target_dir . rand().'.jpg';
echo '<pre>';
print_r($_FILES["stdImage"]['size']);
printf($target_file);
    echo '<br>';
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }else{
        $check = getimagesize($_FILES["stdImage"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";

            if (move_uploaded_file($_FILES["stdImage"]["tmp_name"], $target_file)) {

                $sql = "insert into users (image) VALUES('$target_file')";
                if ($conn->query($sql)){
                    echo "The file ". basename( $_FILES["stdImage"]["name"]). " has been uploaded.";
                }else {
                echo    mysqli_error($conn);
                  //  echo "Sorry, there was an error uploading your file.";
                }

            } else {
                echo "Sorry, there was an error uploading your file.";
            }

        } else {
            echo "File is not an image.";
        }
    }
}
?>
<form method="post" action="imageupload.php" enctype="multipart/form-data">
        <input name="stdImage" type="file" accept="image/jpeg">
        <input type="submit" value="Submit">
</form>


<?php
    $imagPath;
    $sql = "select image from users where image !=''";
    $result = $conn->query($sql);
    if($conn->query($sql)){
        $result = $conn->query($sql);
        $final = $result->fetch_all();
        print_r($final);
        foreach ($final as $img){
            $imagPath =  $img[0];
            echo '<img src="'.$imagPath.'">';
        }
    }
?>
