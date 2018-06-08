<?php
require_once('../../config.php');
if(isset($_GET['id']))
{
	$query=queery("DELETE FROM userdetails WHERE user_id={$_GET['id']} ");
	confirm($query);
	setmessage("USER DELETED");
}
redirect("../../../public/admin/index.php?users");





?>