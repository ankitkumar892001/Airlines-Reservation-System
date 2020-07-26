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
      select * from airline;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "<br>";
      echo "Airline identity:".$row['a_id']; 
      echo "<br>";
      echo "Airline name:".$row['a_name'];
      echo "<br>";
      echo "Capacity:".$row['capacity'];
      echo "<br>";
      echo "Fare:".$row['fare'];
      echo "<br>";
   }
   
   $db->close();
?>