
<div class="container">
    <div class="col-sm-12">
    <h1>View Owned Coupon Information</h1>

    <?php foreach($couponInfo as $coupon){?>


        <h2><?php echo $coupon->couponTitle;?></h2>


        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th rowspan="2"><img src="<?php echo base_url().'assets/'?>images/coupon/<?php echo $coupon->couponID ?>.jpg"></th>
                    <th>Description</th>
                    <td><?php echo $coupon->couponDesc;?></td>
                </tr>

                    <th>Expire Day</th>
                    <td><?php echo $coupon->couponExpireDay;?></td>
                </tr>
                <tr>



                    <?php }?>
            </table>
        </div>


    <div class="col-sm-12 row" style="margin-bottom: 40px">

        <a type="button" class="btn btn-default" href="#" role="button">Download</a>
    </div>

    <a type="button" class="btn btn-default" style="margin-top: 40px" href="<?php echo site_url("CouponInfo/owned"); ?>"" role="button">Back</a>
    </div>

</div>