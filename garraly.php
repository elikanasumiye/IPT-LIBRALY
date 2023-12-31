<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css file/gally.css">
  <title>Horizontal Cards with Hover Effect</title>
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
                    <a href="garraly.php"><li >Home</li></a> 
                    <a href=""><li >About</li></a> 
                    <a href="logout.php"><li>Log out</li></a>

                 </ul>
                </div> 
            </div>
  <div class="card-container">
  <?php
    include "conn.php";
    
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $cards = $result->fetch_all(MYSQLI_ASSOC);

        // Calculate the number of columns based on the number of cards
        $numColumns = ceil(count($cards) / 4);

        for ($rowIndex = 0; $rowIndex < 4; $rowIndex++) {
            echo '<div class="card-row">';
            for ($colIndex = 0; $colIndex < $numColumns; $colIndex++) {
                if (!empty($cards)) {
                    $row = array_shift($cards);
                    echo '<div class="card">';
                    echo '<div class="card-inner">';
                    echo '<div class="card-front" style="background-image: url(\'uploaded_img/' . $row['image'] . '\');"></div>';
                    echo '<div class="card-back">';
                    echo '<h2>' . $row['name'] . '</h2>';
                    echo '<p>Author: ' . $row['author'] . '</p>';
                    echo '<p>Discription: ' . $row['text'] . '</p>';
                    echo '<button class="btn">Learn More</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            echo '</div>';
        }
    } else {
        echo "<p>No books available.</p>";
    }

    $conn->close();
    ?>
  </div>
  <script src="script.js"></script>
</body>
</html>
