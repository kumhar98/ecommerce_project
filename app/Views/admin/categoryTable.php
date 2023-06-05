<div class="right_box">
  <div class="table_box1">
    <div class="tableHead_container">
      <h3>Category List</h3>
      <a href="<?php echo base_url('admin/category') ?>">
        Add Category
      </a>
    </div>
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th>id</th>
          <th>Category Name</th>
          <th>created_at</th>
          <th>updated_at</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($CategoryData as $value) { ?>
          <tr>
            <td>
              <?= $value['id'] ?>
            </td>
            <td>
              <?= $value['cat_name'] ?>
            </td>
            <td>
              <?= $value['created_at'] ?>
            </td>
            <td>
              <?= $value['updated_at'] ?>cetegoryUpdate
            </td>
            <td><a class="btn btn-warning updateCategory" href="<?= base_url('admin/categoryUpdate/'.$value['id'])  ?>">Update</a></td>
            <td><button class="btn btn-danger deleteCategory" data-id="<?= $value['id'] ?>">Delete</button></td>

          </tr>
        <?php } ?>
        <span id="deleteErorr"></span>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>
</section>
