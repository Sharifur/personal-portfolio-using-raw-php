<?php
session_start();
function Redirect($url){
    echo"<script>self.location='{$url}';</script>";
}
require_once("../model/database.php");
require_once("../model/users.php");

    $db = new Database ;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Personal Portfolio - Admin Login</title>
    <!-- all the stylesheet load here -->
<?php require("stylesheet.php");?>
    <!-- all the stylesheet load here -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- all the page are load here -->
    <?php
    if(isset($_SESSION['mytype']) && $_SESSION['mytype'] = 'a'){
        if (isset($_GET['a'])) {
            if(file_exists("../view/backend/pages/{$_GET['a']}.php")){
                require("../view/backend/pages/{$_GET['a']}.php");
            }else{
                require('../view/backend/pages/404.php');
            }
        }else{require("../view/backend/pages/login.php");
        }
    }else{
        require("../view/backend/pages/login.php");
    }

    ?>
<!-- all the page are load here -->
    <!-- all the script file load here -->
    <?php require("script.php") ;?>
    <!-- all the script file load here -->

 

</body>

</html>
