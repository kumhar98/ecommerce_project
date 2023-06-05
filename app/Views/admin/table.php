<div class="right_box">
  <div class="table_box1">
    <div class="tableHead_container">
      <h3>Products List</h3>
      <a href="<?php echo base_url('admin/products') ?>">
        Add Products
      </a>
    </div>
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th>id</th>
          <th>Product Name</th>
          <th>Product Description</th>
          <th>quantity</th>
          <th>MRP</th>
          <th>Selling Price</th>
          <th>image1</th>
          <th>image2</th>
          <th>image3</th>
          <th>image4</th>
          <th>Color</th>
          <th>Category Id</th>
          <th>created_at</th>
          <th>updated_at</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($prouctsData as $value) { ?>
          <tr>
            <td>
              <?= $value['id'] ?>
            </td>
            <td>
              <?= $value['product_name'] ?>
            </td>
            <td class="description">
              <div class="des_div">
                <span class="description">

                  <?= substr($value['product_des'], 0, 100) . " <button class='btnReadMore'>Read more</button>" ?>
                </span>
                <span class="des_more">
                  <?php echo $value['product_des'] . " <button class='btnReadMore'>Read more</button>" ?>
                </span>

              </div>
            </td>
            <td>
              <?= $value['qty'] ?>
            </td>
            <td>
              <?= $value['MRP'] ?>
            </td>
            <td>
              <?= $value['selling_price'] ?>
            </td>
            <td>
              <?= $value['image1'] ?>
            </td>
            <td>
              <?= $value['image2'] ?>
            </td>
            <td>
              <?= $value['image3'] ?>
            </td>
            <td>
              <?= $value['image4'] ?>
            </td>
            <td>
              <?= $value['Color'] ?>
            </td>
            <td>
              <?= $value['cat_id_fk'] ?>
            </td>
            <td>
              <?= $value['created_at'] ?>
            </td>
            <td>
              <?= $value['updated_at'] ?>
            </td>
            <td><a class="btn btn-warning updateProduct" href="<?= base_url("admin/productUpdate/" . $value['id']) ?>">Update</a></td>
            <td><button class="btn btn-danger deleteProduct" data-id="<?= $value['id'] ?>">Delete </button></td>


          </tr>
        <?php } ?>
        <span id="deleteErorr" class="text-danger"></span>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>
</section>