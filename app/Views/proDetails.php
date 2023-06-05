<?php $session = session()->get(); ?>
<section class="details_section">
  <div class="container">
    <?php
    foreach ($pro_details as $key => $value) { ?>
      <div class="row pro_row">
        <div class="col-xl-4 col-md-12 col-12">
          <div class="details_menubox">
            <div class="swiper mySwiper2">
              <div class="swiper-wrapper">
                <?php
                if (isset($value['image1'])) {
                  echo '   <div class="swiper-slide"> 
                                 <img src="' . base_url("admin/images/" . $value['image1']) . '" class="details_img ">
                                 </div>
                                 ';
                }
                ?>
                <?php
                echo '   <div class="swiper-slide"> 
                                <img src="' . base_url("admin/images/" . $value['image2']) . '" class="details_img ">
                                </div>
                                ';
                ?>
                <?php
                if (isset($value['image3'])) {
                  echo '   <div class="swiper-slide"> 
                                 <img src="' . base_url("admin/images/" . $value['image3']) . '" class="details_img ">
                                 </div>
                                 ';
                }
                ?>
                <?php
                if (isset($value['image4'])) {
                  echo '   <div class="swiper-slide"> 
                                 <img src="' . base_url("admin/images/" . $value['image4']) . '" class="details_img ">
                                 </div>
                                 ';
                }
                ?>
              </div>
              <div class="swiper-pagination"></div>
            </div>
            <div thumbsSlider="" class="swiper mySwiper">
              <div class="swiper-wrapper">
                <?php
                if (isset($value['image1'])) {
                  echo '   <div class="swiper-slide"> 
                                 <img src="' . base_url("admin/images/" . $value['image1']) . '" class="details_img ">
                                 </div>
                                 ';
                }
                ?>
                <?php
                if (isset($value['image2'])) {
                  echo '   <div class="swiper-slide"> 
                                 <img src="' . base_url("admin/images/" . $value['image2']) . '" class="details_img ">
                                 </div>
                                 ';
                }
                ?>
                <?php
                if (isset($value['image3'])) {
                  echo '<div class="swiper-slide"> 
                                    <img src="' . base_url("admin/images/" . $value['image3']) . '" class="details_img ">
                                 </div>
                                 ';
                }
                ?>
                <?php
                if (isset($value['image4'])) {
                  echo '   <div class="swiper-slide"> 
                                 <img src="' . base_url("admin/images/" . $value['image4']) . '" class="details_img ">
                                 </div>
                                 ';
                }
                ?>
              </div>
            </div>
            <div class="details_btnsc">
              <!-- <a href="cart.html"><button class="details_btn">ADD TO CART</button></a> -->
              <?php
              if ($session["isLoggedIn"]) { ?>
                <button class="addCard btn btn-primary mt-3" data-id="<?php echo $session['id'] ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" class="products_ulboxicon" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                  </svg>
                  ADD TO CART
                </button>
                <button class="btnBuyNow" data-proID="<?= $value['id'] ?>">
                  BUY NOW
                </button>
                <span class="danger" id="errors"></span>
              <?php } else { ?>
                <a href="<?php base_url("login") ?>">
                  <button class="addCard">
                    <svg xmlns="http://www.w3.org/2000/svg" class="products_ulboxicon" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                      <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                    </svg>
                    ADD TO CART
                  </button>
                </a>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-xl-8 col-md-12 col-12">
          <div class="details_textbox custom-row">
            <h3 class="pro_name" data->
              <?php echo $value['product_name'] ?>
            </h3>
            <div class="cardCostContainer">
              <h4 class="pro_sellingPrice" data-sellingPrice="<?php echo $value['selling_price'] ?>">
                ₹ <?php echo $value['selling_price'] ?>
              </h4>
              <del class="pro_mrp" data-mrp="<?php echo $value['MRP'] ?>">
                ₹ <?php echo $value['MRP'] ?>
              </del>
            </div>
            <select name="qty" id="pro_qty" class="pro_qty updateQty" value="">
              <?php for ($i = 1; $i <= $value['qty']; $i++) { ?>
                <option value="<?php echo $i ?>"><?php echo "qty " . $i ?></option>
              <?php } ?>
            </select>
            <div class="des_div">
              <span class="description">

                <?= substr($value['product_des'], 0, 100) . " <button class='btnReadMore'>Read more</button>" ?>
              </span>
              <span class="des_more">
                <?php echo $value['product_des'] . " <button class='btnReadMore'>Read more</button>" ?>
              </span>

            </div>
            <input type="hidden" class="fk_product_id" value="<?php echo $value['id'] ?>">
          </div>
        </div>
      </div>
    <?php }
    ?>
  </div>
</section>