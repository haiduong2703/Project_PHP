<div class="support">
    <h1>SUPPORT PAGE</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <textarea type="text" name="textsp" id="textsp"></textarea>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit_sp" id="submit_sp"></td>
            </tr>
        </table>
    </form>
</div>
<?php 
    if(isset($_POST['submit_sp'])){
        $text = $_POST['textsp'];
        if($text!=""){
            $sql = "INSERT INTO project_message (detailMess) VALUES ('".$text."')";
            mysqli_query($con,$sql);
            echo "<script>alert('Bạn đã gửi yêu cầu hỗ trợ thành công')</script>";
        }
        else{
            echo "<script>alert('Bạn vui lòng hãy nhập yêu cầu hỗ trợ')</script>";
        }
        
    }
?>