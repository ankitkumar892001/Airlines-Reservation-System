<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('airdatabase.db');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Created airdatabase successfully<br>";
   }

   $sql1 =<<<EOF
      create table passenger(
      p_id int primary key,
      p_name varchar(20) not null,
      age int not null,
      gender varchar(6) not null
      );
EOF;

   $ret = $db->exec($sql1);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "passenger table created successfully<br>";
   }
   

   $sql2 =<<<EOF
      create table airline(
      a_id int primary key,
      a_name varchar(20) not null,
      capacity int,
      fare float 
      );
EOF;

   $ret = $db->exec($sql2);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "airline table created successfully<br>";
   }


   $sql3 =<<<EOF
      create table ticket(
      ticket_no int primary key ,
      p_id int ,
      p_name ,
      a_id int ,
      a_name ,
      foreign key(p_id) references passenger(p_id),
      foreign key(a_id) references airline(a_id)
      );
EOF;

   $ret = $db->exec($sql3);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "ticket table created successfully<br>";
   }
   
   $db->close();
?>