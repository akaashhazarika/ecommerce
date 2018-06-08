<?php
 function redirect($loc)
 {
 	header("Location:$loc");
 }

 function queery($queery)
 {
 	global $connection;
 	return mysqli_query($connection,$queery);
 }
 function confirm($result)
 {
 	global $connection;
 	 if(!$result)
                    {
                    	die("error".mysqli_error($connection));
                    }
 }
 function fetch_array($variab)
 {
 	return mysqli_fetch_array($variab);
 }
 function escape_string($query)
 {
 	global $connection;
 	return mysqli_real_escape_string($connection,$query);
 }

function get_products()
{
	$query=queery("SELECT * FROM products");
	confirm($query);
	while($row=fetch_array($query))
	{

$product= <<<DELIMETER


                    <div class="col-sm-4 col-lg-4 col-md-4 ">
                        <div class="thumbnail" >
                           <a href="item.php?id={$row['product_id']}" ><img src="{$row['image_short']}" style="height: 200px; width: auto;" alt="" ></a>
                            <div class="caption">
                              <h4>&#36;{$row['product_price']}</h4>
                                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                                </h4>
                                <p style="height: 400px;">{$row['desc_short']}.</p>
                            </div>
                                <br>
                                   <a style='margin-left: 50%' class="btn btn-primary" target="_blank" href="../public/cart.php?add={$row['product_id']}">Add to Cart</a>
                            
                        </div>
                    </div>

DELIMETER;

echo $product;


}
}
function get_categories()
{

                    $query=queery("SELECT * FROM side_nav");
                    confirm($query);
                  
                   while($row=fetch_array($query))
    {
$category_link= <<<DELIMETER


                   <a href=
                       'category.php?id={$row['side_id']}' class='list-group-item'>{$row['side_title']}</a>

DELIMETER;
echo $category_link;

                     }

}


function get_category_products($id)
{
$query=queery("SELECT * FROM products WHERE product_category_id={$id}");
  confirm($query);
 while($row=fetch_array($query))
  {

$product= <<<DELIMETER

  <div class="col-sm-4 col-lg-4 col-md-4 ">
                        <div class="thumbnail" >
                           <a href="item.php?id={$row['product_id']}" ><img src="{$row['image_short']}" style="height: 200px; width: auto;" alt="" ></a>
                            <div class="caption">
                              <h4>&#36;{$row['product_price']}</h4>
                                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                                </h4>
                                <p style="height: 400px;">{$row['desc_short']}.</p>
                            </div>
                                <br>
                                   <a style='margin-left: 50%' class="btn btn-primary" target="_blank" href="../public/cart.php?add={$row['product_id']}">Add to Cart</a>
                            
                        </div>
                    </div>

DELIMETER;

echo $product;


}
}
function get_shop_products()
{
$query=queery("SELECT * FROM products");
  confirm($query);
 while($row=fetch_array($query))
  {

$product= <<<DELIMETER

 <div class="col-sm-4 col-lg-4 col-md-4 ">
                        <div class="thumbnail" >
                           <a href="item.php?id={$row['product_id']}" ><img src="{$row['image_short']}" style="height: 200px; width: auto;" alt="" ></a>
                            <div class="caption">
                              <h4>&#36;{$row['product_price']}</h4>
                                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                                </h4>
                                <p style="height: 400px;">{$row['desc_short']}.</p>
                            </div>
                                <br>
                                   <a style='margin-left: 50%' class="btn btn-primary" target="_blank" href="../public/cart.php?add={$row['product_id']}">Add to Cart</a>
                            
                        </div>
                    </div>
                  

DELIMETER;

echo $product;


}
}
function logmein()
{
if(isset($_POST['submit']))
{
  $username=escape_string($_POST['username']);
  $password=escape_string($_POST['password']);
  $query=queery("SELECT * FROM userdetails WHERE username='{$username}' AND password='{$password}'");
  confirm($query);
  if(mysqli_num_rows($query)==0)
  {
    setmessage("Username or passowrd is wrong");
    redirect("login.php");
  }
  else
  {
    $_SESSION['username']=$username;
    redirect("admin");
  }
}
}

