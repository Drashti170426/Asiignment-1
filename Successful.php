<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updated Successfully</title>
</head>
<body>
    <header><h1>DSP UNIVERSITY</h1></header>
    <main>
        <form action="Successful.php" method="post"></form>
        <a href="Mainform.html">Update Information</a></br>
        <a href="Successful.php">View Updated Information</a>
    </main>
</body>
</html>       
       
<?php
    if($_SERVER ['REQUEST_METHOD'] = 'post')
    {
    
        $sid = $_POST['sid'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $postalcode = $_POST['postalcode'];
        $code = $_POST['code'];
        $contact = $_POST['contact'];
        $code1 = $_POST['code1'];
        $emergencyno = $_POST['emergencyno'];
        $sin = $_POST['sin'];
    
        $servername = "localhost";
        $username = "root";
        $password = "Drashti@1726";
        $database = "assignment1php";
    
        $conn=mysqli_connect($servername, $username, $password, $database);
    
        if(!$conn){
            die("error:".mysqli_connect_error());
        }
        else{
            $sql="INSERT INTO `studentinformation` (`sid`, `fname`, `email`, `address`, `postalcode`, `code`, `contact`, `code1`, `emergencyno`, `sin`) VALUES ('$sid', '$fname', '$email', '$address', '$postalcode', '$code', '$contact', '$code1', '$emergencyno', '$sin')";
            $result=mysqli_query($conn, $sql);
    
            if($result)
            {
               echo "Information Updated";
            }
            else
            {
                echo "Please check the entered information and enter valid input".mysqli_error($conn);
            }
        }  
    
    $sql= "SELECT * FROM `studentinformation`";
    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);
    echo "</br>";
    echo $num;

    /*if($num>0){
        $row = mysqli_fetch_assoc($result);
        echo "<br/>";
        echo var_dump($row);
    }*/

    while($row = mysqli_fetch_assoc($result))
    {
        echo "<br/>";
        echo "Student Records";
        echo "<br/>";
        echo "Student Id:".$row['sid']. "Full Name:".$row['fname']. "Email:".$row['email']. "Address:".$row['email']. "Postal Code:".$row['postalcode']. "Country Code:".$row['code']. "Contact Number:".$row['contact']. "Country Code:".$row['code1']. "Emergency Contact Number:".$row['emergencyno']. "Sin Number:".$row['sin'];
    }
    }
?>