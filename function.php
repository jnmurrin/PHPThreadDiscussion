<?php
require 'database.php';
$pagesize = 4;
if(isset($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = 1;
}
$offset = ($p-1)*$pagesize;

$query = "SELECT * FROM GUESTBOOK ORDER BY ID DESC LIMIT $offset, $pagesize";
$results = $db->query($query);

//getting number of messages
$count_sql = "SELECT count(*) FROM guestbook";
$count_result = $db->query($count_sql);
$count_array = $count_result->fetch();

$pagenum=ceil($count_array[0]/$pagesize);

//getting info from car table
$carQuery = "SELECT * FROM cars ORDER BY carId DESC";
$carResults = $db->query($carQuery);

?>
