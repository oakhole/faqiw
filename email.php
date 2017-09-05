<?php
	if(!$_POST){
		header('location:index.html');
	}

/**
用PHPMailer类来发信

步骤:
0: 引入
1: 实例化
2: 配置属性
3: 调用发送

**/

require('./PHPMailer/class.phpmailer.php');

$phpmailer = new PHPMailer();


/*
设置phpmailer发信用的方式
可用用win下mail()函数来发
可以用linux下sendmail,qmail组件来发
可以利用smtp协议登陆到某个账户上,来发
*/
$phpmailer->CharSet='utf-8';
$phpmailer->Encoding='base64';
$phpmailer->IsSMTP();  // 用smtp协议来发

$phpmailer->Host = 'smtp.qq.com';
$phpmailer->SMTPAuth = true;
$phpmailer->Username = '48225405@qq.com';
$phpmailer->Password = 'xiaoqinqin@0923';

// 可以发信了

$phpmailer->From = '48225405@qq.com';
$phpmailer->FromName = '网站制作咨询';
$phpmailer->Subject =  '网站制作咨询';
$phpmailer->Body = '姓名：'.$_POST["name"].'联系电话：'.$_POST["phone"].'需求：'.$_POST["msg"];

//设置收信人
$phpmailer->AddAddress('18652023713@163.com','付洋');
// 添加一个抄送
// $phpmailer->AddCC('410406130@qq.com','大爷');

// 发信

echo $phpmailer->send()?'true':'false';
