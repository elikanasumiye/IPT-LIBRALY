<?php
session_start();
include "conn.php";

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `books` WHERE id = $delete_id ") or die('Query failed');
    if($delete_query){
       header('location:list.php');
       $message[] = 'Book has been deleted';
    } else {
       header('location:list.php');
       $message[] = 'Book could not be deleted';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css file/list.css">
</head>
<body>
<div id="slider">
    <div id="background">
       <div id="top">
          <a href="must@must.ac.tz"  style="text-decoration:none;  color: white;"> must@gmail.com </a> 
          <a href="#"  style="text-decoration:none; color: white;"> +255 25367848 </a> 
          <a href="#"  style="text-decoration:none; padding:7px; float:right; color: white;"></a>
           <a href="#"  style="text-decoration:none; padding:7px; float:right; color: white;"></a>
            <a href="#"  style="text-decoration:none;  padding: 7px ; float:right; color: white;"></a>
             </div> 
             <div id="menu">
                <div id="logo">DR MAGUFULI LIBRARY<b style="color:#2c7ad6 ;">MUST</b>
                 </div>
                 <div id="menu1">
                   <ul>
                      <a href="add.php"><li >Home</li></a> 
                 <a href="add.php"><li >Add </li></a>
                  <a href="list.php"><li>list</li></a>
                   <a href="create.php"><li ></li></a> 
                   </ul> 
                   </div> 
                   </div> 
                   <table id="imageTable">
                      <thead> 
                        <tr>
                            <th>IMAGE</th> 
                            <th>NAME</th> 
                            <th>AUTHOR</th>
                            <th>DISCRIPTION</th>
                             <th>ACTION</th> 
                             </tr> 
                             </thead> 
                        <tbody> 

    <?php
    $select_books = mysqli_query($conn, "SELECT * FROM `books`");
    if(mysqli_num_rows($select_books) > 0){
        while($row = mysqli_fetch_assoc($select_books)){
    ?>
    <tr>
    <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt="Book Image"></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['author']; ?></td>
        <td><?php echo $row['text']; ?></td>
        
        <td>
            <button><a href="list.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a></button>
            <button><a href="update.php?edit=<?php echo $row['id']; ?>" class="option-btn">Edit</a></button>
        </td>
    </tr>
    <?php
        }
    } else {
        echo "<tr><td colspan='4' class='empty'>No books added</td></tr>";
    }
    ?>
    </tbody>
  </table>
 
<!-- ... Your previous code ... -->

</div>
</body>
</html>
