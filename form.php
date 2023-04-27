<?php
session_start();
echo "sucessfully logged in ".$_SESSION['username'];
?>

<?php


    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {   include 'connect.php';
        $age=$_POST["age"];
        $aboutuser=$_POST["aboutuser"];
        $sql="INSERT INTO  userdetail(age,about) VALUES ('$age','$aboutuser')";
    
        if(mysqli_query($conn,$sql))
        {
            echo"<script>alert('new record inserted')</script>";
        }
        else
        {
            echo "error:".mysqli_error($conn);
        }
        
    
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Detail Form</title>
    <style>
   
.formcontent
{
    padding: 10px 10cm 10px 10cm;
    margin: 2px;
    font-size: 0.5cm;

}
button
{   
       background-color: pink;   
       width: 100%;  
        color:black;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }
input[type=number], textarea
 {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid blue;   
        box-sizing: border-box;   
    }           
</style>
</head>
<body>

    
    <div class="formcontent">    
<form method="POST" action="form.php">
    <centre><h2>Detail Form : <?php echo $_SESSION['username']; ?></h2></centre>
    <label>Age :</label>
    <br>

    <input type="number" name="age" placeholder="your age"><br>
    <br>
    <label>About : </label>
    <br>
    <textarea name="aboutuser" rows="3" cols="40">tell something about you</textarea>
    <br>
    <button type="submit">submit</button>

</form>
    </div>
</body>
</html>