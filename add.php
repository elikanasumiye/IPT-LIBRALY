<?php
session_start();

include "conn.php";

if (isset($_POST['book'])) {
    $name = $_POST['name'];
    $author = $_POST['author'];
    $text =$_POST['text'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;

    $insert_query = mysqli_query($conn, "INSERT INTO `books`(`name`, `author`, `image`,`text`) VALUES('$name', '$author', '$image','$text')") or die('query failed');

    if ($insert_query) {
        move_uploaded_file($image_tmp_name, $image_folder);
        $message[] = 'Book added successfully';
    } else {
        $message[] = 'Could not add the book';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery page</title>
    <link rel="stylesheet" href="css file/add.css" type="text/css">
</head>
<body>
<div id="slider1">
<div id="background">
        <div id="top">
            <a href="must@must.ac.tz"  style="text-decoration:none;  color: white;">
                must@gmail.com
              </a>
              <a href="#"  style="text-decoration:none; color: white;">
                +255 25367848
              </a>
              <a href="#"  style="text-decoration:none; padding:7px; float:right; color: white;"></a>
              <a href="#"  style="text-decoration:none; padding:7px; float:right; color: white;"></a>
              <a href="#"  style="text-decoration:none;  padding: 7px ; float:right; color: white;"></a>
        </div>
        <div id="menu">
            <div id="logo">Dr. MAGUFULI LIBRARY<b style="color:#2c7ad6 ;">MUST</b>
            </div>
            <div id="menu1">
                <ul>
                    <a href="add.php"><li >Home</li></a>
                    <a href="add.php"><li >Add </li></a>
                    <a href="list.php"><li>list</li></a>
                    <a href="logout.php"><li >logout</li></a>

                </ul>
            </div>   
        </div>
        <div class="center">
    <form action="" method="POST"  enctype="multipart/form-data">
   <h2>Add a new book</h2>
   <label for="name">BOOK TITLE</label>
   <input type="text" name="name" placeholder="enter the book title"  required><br>
   <label for="author">AUTHOR</label>
   <input type="text" name="author" min="0" placeholder="enter the author name"  required><br>
   <label for="text">DISCRIPTION</label>
   <textarea name="text" id="" cols="124" rows="10" class="text"></textarea>
   <label for="image">IMAGE</label>
   <input type="file" name="image" accept="image/png, image/jpg, image/jpeg"  required><br>

   <input type="submit" value="add the book" name="book" class="btn">

</div>
</div>
</body>
</html>