    <div class="right_box">
            <div class="w-50 m-auto shadow p-3">
                                <?php
                                      if (isset($errors)) {
                                        echo  validation_list_errors() ;
                                      }
                                ?>
                        <h3 align="center ">Sign Up</h3>
                        <form class="SignUp_form" action="<?php echo base_url('admin/signUp')?>" method="post" enctype="multipart/form-data">
                            <input type="text" placeholder="Username" class="login_formele" name="username" value="<?=set_value('username') ?>" required>
                            <input type="text" placeholder="email" class="login_formele" name="email" value="<?=set_value('email') ?>" required>
                            <input type="number" placeholder="phone No." class="login_formele" name="phoneNo" value="<?=set_value('phoneNo') ?>" required>
                            <input type="file" placeholder="Profile Image" class="login_formele" name="userProfile" value="<?=set_value('Profile') ?>" required>
                            <input type="password" placeholder="password" class="login_formele" name="password" set_value="<?=set_value('password')?>" required>
                            <input type="password" placeholder="password confirm" class="login_formele" name="passconf" set_value="<?=set_value('passconf')?>" required>

                            <div class="btn_sign pt-4">
                                <input type="submit" value="Sign Up" class="login_btn">
                            </div>

                            <p class="login_btnsc">
                            If you don't have an account.&nbsp;  
                                <a href="<?php echo base_url('login') ?>">
                                     Login
                                </a>
                            </p>
                        </form>
                    </div> 
                        
                    </div>
                </div>
            </div>
        </div>
    </section> 