function setmessage($msg)
{
  if(!empty($msg))
  {
    $_SESSION['message']=$msg;
  }
  else
  {
    $msg="";
  }
}
function displaymessage()
{
if(isset($_SESSION['message']))
{
  echo $_SESSION['message'];
  unset($_SESSION['message']);
}
}



function contact()
{
 if(isset($_POST['submit']))
{
 $to="akaashhazarika@gmail.com";
 $name=$_POST['name'];
 $email=$_POST['email'];
 $subject=$_POST['subject'];
 $message=$_POST['message'];
 $headers="From:{$email}";

 $send=mail($to,$subject,$message,$headers);
 if($send)
 {
 setmessage("sent successfully");
 redirect("contact.php");
   }
   else
   {
    setmessage("unsuccessfully");
   }
}



}


/** BACKEND FUNCTIONS**/


function displayorders()
{
  $query=queery("SELECT *FROM orders");
  confirm($query);
 while($row=fetch_array($query))
  {

$product= <<<DELIMETER
               <tr>
            <td>{$row['order_id']}</td>
            <td>{$row['order_amount']}</td>
            <td>{$row['order_currenc']}</td>
            <td>{$row['order_transaction']}</td>
            <td>{$row['order_status']}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/deleteorder.php?id={$row['order_id']}"><span class="glyphicon glyphicon-remove"/></a></td>
            </tr>
DELIMETER;

echo $product;


}

}
function displayadminproducts()
{
  $query=queery("SELECT *FROM products");
  confirm($query);
 while($row=fetch_array($query))
  {
    $productcategorytitle=displayidcategory($row['product_category_id']);


$product= <<<DELIMETER
                 <tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']}<br>
             <a href="index.php?edit_product&id={$row['product_id']}"> <img width="100" height="100"src="{$row['image_short']}" alt=""></a>
            </td>
            <td>$productcategorytitle</td>
            <td>{$row['product_price']}</td>
             <td><a class="btn btn-danger" href="../../resources/templates/back/deleteproduct.php?id={$row['product_id']}"><span class="glyphicon glyphicon-remove"/></a></td>
        </tr>
DELIMETER;

echo $product;


}

}
function displayidcategory($id)
{
  $query=queery("SELECT * FROM side_nav WHERE side_id=$id ");
  confirm($query);
 $row=fetch_array($query);
 return $row['side_title'];

}
function  addsubscriptionnew()
{
  if(isset($_POST['publish']))
  {
   $name=escape_string($_POST['name']);
   $email=escape_string($_POST['email']);
   $subject=escape_string($_POST['subject']);
   
   $query=queery("INSERT INTO subscribe(name,phone,email) VALUES('$name','$subject','$email')");
  confirm($query);
   setmessage("Thank you for subscribing");
   redirect("index.php");

   }
}


function addproductnew()
{
  if(isset($_POST['publish']))
  {
   $product_price=escape_string($_POST['product_price']);
    $product_quantity=escape_string($_POST['product_quantity']);
   $compare=intval($product_price);
    $compareq=intval($product_quantity);
     if($compare<0||$compareq<0)
     {
       setmessage("Cannot insert negative values Unsuccessful");
       redirect("index.php?products");
     }
     else
     {
       $product_title=escape_string($_POST['product_title']);
   $product_category_id=escape_string($_POST['product_category_id']);
 //  $product_price=escape_string($_POST['product_price']);
   $product_description=escape_string($_POST['product_description']);
   $short_desc=escape_string($_POST['short_desc']);
   $imageproduct=escape_string($_POST['imageproduct']);
  
    $temporary="http://placehold.it/700*600";
   $product_image=escape_string($_FILES['file']['name']);
   $image_temp_location=escape_string($_FILES['file']['tmp_name']);

  




  move_uploaded_file( $image_temp_location, UPLOAD_DIRECTORY.DS.$product_image);
   $query=queery("INSERT INTO products(product_title,product_category_id,product_price,quantity,desc_long,desc_short,product_image,image_long,image_short) VALUES('$product_title','$product_category_id','$product_price',' $product_quantity',' $product_description',' $short_desc','$temporary','$imageproduct','$imageproduct')");
   confirm($query);
   $lastid=lastidmy();
   setmessage("Product with id={$lastid} inserted");
   redirect("index.php?products");

     }

    
  
  
  }

}
function editadminproduct($id)
{
$query=queery("SELECT * FROM products WHERE product_id=$id");
confirm($query);
$row=fetch_array($query);
return $query;
}

