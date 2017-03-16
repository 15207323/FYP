<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View All Coupon</h1>
        </div>
    </div>

    <div class="col-sm-12">

        <row>
            <a type="button" class="btn btn-default" href="<?php echo site_url("CouponInfo/create"); ?>" role="button" style="margin-bottom: 10px">Create</a>
        </row>



        <row>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Coupon ID</th>
                        <th>Coupon Title</th>

                        <th>Action</th>
                    </tr>
                    <?php foreach($couponInfo as $coupon){?>
                        <tr>
                            <th><?php echo $coupon->couponID;?></th>
                            <td><?php echo $coupon->couponTitle;?></td>

                            <td><a type="button" class="btn btn-default btn-xs" href="<?php echo site_url("CouponInfo/view/$coupon->couponID"); ?>" role="button">View</a>
                            <a type="button" class="btn btn-default btn-xs" href="<?php echo site_url("CouponInfo/edit/$coupon->couponID"); ?>" role="button">Edit</a>
                            <a type="button" class="btn btn-default btn-xs" href="<?php echo site_url("CouponInfo/admindelete/$coupon->couponID"); ?>" role="button">Delete</a></td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </row>
    </div>



</div>