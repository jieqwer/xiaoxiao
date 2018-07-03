<meta charset="UTF-8">
<?php

include_once("opensql.php");
session_start();
$mail=$_SESSION['mail'];
$sql4="select * from tb_user  where us_name='$mail'";
            $xian4=$mysqldb->select($sql4);
            $r4=mysql_fetch_array($xian4);

$sql3="select * from tb_hear where h_user='$r4[2]'";
            $xian3=$mysqldb->select($sql3);
            $r3=mysql_num_rows($xian3);


 if(empty($_FILES["picture"]['name'])){
        echo '<script>alert("没有上传头像")</script>';
        header("refresh:1;url=message.php");
    }else{
    		if($r3>0){
		$img=$_FILES["picture"]['name'];
        $type = strtolower(substr($img,strrpos($img,'.')+1)); //得到文件类型，并且都转化成小写
        $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
        if(!in_array($type, $allow_type)){
            echo '<script>alert("不允许上传该类文件或你的文件为空")</script>';
            header("refresh:1;url=message.php");
        }else{
            $imgname= uniqid();
            $s=$imgname.'.png';
            $tmp = $_FILES["picture"]['tmp_name'];
            $filepath = '../images/';
            if(move_uploaded_file($tmp,$filepath.$imgname.".png")){
                $sql2="update tb_hear set 	h_url='$s' where h_user=$r4[2]";
                mysql_query($sql2);
                echo '<script>alert("上传成功")</script>';
                header("refresh:1;url=message.php");
            }else{
                echo '<script>alert("上传失败")</script>';
                header("refresh:1;url=message.php");
            }
        }
}else{
	$img=$_FILES["picture"]['name'];
        $type = strtolower(substr($img,strrpos($img,'.')+1)); //得到文件类型，并且都转化成小写
        $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
        if(!in_array($type, $allow_type)){
             echo '<script>alert("不允许上传该类文件或你的文件为空")</script>';
            header("refresh:1;url=message.php");
        }else{
            $imgname= uniqid();
            $s=$imgname.'.png';
            $tmp = $_FILES["picture"]['tmp_name'];
            $filepath = '../images/';
            if(move_uploaded_file($tmp,$filepath.$imgname.".png")){
                $sql2="insert into  tb_hear (h_url,h_user) values('$s','$r4[2]')";
                mysql_query($sql2);
                echo '<script>alert("上传成功")</script>';
                header("refresh:1;url=message.php");
            }else{
                 echo '<script>alert("上传失败")</script>';
                 header("refresh:1;url=message.php");
            }
        }
}




        
    }
?>