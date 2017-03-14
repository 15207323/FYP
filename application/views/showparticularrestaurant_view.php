
<div class="container">
    <h1>View Restaurant Information</h1>

    <?php foreach($restInfo as $rest){?>

    <div class="col-sm-12">
        <h2><?php echo $rest->restName;?></h2>


        <div class="table-responsive">

            <table class="table table-striped">
                <tr>
                <td>
                    <img src="<?php echo base_url().'assets/'?>images/restaurant/<?php echo $rest->restID ?>.jpg" width="300px">
                </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?php echo $rest->restAddress;?></td>
                </tr>
                <tr>
                    <th>Tel</th>
                    <td><?php echo $rest->restTel;?></td>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <td><?php echo $rest->restEmail;?></td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td><?php echo $rest->restCategory;?></td>
                </tr>
                <tr>
                    <th>Rate</th>
                    <td><?php echo $rest->restAvgRate;?></td>
                </tr>
                <tr>

                <?php }?>
            </table>
        </div>
    </div>

    <div class="col-sm-12 row" style="margin-bottom: 40px">


    <a type="button" class="btn btn-default" style="margin-top: 40px" href="<?php echo site_url("EventInfo"); ?>"" role="button">Back</a>

</div>
</div>