<div class="right_box">

    <div class="right_amountbox">
        <div class="right_txtbox">
            <div class="user_box">
                <h4>Total Order</h4>
            </div>
            <h5><?= count($orderItam) ?></h5>
        </div>
        <div class="right_txtbox1">
            <div class="user_box">
                <h4>Total User</h4>
            </div>
            <h5><?= $total_user ?></h5>
        </div>
        <div class="right_txtbox2">
            <div class="user_box">
                <h4>Complete</h4>
            </div>
            <h5><?= count($completedOrder)  ?></h5>
        </div>
        <div class="right_txtbox3">
            <div class="user_box">
                <h4>Pending</h4>
            </div>
            <h6><?= count($pendingOrder) ?></h6>
        </div>
    </div>
    <div class="graph_section">
        <div class="graph_box">
            <!-- <figure class="highcharts-figure">
                                    <div id="container"></div>
                                </figure> -->
            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
        </div>
        <div class="graph_box1">
            <canvas id="myChart1" style="width:100%;height:400px;"></canvas>
        </div>
    </div>
    <div class="table_box">
        <h3>Recent Order</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order No </th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Status Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($orderItam as $key => $value) { ?>
                    <tr class="tableRow">
                        <td><?= $value['order_id'] ?></td>
                        <td><?= $value['order_amount'] ?></td>
                        <td><?= $value['order_status'] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btnUpdateStatus" data-id="<?= $value['id'] ?>">
                                Status Update
                            </button>
                        </td>
                    </tr>
                <?php  }

                ?>
            </tbody>
        </table>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="updateStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Update Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="updateStatus" class="col-form-label">Update Status</label>
                        <input type="text" class="form-control" id="updateStatus" value="">
                        <input type="hidden" class="form-control" id="updateStatusId" value="">
                        <span> Enter values ​​only: pending, Acceptted, out of delivery, delivered</span>
                        <span class="text-danger" id="updateStatusError"></span>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary " id="btnUpdateSave">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>