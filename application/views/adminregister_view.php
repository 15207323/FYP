
<div class="container">
    <h1>Admin Registration</h1>
    <?php echo form_open("AdminRegister"); ?>

    <div class="form-group">


            <label for="adminName" class="col-sm-4 control-label">Username</label>
            <div class="col-sm-8">
                <?php echo form_error("adminName", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="adminName" value="<?php echo set_value('adminName'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="adminPwd" class="col-sm-4 control-label">Password</label>
            <div class="col-sm-8">
                <?php echo form_error("adminPwd", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="password" class="form-control" name="adminPwd" value="<?php echo set_value('adminPwd'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="adminPwdConf" class="col-sm-4 control-label">Password Confirmation</label>
            <div class="col-sm-8">
                <?php echo form_error("adminPwdConf", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="password" class="form-control" name="adminPwdConf" style="margin-bottom:10px;">
            </div>

            <label for="adminEmail" class="col-sm-4 control-label">E-mail</label>
            <div class="col-sm-8">
                <?php echo form_error("adminEmail", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="email" class="form-control" name="adminEmail" value="<?php echo set_value('adminEmail'); ?>" style="margin-bottom:10px;">
            </div>


            <div class="col-sm-offset-4 col-sm-8" style="margin-bottom:40px;">
                <button type="submit" class="btn btn-default" value="Submit">Sign Up</button>
            </div>



        <?php echo form_close(); ?>

        <a type="button" class="btn btn-default" href="<?php echo site_url("AdminHome"); ?>" role="button">Back</a>

    </div>

</div>
