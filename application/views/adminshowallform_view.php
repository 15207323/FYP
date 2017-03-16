<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View All Contact Form</h1>
        </div>
    </div>

    <div class="col-sm-12">
        <row>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Form ID</th>
                        <th>Contact Person</th>
                        <th>Subject</th>
                        <th>Remark</th>

                        <th>Action</th>
                    </tr>
                    <?php foreach($formInfo as $form){?>
                        <tr>
                            <th><?php echo $form->contactID;?></th>
                            <th><?php echo $form->contactPerson;?></th>
                            <td><?php echo $form->contactTitle;?></td>
                            <td><?php echo $form->contactRemark;?></td>

                            <td><a type="button" class="btn btn-default btn-xs" href="<?php echo site_url("FormInfo/view/$form->contactID"); ?>" role="button">View</a>
                            <a type="button" class="btn btn-default btn-xs" href="<?php echo site_url("FormInfo/remark/$form->contactID"); ?>" role="button">Remark</a>
                            <a type="button" class="btn btn-default btn-xs" href="<?php echo site_url("FormInfo/delete/$form->contactID"); ?>" role="button">Delete</a></td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </row>
    </div>



</div>