
<?php echo form_open("MemberInfo/search"); ?>

<div class="container">
    <h1>View All Member</h1>
    <div class="col-sm-12">
        <row>
            <div class="input-group" style="margin-bottom: 20px">
                <input type="text" class="form-control" name="memberName" value="<?php echo set_value('memberName'); ?>" placeholder="Search for a user by username...">
                <span class="input-group-btn">
                    <button type="submit" value="Submit" class="btn btn-default">Search</button>
                </span>
            </div>
        </row>



        <row>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($memberInfo as $member){?>
                        <tr>
                            <th><?php echo $member->memberID;?></th>
                            <td><?php echo $member->memberName;?></td>
                            <td><?php echo $member->memberEmail;?></td>
                            <td><a type="button" class="btn btn-default btn-xs" href="<?php echo site_url("MemberInfo/view/$member->memberName"); ?>" role="button">View</a></td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </row>
    </div>

    <?php echo form_close(); ?>

    <a type="button" class="btn btn-default" href="<?php echo site_url("AdminHome"); ?>" role="button">Back</a>

</div>