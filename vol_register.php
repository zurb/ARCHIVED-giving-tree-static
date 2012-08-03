<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h2>Register to Volunteer</h2>
<strong>Task:</strong> <?php echo $_GET["taskName"]; ?>
<form>
<p><label for="name"></label><input type="text" id="name"></p>
<p><label for="email"></label><input type="text" id="email"></p>
<p><label for="emailconfirm"></label><input type="text" id="emailconfirm"></p>
<p><label for="phone"></label><input type="text" id="phone"></p>
</form>
</body>
</html>