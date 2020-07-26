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
      select * from passenger where gender='female';
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "<br>";
      echo "Passenger identity:".$row['p_id']; 
      echo "<br>";
      echo "Passenger name:".$row['p_name'];
      echo "<br>";
      echo "Age:".$row['age'];
      echo "<br>";
      echo "gender:".$row['gender'];
      echo "<br>";
   }
   
   $db->close();
?>