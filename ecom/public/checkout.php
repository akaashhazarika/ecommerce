<?php  require_once('../resources/config.php')      ?>
<?php require_once ('cart.php');?>


<?php include(TEMPLATE_FRONT.DS."header.php"); ?>
<?php



?>
    <div class="container">
    
<h1 class="text-center bg-danger"><?php displaymessage()?></h1>

<!-- /.row --> 

<div class="row">

      <h1>Checkout</h1>

<form action="">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
     
          </tr>
        </thead>
        <tbody>
         <?php  cart(); ?>
        </tbody>
    </table>
    <?php echo show_buy();?>
</form>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<?phpif(!isset($_SESSION['itemss']))
{
$_SESSION['itemss']=0;
}
?>
<td><span class="amount"><?php 
if(isset($_SESSION['itemss']))
echo $_SESSION['itemss'];
else
echo '0';?></span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<?phpif(!isset($_SESSION['total']))
{
$_SESSION['total']=0;
}
?>
<td><strong><span class="amount">&#36;<?php if(isset($_SESSION['total']))echo $_SESSION['total'];
else
  echo '0';
?>
</span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->




<?php include(TEMPLATE_FRONT.DS."footer.php"); ?>