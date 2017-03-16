<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section id="rhome" class="rhome">

    <div class="slogan">

        <h2><span class="text_color">Restaurant</span></h2>
        <h4>Search now!</h4>
        <div class="col-sm-6 col-sm-offset-3">
            <?php echo form_open("RestInfo/search"); ?>
            <row>
                <div class="input-group" style="margin-bottom: 20px">
                    <?php echo form_error("restName", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                    <input type="text" class="form-control" name="restName"  placeholder="Search for a restaurant by restaurant name...">
                    <span class="input-group-btn">
                        <button type="submit" value="Submit" class="btn btn-default" name="spost">Search</button>
                    </span>

                </div>
                <a href="<?php echo site_url("RestInfo")?>"><h4>or Click Here to View All Restaurant</h4></a>
            </row>
            <?php echo form_close(); ?>
        </div>

        <div class="clearfix"></div>

    </div>

    <div class="page-scroll">
        <a href="#random" class="btn btn-circle">
            <i class="fa fa-angle-double-down animated"></i>
        </a>
    </div>

</section>

<section id="topeight" class="home-section text-center bg-white">
    <div class="heading-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <div class="section-heading">
                            <h2>Best 8 Restaurants</h2>
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
            <?php foreach($restInfo as $restaurant){?>
                <div class="col-sm-3">
                    <div class="wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="service-box">
                            <div class="service-icon grow">
                                <div class="grow">
                                <a href="<?php echo site_url("RestInfo/view/$restaurant->restID"); ?>"><img src="<?php echo base_url().'assets/'?>images/restaurant/<?php echo $restaurant->restID ?>.jpg" alt="" /></a>
                            </div>
                            </div>
                            <div class="service-desc">
                                <h5><?php echo $restaurant->restName;?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>

        </div>
    </div>
</section>
<section id="random" class="home-section text-center bg-grey">
    <div class="heading-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <div class="section-heading">
                            <h2>Random Restaurant!</h2>
                            <i class="fa fa-2x fa-angle-down"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="padding-bottom: 150px">
        <div class="row">
            <div class="col-lg-2 col-lg-offset-5">
                <hr class="marginbot-50">
            </div>
        </div>
        <div class="container">
            <?php {?>
                <?php $id=$restranInfo[0]->restID; ?>
    <div class="rest-container">
        <div class="rest-row">
            <a href="<?php echo site_url("EventInfo/view/$id"); ?>">
            <div class="row-title" style="font-weight: bold">
                <?php echo $restranInfo[0]->restName;?>
            </div>
            </a>
            <div class="row-left">
                <a href="<?php echo site_url("EventInfo/view/$id"); ?>">
                <img src="<?php echo base_url().'assets/'?>images/restaurant/<?php echo $restranInfo[0]->restID ?>.jpg">
                    </a>
            </div>
            <div class="row-right">
                <div class="row" style="text-align: left">
                <div class="col-sm-2" style="font-weight: bold">Address:</div>
                    <div class="col-sm-10 col-sm-offset-2" style="margin: auto"><?php echo $restranInfo[0]->restAddress;?></div>
                </div>
            <div class="row" style="text-align: left">
                <div class="col-sm-2" style="font-weight: bold">Tel:</div>
                    <div class="col-sm-2 col-sm-offset-2" style="margin: auto"><?php echo $restranInfo[0]->restTel;?></div>
            <div class="col-sm-2 col-sm-offset-2" style="font-weight: bold">Category</div>
                <div class="col-sm-2 col-sm-offset-6" style="margin: auto"><?php echo $restranInfo[0]->restCategory;?></div>
                </div>
                <div class="row" style="text-align: left">
                    <div class="col-sm-2" style="font-weight: bold">E-mail:</div>
                    <div class="col-sm-2 col-sm-offset-2" style="margin: auto"><?php echo $restranInfo[0]->restEmail;?></div>

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