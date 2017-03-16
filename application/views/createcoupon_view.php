<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1>Create Coupon</h1>
        </div>
    </div>

    <?php echo form_open("CouponInfo/create"); ?>

    <div class="form-group">


            <label for="couponTitle" class="col-sm-4 control-label">Coupon Title</label>
            <div class="col-sm-8">
                <?php echo form_error("couponTitle", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="couponTitle" value="<?php echo set_value('couponTitle'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="couponDesc" class="col-sm-4 control-label">Description</label>
            <div class="col-sm-8">
                <?php echo form_error("couponDesc", '<div class="error" style="color: #ff4500">', '</div>'); ?>
            <textarea class="form-control" name="couponDesc" rows="5" style="margin-bottom:10px;"></textarea>

            </div>

            <label for="couponMemberPointNeed" class="col-sm-4 control-label">Member Point Needed</label>
            <div class="col-sm-8">
                <?php echo form_error("couponMemberPointNeed", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="number" class="form-control" name="couponMemberPointNeed" value="<?php echo set_value('couponMemberPointNeed'); ?>" style="margin-bottom:10px;">
            </div>


            <label for="couponExpireDay" class="col-sm-4 control-label" >Expire Day</label>
            <div class="col-sm-8"  style="margin-bottom:10px;">
                <div class="input-group date" id="couponExpireDay">
                    <?php echo form_error("couponExpireDay", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                    <input type='text' class="form-control" name="couponExpireDay" value="<?php echo set_value('couponExpireDay'); ?>" >  </input>
                    <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar" ></span>
                        </span>
                </div>
            </div>

            <label for="couponMaxOwner" class="col-sm-4 control-label">Maximum No. of Owner</label>
            <div class="col-sm-8">
                <?php echo form_error("couponMaxOwner", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="number" class="form-control" name="couponMaxOwner" value="<?php echo set_value('couponMaxOwner'); ?>" style="margin-bottom:10px;">
            </div>



            <label class="col-sm-4 control-label">Upload Image</label>
            <div class="col-sm-8">
<!--                --><?php //echo form_error("couponAvgPrice", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="file" style="margin-bottom:10px;">
            </div>



            <div class="col-sm-offset-4 col-sm-8" style="margin-bottom:40px;">
                <button type="submit" class="btn btn-default" value="Submit">Create</button>
            </div>



        <?php echo form_close(); ?>

        <a type="button" class="btn btn-default" href="<?php echo site_url("CouponInfo"); ?>" role="button">Back</a>



</div>
</div>
