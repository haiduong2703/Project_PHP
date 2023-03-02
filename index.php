<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" style="text/css" href="./css/style.css">
    <link rel="stylesheet" style="text/css" href="./css/sidebar.css">
    <link rel="stylesheet" style="text/css" href="./css/content.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

</head>

<body>
    <?php 
        include("./includes/common.php");
        include("./pages/menu.php");
        if(isset($_GET['action'])){
            $tam = $_GET['action'];
        }
        else{
            $tam = "";
        }
        if($tam=='detail'){
        
        include("./pages/detailProject.php");

        }
        if($tam=='works'){
            include("./pages/Worklist.php");
    
        }
        if($tam=='task'){
            include("./pages/Task.php");
    
        }
        if($tam=='home'){
            include("./pages/home.php");
    
        }
        if($tam=='support'){
            include("./pages/support.php");
    
        }
        
    ?>
</body>

</html>