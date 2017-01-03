<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <h1>Home</h1>
    <div class="row">
        <div class="clearfix visible-sm-block"></div>
        <div class="col-sm-12">

            <p class="lead">
                Lets' start by creating an event now!
            </p>

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <a class="btn btn-primary btn-lg btn-block btn-link" style="margin-bottom:20px;padding-top:80px;height:200px;background-color:#ffcc00;text-decoration:none;" href="<?php echo site_url('DiningEventHome') ?>" role="button">Dining Event</a>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <a class="btn btn-primary btn-lg btn-block btn-link" style="margin-bottom:20px;padding-top:80px;height:200px;background-color:#ff814c;text-decoration:none;" href="<?php echo site_url('ComingSoon') ?>" role="button">Restaurant</a>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <a class="btn btn-primary btn-lg btn-block btn-link" style="margin-bottom:20px;padding-top:80px;height:200px;background-color:#b3ea32;text-decoration:none;" href="<?php echo site_url('ComingSoon') ?>" role="button">Coupon</a>
                </div>

            </div>
        </div>

    </div>

</div>