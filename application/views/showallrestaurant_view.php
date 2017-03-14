

<div class="container">
    <h1>View All Restaurant</h1>
    <div class="col-sm-12">
        <div class="container" style="padding-bottom: 150px">
                <?php {?>
                <?php foreach($restInfo as $restInfo){?>
                    <div class="rest-container">
                        <div class="row">
                        <div class="rest-row">
                            <a href="<?php echo site_url("RestInfo/view/$restInfo->restID"); ?>">
                                <div class="row-title" style="font-weight: bold">
                                    <?php echo $restInfo->restName;?>
                                </div>
                            </a>
                            <div class="row-left col-sm1">
                                <a href="<?php echo site_url("RestInfo/view/$restInfo->restID"); ?>">
                                    <img src="<?php echo base_url().'assets/'?>images/restaurant/<?php echo $restInfo->restID ?>.jpg">
                                </a>
                            </div>
                            <div class="row-right col-sm4">
                                <div class="row" style="text-align: left">
                                    <div class="col-sm-2" style="font-weight: bold">Address:</div>
                                    <div class="col-sm-10 col-sm-offset-2" style="margin: auto; font-weight: 500;"><?php echo $restInfo->restAddress;?></div>
                                </div>
                                <div class="row" style="text-align: left">
                                    <div class="col-sm-2" style="font-weight: bold">Tel:</div>
                                    <div class="col-sm-2 col-sm-offset-2" style="margin: auto; font-weight: 500;"><?php echo $restInfo->restTel;?></div>
                                </div>
                                <div class="row" style="text-align: left">
                                    <div class="col-sm-2" style="font-weight: bold">E-mail:</div>
                                    <div class="col-sm-2 col-sm-offset-2" style="margin: auto; font-weight: 500;"><?php echo $restInfo->restEmail;?></div>

                                </div>
                                <div class="row" style="text-align: left">
                                    <div class="col-sm-2" style="font-weight: bold">Category:</div>
                                    <div class="col-sm-2 col-sm-offset-2" style="margin: auto; font-weight: 500;"><?php echo $restInfo->restCategory;?></div>
                                    <div class="col-sm-2 col-sm-offset-3" style="font-weight: bold">Rate:</div>
                                    <div class="col-sm-2 col-sm-offset-6" style="margin: auto; font-weight: 500;"><?php echo $restInfo->restAvgRate;?></div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php }?>
                <?php }?>
            </div>
    </div>

    <a type="button" class="btn btn-default" href="<?php echo site_url("DiningEventHome"); ?>" role="button">Back</a>

</div>
