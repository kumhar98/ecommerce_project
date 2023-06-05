<?php if (count($userAddCardDetails) > 0 ) {
                           
                           ?>
<?php $session = session()->get()?>
<section class="cart_middlesc">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-md-12 col-12">
                    <div class="cart_middleimgbox">
                        <div class="cart_itembox">
                            <h3>Total item (<?=count($userAddCardDetails) ?>)</h3>
                            <h4>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                  </svg>
                                  Deliver to
                            </h4>
                            <div class="cart_itemsearshbox">
                                <p><span>John doe </span>  ,United state, 200012</p>
                                <div class="dropdown">
                                    <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                      Home
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="#">Kolkata</a>
                                      <a class="dropdown-item" href="#">Joypur</a>
                                      <a class="dropdown-item" href="#">Howrah</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($userAddCardDetails as $key => $value) {?>
                        <div class="row custom-row">
                            <div class="col-xl-2 col-md-12 col-12">
                                <div class="cart_leftimgbox">
                                    <div class="cart_leftimgcon">
                                        <img src="<?=base_url('admin/images/'.$value['image1']) ?>" class="cart_leftimg img-fluid" alt="">
                                    </div>
                                    <div class="cart_formbox">
                                        <!-- <div class="cart_formminus">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="cart_formminusicon" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                            </svg>
                                        </div> -->
                                         <select name="selectqty" class="selectQty">
                                            <?php for ($i=1; $i <= $value['qty'] ; $i++) {
                                                if ($i == $value['addQty'] ) {
                                                    echo "<option value=".$i." selected >qty ".$i."</option>";
                                                }else {
                                                
                                                    echo "<option value=".$i."> qty ".$i."</option>";
                                                } 
                                            }?>
                                          
                                         </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-12 col-12">
                                <div class="cart_middletextbox">
                                    <h3><?=$value['product_name']; ?></h3>
                                    <h4>Black</h4>
                                    <div>
                                    <h5 data-sellingPrice="<?=$value['cost']; ?>"> ₹ <?=$value['totalCost']; ?></h5>
                                    <del data-cardmrp="<?=$value['addMrp']; ?>"> ₹ <?=$value['totalMrp']; ?></del>
                                    <span> <?=($value['addMrp']-$value['cost'])*100/$value['addMrp']; ?>% OFF</span>
                                    </div>
                                    <input type="hidden" value="<?=$value['id']; ?>" name="card_id">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-12 col-12">
                                <div class="cart_rightextbox">
                                    <h6>Delivery expected  sun jan 31  I  <span> Delivery free</span></h6>
                                    <div class="cart_middletextbtnsc">
                                       <button class="cart_middletextbtn cart_remove" data-id="<?=$value['id']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="cart_deleteicon" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                          </svg>
                                          Remove 
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <div class="cart_middleborder"></div>
                        </div>
                        <?php   
                    }?>
                    <span id="delete" class="text-danger"></span>
                    <span id="errors" class="text-danger"></span>
                    </div>
                      
                         
                       
                    <div class="cart_cheackoutsc">
                        <a href="<?= base_url('checkout/'.$session['id']); ?>">Checkout</a>
                    </div>
            
                </div>
                <div class="col-xl-3 col-md-12 col-12">
                    <div class="cart_pricebox">
                        <h3>Price details</h3>
                        <div class="cart_priceborder"></div>
                        <div class="cart_pricetextbox">
                            <h4>Price <?=$totalItam[0]['addQty'] ?> item </h4>
                            <h5>₹ <?=$totalProductsCost[0]['totalCost'] ?></h5>
                        </div>
                        <div class="cart_pricetextbox">
                            <h4>Discount</h4>
                            <h6>-₹  <?= $totalProductsMrp[0]['totalMrp']-$totalProductsCost[0]['totalCost'] ?></h6>
                        </div>
                        <div class="cart_pricetextbox">
                            <h4>Delivery charge</h4>
                            <h6>Free</h6>
                        </div>
                        <div class="cart_amountbox">
                            <h4>Total amount</h4>
                            <h5>₹ <?=$totalProductsCost[0]['totalCost'] ?></h5>
                        </div>
                        <p>You will get discount of ₹  <?= $totalProductsMrp[0]['totalMrp']-$totalProductsCost[0]['totalCost'] ?> on this order</p>
                    </div>
                    <img src="<?= base_url('assets/images/price-carv.png') ?>" class="cart_pcarvimg">
                </div>
            </div>
        </div>
    </section>
    <?php }else {
         echo 'please add to itam card';
    }?>