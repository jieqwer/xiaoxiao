<html>
<head>
    <meta charset="utf-8">
    <title>2222</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <style>

        body{padding: 20px;}
        .demo-input{padding-left: 10px; height: 38px; min-width: 262px; line-height: 38px; border: 1px solid #e6e6e6;  background-color: #fff;  border-radius: 2px;}
        .demo-footer{padding: 50px 0; color: #999; font-size: 14px;}
        .demo-footer a{padding: 0 5px; color: #01AAED;}
    </style>
</head>
<body>
<input type="text" class="demo-input"  placeholder="请选择日期" id="test4">



<script src="../js/laydate.js"></script>
<script>
  /*  lay('#version').html('-v'+ laydate.v);*/

    //执行一个laydate实例
    laydate.render({
        elem: '#test4' //指定元素
        ,type: 'datetime',
        theme: '#3ed'
        ,format:'yyyy年MM月dd日 HH时mm分ss秒'

    });
</script>
</body>
</html>

