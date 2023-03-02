<div class="container_sidebar">

    <?php include("./includes/common.php"); ?>
    <div class="row_sidebar" id="right_content">
        <div class="sidebar">
            <ul class="top_sidebar">
                <li><i class="fa-solid fa-house"></i><a href="index.php?action=home"> Home</a></li>
                <?php
                if (isset($_SESSION['email'])) {
                    $sql = "SELECT * FROM `user` WHERE emailUser='".$_SESSION['email']."' ";
                $query = mysqli_query($con,$sql);
                $row = mysqli_fetch_array($query); 
                if($row['role']=='Trưởng phòng'){
                ?>
                <ul class="listHome">
                    <li><i class="fa-solid fa-people-group"></i><a href="index1.php?action=listTV"> Danh sách thành
                            viên</a>
                    </li>
                    <li><i class="fa-solid fa-folder"></i><a href="index1.php?action=listDoc"> Tài liệu dự án</a></li>
                </ul>
                <?php }} ?>
                <li><i class="fa-solid fa-list-check"></i><a href="index.php">&nbspProject</a>
                </li>
            </ul>
            <?php 
            if(isset($_SESSION['email'])){
            ?>
            <?php 
               $sql1 = "SELECT user.idDepartment as idD FROM user JOIN department ON  department.idDepartment=user.idDepartment WHERE emailUser = '".$_SESSION['email']."'";
               $query1 = mysqli_query($con,$sql1);
               $row1 = mysqli_fetch_array($query1);
               
               $sql = "SELECT * FROM project JOIN department ON department.idDepartment = project.idDepartment WHERE project.idDepartment='".$row1['idD']."'";
               $query = mysqli_query($con,$sql); 
            ?>
            <ul id="bottom_sidebar">
                <?php 
                    $i=0;
                    while($row = mysqli_fetch_array($query)){
                        $i++;
                        ?>
                <li class="yourproject">
                    <a href="index.php?action=detail&idProject=<?php echo $row['idProject'] ?>"><?php echo $row['nameProject'] ?>
                    </a><i class="fa-solid fa-angle-up" id="icon<?php echo $i?>"
                        onClick="showHide(<?php echo $i-1 ?>,this.id)"></i>
                    <ul class="myDiv">
                        <li>
                            <a href="index.php?action=works&idPWorks=<?php echo $row['idProject'] ?>">WorkList</a>
                        </li>
                        <li>
                            <a href="index.php?action=support">Statistics And Reports</a>
                        </li>
                    </ul>
                </li>
                <?php
                    } ?>
                <?php     
            }else{
           ?>
                <div></div>
                <?php 
            }
           ?>
                <?php
             if (isset($_SESSION['email'])){
                $sql = "SELECT * FROM `user` WHERE emailUser='".$_SESSION['email']."' ";
                $query = mysqli_query($con,$sql);
                $row = mysqli_fetch_array($query);   
                if($row['role']=="Trưởng phòng"){  ?>
                <ul class="addProject">
                    <li><a href="index1.php?action=add">Thêm mới dự án &nbsp;&nbsp;&nbsp;&nbsp; <i
                                class="far fa-plus"></i></a></li>
                </ul>
                <?php }} ?>
        </div>
    </div>
    <script>
    let check = false;

    function showHide(key, id) {
        var myDiv = document.getElementsByClassName('myDiv');
        var myUl = document.getElementsByClassName('yourproject');
        var icon = document.getElementById(id);
        var right = document.querySelector('.row_sidebar');
        // if (icon.classList[1] == 'fa-angle-up') {
        //     icon.classList.replace('fa-angle-up', 'fa-chevron-down');
        // } else {
        //     icon.classList.replace('fa-chevron-down', 'fa-angle-up')
        // }
        var newHeight = right.offsetHeight;

        if (myDiv[key].style.display == 'none') {
            setHeight = newHeight + 60;
            myDiv[key].style.display = "block";
            myUl[key].style.height = '120px';
            right.style.height = setHeight + 'px';
        } else {
            setHeight = newHeight - 60;
            myDiv[key].style.display = 'none';
            myUl[key].style.height = '60px';
            right.style.height = setHeight + 'px';

        }



    }
    </script>
</div>