<?php include 'inc/header.php'; ?>
<?php include 'inc/navsection.php'; ?>

 <div class="contentsectionlist templete clear">
  <div class="signup">
  <div class="row">

<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
    
  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 loginform">
    <form action="" method="" enctype="multipart/form-data">
       <table>
           <tr>    
             <td>
                 <input type="text" name="username" placeholder="User Name..." class="medium" />
              </td>
              
             </tr>
             <tr>
               
                <td>
                 <input type="text"  name="password" placeholder="Qualification..." class="medium" />
              </td>
             </tr>
             <tr>
               
               <td>
                 <input type="submit" name="submit" Value="Save" />
              </td>
             </tr>
       </table>
    </form>
  </div>



  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 signupform">

   <h4 style="color: #fff">SIGN UP NOW</h4>

 <div class="block">
  <form action="" method="POST" enctype="multipart/form-data">
                          <table>
  
                           <tr>   
                              <td>
                                  <select id="select" name="bloodgroup" >
                                  <option value="" >Blood Group</option>
                                  <option value="A+">A+</option>
                                  <option value="A-">A-</option>
                                  <option value="B+">B+</option>
                                  <option value="B-">B-</option>
                                  <option value="AB+">AB+ </option>
                                  <option value="AB-">AB-</option>
                                  <option value="O+">O+</option>
                                  <option value="O-">O-</option>                                                 
                                 </select>
                             </td>

                            </tr>
                            <tr>

                              <td>
                                  <input type="text" name="work" placeholder="Work..." class="medium" />
                              </td>
                          </tr>

                          
                            <tr>  
                             
                              <td>
                                  <input type="text" name="lastupdate" placeholder="Last Donate Date..." class="medium" />
                              </td>
                            </tr>
                            <tr>
                              <td>
                                  <input type="text" name="address" placeholder="Location..." class="medium" />
                              </td>
                          </tr>
                           <tr>
                              <td>
                                  <input type="file" name="image" />
                              </td>      
                      
                          </tr>
                          
                       
                            <tr>
                              
                              <td>
                                  <input type="text" name="contract" placeholder="Phone..." class="medium" />
                              </td>
                              </tr>
                            <tr>
                              <td>
                                  <input type="text" name="email" placeholder="Email..." class="medium" />
                              </td>
                          </tr>
                           
                          <tr>
                              
                              <td>
                                  <input type="submit" name="donor" Value="Save"/>
                              </td>
                          </tr>
                          </table>
                  </form>
  </div>

</div>

<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>

</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>