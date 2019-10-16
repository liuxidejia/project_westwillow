<?php
    header("Content-type:text/html;charset=utf-8");

    $username = $_POST['username'];
    $userpass = $_POST['userpass'];

    $con=mysql_connect("localhost","root","root");

    if(!$con){
        echo("数据库出错！".mysql_error());
        
        
    }else{
        mysql_select_db("mydb1908",$con);

        $sqlstr="select * from westwillow where username='$username'and userpass ='$userpass'";
        $result = mysql_query($sqlstr,$con);
        $rows = mysql_num_rows($result);
        if($rows>0){
            mysql_close($con);//关闭数据库
            echo "1";//登录成功
        }else{
            echo "0";//登录失败
        }
    }