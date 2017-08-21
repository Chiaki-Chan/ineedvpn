<?php
$aliname=$_POST["aliname"];  
$alizipcode=$_POST["alizipcode"];  
$aliphone=$_POST["aliphone"];  
$aliaddress=$_POST["aliaddress"];  
$aliorder=$_POST["aliorder"];  
$alimailtype=$_POST["alimailtype"];  
$alimoney=$_POST["alimoney"];  
$alimob=$_POST["alimob"];  
$alibody=$_POST["alibody"];
require_once("alipay_config.php"); 
require_once("alipay.php"); 
 
$cmd   = '0001'; 
$subject  = "订单号：".$aliorder; 
$body   = '商品介绍'; 
$order_no  = $aliorder; 
$price   = $alimoney; 
$url   = 'www.jb51.net';//你的网址 
$type   = '1'; 
$number   =  '1'; 
$transport  = $alimailtype; 
$ordinary_fee  = '0.00'; 
$express_fee  = '0.00'; 
$readonly  = 'true'; 
$buyer_msg  = $alibody; 
$seller   = $selleremail; 
$buyer   = ''; 
$buyer_name  = $aliname; 
$buyer_address  = $aliaddress; 
$buyer_zipcode  = $alizipcode; 
$buyer_tel  = $aliphone; 
$buyer_mobile  = $alimob; 
$partner  = '2088002008096997'; 
 
$geturl = new alipay; 
$link = $geturl->geturl 
 ( 
 $cmd,$subject,$body,$order_no,$price,$url,$type,$number,$transport, 
 $ordinary_fee,$express_fee,$readonly,$buyer_msg,$seller,$buyer, 
 $buyer_name,$buyer_address,$buyer_zipcode,$buyer_tel,$buyer_mobile,$partner, 
 $interfaceurl,$payalikey 
 ); 
?> 
<html> 
<head> 
<title>支付宝付款</title> 
<link href="admin_style.css" rel=stylesheet> 
<meta http-equiv=content-type content="text/html; charset=gb2312"> 
</head> 
 
<body> 
<table class=border id=table1 style="font-size: 9pt" height=185 cellspacing=0  
cellpadding=0 width=492 align=center border=0> 
  <tbody> 
  <tr> 
    <td class=topbg height=30> 
      <div align=center><strong>简易支付宝付款php版</strong></div></td></tr> 
  <tr> 
    <td style="border-left: #e4e4e4 1px solid; border-bottom: #e4e4e4 1px solid" colspan=3 height=150> 
      <table style="font-size: 9pt" height=137 width="100%" align=center bgcolor=#ffffff> 
        <tbody> 
        <tr class=tdbg> 
          <td width="14%">订单号码：</td> 
          <td width="86%"><? echo $aliorder; ?></td></tr> 
        <tr class=tdbg> 
          <td width="14%">收 货 人：</td> 
          <td width="86%"><? echo $aliname; ?></td></tr> 
        <tr class=tdbg> 
          <td width="14%">付款金额：</td> 
          <td width="86%"><b><? echo $alimoney; ?></b></td></tr> 
        <tr class=tdbg> 
          <td width="14%">收货地址：</td> 
          <td width="86%"><? echo $aliaddress; ?></td></tr> 
        <tr class=tdbg> 
          <td>物流方式：</td> 
          <td><? echo $alimailtype; ?> （1.平邮 2.快递 3.虚拟物品）</td></tr> 
        <tr class=tdbg> 
          <td>联系电话：</td> 
          <td><? echo $aliphone; ?></td></tr> 
        <tr class=tdbg> 
          <td>邮政编码：</td> 
          <td><? echo $alizipcode; ?></td></tr> 
        <tr class=tdbg> 
          <td>手机号码：</td> 
          <td><? echo $alimob; ?></td></tr> 
        <tr class=tdbg> 
          <td>客户留言：</td> 
          <td><? echo $alibody; ?></td></tr> 
        <tr class=tdbg> 
          <td></td> 
          <td><input type="button" name="submit21" onclick="网页特效:history.go(-1)" value="返回修改订单">       <a href="<?php echo $link?>" target="_blank"><img src="<?php echo $imgurl?>" alt="<?php echo $imgtitle?>" border="0" align='absmiddle' border='0'/></a> </td></tr></tbody></table></td></tr></tbody></table> 
</body></html>