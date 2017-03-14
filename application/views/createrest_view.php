
<div class="container">
    <h1>Create Dining Event</h1>



    <?php echo form_open("RestInfo/create"); ?>

    <div class="form-group">


            <label for="restName" class="col-sm-4 control-label">Restaurant Name</label>
            <div class="col-sm-8">
                <?php echo form_error("restName", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="restName" value="<?php echo set_value('restName'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="restAddress" class="col-sm-4 control-label">Restaurant Address</label>
            <div class="col-sm-8">
                <?php echo form_error("restAddress", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="restAddress" value="<?php echo set_value('restAddress'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="restCategory" class="col-sm-4 control-label">Category</label>
            <div class="col-sm-8">
                <?php echo form_error("restCategory", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="restCategory" value="<?php echo set_value('restCategory'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="restTel" class="col-sm-4 control-label">Restaurant Tel.</label>
            <div class="col-sm-8">
                <?php echo form_error("restTel", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="restTel" value="<?php echo set_value('restTel'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="restEmail" class="col-sm-4 control-label">Restaurant E-mail</label>
            <div class="col-sm-8">
                <?php echo form_error("restEmail", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="email" class="form-control" name="restEmail" value="<?php echo set_value('restEmail'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="restOpenHr" class="col-sm-4 control-label">Opening Hour</label>
            <div class="col-sm-8">
                <?php echo form_error("restOpenHr", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <textarea class="form-control" name="restOpenHr" rows="5" style="margin-bottom:10px;">
            </div>


            <label for="restAvgPrice" class="col-sm-4 control-label">Average Price ($)</label>
            <div class="col-sm-8">
                <?php echo form_error("restAvgPrice", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="number" class="form-control" name="restAvgPrice" value="<?php echo set_value('restAvgPrice'); ?>" style="margin-bottom:10px;">
            </div>

            <label class="col-sm-4 control-label">Upload Image</label>
            <div class="col-sm-8">
<!--                --><?php //echo form_error("restAvgPrice", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="file" style="margin-bottom:10px;">
            </div>



            <div class="col-sm-offset-4 col-sm-8" style="margin-bottom:40px;">
                <button type="submit" class="btn btn-default" value="Submit">Create</button>
            </div>



        <?php echo form_close(); ?>

        <a type="button" class="btn btn-default" href="<?php echo site_url("DiningEventHome"); ?>" role="button">Back</a>

    </>

</div>
