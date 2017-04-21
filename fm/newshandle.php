<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/13
 * Time: 16:38
 */
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
    $array =array();
    //获取标题
    $whereSql=" 1=1 ";
    @$title=empty($_POST['writer'])?null:$_POST['writer'];
    @$author=empty($_POST['source'])?null:$_POST['source'];
    if($title!=null){
        $whereSql.=" and writer like '{$title}%'";
    }
    if($author!=null){
        $whereSql.=" and source like '{$author}%'";
    }
$coon=mysqli_connect("localhost","root") or die("连接失败");
mysqli_select_db($coon,"zhq") or die(mysqli_error($coon));
mysqli_query($coon,"set names utf8");
$sql="select  *  from n_cont where {$whereSql} limit ".(($page-1)*$rows).",".$rows."";
$rs=mysqli_query($coon,$sql) or die(mysqli_error($coon));
//将查询的对象放入数组
while($r=mysqli_fetch_object($rs)){
    $array[]=$r;
}
$finalArray = array("total"=>getTatelMessage($sql="select  count(*) num  from n_cont  where {$whereSql}"),"rows"=>$array);
echo json_encode($finalArray);

//目前为止，关闭连接
mysqli_close($coon);


function getTatelMessage($sql="select  count(*) num  from n_cont"){
    $coon=mysqli_connect("localhost","root") or die("连接失败");
    mysqli_select_db($coon,"zhq") or die(mysqli_error($coon));
    mysqli_query($coon,"set names utf8");
    $rs=mysqli_query($coon,$sql);
    $num=mysqli_fetch_object($rs)->num;
    return $num;
};