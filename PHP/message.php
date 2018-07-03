    <meta charset="UTF-8">
<?php

include_once("opensql.php");
require_once  '../Connect2.1/qqConnectAPI.php';
if($_SESSION["mail"]=="登录"){
    header("refresh:0;url=login.php");
    echo '<script>alert("你还没有登录，请先登录");</script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon"  href="../images/xiaoxiao2.ico">
    <link  rel="stylesheet" type="text/css" href="../style/message.css">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <title>小小de风景</title>
    <style type="text/css">
#shopping_box{
    width: 500px;
    height: 300px;
    background: #c24d67;
    color: #fff;
    position: fixed;
    top: 50%;
    left: 50%;
    margin: -250px 0 0 -150px;
    text-align: center;
    font-size: 30px;
    line-height: 100px;
    transform: scale(0);
    transition: all .3s;
}
#close{
    width: 20px;
    height: 20px;
    display: inline-block;
    position: absolute;
    top: 0;
    right: 0;
    cursor: pointer;
}
.shang {
    width: 80%;
    margin: 20px auto;
    height: 50px;
    text-align: center;
    background: #cc2a4f;
    border: 1px solid white;
    color: white;
    display: block;
    line-height: 40px;
    font-size: 12px;
    cursor: pointer;
}

.ha{
        width: 80%;
    margin: 20px auto;
    height: 50px;
    text-align: center;
    background: #cc2a4f;
    border: 1px solid white;
    color: white;
    display: block;
    line-height: 40px;
    font-size: 12px;
    cursor: pointer;
}
.shang input {
    opacity: 0;
    position: absolute;
    margin-top: -40px;
    width: 80%;
    height: 50px;
    display: block;
}

    </style>

</head>
<body>

<div class="top">
    <div class="toplei">
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a>MENU</a></li>
            <li><a>NEWEST</a></li>
            <li><a>FIND</a></li>
        </ul>
        <ul>
            <li>
                 <!-- <img src="../images/xiaoxiao1.ico">  -->
            </li>
        </ul>

<?php 

$mail=$_SESSION["mail"];
$sqlq="select * from tb_hear where h_user in (select us_id from tb_user  where us_name='$mail') ";
$xianq=$mysqldb->select($sqlq);
$rq=mysql_fetch_array($xianq);
?>

        <ul>
            <li class="touxiang"><a href="message.php">
             <?php
            if(empty($rq)){
                echo "<img style='width: 62px;height: 62px;display: block;border-radius: 50%;' src='../images/5ad88136557ec.png'>";
            }else{
            echo "<img style='width: 62px;height: 62px;display: block;border-radius: 50%;' src='../images/$rq[0]'>";
            }
                       ?>
            </a></li>           
            <li ><a  href="login.php"><?php  if(empty($_SESSION["mail"])){  $_SESSION['mail']="登录"; echo $_SESSION['mail'];}else{echo  $_SESSION['mail'];}   ?></a></li>
            <li><?php  if(($_SESSION['mail'])=="登录"){ echo "<a href='login.php'>注册</a>";}else{ echo '<a href="ssion.php">退出</a>';}    ?></li>
            <li><a href="fabu.php">发布</a></li>
        </ul>
    </div>
</div>


