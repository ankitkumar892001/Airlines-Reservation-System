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
    background-image: url('airways2.jpg');
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>

<body>

  <center>
  
  <form action="" method="POST" > 
   
  Airline identity:<br> 
  <input type="text" name="a_id" > <br> 

  Airline name:<br> 
  <input type="text" name="a_name" > <br> 

  Capacity:<br> 
  <input type="text" name="capacity" > <br> 

  Fare:<br> 
  <input type="text" name="fare" > <br> <br>
  
  <input type="submit" value="Submit"> 
  
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

  </form> 
    
  </center>

</body>

<?php 

  $a_id = $_POST['a_id'];
  $a_name = $_POST['a_name'];
  $capacity = $_POST['capacity'];
  $fare = $_POST['fare'];

  $sql1 =<<<EOF
    insert into airline(a_id,a_name,capacity,fare)
    values ('$a_id','$a_name','$capacity','$fare');  
EOF;

   $ret = $db->exec($sql1);
   if(!$ret){
    echo $db->lastErrorMsg();
   } else {
     echo "Details stored successfully\n";
   }
   $db->close();
?>