<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/formStyle.css">
</head>
<body>
    <div class="container">
        <h1 class="heading" >NIIT Foundation</h1>
        <ul class="nav">
            <li> <a href="viewAll.php"> View All Records </a> </li>
            <li> <a href="addRecord.php"> Add New Student </a> </li>
        </ul>
        <section>
            <h1>Update student record</h1>
            <div class="stud-form">
               
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <input type="text" name="roll" placeholder="Roll No." value="<?php echo $_REQUEST['roll']; ?>">
                    <input type="text" name="name" placeholder="Full Name" value="<?php echo $_REQUEST['name']; ?>">
                    <input type="date" name="dob" value="<?php echo $_REQUEST['dob']; ?>">
                    <input type="text" name="mobile" placeholder="Mobile" value="<?php echo $_REQUEST['mobile']; ?>">

                    <input type="submit" value="Update Record" name="update-button" >
                </form>
                <?php
                        if(isset($_REQUEST['update-button'])){
                            $host = "localhost:3308";
                            $user = "root";
                            $pass = "";
                            $db = "project1";

                            $roll = $_REQUEST['roll'];
                            $name = $_REQUEST['name'];
                            $dob = $_REQUEST['dob'];
                            $mobile = $_REQUEST['mobile'];

                            $conn = mysqli_connect($host, $user, $pass, $db);
                            if(!$conn){
                                die('Not Connected'.mysqli_connect_error() );
                            }
                        
                            $sql = "update student set name = '$name' , dob = '$dob', mobile = '$mobile' where roll = $roll;";

                            $result = mysqli_query($conn, $sql);

                            if($result){
                                echo "<script> alert('Record Updated Succesfully'); </script>";
                            }else{
                                echo " <script> alert('Sorry, does not updated...'); </script>";
                            }
                          
                        }
                ?>
            </div>
        </section>
    </div>
</body>

</html>


