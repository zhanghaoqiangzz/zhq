<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Complex Layout - jQuery EasyUI Demo</title>
  <link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
  <link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
  <link rel="stylesheet" type="text/css" href="easyui/demo/demo.css">
  <script type="text/javascript" src="easyui/jquery.min.js"></script>
  <script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>
<!--自己引入的样式-->
  <link rel="stylesheet" href="css/main.css">
  <script>
    function showTag(title,url){
      if ($('#tt').tabs('exists', title)){
        $('#tt').tabs('select', title);
      } else {
        var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
        $('#tt').tabs('add',{
          title:title,
          content:content,
          closable:true
        });
      }
    }
  </script>


  <style>
    *{
      margin: 0;
      padding: 0;
    }
    .zhq li{
      width: 100%;
      height: 30px;
      line-height: 30px;
      border-bottom: 1px solid lightgray;
      text-indent: 20px;
      cursor: pointer;
    }
    .zhq li:hover{
      background-color: lightgray;
    }


  </style>
</head>
<body class="easyui-layout">
  <div data-options="region:'north'" style="height:100px">
      <div class="img_header">
        <div class="center">
          <div class="logo_img">
            <img src="img/logo.png" alt="logo">
            <img src="img/font.png" alt="font">
          </div>
          <div class="floatRight">
            <ul>
              <li> <img src="img/user_h.png" alt="user"></li>
              <li> <img src="img/forget_h.png" alt="forget"></li>
              <li> <img src="img/setting_h.png" alt="setting"></li>
            </ul>
          </div>
          <div style="clear: both"></div>
        </div>
      </div>
  </div>
  <div data-options="region:'south',split:true" style="height:60px;">
    <div data-options="region:'north'" style="height:52px">
      <div class="img_header"></div>
    </div>
  </div>
  <div data-options="region:'west',split:true" title="West" style="width:210px;">
    <div class="easyui-accordion" data-options="fit:true,border:false">
      <div title="学生信息" data-options="selected:true">
        <ul class="zhq">
          <li onclick="showTag('新闻','news.php')">新闻</li>
          <li onclick="showTag('百度','http://www.baidu.com')">百度</li>
          <li onclick="showTag('淘宝','http://www.taobao.com')">淘宝</li>
        </ul>
      </div>
      <div title="Title2">
        content2
      </div>
      <div title="Title3">
        content3
      </div>
    </div>
  </div>
  <div data-options="region:'center',title:'Main Title',iconCls:'icon-ok'">
    <div id="tt" class="easyui-tabs" data-options="fit:true,border:false,plain:true">
        <div title="主页">

        </div>
    </div>
  </div>

</body>
</html>