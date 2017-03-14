<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section id="home" class="home">

    <div class="slogan">

        <h2><span class="text_color">Dine Together!</span> </h2>
        <h4>Welcome back!</h4>

    </div>

    <div class="page-scroll">
        <a href="#services" class="btn btn-circle">
            <i class="fa fa-angle-double-down animated"></i>
        </a>
    </div>

</section>

<section id="services" class="home-section text-center bg-gray">
    <div class="heading-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <div class="section-heading">
                            <h2>Now you can...</h2>
                            <i class="fa fa-2x fa-angle-down"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-lg-offset-5">
                <hr class="marginbot-50">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="service-box">
                        <div class="service-icon">
                            <a href="<?php echo site_url('DiningEventHome') ?>"><img src="<?php echo base_url().'assets/'?>images/team/function1.jpg" alt="" /></a>
                        </div>
                        <div class="service-desc">
                            <h5>Join Dining Event!</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-box">
                        <div class="service-icon">
                            <a href="<?php echo site_url('RestaurantHome') ?>"><img src="<?php echo base_url().'assets/'?>images/team/function2.jpg" alt="" /></a>
                        </div>
                        <div class="service-desc">
                            <h5>Search Restaurant!</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wow fadeInRight" data-wow-delay="0.2s">
                    <div class="service-box">
                        <div class="service-icon">
                            <a href="<?php echo site_url('CouponHome') ?>"><img src="<?php echo base_url().'assets/'?>images/team/function3.jpg" alt=""  /></a>
                        </div>
                        <div class="service-desc">
                            <h5>Find Coupons!</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div style="padding-bottom: 50px"></div>


<div>