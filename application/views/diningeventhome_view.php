<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section id="ehome" class="ehome">

    <div class="slogan">

        <h2><span class="text_color">Dining Event</span> </h2>
        <h4>Create & Join!</h4>

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
            <div class="col-md-3">
                <div class="wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="service-box">
                        <div class="service-icon">
                            <a href="<?php echo site_url('EventInfo/create') ?>"><img src="<?php echo base_url().'assets/'?>images/team/service4.jpg" alt="" /></a>
                        </div>
                        <div class="service-desc">
                            <h5>Create Dining Event!</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-box">
                        <div class="service-icon">
                            <a href="<?php echo site_url('EventInfo') ?>"><img src="<?php echo base_url().'assets/'?>images/team/service5.jpg" alt="" /></a>
                        </div>
                        <div class="service-desc">
                            <h5>See All Dining Event!</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-box">
                        <div class="service-icon">
                            <a href="<?php echo site_url('EventInfo/joint') ?>"><img src="<?php echo base_url().'assets/'?>images/team/service6.jpg" alt=""  /></a>
                        </div>
                        <div class="service-desc">
                            <h5>See All Joint Dining Event!</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                    <div class="wow fadeInRight" data-wow-delay="0.2s">
                        <div class="service-box">
                            <div class="service-icon">
                                <a href="<?php echo site_url('EventInfo/created') ?>"><img src="<?php echo base_url().'assets/'?>images/team/service7.jpg" alt=""  /></a>
                            </div>
                            <div class="service-desc">
                                <h5>See All Created Dining Event!</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
<div style="padding-bottom: 50px"></div>
<div>