<div class="ms1">
    <div class="ms11"><a href="index.php">Home</a><span>/</span><h5>个人中心</h5></div>
    <div class="ms1left">
        <div class="ms1left1">
            <h2>PROMULGATOR</h2>
            <div>
                <a><?php
            if(empty($rq)){
                echo "<img style='width: 62px;height: 62px;display: block;border-radius: 50%;' src='../images/5ad88136557ec.png'>";
            }else{
            echo "<img style='width: 62px;height: 62px;display: block;border-radius: 50%;' src='../images/$rq[0]'>";
            }
                       ?></a>
            </div>
            <div>
                <a><?php echo $_SESSION['mail'] ?></a>
                <a><?php  echo "地址" ?></a>
            </div>
        </div>
        <ul>
            <?php
            include_once("opensql.php");
            $name=$_SESSION['mail'];
            $sql3="select * from tb_guanzhu  where us_id in  (select us_id from tb_user where us_name='$name')";
            $xian3=$mysqldb->select($sql3);
            $r3=mysql_num_rows($xian3);
            echo ' <li><span><img src="../images/guanzhu.png"></span><a>关注我的人数</a><i>'.$r3.'</i></li>';

            $sql4="select * from tb_guanzhu  where gname='$name'";
            $xian4=$mysqldb->select($sql4);
            $r4=mysql_num_rows($xian4);
            echo ' <li><span><img src="../images/guanzhu1.png"></span><a>我关注的人数</a><i>'.$r4.'</i></li>';

            $sql5="select * from tb_images  where us_name='$name'";
            $xian5=$mysqldb->select($sql5);
            $r5=mysql_num_rows($xian5);
            echo ' <li><span><img src="../images/fabu.png"></span><a>我的发布数量</a><i>'.$r5.'</i></li>';

            $sql6="select * from tb_love  where us_name='$name'";
            $xian6=$mysqldb->select($sql6);
            $r6=mysql_num_rows($xian6);
            echo ' <li><span><img src="../images/xihuan.png"></span><a>我喜欢的数量</a><i>'.$r6.'</i></li>';
            ?>
            <li><span><img src="../images/sui1.png"></span><a style="cursor:pointer;" id="shopping">更换头像</a></li>      
        </ul>
        <ul>
            <?php
            include_once("opensql.php");
            $sql7="select * from tb_tishixinxi";
            $xian7=$mysqldb->select($sql7);
            while ($info7=mysql_fetch_array($xian7)) {
                echo   ' <li><span><img src="../images/'.$info7["t_url"].'"></span><a>'.$info7["t_mess"].'</a></li>';
            }
            ?>
        </ul>


    </div>
    <div class="ms1right">
        <div class="nav" id="nav">
        <ul>
            <li>我的关注</li>
            <li>我的发布</li>
            <li>我的喜欢</li>
            <li>其它</li>
        </ul>
            <div class="nav_bg">
                <span></span>
            </div>
        </div>
        <ul id="content" >
            <li style="background: #ece4e6">
                <div class="content1">

                    <?php
                    include_once("opensql.php");
                    $name=$_SESSION['mail'];
                    $num_rec_per_page=3;   // 每页显示数量
                    $sql1="select * from tb_images    where im_id in  (select min(im_id) from tb_images   where us_name  in( select us_name from tb_user where us_id in(select tb_guanzhu.us_id  from tb_guanzhu join  tb_user on tb_guanzhu.us_id=tb_user.us_id  where tb_guanzhu.gname='$name' ))  group by us_name) ";//准备sql语句
                    $xian1=$mysqldb->select($sql1);
                    $r=ceil(mysql_num_rows($xian1)/$num_rec_per_page);
                    if(empty($_GET['page'])){
                        $page=1;
                    }else{
                        $page=$_GET['page'];
                    }
                    if( $page==1){
                        $shang=1;
                    }else{
                        $shang=$page-1  ;
                    }
                    if($page>=$r){
                        $next=$r;
                    }else{
                        $next=$page+1  ;
                    }
                    $start_from =($page-1)*$num_rec_per_page;
                    $sql="select * from tb_images    where im_id in  (select min(im_id) from tb_images   where us_name  in( select us_name from tb_user where us_id in(select tb_guanzhu.us_id  from tb_guanzhu join  tb_user on tb_guanzhu.us_id=tb_user.us_id  where tb_guanzhu.gname='$name' ))  group by us_name) limit $start_from,$num_rec_per_page";//准备sql语句
                    $xian=$mysqldb->select($sql);
                    while ($info=mysql_fetch_array($xian)) {
                    echo '<a href="user.php?id='.$info[0].'"><img src="../images/'.$info[5].'"><span>'.$info[0].'</span></a> ';
                    }
                    echo "  <div class='fenye'>
                            <a href='message.php?page=1'>《</a>
                            <a href='message.php?page=$shang'>上一页</a>
                            <a href='message.php?page=$next'>下一页</a>
                            <a href='message.php?page=$r'>》</a>
                    </div>"
                    ?>

                </div>
            </li>
            <li style="background: #ece4e6">
                <div  class="gun">
                <div class="content1">
                    <?php
                    include_once("opensql.php");
                    $name=$_SESSION['mail'];
                    $sql3="select * from tb_images  where  us_name='$name'";//准备sql语句
                    $xian3=$mysqldb->select($sql3);
                    while ($info1=mysql_fetch_array($xian3)) {
                        echo '<a  href="user.php?id='.$info1[0].'"><img src="../images/'.$info1[5].'"><span>'.$info1[0].'</span></a> ';
                    }
          /*          echo "  <div class='fenye'>
                            <a href='message.php?page1=1'>《</a>
                            <a href='message.php?page1=$shang'>上一页</a>
                            <a href='message.php?page1=$next'>下一页</a>
                            <a href='message.php?page1=$r1'>》</a>
                    </div>"*/
                    ?>
                </div>
                </div>
            </li>
            <li style="background: #ece4e6">
                <div  class="gun">
                    <div class="content1">
                        <?php
                        include_once("opensql.php");
                        $name=$_SESSION['mail'];
                        $sql2="select * from tb_images  where im_id in (select im_id from tb_love where us_name='$name') ";//准备sql语句
                        $xian2=$mysqldb->select($sql2);
                        while ($info1=mysql_fetch_array($xian2)) {
                            echo '<a  href="user.php?id='.$info1[0].'"><img src="../images/'.$info1[5].'"><span>'.$info1[0].'</span></a> ';
                        }
                        ?>

                    </div>
                </div>
            </li>
            <li style="background:#ece4e6"></li>
        </ul>
    </div>


