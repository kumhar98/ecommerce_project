
               <div class="right_box">
                        <div class="products_box">
                            <h3>Add Category</h3>
                            <?php 
                                if (isset($errors)) {
                                        echo  validation_list_errors() ;
                                      }
                                
                                ?>
                            <form class="login_form" method="post" action="<?php echo base_url('admin/category') ?>" enctype = "multipart/form-data">
                                <input type="text" placeholder="Products Name" class="login_formele" name="cat_name" value="<?=set_value("cat_name")?>" required>                                 <div class="login_btnsc">
                                    <button class="login_btn">Add Category</button>
                                </div>
                                <?php   if (isset($Success)) {
                                        echo   "<span class='success'>". $Success ."</span>"  ;
                                     
                                      } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 