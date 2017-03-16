<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Dining Event</h1>
        </div>
    </div>

    <?php echo form_open("EventInfo/admincreate"); ?>

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
        <div class="col-sm-8"  style="margin-bottom:10px;">
            <div class="input-group date" id="eventStartTime">
                <?php echo form_error("eventStartTime", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="eventStartTime"  value="<?php echo set_value('eventStartTime'); ?>">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                </div>
            </div>


            <label for="eventEndTime" class="col-sm-4 control-label" >End Time</label>
            <div class="col-sm-8"  style="margin-bottom:10px;">
                <div class="input-group date" id="eventEndTime">
                    <?php echo form_error("eventEndTime", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                    <input type='text' class="form-control" name="eventEndTime" value="<?php echo set_value('eventEndTime'); ?>" >  </input>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                </div>
                </div>

        <label for="eventMinParti" class="col-sm-4 control-label">Min. Participants (include you)</label>
        <div class="col-sm-8">
            <?php echo form_error("eventMinParti", '<div class="error" style="color: #ff4500">', '</div>'); ?>
            <input type="number" class="form-control" name="eventMinParti" step="1" value="<?php echo set_value('eventMinParti'); ?>" style="margin-bottom:12px;">
        </div>

        <label for="eventEstFee" class="col-sm-4 control-label">Max. Participants (include you)</label>
        <div class="col-sm-8">
            <?php echo form_error("eventMaxParti", '<div class="error" style="color: #ff4500">', '</div>'); ?>
            <input type="number" class="form-control" name="eventMaxParti" step="1" value="<?php echo set_value('eventMaxParti'); ?>" style="margin-bottom:12px;">
        </div>

        <label for="eventEstFee" class="col-sm-4 control-label">Estimated Fee ($)</label>
            <div class="col-sm-8">
                <?php echo form_error("eventEstFee", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="number" class="form-control" name="eventEstFee" value="<?php echo set_value('eventEstFee'); ?>" style="margin-bottom:10px;">
            </div>

        <label for="eventMemberPoint" class="col-sm-4 control-label">Member Point Gain</label>
            <div class="col-sm-8">
                <?php echo form_error("eventMemberPoint", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="number" class="form-control" name="eventMemberPoint" value="<?php echo set_value('eventMemberPoint'); ?>" style="margin-bottom:10px;">
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

        <a type="button" class="btn btn-default" href="<?php echo site_url("EventInfo"); ?>" role="button">Back</a>

    </>

</div>
