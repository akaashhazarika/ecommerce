

        <div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Orders

</h1>
<h3 class=" bg-success"><?php displaymessage()?></h3>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>ID</th>
           <th>Amount</th>
           <th>Currency</th>
           <th>Transaction</th>
           <th>Status</th>
           
      </tr>
    </thead>
    <tbody>
        
           <?php displayorders()?>
        
        

    </tbody>
</table>
</div>











            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
