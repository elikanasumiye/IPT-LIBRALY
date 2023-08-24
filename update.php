<?php
include "conn.php";

if(isset($_POST['update'])){
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_author = $_POST['update_author'];
    $update_text = $_POST['update_text'];
    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/' . $update_image;

    $update_query = mysqli_query($conn, "UPDATE `books` SET name = '$update_name', author = '$update_author', text='$update_text', image = '$update_image' WHERE id = '$update_id'");

    if($update_query){
       move_uploaded_file($update_image_tmp_name, $update_image_folder);
       $message[] = 'Book updated successfully';
       header('location:list.php');
    } else {
       $message[] = 'Book could not be updated';
       header('location:list.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css file/add.css">
    <title>Document</title>
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
                    <a href="admin.php"><li >Home</li></a>
                    <a href="add.php"><li >Add </li></a>
                    <a href="list.php"><li>list</li></a>
                    <a href="admin.php"><li >logout</li></a>

                </ul>
            </div>   
        </div>
 <?php
       if(isset($_GET['edit'])){
        $edit_id = $_GET['edit'];
        $edit_query = mysqli_query($conn, "SELECT * FROM `books` WHERE id = $edit_id");
        if(mysqli_num_rows($edit_query) > 0){
            while($fetch_edit = mysqli_fetch_assoc($edit_query)){
       ?>
 <div class="center">
 <form action="" method="POST" enctype="multipart/form-data">
    <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="Book Image">
    <input type="hidden" name="update_id" value="<?php echo $fetch_edit['id']; ?>">
    <input type="text" class="box" required name="update_name" value="<?php echo $fetch_edit['name']; ?>">
    <input type="text" class="box" required name="update_author" value="<?php echo $fetch_edit['author']; ?>">
      <textarea name="update_text" id="" cols="124" rows="10" value="<?php echo $fetch_edit['text']; ?>"></textarea>
    <input type="file" class="box" name="update_image" accept="image/png, image/jpg, image/jpeg">
    <input type="submit" value="Update Book" name="update" class="btn">
    <input type="reset" value="Cancel"   >
</form>
</div>
</div>
<?php
        }
     }
    }


?>

</body>
</html>