<?php
     header("Content-type:text/html;charset=utf-8");
    //1、接收前端的数据

    $username = $_POST['username'];
    $userpass = $_POST['userpass'];

    //2、处理
     //1)、链接数据库(搭桥)
    
     $con = mysql_connect("localhost","root","root");

    if(!$con){
        echo("数据库出错".mysql_error());
    }else{
        //2)、选择库（选择目的地）
        mysql_select_db("mydb1908",$con);

        //3)、执行SQL语句（数据传输）
        //3.1)
        $sqlstr="select * from westwillow where username='$username'";//查询该用户名在数据库中有没有。 
        $result = mysql_query($sqlstr,$con);
        $rows = mysql_num_rows($result);//返回结果的行数


        if($rows>0){
            //4)、关闭数据库
            
            $sqlstr= "update westwillow set userpass='$userpass' where username='$username'";
            $result = mysql_query( $sqlstr,$con);
        //     //4)、关闭数据库  
            mysql_close($con);
            echo "1";//修改成功
        }else{
            mysql_close($con);
             //3、响应
            echo "0";//修改失败
              
        }
    }
?>
