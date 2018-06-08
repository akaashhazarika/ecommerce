<?php  require_once('../resources/config.php')      ?>


<?php include(TEMPLATE_FRONT.DS."header.php"); ?>
    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>A Warm Welcome!</h1>
            <p>Please feel free to dive into our delicacies.</p>
           
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Products</h3>
            </div>
        </div>
        <!-- /.row -->
        <?php             get_category_products(escape_string($_GET['id']))               ?>
        <!-- Page Features -->
  <!--      <div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
            -->

          

           


        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      


<?php include(TEMPLATE_FRONT.DS."footer.php"); ?>