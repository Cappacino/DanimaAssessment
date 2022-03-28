<?php

function getConnection()
{
  $configs = include('config.php');

  $servername = $configs["host"];
  $username = $configs["username"];
  $password = $configs["password"];
  $dbname = $configs["dbname"];

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  return $conn;
}
