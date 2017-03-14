<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <h1>Coupon Home</h1>
    <div class="row">
        <div class="clearfix visible-sm-block"></div>
        <div class="col-sm-12">

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <a class="btn btn-primary btn-lg btn-block btn-link" style="margin-bottom:20px;padding-top:80px;height:200px;background-color:#ffcc00;text-decoration:none;" href="<?php echo site_url('CouponInfo') ?>" role="button">View All Coupon</a>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <a class="btn btn-primary btn-lg btn-block btn-link" style="margin-bottom:20px;padding-top:80px;height:200px;background-color:#ff814c;text-decoration:none;" href="<?php echo site_url('CouponInfo/create') ?>" role="button">Create Coupon</a>
                </div>

            </div>
        </div>

    </div>

</div>