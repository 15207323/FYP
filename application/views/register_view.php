
<div class="container">
    <h1>Register</h1>
    <?php echo form_open("Register"); ?>
    <?php if (isset($message)) { ?>
        <h4>You have registered successfully!</h4><br>
    <?php } ?>

    <div class="form-group">


            <label for="memberName" class="col-sm-4 control-label">Username</label>
            <div class="col-sm-8">
                <?php echo form_error("memberName", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="memberName" value="<?php echo set_value('memberName'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="memberPwd" class="col-sm-4 control-label">Password</label>
            <div class="col-sm-8">
                <?php echo form_error("memberPwd", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="password" class="form-control" name="memberPwd" value="<?php echo set_value('memberPwd'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="memberPwdConf" class="col-sm-4 control-label">Password Confirmation</label>
            <div class="col-sm-8">
                <?php echo form_error("memberPwdConf", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="password" class="form-control" name="memberPwdConf" style="margin-bottom:10px;">
            </div>

            <label for="memberEmail" class="col-sm-4 control-label">E-mail</label>
            <div class="col-sm-8">
                <?php echo form_error("memberEmail", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="email" class="form-control" name="memberEmail" value="<?php echo set_value('memberEmail'); ?>" style="margin-bottom:10px;">
            </div>

            <label for="memberTel" class="col-sm-4 control-label">Mobile Phone No.</label>
            <div class="col-sm-8">
                <?php echo form_error("memberTel", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="memberTel" value="<?php echo set_value('memberTel'); ?>" style="margin-bottom:20px;">
            </div>


            <div class="col-sm-offset-4 col-sm-8" style="margin-bottom:40px;">
                <button type="submit" class="btn btn-default" value="Submit">Sign Up</button>
            </div>



        <?php echo form_close(); ?>

        <a type="button" class="btn btn-default" href="<?php echo site_url("Welcome"); ?>" role="button">Back</a>

    </div>

</div>
