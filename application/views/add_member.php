<?php
/**
 * Created by PhpStorm.
 * User: san
 * Date: 11/11/2016
 * Time: 11:49 AM
 */
?>
<html>
<head>
    <title>Add Member to Database</title>
</head>
<body>
<h1>Insert Member Record</h1>
 <?php echo form_open('AddMember'); ?>
    <?php if (isset($message)) { ?>
        <h4>Member added successfully!</h4><br>
    <?php } ?>
    <?php echo form_label('Member Name:'); ?> <?php echo form_error('memberName'); ?><br/>
    <?php echo form_input(array('id' => 'memberName', 'name' => 'memberName', 'placeholder' => 'Max. 20 Characters')); ?><br/>

    <?php echo form_label('Member Password:'); ?> <?php echo form_error('memberPwd'); ?><br/>
    <?php echo form_input(array('id' => 'memberPwd', 'name' => 'memberPwd', 'placeholder' => '8-20 Characters')); ?><br/>

    <?php echo form_label('Member E-mail:'); ?> <?php echo form_error('memberEmail'); ?><br/>
    <?php echo form_input(array('id' => 'memberEmail', 'name' => 'memberEmail', 'placeholder' => 'Valid E-mail Address')); ?><br/>

    <?php echo form_label('Member Phone Number:'); ?> <?php echo form_error('memberTel'); ?><br/>
    <?php echo form_input(array('id' => 'memberTel', 'name' => 'memberTel', 'placeholder' => '8 Digit')); ?><br/>

    <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?>
    <?php echo form_close(); ?>

<a href="<?php echo site_url('Welcome'); ?>"><button>Back</button></a>

</body>
</html>
