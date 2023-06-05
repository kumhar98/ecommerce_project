    <!--banner section start hare-->
    <section class="productslist_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-md-6 col-12">
                    <div class="products_listbox">
                        <h3><?php echo $catname['cat_name']; ?> products List </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e63551" fill-opacity="1" d="M0,192L48,170.7C96,149,192,107,288,85.3C384,64,480,64,576,90.7C672,117,768,171,864,192C960,213,1056,203,1152,176C1248,149,1344,107,1392,85.3L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg> -->
    <!--banner section end hare-->
    <!--prosucts section start hare-->
    <section class="products_section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12 p-0 m-0">
                    <div class="deals_textbox">
                        <h4><?php echo $catname['cat_name']; ?></h4>
                        <a href="#">VIEW ALL</a>
                    </div>
                </div>
                <?php foreach ($categoryList as $key => $value) { ?>


                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="products_imgbox">
                            <div class="swiper cardSwiper">
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
                            </div>
                            <div class="cat_pagination">
                                <div class="swiper-pagination "></div>
                            </div>

                            <div class="head">
                                <div class="head1">
                                    <h3>
                                        <?= substr($value['product_name'], 0, 25) . "....."  ?>
                                    </h3>
                                    <h4> MRP <del><?php echo $value['MRP']; ?></del></h4>
                                </div>
                                <div>
                                    <h4> RS <?php echo $value['selling_price']; ?></h4>
                                    <p><?php echo $value['qty'] . "pc"; ?></p>
                                </div>
                            </div>
                            <div class="des_div">
                                <span class="description">

                                    <?= substr($value['product_des'], 0, 100) . " <button class='btnReadMore'>Read more</button>" ?>
                                </span>
                                <span class="des_more">
                                    <?php echo $value['product_des'] . " <button class='btnReadMore'>Read more</button>" ?>
                                </span>

                            </div>
                            <div class="products_textbox">

                                <div class="products_ulbox">
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url("proDetails/" . $value['id']) ?>">
                                                <button class="proDetails"><svg xmlns="http://www.w3.org/2000/svg" class="products_ulboxicon" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                                    </svg>Add</button>
                                            </a>
                                            </a>


                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            </div>
        </div>
    </section>