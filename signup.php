<?php 
 
 include "../connect.php" ; 


  $username  = filterRequest("username");
  $email     = filterRequest("email");
  $phone     = filterRequest("phone");
  $password  = filterRequest("password");
  $verfiycode= rand(10000, 9999);

  $stmt = $con->prepare("SELECT * FROM Users WHERE users_email = ? OR users_phone = ?");

  $stmt->execute(array($email ,$phone )) ;

  $count = $stmt->rowCount() ; 

  if ($count > 0) {
    printfailur(); 
  }else {
    $data = array(
      "users_name"       => $username,
      "users_email"      => $email,
      "users_phone"      => $phone,
      "users_password"   => $password,
      "users_verfiycode" => "0",
    );
    insertData("Users" , $data);
  }
