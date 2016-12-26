
<div class="container">
    <h1>View All Member</h1>
    <div class="col-sm-12">
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
    </div>

    <a type="button" class="btn btn-default" href="<?php echo site_url("AdminHome"); ?>" role="button">Back</a>

</div>