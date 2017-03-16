<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View All Restaurant</h1>
        </div>
    </div>

    <div class="col-sm-12">
        <?php echo form_open("RestInfo/search"); ?>
        <row>
            <div class="input-group" style="margin-bottom: 20px">
                <?php echo form_error("restName", '<div class="error" style="color: #ff4500">', '</div>'); ?>
                <input type="text" class="form-control" name="restName"  placeholder="Search for a restaurant by restaurant name...">
                <span class="input-group-btn">
                        <button type="submit" value="Submit" class="btn btn-default" name="spost">Search</button>
                    </span>

            </div>
        </row>
        <?php echo form_close(); ?>

        <row>
            <a type="button" class="btn btn-default" href="<?php echo site_url("RestInfo/create"); ?>" role="button" style="margin-bottom: 10px">Create</a>
        </row>

        <row>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>restID</th>
                        <th>Restaurant Name</th>
                        <th>Tel.</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($restInfo as $rest){?>
                        <tr>
                            <th><?php echo $rest->restID;?></th>
                            <td><?php echo $rest->restName;?></td>
                            <td><?php echo $rest->restTel;?></td>
                            <td><?php echo $rest->restCategory;?></td>
                            <td><a type="button" class="btn btn-default btn-xs" href="<?php echo site_url("restInfo/view/$rest->restID"); ?>" role="button">View</a>
                            <a type="button" class="btn btn-default btn-xs" href="<?php echo site_url("restInfo/edit/$rest->restID"); ?>" role="button">Edit</a>
                            <a type="button" class="btn btn-default btn-xs" href="<?php echo site_url("restInfo/delete/$rest->restID"); ?>" role="button">Delete</a></td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </row>
    </div>
</div>