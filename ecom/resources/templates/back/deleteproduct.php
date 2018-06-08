<?php
require_once('../../config.php');
if(isset($_GET['id']))
{
	$query=queery("DELETE FROM products WHERE product_id={$_GET['id']} ");
	confirm($query);
	setmessage("PRODUCT DELETED");
}
redirect("../../../public/admin/index.php?products");





?>