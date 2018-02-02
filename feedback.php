
<?php

$link = mysqli_connect("au-cdbr-sl-syd-01.cleardb.net", "b62ba148024589", "6875b4a8", "ibmx_6ef60b858b30959");
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;


$sname=$_POST['sname'];
$rollno=$_POST['rollno'];
$dept=$_POST['dept'];
$cat=$_POST['cat'];
$message=$_POST['message'];

$sql = "INSERT INTO product (pname,quantiy,price,cat,description) VALUES ('$sname','$rollno','$dept','$cat','$message')";
    if ($link->query($sql) === TRUE) {
            echo "New record created successfully";
        $sql="SELECT * from product ORDER BY PID DESC limit 5";
        $result = mysqli_query($link,$sql);
        echo "<table border='1'>
        <tr>
        <th>pid</th>
        <th>pname</th>
        <th>quantiy</th>
        <th>price</th>
        <th>cat</th>
        <th>description</th>
        </tr>";

while ($row = mysqli_fetch_array($result)) {

?>
        <tr>
            <td><a href="id.php?id=<?php echo $row['pid'];?>">
                     <?php echo $row['pid']; ?></td> </a>
            <td><?php echo $row['pname']; ?></td> 
            <td><?php echo $row['quantiy']; ?></td> 
            <td><?php echo $row['price']; ?></td> 
            <td><?php echo $row['cat']; ?></td> 
            <td><?php echo $row['description']; ?></td> 
            
        </tr>
        <?php
    }
       //     header("Location:login.php");
    } 
        else 
        {
            echo "Error: " . $sql . "<br>" . $link->error;
        }
        
    //}



mysqli_close($link);

?>