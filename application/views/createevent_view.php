
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

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.min.css" />
        <script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
        <script type="text/javascript" src="<?php echo base_url().'assets/'?>js/transition.min.js"></script>
        <script type="text/javascript" src="https://getbootstrap.com/2.0.4/assets/js/bootstrap-collapse.js"></script>
        <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/development/src/js/bootstrap-datetimepicker.js"></script>
        <link rel="stylesheet" href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/build/css/bootstrap-datetimepicker.css">

        <script type="text/javascript">

            $('#eventStartTime,#eventEndTime').datetimepicker({
                useCurrent: false,
                minDate: moment(),
                format: "YYYY-MM-DD HH:mm:ss"
            });
            $('#eventStartTime').datetimepicker().on('dp.change', function (e) {
                var incrementDay = moment(new Date(e.date));
                incrementDay.add(1, 'days');
                $('#eventEndTime').data('DateTimePicker').minDate(incrementDay);
                $(this).data("DateTimePicker").hide();
            });

            $('#eventEndTime').datetimepicker().on('dp.change', function (e) {
                var decrementDay = moment(new Date(e.date));
                decrementDay.subtract(1, 'days');
                $('#eventStartTime').data('DateTimePicker').maxDate(decrementDay);
                $(this).data("DateTimePicker").hide();
            });

        </script>

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
                <input type="number" class="form-control" name="eventEstFee" onchange="setTwoNumberDecimal" step="0.10" value="<?php echo set_value('eventEstFee'); ?>" style="margin-bottom:10px;">
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

    </>

</div>
