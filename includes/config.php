<?php
//connect to mysql database

   define('SERVER', 'mysql3.gear.host');
   define('USERNAME', 'investtest');
   define('PASSWORD', 'Ac1f?~j9d4h1');
   define('DATABASE', 'investtest');
   $con = mysqli_connect(SERVER,USERNAME,PASSWORD,DATABASE) or die("Error " . mysqli_error($con));
?>
