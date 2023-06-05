<div class="right_box">
  <div class="table_box1">
    <div class="tableHead_container">
      <h3>Card List</h3>
    </div>
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th>id</th>
          <th>User ID</th>
          <th>Product id</th>
          <th>Quantity</th>
          <th>Cost</th>
          <th>MRP</th>
          <th>Total Cost</th>
          <th>total MRP</th>
          <th>Created</th>
          <th>Updated</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($CardData as $value) { ?>
          <tr>
            <td>
              <?= $value['id'] ?>
            </td>
            <td>
              <?= $value['user_id'] ?>
            </td>
            <td>
              <?= $value['fk_product_id'] ?>
            </td>
            <td>
              <?= $value['addQty'] ?>
            </td>
            <td>
              <?= $value['cost'] ?>
            </td>
            <td>
              <?= $value['addMrp'] ?>
            </td>
            <td>
              <?= $value['totalCost'] ?>
            </td>
            <td>
              <?= $value['totalMrp'] ?>
            </td>
           
            <td>
              <?= $value['created_at'] ?>
            </td>
            <td>
              <?= $value['updated_at'] ?>
            </td>
          
            <!-- <td><button class="btn btn-warning updateCategory" data-id="<?= $value['id'] ?>">Update</button></td>
            <td><button class="btn btn-danger deleteCategory" data-id="<?= $value['id'] ?>">Delete </button></td> -->

          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>
</section>