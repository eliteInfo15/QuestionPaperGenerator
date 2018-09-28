<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>welcome <?php echo $this->session->userdata('username_session'); ?></h1>
<?php echo form_open('Controller/logout'); ?>

<input type="submit" name="" value="logout">
</form>
</body>
</html>