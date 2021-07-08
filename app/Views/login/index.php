<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$title;?></title>
</head>
<body>
<p><?=$notice;?></p>
<form action="<?=base_url();?>/do_login" method="POST">
	<label>Username: </label><input type="text" name="username"><br />
	<label>Password: </label><input type="password" name="password"><br />
	<input type="submit" value="Submit">
</form>
</body>
</html>