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
      echo "";
   }

   $sql =<<<EOF
      select * from ticket;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "<br>";
      echo "Ticket number:".$row['ticket_no']; 
      echo "<br>";
      echo "Passenger identity:".$row['p_id']; 
      echo "<br>";
      echo "Passenger name:".$row['p_name']; 
      echo "<br>";
      echo "Airline identity:".$row['a_id']; 
      echo "<br>";
      echo "Airline name:".$row['a_name']; 
      echo "<br>";
   }
   
   $db->close();
?>