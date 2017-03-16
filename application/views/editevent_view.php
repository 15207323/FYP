<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Dining Event Information</h1>
        </div>
    </div>

    <?php echo form_open("EventInfo/edit/".$event[0]->eventID); ?>

    <div class="form-group">

        <label for="eventID" class="col-sm-4 control-label">Event ID</label>
        <div class="col-sm-8">
            <input type="text" disabled="disabled" class="form-control" name="eventID" value="<?php echo $event[0]->eventID; ?>" style="margin-bottom:10px;">
        </div>

        <label for="eventCreatorName" class="col-sm-4 control-label">Creator Username</label>
        <div class="col-sm-8">
            <input type="text" disabled="disabled" class="form-control" name="eventCreatorName" value="<?php echo $event[0]->eventCreatorName; ?>" style="margin-bottom:10px;">
        </div>

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

        <label for="eventCreateTime" class="col-sm-4 control-label">Created Time</label>
        <div class="col-sm-8">
            <input type="text" disabled="disabled" class="form-control" name="eventCreateTime" value="<?php echo $event[0]->eventCreateTime; ?>" style="margin-bottom:10px;">
        </div>

        <label for="eventStartTime" class="col-sm-4 control-label">Start Time</label>
        <div class="col-sm-8" style="margin-bottom:10px;">
            <div class="input-group date" id="eventStartTime">
            <?php echo form_error("eventStartTime", '<div class="error" style="color: #ff4500">', '</div>'); ?>
            <input type="text" class="form-control" name="eventStartTime" value="<?php echo set_value('eventStartTime'); ?>" >
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
             </div>
        </div>

        <label for="eventEndTime" class="col-sm-4 control-label">End Time</label>
        <div class="col-sm-8" style="margin-bottom:10px;">
            <div class="input-group date" id="eventEndTime">
            <?php echo form_error("eventEndTime", '<div class="error" style="color: #ff4500">', '</div>'); ?>
            <input type="text" class="form-control" name="eventEndTime" value="<?php echo set_value('eventEndTime'); ?>" >
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
             </div>
        </div>

        <label for="eventMinParti" class="col-sm-4 control-label">Min. Participants (include you)</label>
        <div class="col-sm-8">
            <?php echo form_error("eventMinParti", '<div class="error" style="color: #ff4500">', '</div>'); ?>
            <input type="number" class="form-control" name="eventMinParti" step="1" value="<?php echo set_value('eventMinParti'); ?>" style="margin-bottom:10px;">
        </div>

        <label for="eventMaxParti" class="col-sm-4 control-label">Max. Participants (include you)</label>
        <div class="col-sm-8">
            <?php echo form_error("eventMaxParti", '<div class="error" style="color: #ff4500">', '</div>'); ?>
            <input type="number" class="form-control" name="eventMaxParti" step="1" value="<?php echo set_value('eventMaxParti'); ?>" style="margin-bottom:10px;">
        </div>

        <label for="eventEstFee" class="col-sm-4 control-label">Estimated Fee ($)</label>
        <div class="col-sm-8">
            <?php echo form_error("eventEstFee", '<div class="error" style="color: #ff4500">', '</div>'); ?>
            <input type="number" class="form-control" name="eventEstFee" value="<?php echo set_value('eventEstFee'); ?>" style="margin-bottom:10px;">
        </div>

        <label for="eventRestaurantName" class="col-sm-4 control-label">Restaurant Name</label>
        <div class="col-sm-8">
            <?php echo form_error("eventRestaurantName", '<div class="error" style="color: #ff4500">', '</div>'); ?>
            <input type="text" class="form-control" name="eventRestaurantName" value="<?php echo set_value('eventRestaurantName'); ?>" style="margin-bottom:10px;">
        </div>

        <label for="eventAddress" class="col-sm-4 control-label">Restaurant Address</label>
        <div class="col-sm-8">
            <?php echo form_error("eventAddress", '<div class="error" style="color: #ff4500">', '</div>'); ?>
            <input type="text" class="form-control" name="eventAddress" value="<?php echo set_value('eventAddress'); ?>" style="margin-bottom:10px;">
        </div>

        <div class="col-sm-offset-4 col-sm-8" style="margin-bottom:40px;">
            <button type="submit" class="btn btn-default" value="Submit" name="post">Update</button>
        </div>



        <?php echo form_close(); ?>

        <a type="button" class="btn btn-default" href="javascript:window.history.go(-1);" role="button">Back</a>

    </div>

</div>
