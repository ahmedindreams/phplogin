

<?php
// Start the session
session_start();
?>

<?php


// $_SESSION["password"] = $_POST["password"];
// $_SESSION["email"] = $_POST["Email"];

// $cookie_name = "email";
// $cookie_value =  $_POST["Email"] ;
// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 





#5
//insert data to TABLE
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname ='form';
   if(isset($_POST['submit'])){
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error($conn));
   }
   
   echo 'Connected successfully<br>';
   
   //select
   mysqli_select_db( $conn,$dbname );


   
    if( $_POST["password"] && $_POST["Email"] ) {
       $auth_name = $_POST['password'];
       $auth_email = $_POST['Email'];
   
    }


    //create table
   $sql = "INSERT INTO auth(auth_name,auth_email_address) 
   VALUES ( '$auth_name','$auth_email')";

   $retval = mysqli_query( $conn,$sql );
   
   if(! $retval ) {
      die('Could not insert to table: ' . mysqli_error($conn));
   }
    
   echo "<br>Data inserted to table successfully\n";
   mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<form action="<?php $_PHP_SELF ?>" method = "POST">
        <span style="color:red">required field *</span><br/>
        
         Email: <input type = "email" name = "Email"  required/><span style="color:red">*</span><br/>
         password: <input type = "password" name = "password" required /><span style="color:red">*</span><br/>
         <!-- Group #: <input type = "text" name = "GroupNo" /><br/> -->
         <!-- Class Details<textarea id="comment" name="ClassDetails" rows="4" cols="50"></textarea><br/> -->
         <!-- <input type="radio" id="male" name="gender" value="male" required>
          <label for="male">Male</label>
         <input type="radio" id="female" name="gender" value="female">
          <label for="female">Female</label><span style="color:red">*</span><br/> -->
          <!-- Select Courses<select name="Courses[]" id="Courses" multiple size="4"><br/> -->
           <!-- <option value="PHP">PHP</option> -->
          <!-- <option value="Javascript">Javascript</option> -->
         <!-- <option value="Mysql">Mysql</option> -->
         <!-- <option value="HTML">HTML</option> -->
          <!-- </select><br/> -->
          <!-- Recive emails from us <input type="checkbox" id="Agree" name="Agree" value="Agree" required><span style="color:red">*</span><br/> -->
         <input type = "submit" name = "submit" />
</form>

<a href="login.php">Go to login</a>

<?php
#2
//post method

    //   echo "Group # : ". $_POST['GroupNo']. " <br />";
    //   echo "ClassDetails : ". $_POST['ClassDetails']. " <br />";

      // header("Content-Type: text/plain");
      

    //   echo "Gender : ". $_POST['gender']. " <br />";
    // //   // echo "Your courses are : ". $_POST['Courses']. " <br />";
    // echo "recive emails from us : ". $_POST['agree']. " <br />";
    // //   echo "Courses : "; 
    // //   foreach ($_POST['Courses'] as $selectedOption)
    // //   echo $selectedOption."  ";

   


?>



</body>
</html>