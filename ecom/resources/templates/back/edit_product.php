<?php  require_once('../../resources/config.php')      ?>
<?php editmyproducts()?>
<div class="row">
<h1 class="page-header">
   Edit Product
  <?php 
  $query=queery("SELECT *FROM products WHERE product_id={$_GET['id']}");
  confirm($query);
  $row=fetch_array($query);
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
$desc_long=$row['desc_long'];
$price=$row['product_price'];
$short_desc=$row['desc_short'];
$imageurl=$row['image_long'];
$quantity=$row['quantity'];
  ?>

</h1>
</div>
               


<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="product_title" value="<?php echo $product_title;?>"class="form-control"/>
       
    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="product_description" id="" cols="30" rows="10" class="form-control"><?php echo $desc_long;?></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="product_price"  value="<?php echo $price;?>"class="form-control" size="60">
      </div>
    </div>
     <div class="form-group">
           <label for="product-title">Product Short Description</label>
      <textarea name="short_desc" id="" cols="30" rows="3" class="form-control"><?php echo $short_desc;?></textarea>
    </div>
    
     <div class="form-group">
           <label for="product-title">Product Image URL</label>
      <textarea name="imageproduct" id="" cols="30" rows="1" class="form-control" ><?php echo $imageurl;  ?></textarea>
    </div>




    <input type="hidden" value="<?php echo $row['product_id'];?>" name="hidemplease"/>
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
      
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
    </div>


     <!-- Product Categories-->
      <div class="form-group">
         <label for="product-title">Product Category</label>
         <select name="product_category_id" id="" class="form-control">
           <option value="">Select Category</option>
           <?php showcategoryid();?>
         </select>
         
<!--         <div class="form-group">
         <label for="product-title">Product Category</label>
          <input type="number" name="product_category_id" class="form-control" size="60">
          !-->
         
    </div>
     <div class="form-group">
         <label for="product-title">Product Quantity</label>
          <input type="number" name="product_quantity"value="<?php echo $quantity;?>" class="form-control"/>
    </div>
           
       


</div>





    <!-- Product Brands-->


  
<!-- Product Tags -->



    <!-- Product Image -->
  


</aside><!--SIDEBAR-->


    
</form>



                



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
<?php
function showcategoryid()
{

                    $query=queery("SELECT * FROM side_nav");
                    confirm($query);
                  
                   while($row=fetch_array($query))
    {
$category_link= <<<DELIMETER

 <option value="{$row['side_id']}">{$row['side_title']}</option>

DELIMETER;
echo $category_link;

                     }

}
?>
