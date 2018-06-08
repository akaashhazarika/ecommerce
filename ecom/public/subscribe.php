
<!-- Configuration-->

<?php require_once("../resources/config.php"); ?>


<!-- Header-->


<?php include(TEMPLATE_FRONT.DS."header.php"); ?>


     <!--Navigation -->


         <!-- Contact Section -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Subscription</h2>

                    <h3 class="section-subheading text-muted">Please enter your details to recieve our weekly top picks</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" method="post" >
                    <?php addsubscriptionnew()?>
                    <?php displaymessage()?>
                   
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <input name="name"type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input name="email"type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input name="subject"type="text" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                
                            <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Subscribe">
                               
                            </div>
                           

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT .  "/footer.php");?>