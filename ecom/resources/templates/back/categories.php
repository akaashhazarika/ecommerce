

            

<h1 class="page-header">
  Product Categories
<?php updateadmincategories()?>

</h1>
<h4 class="bg-success"><?php displaymessage();?></h4>


<div class="col-md-4">
    
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" name="columnname"class="form-control">
        </div>

        <div class="form-group">
            
            <input type="submit" name="submit"class="btn btn-primary" value="Add Category">
        </div>      


    </form>


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
        </tr>
            </thead>


    <tbody>
        <?php displayadmincategories();?>
    </tbody>

        </table>

</div>



                












