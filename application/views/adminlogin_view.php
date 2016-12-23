
<div class="container">
    <h1>Administrator Login</h1>
    <?php echo form_open("verifyadminlogin"); ?>

    <div class="form-group">

        <label for="adminEmail" class="col-sm-4 control-label">E-mail</label>
        <div class="col-sm-8">
            <?php echo form_error("adminEmail", '<div class="error" style="color: #ff4500">', '</div>'); ?>
            <input type="email" class="form-control" name="adminEmail" value="<?php echo set_value('adminEmail'); ?>" style="margin-bottom:10px;">
        </div>

        <label for="adminPwd" class="col-sm-4 control-label">Password</label>
        <div class="col-sm-8">
            <?php echo form_error("adminPwd", '<div class="error" style="color: #ff4500">', '</div>'); ?>
            <input type="password" class="form-control" name="adminPwd" value="<?php echo set_value('adminPwd'); ?>" style="margin-bottom:20px;">
        </div>



        <div class="col-sm-offset-4 col-sm-8" style="margin-bottom:40px;">
            <button type="submit" class="btn btn-default" value="Submit">Sign In</button>
        </div>


        <?php echo form_close(); ?>


    </div>

</div>
