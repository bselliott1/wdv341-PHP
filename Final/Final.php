<?php 
    include 'connectPDO.php';
    
    $stmt = $conn->prepare("SELECT event_id, event_name, event_description, event_presenter, event_date, event_time, image_name FROM wdv341_event");
    $stmt->execute();   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project - Final</title>

    <link rel="stylesheet" href="https://crolek.github.io/WDV-221/libs/Skeleton-2.0.4/css/normalize.css">
    <link rel="stylesheet" href="https://crolek.github.io/WDV-221/libs/Skeleton-2.0.4/css/skeleton.css">
    <style type="text/css">
        body {
            background: #f7f7f7;
        }

        #final {
            
            margin: auto;
            padding: 10px;
            background: #ffffff;
            border: solid #f2f2f2;
        }

        .single-image {
            height: 100%;
            width: 100%;
        }

        #image-wrapper {
            height: 300px;
            width: 300x;
        }

        .error-box {
            border: red 1px solid;
        }

        .hidden {
            display: none;
        }

        .file-upload{
            text-align: center;
        }

    </style>
</head>
<body>

    <h3 align="center">Shopping Site</h3>

    <div id="final">
        &nbsp;
        <button style="float: right;" onclick="window.location.href = 'login.php';">Login</button>
        </div>

        <table border='0'>
    <tr>
        <td class="hidden"></td>
        <td>Image</td>
        <td></td>
        <td></td>
        <td>Item #</td>
        <td>Description</td>
        <td></td>                   
    
<?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        echo "<tr>";
        echo "<td class='hidden'>" . 
             $dirname = 'upload/';
             $images = scandir($dirname);
             $ignore = Array(".", "..");
             foreach($images as $curimg){
             if(!in_array($curimg, $ignore)) {
             echo "<td><img class='single-image' src='upload/".$row['image_name']."'></td>";
             };
             } 
            echo "<td>" . $row['event_name'] . "</td>";
            echo "<td>" . $row['event_description'] . "</td>";  
            echo "<td>" . $row['event_presenter'] . "</td>";
            echo "<td><a href='purchase.php?event_name=".$row['event_name']."'><button>Buy</button></a></td>";
        echo "</tr>";

    }

    echo "<br>";
    echo "<h1>";
    if(isset($_GET['msg'])){
        echo $_GET['msg'];
    }
    echo "</h1>";
?>
</table>
    
        </div>
        <div id="error-wrapper" class="error-box hidden">
            <p>Make sure the New Image URL is valid.</p>
        </div>


    </div>
</body>
</html>
