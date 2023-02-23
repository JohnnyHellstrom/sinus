<?php

class DataWash
{
  public static function testInput($data)
  { 
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}