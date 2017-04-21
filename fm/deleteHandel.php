<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 14:27
 */


$ids=$_GET["ids"];

$conn=  mysqli_connect("localhost","root");
mysqli_select_db($conn,"zhq");
mysqli_query($conn,"set names utf8");

//sql删除
$sql="delete from n_cont where id in ({$ids})";
$rs= mysqli_query($conn,$sql);

//echo $sql;
if($rs){
    echo 1;
}else{
    echo 0;
}