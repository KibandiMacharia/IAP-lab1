<?php
    include_once "DBConnector.php";
    include "User.php";

    $userRecords=new User("","","","");
    $readResult=$userRecords->readAll();

    $showRecordsConnection=new DBConnector;
?>
<html>
    <head>
        <title>Users</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <table class="r">
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>User City</th>
            </tr>
                <?php
                    if(!$showRecordsConnection){
                        echo "No Connection";
                    }else{
                        echo "Successful";
                    }

                    while($rowResult=mysqli_fetch_assoc($readResult)){
                        echo "<tr>";
                        echo "<td>".$rowResult["id"]."</td>";
                        echo "<td>".$rowResult["first_name"]."</td>";
                        echo "<td>".$rowResult["last_name"]."</td>";
                        echo "<td>".$rowResult["user_city"]."</td>";
                        echo "</tr>";
                    }

                    $readResult->free_result();
                ?>
                       
        </table>
    </body>
</html>