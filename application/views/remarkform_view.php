<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Remark Contact Form</h1>
        </div>
    </div>

    <?php echo form_open("FormInfo/remark/".$form[0]->contactID); ?>

    <div class="form-group">

        <label for="contactID" class="col-sm-4 control-label">Contact ID</label>
        <div class="col-sm-8">
            <input type="text" disabled="disabled" class="form-control" name="contactID" value="<?php echo $form[0]->contactID; ?>" style="margin-bottom:10px;">
        </div>

        <label for="contactPerson" class="col-sm-4 control-label">Contact Person</label>
        <div class="col-sm-8">
            <input type="text" disabled="disabled" class="form-control" name="contactPerson" value="<?php echo $form[0]->contactPerson; ?>" style="margin-bottom:10px;">
        </div>

        <label for="contactEmail" class="col-sm-4 control-label">Contact E-mail</label>
        <div class="col-sm-8">
            <input type="email" disabled="disabled" class="form-control" name="contactEmail" value="<?php echo $form[0]->contactEmail; ?>" style="margin-bottom:10px;">
        </div>

        <label for="contactSentTime" class="col-sm-4 control-label">Sent Time</label>
        <div class="col-sm-8">
            <input type="text" disabled="disabled" class="form-control" name="contactSentTime" value="<?php echo $form[0]->contactSentTime; ?>" style="margin-bottom:10px;">
        </div>

        <label for="contactTitle" class="col-sm-4 control-label">Subject</label>
        <div class="col-sm-8">
            <input type="text" disabled="disabled" class="form-control" name="contactTitle" value="<?php echo $form[0]->contactTitle; ?>" style="margin-bottom:10px;">
        </div>

        <label for="contactContent" class="col-sm-4 control-label">Content</label>
        <div class="col-sm-8">
            <input type="text" disabled="disabled" class="form-control" name="contactContent" value="<?php echo $form[0]->contactContent; ?>" style="margin-bottom:10px;">
        </div>


        <label for="contactRemark" class="col-sm-4 control-label">Remark</label>
        <div class="col-sm-8">
                <?php echo form_error("contactRemark", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <textarea class="form-control" name="contactRemark" rows="5" style="margin-bottom:10px;"></textarea>
        </div>




        <div class="col-sm-offset-4 col-sm-8" style="margin-bottom:40px;">
            <button type="submit" class="btn btn-default" value="Submit" name="post">Update</button>
        </div>



        <?php echo form_close(); ?>

        <a type="button" class="btn btn-default" href="javascript:window.history.go(-1);" role="button">Back</a>

    </div>

</div>
