<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">View Contact Form Information</h1>
    </div>
</div>

    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <?php foreach($FormInfo as $form){?>
                <tr>
                    <th>Contact ID</th>
                    <td><?php echo $form->contactID;?></td>
                </tr>
                <tr>
                    <th>Contact Person</th>
                    <td><?php echo $form->contactPerson;?></td>
                </tr>
                <tr>
                    <th>Contact E-mail</th>
                    <td><?php echo $form->contactEmail;?></td>
                </tr>
                <tr>
                    <th>Sent Time</th>
                    <td><?php echo $form->contactSentTime;?></td>
                </tr>
                <tr>
                    <th>Subject</th>
                    <td><?php echo $form->contactTitle;?></td>
                </tr>
                <tr>
                    <th>Content</th>
                    <td><?php echo $form->contactContent;?></td>
                </tr>
                <tr>
                    <th>Remark</th>
                    <td><?php echo $form->contactRemark;?></td>
                </tr>


                <?php }?>
            </table>
        </div>
    </div>

    <div class="col-sm-12 row" style="margin-bottom: 40px; margin-right:100px">

        <a type="button" class="btn btn-default" href="<?php echo site_url("FormInfo/remark/$form->contactID"); ?>" role="button" style="margin-right: 30px">Remark</a>
        <a type="button" class="btn btn-default" href="<?php echo site_url("FormInfo/delete/$form->contactID"); ?>" role="button" style="margin-right: 30px">Delete</a>


    </div>




    <a type="button" class="btn btn-default" style="margin-top: 40px" href="<?php echo site_url("FormInfo"); ?>"" role="button">Back</a>

</div>