<?php
  class MyDB extends SQLite3
  {
      function __construct()
      {
         $this->open('airdatabase.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened airdatabase successfully<br>";
   }
?>

<style>
  body {
    background-image: url('airways1.jpg');
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>

</body>

  <center>
  
  <form action="" method="POST" > 
   
  Passanger identity:<br> 
  <input type="text" name="p_id" > <br> 

  Passanger name:<br> 
  <input type="text" name="p_name" > <br> 

  Passanger age:<br> 
  <input type="text" name="age" > <br> 

  Passanger gender:<br> 
  <input type="text" name="gender" > <br> <br>
  
  <input type="submit" value="Submit"> 

  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
  </form> 
    
  </center>

</body>

<?php 

  $p_id = $_POST['p_id'];
  $p_name = $_POST['p_name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];

  $sql1 =<<<EOF
    insert into passenger(p_id,p_name,age,gender)
    values ('$p_id','$p_name','$age','$gender');  
EOF;

   $ret = $db->exec($sql1);
   if(!$ret){
    echo $db->lastErrorMsg();
   } else {
     echo "Details stored successfully\n";
   }
   $db->close();
?>


