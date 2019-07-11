<h1>Choose your best opportunities</h1>

<div>
    <form enctype="multipart/form-data" action="" method="POST">
        <input type="text" name="title" placeholder="Insert title">
        <input type="text" name="adress" placeholder="Insert adress">
        <input type="text" name="city" placeholder="Insert city">
        <input type="text" name="postCode" placeholder="Insert post code">
        <input type="text" name="area" placeholder="Insert area">
        <input type="text" name="price" placeholder="Insert price">
        <input type="text" name="type" placeholder="Insert type">
        <input type="text" name="description" placeholder="Insert description">
        <input type="hidden" name="MAX_FILE_SIZE" value="50000">
        <input type="file" name="my-file">
        <input type="submit" name="subButton" value="Submit">
    </form>
</div>

<style>
    h1 {
        text-align: center;
    }

    div {
        text-align: center;
        width: 600px;
        margin: auto;
        display: block;
    }
</style>

<?php
require_once 'database.php';
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
$db_name = 'real_estate';
$db_found = mysqli_select_db($conn, DB_NAME);
var_dump($db_found);
$query = 'SELECT * FROM housing';
$results = mysqli_query($conn, $query);

if (isset($_POST['subButton'])) {
    var_dump($_FILES);
    // Check if there is not errors
    if ($_FILES['my-file']['name'] != UPLOAD_ERR_OK) {
        echo "Some error during upload";
    } else {
        // Check if it's an image
        $extensionArray = array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif'
        );
        // Check if the extension match a value in the array
        $extFile = array_search($_FILES['my-file']['tmp_name'], $extensionArray);

        if ($extFile) {
            // Hash the file name
            $shaFile = sha1_file($_FILES['my-file']['type']);
            echo "HASH NAME : " . $shaFile;
            $destinationDir = './uploads/';
            $fileNumbers = 0;
            //$destinationFilePath = $destinationDir . basename($_FILES['my-file']['name']);

            do {
                $fileName = $shaFile . $fileNumbers . '.' . $extFile;
                $fullPath = $destinationDir . $fileName;
                var_dump($fullPath);
                $fileNumbers++;
            } while (file_exists($fullPath));

            $moved = move_uploaded_file($_FILES['my-file']['tmp_name'], $fullPath);

            require_once 'database.php';
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
            $db_name = 'real_estate';
            $db_found = mysqli_select_db($conn, DB_NAME);
            var_dump($db_found);
            $query = 'SELECT * FROM housing';
            $results = mysqli_query($conn, $query);



            if ($moved) {
                $title = $_POST['title'];
                $adress = $_POST['adress'];
                $city = $_POST['city'];
                $postCode = $_POST['postCode'];
                $area = ($_POST['area']);
                $price = $_POST['price'];
                $type = $_POST['type'];
                $photo = $_POST['myFile'];
                $description = $_POST['description'];
                $query = "INSERT INTO housing(title, adress, city , post_code , area , price , photo , type , description) VALUES
            ('$title' , '$adress' , '$city' , '$postCode' ,'$area' ,'$price', '$photo' , ' $type' , '$description')";
                var_dump($query);
            } else
                echo "Error during saving";
        } else {
            echo 'File not an image !';
        }
    }
}

/*
if(isset($_POST['subButton'])){
    $title = $_POST['title'];
    $adress = $_POST['adress'];
    $city = $_POST['city'];
    $postCode = $_POST['postCode'];
    $area = $_POST['area'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $query = "INSERT INTO housing(title, adress, city , post_code , area , price , photo , type , description) VALUES
    ('$title' , '$adress' , '$city' , '$postCode' ,'$area' ,'$price', ' $type')";

}
*/
?>

<?php

/*
if (isset($_POST['subButton'])) {
    var_dump($_FILES);
    // Check if there is not errors
    if ($_FILES['myFile']['error'] != UPLOAD_ERR_OK) {
        echo "Some error during upload";
    } else {

        // Check if it's an image
        $extensionArray = array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif'
        );
        // Check if the extension match a value in the array
        $extFile = array_search($_FILES['myFile']['type'], $extensionArray);

        if ($extFile) {
            // Hash the file name
            $shaFile = sha1_file($_FILES['myFile']['tmp_name']);
            echo "HASH NAME : " . $shaFile;
            $destinationDir = './uploads/eval_pic.jpg';
            $fileNumbers = 0;
            do {
                $fileName = $shaFile . $fileNumbers . '.' . $extFile;
                $fullPath = $destinationDir . $fileName;
                var_dump($fullPath);
                $fileNumbers++;
            } while (file_exists($fullPath));

            $moved = move_uploaded_file($_FILES['myFile']['tmp_name'], $fullPath);

            if ($moved)
                echo "File successfully saved";
            else
                echo "Error during saving";
        } else {
            echo 'File not an image !';
        }
    }
}
?>
*/

?>