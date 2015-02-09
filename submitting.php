<?php
date_default_timezone_set('America/Indiana/Tell_City');
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $content = $_POST['content'];

    require("database.php");
    $createtime = date("Y-m-d h:i:s");
    $insert_sql = "INSERT INTO guestbook(nickName,email,contents,createtime)VALUES";
    $insert_sql .= "('$nickname','$email','$content','$createtime')";
    $count = $db->exec($insert_sql);
    if($count == 1){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Refresh" content="2;url=index.php">
<title>Message Submitted</title>
</head>
<body>
	<div class="refresh">
		<p>The message has been submitted.<br />Please wait, the webpage is redirecting...</p>
	</div>
</body>
</html>
<?php
} else {
echo 'Fail the submit the message: [ <a href="javascript:history.back()">return</a> ]';
}
?>