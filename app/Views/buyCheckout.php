<?php
  
    if (isset( $totalItam)) {
    $session = session()->get();
    ?>
    <!--cart middle section start hare-->
    <section class="cart_middlesc">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-md-12 col-12">
                    <div class="checkout_paymentbox">
                        <div class="checkout_atextele">Delivery address</div>
                        <form class="checkout_paymentform">
                            <?php foreach ($totalAddress as $key => $value) { ?>
                                <div class="addressContainer">
                                    <input type="radio" name="ratio" id="ratioBtn" value="<?=$value['id'] ?>">
                                    <label for="ratioBtn"><?php echo $value['fullName'] . "  " . $value['state'] . "  " . $value['distic'] . "  " . $value['subDistic'] . "  " . $value['houseNo'] . "  " . $value['streetAria'] . "  " . $value['mobileNo'] . "  " . $value['email'] ?></label>
                                    <a class="editBtn consualt_btn" data-id=<?= $value['id'] ?>>Edit</a>
                                </div>
                            <?php } ?>
                        </form>
                        <div class="checkout_paymentbtnsc">
                            <a href="particuler.html" class="consualt_btn" data-toggle="modal" data-target="#exampleModal">Add Address</a>
                        </div>
                    </div>
                    <div class="cart_middleimgbox">
                        <div class="checkout_deliverybox">Payment mode</div>
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <a href="">
                                    <img src="<?= base_url('assets/images/phonepay.png') ?>" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="">
                                    <img src="<?= base_url('assets/images/googlepay.png') ?>" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="">
                                    <img src="<?= base_url('assets/images/bharatpay.png') ?>" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="">
                                    <img src="<?= base_url('assets/images/amazonpay.png') ?>" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="">
                                    <img src="<?= base_url('assets/images/paytmpay.png') ?>" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="">
                                    <img src="<?= base_url('assets/images/upi.png') ?>" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="cart_emailbox">
                        <h4> 
                            <input type="radio" name="paymentMode" id="online" value="online">
                            <label for="online">Online</label>
                        </h4>
                        <h4> 
                            <input type="radio" name="paymentMode" id="cod" value="COD">
                            <label for="cod">Cash On delivery</label>
                        </h4>
                        <a class="btn btn_pay  disabled"  id="buybtnPay" data-id="<?= $fk_product_id?>">proceed to pay</a>
                    </div>

                </div>
                <div class="col-xl-3 col-md-12 col-12">
                    <div class="cart_pricebox">
                        <h3>Price details</h3>
                        <div class="cart_priceborder"></div>
                        <div class="cart_pricetextbox">
                            <h4>Price <?=  $totalItam ?> item</h4>
                            <h5><?= $totalProductsCost?></h5>
                        </div>
                        <div class="cart_pricetextbox">
                            <h4>Discount</h4>
                            <h6> - ₹ <?= $totalProductsMrp - $totalProductsCost ?></h6>
                        </div>
                        <div class="cart_pricetextbox">
                            <h4>Delivery charge</h4>
                            <h6>Free</h6>
                        </div>
                        <div class="cart_amountbox">
                            <h4>Total amount</h4>
                            <h5>₹ <?= $totalProductsCost ?></h5>
                        </div>
                        <p>You will get discount of - ₹ <?= $totalProductsMrp - $totalProductsCost ?> on this order</p>
                    </div>
                    <img src="<?= base_url('assets/images/price-carv.png') ?> " class="cart_pcarvimg">
                </div>
            </div>
        </div>
    </section>
    <!--cart middle section end hare-->
    <!--modal section start hare-->
    <section>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Seclet Your Address</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="modal_formbox">
                            <label for="addressName">Full Name</label>
                            <input type="text" name="name" id="addressName" class="modal_form" value="">
                            <label for="addressState">state</label>
                            <input type="text" name="state" id="addressState" class="modal_form" value="">
                            <label for="addressDistic">Distic</label>
                            <input type="text" name="state" id="addressDistic" class="modal_form" value="">
                            <label for="addressSubDistic">Sub Distic</label>
                            <input type="text" name="SubDistic" id="addressSubDistic" class="modal_form" value="">
                            <label for="addressHouse">House No.</label>
                            <input type="text" name="House" id="addressHouse" class="modal_form" value="">
                            <label for="addressStreet">street Aria</label>
                            <input type="text" name="Street" id="addressStreet" class="modal_form" value="">
                            <label for="addressMobile">Mobile No</label>
                            <input type="text" name="Email" id="addressMobile" class="modal_form" value="">
                            <label for="addressEmail">Email</label>
                            <input type="email" name="Email" id="addressEmail" class="modal_form" value="">
                            <label for="addressPin">Pin Code</label>
                            <input type="text" name="name" id="addressPin" class="modal_form" value="">
                            <button class="modal_btn" id="saveAddress" data-id="<?= $session['id'] ?> ">ADD</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--modal section end hare-->
    <!--modal section Edite hare-->
   
        <section>
            <div class="modal fade" id="updateModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Seclet Your Address</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="modal_formbox">
                                <label for="addressName">Full Name</label>
                                <input type="text" name="name" id="updateAddressName" class="modal_form" value="">
                                <label for="addressState">state</label>
                                <input type="text" name="state" id="updateAddressState" class="modal_form" value="">
                                <label for="addressDistic">Distic</label>
                                <input type="text" name="state" id="updateAddressDistic" class="modal_form" value="">
                                <label for="addressSubDistic">Sub Distic</label>
                                <input type="text" name="SubDistic" id="updateAddressSubDistic" class="modal_form" value="">
                                <label for="addressHouse">House No.</label>
                                <input type="text" name="House" id="updateAddressHouse" class="modal_form" value="">
                                <label for="addressStreet">street Aria</label>
                                <input type="text" name="Street" id="updateAddressStreet" class="modal_form" value="">
                                <label for="addressMobile">Mobile No</label>
                                <input type="text" name="Email" id="updateAddressMobile" class="modal_form" value="">
                                <label for="addressEmail">Email</label>
                                <input type="email" name="Email" id="updateAddressEmail" class="modal_form" value="">
                                <label for="addressPin">Pin Code</label>
                                <input type="text" name="name" id="updateAddressPin" class="modal_form" value="">
                                <button class="modal_btn" id="updateSaveAddress" value="">Update Address</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <?php }else {
            echo 'Please add itam';
        }?>
 