function lastidmy()
{
  global $connection;

  return mysqli_insert_id($connection);
}
function editmyproducts()
{
 if(isset($_POST['publish']))
 {
   $product_price=escape_string($_POST['product_price']);
    $product_quantity=escape_string($_POST['product_quantity']);
    $compare=intval($product_price);
      $compareq=intval($product_quantity);

     if($compare<0||$compareq<0)
     {
       setmessage("Cannot insert negative values Unsuccessful edit");
       redirect("index.php?products");
     }
     else
     {

  $product_id=escape_string($_POST['hidemplease']);
  $product_title=escape_string($_POST['product_title']);
   $product_category_id=escape_string($_POST['product_category_id']);
  
   $product_description=escape_string($_POST['product_description']);
   $short_desc=escape_string($_POST['short_desc']);
   $imageproduct=escape_string($_POST['imageproduct']);
  
    $temporary="http://placehold.it/700*600";

    $query=queery("DELETE FROM products WHERE product_id={$product_id}");
    confirm($query);
    $query2=queery("INSERT INTO products(product_id,product_title,product_category_id,product_price,quantity,desc_long,desc_short,product_image,image_long,image_short) VALUES('$product_id','$product_title','$product_category_id','$product_price',' $product_quantity',' $product_description',' $short_desc','$temporary','$imageproduct','$imageproduct')");
    setmessage("Product with id=$product_id is updated");
    redirect("index.php?products");



}









 }


}

function displayadmincategories()
{
   $query=queery("SELECT *FROM side_nav");
  confirm($query);
 while($row=fetch_array($query))
  {


$product= <<<DELIMETER
                <tr>
            <td>{$row['side_id']}</td>
            <td>{$row['side_title']}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/deletecategory.php?id={$row['side_id']}"><span class="glyphicon glyphicon-remove"/></a></td>
        </tr>
DELIMETER;

echo $product;

}
}

function updateadmincategories()
{
  if(isset($_POST['submit']))
  {
    $columnname=escape_string($_POST['columnname']);
    if($columnname=="")
    {
      setmessage("ColumnName cannot be empty");
      redirect("index.php?categories");
    }
    else
    {
      $query=queery("INSERT INTO side_nav(side_title) VALUES('$columnname')");
      confirm($query);
       setmessage("Column $columnname is added");
      redirect("index.php?categories");


    }

  }

}

function displayadminusers()
{
   $query=queery("SELECT *FROM userdetails");
  confirm($query);
 while($row=fetch_array($query))
  {


$product= <<<DELIMETER
                <tr>

                                        <td>{$row['user_id']}</td>
                                        <td>{$row['username']}</td>
                                       <td>{$row['email']}</td>
                                       <td><a class="btn btn-danger" href="../../resources/templates/back/deleteuser.php?id={$row['user_id']}"><span class="glyphicon glyphicon-remove"/></a></td>
                                    </tr>
DELIMETER;

echo $product;

}
}

function updateusers()
{

  if(isset($_POST['submit']))
  {
    echo "outside";
   

    $username=escape_string($_POST['username']);
    echo $username;
    $userpass=escape_string($_POST['userpass']);
     echo $userpass;
    $email=escape_string($_POST['email']);
     echo $email;
  
      $query=queery("INSERT INTO userdetails(username,password,email) VALUES('$username','$userpass',' $email')");
      confirm($query);
       setmessage("Column $columnname is added");
      redirect("index.php?users");


    

  }

}

function adminorderno()
{
  $query=queery("SELECT COUNT(*) as counter FROM orders;");
  confirm($query);
  $row=fetch_array($query);
  echo $row['counter'];

}
function adminproductno()
{
  $query=queery("SELECT COUNT(*) as counter FROM products;");
  confirm($query);
  $row=fetch_array($query);
  echo $row['counter'];

}
function admincategoryno()
{
  $query=queery("SELECT COUNT(*) as counter FROM side_nav;");
  confirm($query);
  $row=fetch_array($query);
  echo $row['counter'];

}







?>