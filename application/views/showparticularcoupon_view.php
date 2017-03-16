
<div class="container">
    <h1>View Coupon Information</h1>

    <?php foreach($couponInfo as $coupon){?>

    <div class="col-sm-12">
        <h2><?php echo $coupon->couponTitle;?></h2>


        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th rowspan="4"><img src="<?php echo base_url().'assets/'?>images/coupon/<?php echo $coupon->couponID ?>.jpg"></th>
                    <th>Description</th>
                    <td><?php echo $coupon->couponDesc;?></td>
                </tr>
                <tr>

                    <th>Member Point</th>
                    <td><?php echo $coupon->couponMemberPointNeed;?></td>
                </tr>
                <tr>

                    <th>Expire Day</th>
                    <td><?php echo $coupon->couponExpireDay;?></td>
                </tr>
                <tr>

                    <th>Coupon Left</th>
                    <td><?php echo $coupon->couponMaxOwner;?></td>
                </tr>
                <tr>


                    <?php }?>
            </table>
        </div>
    </div>

    <div class="col-sm-12 row" style="margin-bottom: 40px">

        <a type="button" class="btn btn-default" href="<?php echo site_url("CouponInfo/buycoupon/$coupon->couponID"); ?>" role="button">Buy</a>
    </div>

    <a type="button" class="btn btn-default" style="margin-top: 40px" href="<?php echo site_url("CouponHome"); ?>"" role="button">Back</a>

</div>