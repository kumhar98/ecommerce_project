<div class="right_box">
    <div class="errors">
        <?php
        if (isset($errors)) {
            echo validation_list_errors();

        }
        ?>
    </div>
    <div class="products_box">
        <h3>Add Products</h3>
        <form class="login_form" method="post"
            action="<?php echo base_url('admin/productUpdate/' . $ProductDataFetch['id']) ?>"
            enctype="multipart/form-data">
            <select class="login_formele" name="category" value="<?php set_value('category') ?>">
                <option value="volvo">Products Category</option>
                <?php
                foreach ($category as $key => $value) {
                    if ($ProductDataFetch['cat_id_fk'] == $value['id']) {
                        echo "<option value=" . $value['id'] . " selected >" . $value['cat_name'] . "</option>";
                    } else {

                        echo "<option value=" . $value['id'] . ">" . $value['cat_name'] . "</option>";
                    }

                }

                ?>
            </select>
            <input type="text" placeholder="Products Name" class="login_formele" name="product_name"
                value="<?= $ProductDataFetch['product_name'] ?>" required>
            <input type="text" placeholder="Products Color" class="login_formele" name="product_color"
                value="<?= $ProductDataFetch['Color'] ?>" required>
            <input type="number" placeholder="Products Price" class="login_formele" name="MRP"
                value="<?= $ProductDataFetch['MRP'] ?>" required>
            <input type="number" placeholder="Selling  Price" class="login_formele" name="selling_price"
                value="<?= $ProductDataFetch['selling_price'] ?>" required>
            <input type="number" placeholder="Quantity" class="login_formele" name="qty"
                value="<?= $ProductDataFetch['qty'] ?>" required>
            <!-- <input type="file" placeholder="Products image" class="login_formele" name="image" value="<?php set_value("image") ?>" required> -->
            <input type="file" name="images[]" multiple class="d-block my-2 login_formele">
            <?php
            if (isset($imageError)) {
                echo "<span class='text-danger  pt-2'>" . $imageError . "</span>";
            } else {
                echo "<span class='text-warning   pt-2'>Image Upload Less than 4</span>";
            }

            ?>
            <textarea input type="text" placeholder=" Products Description" class="login_formele"
                name="product_des"><?php echo $ProductDataFetch['product_des'] ?></textarea>
            <div class="login_btnsc">
                <button class="login_btn" type="submit">Products Update</button>
            </div>
            <div class="errors">
                <?php
                if (isset($Success)) {
                    echo $Success;
                }
                ?>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</section>