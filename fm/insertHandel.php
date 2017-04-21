<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/14
 * Time: 16:53
 */
@$title=empty($_POST['title'])?null:$_POST['title'];
@$author=empty($_POST['source'])?null:$_POST['source'];
$conn=  mysqli_connect("localhost","root");
mysqli_select_db($conn,"zhq");
mysqli_query($conn,"set names utf8");

//sql删除
$sql="insert into n_cont(title,source,date) values('{$title}','{$author}',now())";
$rs= mysqli_query($conn,$sql);
if($rs){
    echo 1;
}else{
    echo 0;
}