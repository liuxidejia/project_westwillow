<?php
    header("Content-type:text/html;charset=utf-8");

    $username = $_POST['username'];
    $userpass = $_POST['userpass'];

    $con = mysql_connect("localhost","root","root");

    if(!$con){
        echo("数据库出错！".mysql_error());
    }else{
        mysql_select_db("mydb1908",$con);//选择数据库(mydb1908是我数据库的名字)

        //执行SQL语句（数据传输）
        $sqlstr = "select * from westwillow where username ='$username'";//查询数据库表中存不存在该用户
        $result = mysql_query($sqlstr,$con);
        $rows = mysql_num_rows($result);//获取结果的行数
        
        if($rows>0){
            mysql_close($con);
            echo "-1";//用户名已被使用
        }else{
            $sqlstr = "insert into westwillow(username,userpass) values('$username','$userpass')";
            $result = mysql_query($sqlstr,$con);
            mysql_close($con);
            if($result!=1){
                echo "0";//注册失败
            } else{
                echo "1";//注册成功
            }
        }
    }