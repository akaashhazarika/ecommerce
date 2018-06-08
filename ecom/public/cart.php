<?php  require_once('../resources/config.php')      ?>
<?php
if(isset($_GET['add']))
{



$query=queery("SELECT * FROM products WHERE product_id=".escape_string($_GET['add'])."");
confirm($query);

while($row=fetch_array($query))
	{

if($_SESSION['product_'.escape_string($_GET['add'])]!=$row['quantity'])
{
$_SESSION['product_'.escape_string($_GET['add'])]+=1;
redirect("../public/checkout.php");


}
else
{
	setmessage("Sorry!We have only ".$row['quantity']." quantities available");

	redirect("../public/checkout.php");

//	redirect("checkout.php");
}
//	$_SESSION['product_'.$_GET['add']]+=1;
//	redirect("index.php");
}









}


if(isset($_GET['increment']))
{
	$_SESSION['product_'.escape_string($_GET['increment'])]++;
	
	redirect("../public/checkout.php");
}
if(isset($_GET['remove']))
{
	if($_SESSION['product_'.escape_string($_GET['remove'])]>=1)
	{
		$_SESSION['product_'.escape_string($_GET['remove'])]--;

	}
	if($_SESSION['product_'.escape_string($_GET['remove'])]==0)
	{
		$_SESSION['product_'.escape_string($_GET['remove'])]=1;
	}

	redirect("../public/checkout.php");
}

if(isset($_GET['delete']))
{
	
		$_SESSION['product_'.escape_string($_GET['delete'])]='0';

	
	redirect("../public/checkout.php");
}


function cart()
{
	$total=0;
	$itemss=0;

foreach ($_SESSION as $name => $value) {
	if(substr($name,0,8)=="product_")
	{
		if($value>0)
		{


		$len=strlen($name);
		$id=substr($name, 8,$len-8);
		

		$query=queery("SELECT * FROM products WHERE product_id=".escape_string($id));
  confirm($query);
  while($row=fetch_array($query))
  {
  	$sub=$row['product_price']*$value;
  	$itemss+=$value;
  	$total+=$sub;

$product= <<<DELIMETER

  <tr>
                <td>{$row['product_title']}</td>
                <td>&#36;{$row['product_price']}</td>
                <td>{$value}</td>
                <td>&#36;{$sub}</td>
                <td><a class="btn btn-warning"href="cart.php?remove={$row['product_id']}"><span class="glyphicon glyphicon-minus"></span></a>
                 <a class="btn btn-success" href="cart.php?add={$row['product_id']}"><span class="glyphicon glyphicon-plus"></span></a>
                <a class="btn btn-danger" href="cart.php?delete={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
          
            </tr>
DELIMETER;

echo $product;


}

	}
}
$_SESSION['total']=$total;
$_SESSION['itemss']=$itemss;
}
}

function show_buy()
{

$product= <<<DELIMETER

 
                <a class="btn btn-warning"href="">BUY NOW</a>
              
          
            
DELIMETER;
if(isset($_SESSION['itemss']))
{
	echo $product;
}



}
function reports()
{
	global $connection;
if(isset($_GET['trans']))
{
$amount=$_GET['amt'];
$currency=$_GET['curr'];
$trans=$_GET['trans'];
$status=$_GET['status'];
echo "THANK YOU";
$queryorder=queery("INSERT INTO orders(order_amount,order_transaction,order_status,order_currenc) VALUES('$amount','$trans','$status','$currency')");
confirm($queryorder);

$lastinsertedid=lastid();


	$total=0;
	$itemss=0;

foreach ($_SESSION as $name => $value) {
	if(substr($name,0,8)=="product_")
	{
		if($value>0)
		{


		$len=strlen($name);
		$id=substr($name, 8,$len-8);
		

		$query=queery("SELECT * FROM products WHERE product_id=".escape_string($id));
  confirm($query);
  while($row=fetch_array($query))
  {
  	$productprice=$row['product_price'];
  	$producttitle=$row['product_title'];
  	$sub=$row['product_price']*$value;
  	$itemss+=$value;
  	$total+=$sub;
  	$querynew=queery("INSERT INTO reports(product_title,product_id,order_id,product_price,product_quantity) VALUES('$producttitle','$id','$lastinsertedid','$productprice','$value')");
confirm($querynew);


}

	}
}

}
session_destroy();
}
else
{
redirect('shop.php');
}




}
function lastid()
{
	global $connection;

	return mysqli_insert_id($connection);
}








  




?>