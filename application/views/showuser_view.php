
<div class="container">
    <h1>View User Information</h1>

    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <?php foreach($memberInfo as $member){?>
                <tr>
                    <th>Username</th>
                    <td><?php echo $member->memberName;?></td>
                </tr>
<!--                <tr>-->
<!--                    <th>Password</th>-->
<!--                    <td>--><?php //echo $member->memberPwd;?><!--</td>-->
<!--                </tr>-->
                <tr>
                    <th>E-mail</th>
                    <td><?php echo $member->memberEmail;?></td>
                </tr>
                <tr>
                    <th>Member Point</th>
                    <td><?php echo $member->memberPoint;?></td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>

    <div class="col-sm-12 row" style="margin-bottom: 40px">
        <a type="button" class="btn btn-default" style="margin-right: 30px;" href="<?php echo site_url("UserInfo/edit/$member->memberName"); ?>" role="button">Edit</a>
    </div>

    <a type="button" class="btn btn-default" style="margin-right: 30px;" href="<?php echo site_url("Home"); ?>" role="button">Back</a>

</div>