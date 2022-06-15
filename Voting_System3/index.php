<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form</title>
</head>
<body>
    <u><h1>Register Your Vote</h1></u>
    <div class="container">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Enter Your Name" required>
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" name="address" placeholder="Enter Your Address" required>
            </div>
            <div>
                <label for="id_card">Id_Card</label>
                <input type="text" name="id_card" placeholder="Enter Your Id Card Number" >
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" name="image">
                
            </div>
            <div class="btn">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
include_once("connect.php");


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $id_card = $_POST['id_card'];
    $image = $_FILES['image'];
    $image_name = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];
    $image_tmp = $_FILES['image']['tmp_name'];

    if($name == '' || $address == '' || $id_card == '') {
        echo "<script>alert('Any Field Is Empty')</script>";
        exit();
    }

    if($image_type =="image/jpeg" || $image_type == "image/png" || $image_type == "image/gif") {
        if($image_size <= 5000000) {
            move_uploaded_file($image_tmp,"images/$image_name");     // from----> to
        } else {
            echo"<script>alert('Image Size is Too Large, Only 5 Mb File Is Allowed')</script>";
        }
    } else {
        echo"<script>alert('image type is invalid')</script>";
    }

    $query = "insert into Votes (name,address,id_card,image) values ('$name', '$address', '$id_card', '$image_name')";

    $result = mysqli_query($con, $query);
    
     if ($result) {
        echo "<center><h1>Data Has Been Inserted Successfully</h1></center>";
    } else {
        echo "<center><h1>Data Submission Failed</h1></center>";
    }
}   

include_once('data_table.php');
?>