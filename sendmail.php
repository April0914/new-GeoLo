<?php
  $name = $_REQUEST['name'] ;
  $subject = $_REQUEST['subject'] ;
  $message = $_REQUEST['message'] ;

  mail( "developer_kehinde@outlook.com", "Feedback Form Results",
    $message, "From: $name, $subject" );
  header( "Location: index.html#directions_map" );
?>
