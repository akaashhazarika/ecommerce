<?php
require_once('../../config.php');
if(isset($_GET['id']))
{
	$query=queery("DELETE FROM side_nav WHERE side_id={$_GET['id']} ");
	confirm($query);
	setmessage("CATEGORY WITH ID {$_GET['id']} DELETED");
}
redirect("../../../public/admin/index.php?categories");





?>