</div>

<div id="shopping_box">
    <h2>上传头像</h2>
    <form action="hear.php" name='form1' method='post' enctype="multipart/form-data">
  <a class="shang">上传文件(鼠标悬停在上面可以查看是否添加文件)<input type="file" name='picture' ></a>
   <input class="ha" type="submit" value="提交">
   </form >
    <img src="../images/x.png" id="close">
</div>


<div class="huidao">
    <div class="toop"><span></span></div>
    <div class="boot"><span></span></div>
</div>


<div class="beian">
    蜀ICP备18006488号-2
</div>
<script>

        $(".toop").click(function () {
            $('html,body').animate({
                scrollTop: 0//高度
            }, 1000);//s时间
        });

        $(".boot").click(function () {
            $('html,body').animate({
                scrollTop:$("body").css("height" )//高度
            }, 1000);//s时间
        });

        $(window).trigger('scroll');/*触发滚动事件，避免刷新的时候显示回到顶部按钮*/

        var nav=document.getElementById("nav");
        var li=nav.getElementsByTagName("li");console.log(li);
        var nav_bg=nav.querySelector("div");
        var content=document.getElementById("content");
        for(var i=0;i<li.length;i++){
            var tli=li[i];
            tli.index=i;
            tli.onclick=function(){
                nav_bg.style.marginLeft=25*this.index+"%";
                content.style.marginLeft=-900*this.index+"px";

            }}

var shoppingBtn = document.getElementById("shopping");
var shoppingBox = document.getElementById("shopping_box");
var close = document.getElementById("close");

shoppingBtn.onclick  =function () {
    shoppingBox.style.transform  = "scale(1)";
};
close.onclick = function () {
    shoppingBox.style.transform  = "scale(0)";
};
$("#tear").click(function(){

})

</script>



</body>
</html>