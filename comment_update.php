<?php
require_once('mysql.php');
if (!$_SESSION['username']) {
    exit('<script>alert("当前用户未登录");window.location.href="login.php"</script>');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>留言</title>
    <style>
        #comment {
            width: 500px;
            height: 200px;
            background-color: transparent;
            border-radius: 20px;
            resize: none;
            font-size: 30px;
            color: black;
            font-weight: 900;
        }

        div {
            width: 500px;
            height: 200px;
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -100px 0 0 -250px
        }
    </style>
</head>
<body>
<?php
$rid = intval($_GET['rid']);
if (!$rid) {
    exit('<script>alert("参数错误");history.back();</script>');
}
$sql = "select comment from replyList where rid=" . $rid . " and uid = " . $_SESSION['uid'];
$info = $db->getRow($sql);
if (!$info) {
    exit('<script>alert("参数错误");history.back();</script>');
}
?>
<div align="center">
    <form action="comment_update_do.php" method="post" enctype="multipart/form-data">
        <textarea type="text" id="comment" name="comment"><?php echo $info['comment']; ?></textarea><br>
        <input type="hidden" id="rid" name="rid" value=<?php echo $rid ?>>
        <input type="submit" name="submit" id="submit" value="确定">
    </form>
</div>
</body>
</html>