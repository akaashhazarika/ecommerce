<?php
require_once('../../config.php');
if(isset($_GET['id']))
{
	$query=queery("DELETE FROM orders WHERE order_id={$_GET['id']} ");
	confirm($query);
	setmessage("ORDER DELETED");
}
redirect("../../../public/admin/index.php?orders");





?>