<?php

  include_once('quickbase.php');//include the api file

  //Variables to hold our account info
  $qbUser     = 'bennyquickbase';
  $qbPassword = 'qbbjPass23';
  $qbAppToken = 'ck34hnsd8t2jirb2i7329dz7ue3j';
  
  $qb = new QuickBase($qbUser, $qbPassword, $qbAppToken, true, '', '', '');
  $qb->db_id = 'Tweets' ;
  print_r($qb);
  print "<br>object qb printed<br>";
  $recordVals = array(
    array(
        'Hashtags'   => 'LowCode',
        'Twitter Username' => 'josephbenny',
        'Tweet Content' => 'API added',
        'Date' => '03-18-2018'
    )
  );
  $results = $qb->add_record($recordVals);
  print "<br>";
  print_r($results);
  print "results printed in tweetupdate.php<br>";
  $rid = $results->rid;