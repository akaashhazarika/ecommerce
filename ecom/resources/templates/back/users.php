


                    <div class="col-lg-12">
                      

                        <h1 class="page-header">
                            Users
                         
                        </h1>
                          <p class="bg-success">
                         <h4><?php displaymessage()?></h4>
                        </p>
                       
                        <form action="" method="post">
                        Username:<input type="text"  class="form-control" width="10px" name="username"/></br>
                        </br></br>
                        Password:<input type="text" class="form-control" name="userpass"/></br></br>
                        Email:<input type="text" class="form-control" name="email"/></br></br>
                       
                         <input type="submit" name="submit"class="btn btn-primary" value="Add User">
                           </form>
                          <p>  <?php updateusers();?></p>

                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Email Id</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                  <?php displayadminusers();?>
                             


                                    
                                    
                                </tbody>
                            </table> <!--End of Table-->
                        

                        </div>










                        
                    </div>
    









