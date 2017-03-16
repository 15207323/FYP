

<div class="container">
    <h1>View All Owned Coupon</h1>
    <div class="col-sm-12">
        <div class="row">
            <?php foreach($couponInfo as $coupon){?>
                <div class="col-sm-6">
                    <div class="wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="service-box">
                            <div class="service-icon grow">
                                <div class="grow">
                                    <a href="<?php echo site_url("CouponInfo/viewowned/$coupon->couponID"); ?>"><img src="<?php echo base_url().'assets/'?>images/coupon/<?php echo $coupon->couponID ?>.jpg" alt="" /></a>
                                </div>
                            </div>
                            <div class="service-desc">
                                <p style="font-weight: bold"><?php echo $coupon->couponTitle;?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>

        </div>


    </div>



    <a type="button" class="btn btn-default" style="margin-top: 80px" href="<?php echo site_url("CouponHome"); ?>" role="button">Back</a>

</div>