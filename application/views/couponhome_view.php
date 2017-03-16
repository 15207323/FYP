<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section id="chome" class="chome">

    <div class="slogan">
        <h2><span class="text_color">Coupon</span></h2>
        <h4>Use your member point!</h4>
        <a href="<?php echo site_url("CouponInfo/owned")?>"><h4>or Click Here to View Owned Coupon</h4></a>
    </div>
    <div class="page-scroll">
        <a href="#all" class="btn btn-circle">
            <i class="fa fa-angle-double-down animated"></i>
        </a>
    </div>

</section>

<section id="all" class="home-section text-center bg-white">
    <div class="heading-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <div class="section-heading">
                            <h2>All Coupons</h2>
                            <i class="fa fa-2x fa-angle-down"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-lg-2">
            <hr class="marginbot-50">
        </div>
    </div>
    <div class="row">
        <?php foreach($couponInfo as $coupon){?>
            <div class="col-sm-6">
                <div class="wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="service-box">
                        <div class="service-icon grow">
                            <div class="grow">
                                <a href="<?php echo site_url("CouponInfo/view/$coupon->couponID"); ?>"><img src="<?php echo base_url().'assets/'?>images/coupon/<?php echo $coupon->couponID ?>.jpg" alt="" /></a>
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
</section>

<div style="padding-bottom: 50px"></div>
<div>