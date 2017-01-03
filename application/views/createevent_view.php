
<div class="container">
    <h1>Create Dining Event</h1>



    <?php echo form_open("EventInfo/create"); ?>

    <div class="form-group">


            <label for="eventTitle" class="col-sm-4 control-label">Title</label>
            <div class="col-sm-8">
                <?php echo form_error("eventTitle", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="eventTitle" value="<?php echo set_value('eventTitle'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="eventAim" class="col-sm-4 control-label">Aim</label>
            <div class="col-sm-8">
                <?php echo form_error("eventAim", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="eventAim" value="<?php echo set_value('eventAim'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="eventDesc" class="col-sm-4 control-label">Description</label>
            <div class="col-sm-8">
                <?php echo form_error("eventDesc", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="eventDesc" value="<?php echo set_value('eventDesc'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="eventStartTime" class="col-sm-4 control-label">Start Time</label>
            <div class="col-sm-8">
                <?php echo form_error("eventStartTime", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="eventStartTime" placeholder="yyyy-MM-dd HH:mm:ss" value="<?php echo set_value('eventStartTime'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="eventEndTime" class="col-sm-4 control-label">End Time</label>
            <div class="col-sm-8">
                <?php echo form_error("eventEndTime", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="eventEndTime" placeholder="yyyy-MM-dd HH:mm:ss" value="<?php echo set_value('eventEndTime'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="eventMinParti" class="col-sm-4 control-label">Min. Participant</label>
            <div class="col-sm-8">
                <?php echo form_error("eventMinParti", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="eventMinParti" placeholder="include yourself" value="<?php echo set_value('eventMinParti'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="eventMaxParti" class="col-sm-4 control-label">Max. Participant</label>
            <div class="col-sm-8">
                <?php echo form_error("eventMaxParti", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="eventMaxParti" placeholder="include yourself" value="<?php echo set_value('eventMaxParti'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="eventEstFee" class="col-sm-4 control-label">Estimated Fee</label>
            <div class="col-sm-8">
                <?php echo form_error("eventEstFee", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="number" class="form-control" name="eventEstFee" placeholder="0.00" step="0.01" value="<?php echo set_value('eventEstFee'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="eventRestaurantName" class="col-sm-4 control-label">Restaurant Name</label>
            <div class="col-sm-8">
                <?php echo form_error("eventRestaurantName", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="eventRestaurantName" value="<?php echo set_value('eventRestaurantName'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="eventAddress" class="col-sm-4 control-label">Restaurant Address</label>
            <div class="col-sm-8">
                <?php echo form_error("eventAddress", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="eventAddress" value="<?php echo set_value('eventAddress'); ?>" style="margin-bottom:20px;">
            </div>

            <div class="col-sm-offset-4 col-sm-8" style="margin-bottom:40px;">
                <button type="submit" class="btn btn-default" value="Submit">Create</button>
            </div>



        <?php echo form_close(); ?>

        <a type="button" class="btn btn-default" href="<?php echo site_url("DiningEventHome"); ?>" role="button">Back</a>

    </div>

</div>
