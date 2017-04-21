<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>DataGrid Complex Toolbar - jQuery EasyUI Demo</title>
  <link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
  <link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
  <link rel="stylesheet" type="text/css" href="easyui/demo/demo.css">
  <script type="text/javascript" src="easyui/jquery.min.js"></script>
  <script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>
</head>
<style>
  *{
    padding: 0;
    margin: 0;
  }
</style>
<script>
  var nowPage=1;
  //表单查询
  function query(page,rows){
    $('#ff').form({
      url:"newshandle.php",
      onSubmit: function(param){
        param.page = page;
        param.rows = rows;
      },
      success:function(data){
        var obj=eval("("+data+")");
        $("#table").datagrid("loadData",obj);

      }
    }).submit();
  }
  //获取table的分页组件
  $(function(){
    var page= $('#table').datagrid('getPager');
    page.pagination({
      onSelectPage:function(pageNumber, pageSize){
        nowPage=pageNumber;
        query(nowPage,pageSize);
        $('#table').datagrid('gotoPage', nowPage);
      }
    });
  });
  //表单删除
  function deleteNews(){
    var rows= $('#table').datagrid('getChecked');
    var ids=[];
    for(var i=0;i<rows.length;i++){
      ids.push(rows[i].id);
    }
    // delete from t_news where id in(1,2,3,4,5)
    $.get("deleteHandel.php",{ids:ids.join(",")},function(result){
      if(result-1==0){
        $.messager.alert('提示','<h1>删除成功！！</h1>');
        query(nowPage,10);
      }else{
        $.messager.alert('提示','删除失败');
      }
    });
  }
  //增加
  function insert(){
    $('#dd').dialog({
      title: '添加人员信息',
      width: 400,
      height: 200,
      closed: false,
      cache: false,
      modal: true
    });
//    $('#dd').dialog('refresh', 'new_content.php');
  }
  //人员信息发布
  function pubsh(){
    $('#pub').form({
      url:"insertHandel.php",
      onSubmit: function(){
      },
      success:function(data){
        $.messager.alert('提示','<h1>增加成功！！</h1>');
        query(nowPage,10);
        $('#dd').dialog({
              closed: true
            });
      }
    }).submit();
  }
</script>
<body style="padding:0">
<table class="easyui-datagrid" title="DataGrid Complex Toolbar" id="table" style="width:100%;height:400px"
        data-options="
        ctrlSelect:true,
        pagination:true,
        rownumbers:true,
        url:'newshandle.php',
        method:'get',
        toolbar:'#tb',
        footer:'#ft'">
  <thead>
  <tr>
    <th field="ck" checkbox="true"></th>
    <th data-options="field:'id',width:30">ID</th>
    <th data-options="field:'userid',width:50">userid</th>
    <th data-options="field:'title',width:180,align:'right'">title</th>
    <th data-options="field:'source',width:180,align:'right'">source</th>
    <th data-options="field:'writer',width:40">writer</th>
    <th data-options="field:'date',width:260,align:'center'">date</th>
  </tr>
  </thead>
</table>
<div id="tb" style="padding:2px 5px;">
  <form  id="ff" method="post" action="newshandle.php">
    writer:
      <input type="text" class="easyui-textbox" name="writer">
      来源:
     <input type="text" class="easyui-textbox" name="source">

      <a class="easyui-linkbutton" iconCls="icon-search" onclick="query(1,10)">查找</a>
  </form>
</div>

<!--模态框，增加人员信息-->
<div id="dd" title="My Dialog" style="display:none;!important;width:400px;height:200px;">
  <br><br><br>
    <form  id="pub" action="insertHandel.php" method="post">
      标题:
      <input type="text"  name="title"><br><br><br>
      来源:
      <input type="text"  name="source">
      <a class="easyui-linkbutton" iconCls="icon-search" onclick="pubsh()">发布</a>

    </form>
</div>
<div id="ft" style="padding:2px 5px;">
  <a class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="insert()"></a>
  <a class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="deleteNews()"></a>
</div>
</body>
</html>