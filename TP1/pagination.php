<html>  

<head>  

<title> Pagination in PHP </title>  

</head>  

<body>   

<?php  

    $conn = mysqli_connect('127.0.0.1', 'root', '');  


    if (! $conn) {  

             die("Connection failed" . mysqli_connect_error());  

    }  

    else {  

             mysqli_select_db($conn, 'pagination');  

    }  


    $limit = 4;  

    $getQuery = "select *from galerie";    



    $result = mysqli_query($conn, $getQuery);  

    $total_rows = mysqli_num_rows($result);    



    $total_pages = ceil ($total_rows / $limit);    



    if (!isset ($_GET['page']) ) {  

        $page_number = 1;  

    } else {  

        $page_number = $_GET['page'];  

    }    


    $initial_page = ($page_number-1) * $limit;   

  

    $getQuery = "SELECT *FROM galerie LIMIT " . $initial_page . ',' . $limit;  

    $result = mysqli_query($conn, $getQuery);       


    echo "<table align=\"center\" >";
   

    while ($row = mysqli_fetch_array($result)) {  

        $nom = $row['nom'];
        $taille =  $row['taille'];
        $extension = $row['extension'] ;
        

        echo '<tr> 
                  <td>'.$nom.'</td> 
                  <td>'.$taille.'</td> 
                  <td>'.$extension.'</td> 
                 
              </tr>';

         echo "<td>" ;
        // echo $row['nom'] . "</td>";
        // echo"<td>" $row['taille'] .  "</td>";
        // echo"<td>"$row['extension'] ."</td>" '</br>';  

    }    



    for($page_number = 1; $page_number<= $total_pages; $page_number++) {  

        echo '<a href = "pagination.php?page=' . $page_number . '">' . $page_number . ' </a>';  

    }    
    echo "</table>";
?>  
      
  
</body>  

</html> 