<?php
//导入page.class.php文件
include 'Page.class.php';
$pdo=new PDO("mysql:host=localhost;dbname=demo","root","");
$pdo->query("set names utf8");
$total=$pdo->query("select * from member")->rowCount();
//echo $total;
//实例化分页类，传总记录数，默认每页显示5个，可以自定义
$page=new Page($total,2);
$sql="select * from member " .$page->limit;
$result=$pdo->query($sql);
$data=$result->fetchAll(PDO::FETCH_OBJ);
//echo "<pre>";
//var_dump($data);
//echo "</pre>";
foreach($data as $key=>$value){
    echo $value->username."<br>";
    //echo "<pre>";
    //var_dump($value);
    //echo "</pre>";
}
echo "<hr>";

//输入不同的数字，有不同的效果
echo  $page->display(array(0,1,2,3,4));
?>
<link href="https://cdn.bootcss.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet">
<style>
ul{
 list-style:none;
}

ul li{
    float:left;
    width:25px;
    height:25px;
    line-height:25px;
    text-align:center;
    border:1px solid #ddd;
}


ul li.next{
    width:125px;
}
.present{
    background:orange;
     color:white;
}
</style>