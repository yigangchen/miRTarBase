<?php 
  //1.建立连接和认证
   $host = '127.0.0.1';
   $port = '3306';
   $user = 'chen';
   $pass = '00000000';
   $link = mysql_connect("$host:$port",$user,$pass);
   //2.发送操作指令
   $sql = 'show databases';
   $result = mysql_query($sql);
   //3.输出返回结果
    //var_dump($result);

   //利用循环结构，每次从资源结果集中取出一条记录
   while ($row = mysql_fetch_array($result)) {
      echo $row['Database'];
      echo '<br/>';
   }
   //断开连接
   mysql_close($link);
 ?>