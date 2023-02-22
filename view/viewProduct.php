<?php

$productid = filter_input(INPUT_POST,'id',FILTER_UNSAFE_RAW);

if(isset($productid)){
   echo $productid;
}
