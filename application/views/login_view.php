
<div class="container">
    <h1>Login</h1>
    <?php echo form_open("verifylogin"); ?>

    <div class="form-group">

        <label for="memberEmail" class="col-sm-4 control-label">E-mail</label>
        <div class="col-sm-8">
            <?php echo form_error("memberEmail", '<div class="error" style="color: #ff4500">', '</div>'); ?>
            <input type="email" class="form-control" name="memberEmail" value="<?php echo set_value('memberEmail'); ?>" style="margin-bottom:10px;">
        </div>

        <label for="memberPwd" class="col-sm-4 control-label">Password</label>
        <div class="col-sm-8">
            <?php echo form_error("memberPwd", '<div class="error" style="color: #ff4500">', '</div>'); ?>
            <input type="password" class="form-control" name="memberPwd" value="<?php echo set_value('memberPwd'); ?>" style="margin-bottom:20px;">
        </div>



        <div class="col-sm-offset-4 col-sm-8" style="margin-bottom:40px;">
            <button type="submit" class="btn btn-default" value="Submit">Sign In</button>
        </div>


        <?php echo form_close(); ?>

        <a type="button" class="btn btn-default" href="<?php echo site_url("Welcome"); ?>" role="button">Back</a>

    </div>

</div>
