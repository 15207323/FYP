<?php
/**
 * Created by PhpStorm.
 * User: san
 * Date: 11/10/2016
 * Time: 9:08 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<h1>View Member</h1>
<table>
    <tr>
        <td><strong>Member ID</strong></td>
        <td><strong>Username</strong></td>
        <td><strong>E-mail</strong></td>
        <td><strong>Tel.</strong></td>
    </tr>
    <?php foreach($members as $member){?>
        <tr>
            <td><?php echo $member->memberID;?></td>
            <td><?php echo $member->memberName;?></td>
            <td><?php echo $member->memberEmail;?></td>
            <td><?php echo $member->memberTel;?></td>
<!--            <td><a href ="--><?php //echo site_url('MemberData/edit'.$member->memberID);?><!--"><button>Edit</button></a></td>-->
            <td><a href ="<?php echo site_url('MemberData/delete/'.$member->memberID);?>"><button>Delete</button></a></td>

        </tr>
    <?php }?>
</table>
<a href="<?php echo site_url('Welcome'); ?>"><button>Back</button></a>

</body>
</html>
