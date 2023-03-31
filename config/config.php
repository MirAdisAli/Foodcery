<?php


// if(!isset($_SERVER['HTTP_REFERER'])){
//    // redirect them to your desired location
//    header('location: http://localhost/foodcery/index.php');
//    exit;
// }



try {
    
     //host
     define("HOST", "localhost");

     //dbname
     define("DBNAME", "foodcery");

    //user
    define("USER", "root");

     //pass
     define("PASS", "");

     $conn = new PDO("mysql: host=".HOST.";dbname=".DBNAME. ";",USER, PASS);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     //if($conn == true){
     //   echo "connected successfully";
     //}else {
     //   echo"error";
     //}

} catch (PDOException $e) {
    echo $e->getMessage();
}

