<?php
include './db/db-connect.php';
include './pages/admin-orders.php';
include './include/top.php';
?>
<div class="container">
    <div class="row">
        <div class="col-6 mt-3">
            <h2>Orders</h2>
        </div>
    </div>
    <?php
    if ($message) {
    ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?= $message ?>
        </div>
    <?php }
    ?>
    <table class="table" id="example">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">City</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td scope="row"><?= $row['order_id'] ?></td>
                    <td scope="row"><?= $row['name'] ?></td>
                    <td scope="row"><?= $row['phone'] ?></td>
                    <td scope="row"><?= $row['city'] ?></td>
                    <td scope="row"><?= $row['totalprice'] ?></td>
                    <td scope="row"><?= orderStatus($row['order_status']) ?> </td>
                    <td scope="row"><?= formattedDateTime($row['created_at']) ?> </td>
                    <td>
                        <button type="button" class="view-order-details btn btn-primary " value="<?= $row['id'] ?>" name="view" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Detail : <span id="order_details_id">OR00001</span> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="invoice p-3 mb-3">

                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong id="name">John Doe</strong><br>
                                <span id="address">795 Folsom Ave, Suite 600</span> <br>
                                <span id="city"> San Francisco</span>, <span id="state"> San Francisco</span>, <br>
                                <span id="pincode"> San Francisco</span><br>
                                Phone: <span id="phone"> (555) 539-1037</span><br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">

                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">

                            <b>Order ID:</b> <span id="order_id"> or00011o</span><br>
                            <b>Order Date:</b> <span id="created_at"> San Francisco</span><br>
                            <b>Status:</b> <span id="order_status"> San Francisco</span>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="order_items">

                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">

                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td id="sub_totalprice">$250.30</td>
                                        </tr>

                                        <tr>
                                            <th>Shipping:</th>
                                            <td>free</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td id="totalprice">$265.24</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?php include 'include/bottom.php'; ?>
<script>
    $(document).on('click', '.view-order-details', function() {
        var $data = $(this).val();
        var url = 'admin-orders.php?action=view-order-details&id=' + $data;
        $.ajax({
            type: 'GET',
            url: url,
            datetype: "json",
            success: function(output) {
                $('#name').text(output.name);
                $('#address').text(output.address);
                $('#city').text(output.city);
                $('#state').text(output.state);
                $('#pincode').text(output.pincode);
                $('#phone').text(output.phone);
                $('#order_id').text(output.order_id);
                $('#order_details_id').text(output.order_id);
                $('#created_at').text(output.created_at);
                $('#order_status').text(output.order_status);
                $('#sub_totalprice').text(output.totalprice);
                $('#totalprice').text(output.totalprice);
                $('#order_items').html('');
                for (let x in output.orderItem) {
                    console.log(output.orderItem[x]['product_name']);
                    var html="";
                    html+='<tr>';
                    html+='    <td><img src="./uploads/products/'+output.orderItem[x]['product_image']+'" style=" width:100px;height:80px;"> </td>';
                    html+='    <td>'+output.orderItem[x]['quantity']+'</td>';
                    html+='    <td>'+output.orderItem[x]['product_name']+'</td>';
                    html+='    <td>'+(output.orderItem[x]['product_price']*output.orderItem[x]['quantity'] )+'</td>';
                    html+='</tr>';
                    $('#order_items').append(html);
                }
            },
            error: function(output) {
                alert("fail");
            }
        });
    });
</script>