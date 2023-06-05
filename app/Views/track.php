<?php 
  helper('function');
?>
<section class="order_section">
        <div class="container">
        
        <?php if (isset($orderDetials)) {
        foreach ($orderDetials as $key => $value) { ?>
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="Particuler_textbox">
                        <div class="Particuler_textcon">
                            <h3>Order ID: <?= $value['order_id'] ?></h3>
                            <h4>Placed on: <?= $value['order_date'] ?> </h4>
                        </div>
                        <div class="Particuler_customerbox">
                            <div class="Particuler_informationbox">
                                <h5>Customer information</h5>
                                <h6><span>Email:</span><?= $value['email'] ?></h6>
                            </div>
                            <div class="Particuler_paymentbox">
                                <h5>Payment  method</h5>
                                <h6><span>
                                <?php
                                  if ($value['order_type'] == 'COD') {
                                    echo"Cash on delivery";
                                  }elseif ($value['order_type'] == 'Online') {
                                    echo"Online";
                                  }
                                  
                                ?>
                                </span></h6>
                            </div>
                            <div class="Particuler_amountbox">
                                <div class="Particuler_totaltxtbox">
                                    <h2>Total: </h2>
                                    <h4>₹ <?= $value['order_amount'] ?></h4>
                                </div>
                                <div class="Particuler_totaltxtbox">
                                    <h2>Delivery charge: </h2>
                                    <h4>Free</h4>
                                </div>
                                <div class="Particuler_totalborder"></div>
                                <div class="Particuler_totaltxtele">
                                    <h2>Payable amount:</h2>
                                    <h4>₹ <?= $value['order_amount'] ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order_rightbox">
                        <div class="row">
                            <div class="col-xl-9 col-md-12 col-12">
                                <div class="order_rightimgbox">
                                    <!-- <div class="order_rightimgleft">
                                        <div class="order_roundimgbox">
                                            <img src="images/_Pngtree_12-dot_digital_mobile_phone_on_5489677_1-removebg-preview.png" class="cart_leftimg" alt="">
                                        </div>
                                    </div> -->
                                    <div class="order_rightimgright">
                                        <h3><?= $value['item_name'] ?></h3>
                                        <!-- <h4>Black</h4> -->
                                        <div class="order_rightimgbtnsc">
                                            <button class="order_Retunbtn">Retun/Replace</button>
                                            <button class="order_Getbtn">Get invoice</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="Particuler_Statustxt">Status: <span> <?= $value['order_status'] ?> </span></div>
                                <div class="order_trackborder"></div>
                                <div class="order_rimgborderbox">
                                    <div class="order_rimgbtxtbox">                                        
                                        <div class="order_rimgbtround <?php echo isStatusApproved($value['order_status'], "Acceptted") ?  'approved' : "" ?>"></div>
                                        <div class="order_rimgbtborder1"></div>
                                        <h5>Confirmed</h5>
                                    </div>
                                    <div class="order_rimgbtxtbox1">
                                        <div class="order_rimgbtround <?php echo  isStatusApproved($value['order_status'], "out of delivery") ?  'approved' : "" ?>"></div>
                                        <div class="order_rimgbtborder1"></div>
                                        <h5>Packed</h5>
                                    </div>
                                    <div class="order_rimgbtxtbox2">
                                        <div class="order_rimgbtround <?php echo isStatusApproved($value['order_status'], "out of delivery") ?  'approved' : "" ?>"></div>
                                        <div class="order_rimgbtborder1 "></div>
                                        <h5>Shipped</h5>
                                    </div>
                                    <div class="order_rimgbtxtbox3">
                                        <div class="order_rimgbtround1 <?php echo isStatusApproved($value['order_status'], "delivered") ?  'approved' : "" ?>"></div>
                                        <h5>Delivered</h5>
                                    </div>
                                </div>
                                <button class="order_trackbtn">Track</button>
                                <div class="order_trackborder"></div>
                                <div class="order_returnbox">
                                    <div class="order_returnround"></div>
                                    <h3>Return/Replace was allowed till Tue, 20 Feb 2022.</h3>
                                </div>
                                <div class="Particuler_shoppingbox">
                                    <h3>Shipping information</h3>
                                    <h4><?= $value['fullName'] ?></h4>
                                    <h5><?= $value['houseNo']." " .$value['streetAria']." " .$value['distic']." " .$value['subDistic']." " .$value['state'].' '.$value['pinCode']?></h5>
                                    <h6>Mobile no: <span><?= $value['mobileNo'] ?></span></h6>    
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-12 col-12">
                                <div class="order_lefttextbox">
                                    <h4><svg xmlns="http://www.w3.org/2000/svg" class="order_writeicon" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                    Write a review
                                </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     
  <?php  }
   }else{
    echo $errors;
  }?>
     </div>
    </section>
    <!--order section end hare-->
    

