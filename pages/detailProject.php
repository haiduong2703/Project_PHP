<div class="detail_project">
    <?php 
        $idProject = $_GET['idProject'];
        $sql = "SELECT * FROM project  WHERE idProject = $idProject";
        $query = mysqli_query($con,$sql); 
        $row = mysqli_fetch_array($query);
    ?>
    <h1><?php echo $row['nameProject'] ?></h1>
    <div class="detail">
        <div>Name: <?php echo $row['nameProject'] ?></div>
        <div>Date Start: <?php echo $row['start_dateP'] ?></div>
        <div>Date End: <?php echo $row['end_dateP'] ?></div>
        <div>Status: <?php echo $row['statusP'] ?></div>
        <?php 

        $sql1 = "SELECT * FROM works WHERE idProject = $idProject";
        $query1 = mysqli_query($con,$sql1); 
        $row1 = mysqli_fetch_array($query1);
    ?>
        <a href="index.php?action=works&idPWorks=<?php echo $row['idProject'] ?>"><button>Xem công việc</button></a>
    </div>
</div>