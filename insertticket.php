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
    background-image: url('airways3.jpg');
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>

<body>

  <center>
  
  <form action="" method="POST" > 
   
  Ticket number:<br> 
  <input type="text" name="ticket_no" > <br> 

  Passenger identity:<br> 
  <input type="text" name="p_id" > <br> 

  Passenger name:<br> 
  <input type="text" name="p_name" > <br> 

  Airline idnetity:<br> 
  <input type="text" name="a_id" > <br> <br> 
  
  Airline name:<br> 
  <input type="text" name="a_name" > <br> <br>

  <input type="submit" value="Submit"> 
  
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

  </form> 
    
  </center>

</body>

<?php 

  $ticket_no = $_POST['ticket_no'];
  $p_id = $_POST['p_id'];
  $a_id = $_POST['a_id'];
  
  $sql1 =<<<EOF
    insert into ticket(ticket_no,p_id,a_id)
    values ('$ticket_no','$p_id','$a_id');  
EOF;

   $ret = $db->exec($sql1);
   if(!$ret){
    echo $db->lastErrorMsg();
   } else {
     echo "Details stored successfully\n";
   }
   $db->close();
?>