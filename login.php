<?php

session_start();

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'form');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

  
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['Email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT auth_id FROM auth WHERE auth_email_address = '$myusername' and auth_name = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //   $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: homepage.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo "Your Login Name or Password is invalid";
      }
   }

   echo $myusername;
   echo $mypassword;
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


<?php
            // $msg = '';
            
            // if (isset($_POST['submit']) && !empty($_POST['email']) 
            //    && !empty($_POST['password'])) {
				
            //    if ($_POST['email'] == $_SESSION["email"] && 
            //       $_POST['password'] == $_SESSION["password"]) {
            //       $_SESSION['valid'] = true;
            //       $_SESSION['timeout'] = time();
            
                  
            //       echo 'You have entered valid use name and password';

            //       header("Location: homepage.php"); 
            //          exit;
            //    }else {
            //       $msg = 'Wrong username or password';
            //    }
            // }
         ?>

<a href="register.php">Go to register</a>



</body>
</html>