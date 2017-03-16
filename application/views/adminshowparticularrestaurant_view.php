<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Restaurant Information</h1>
        </div>
    </div>
    <div class="row">
    <?php foreach($restInfo as $rest){?>

    <div class="col-sm-12">
        <h2><?php echo $rest->restName;?></h2>


        <div class="table-responsive">

            <table class="table table-striped">
                <tr>
                    <th rowspan="5"><img src="<?php echo base_url().'assets/'?>images/restaurant/<?php echo $rest->restID ?>.jpg" width="300px"></th>
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

            </table>
        </div>
    </div>
    </div>

        <div class="col-sm-12 row" style="margin-bottom: 40px; margin-right:100px">

            <a type="button" class="btn btn-default" href="<?php echo site_url("RestInfo/edit/$rest->restID"); ?>" role="button" style="margin-right: 30px">Edit</a>
            <a type="button" class="btn btn-default" href="<?php echo site_url("RestInfo/delete/$rest->restID"); ?>" role="button" style="margin-right: 30px">Delete</a>


        </div>


    <a type="button" class="btn btn-default" style="margin-top: 40px" href="<?php echo site_url("RestInfo");} ?>"  role="button">Back</a>

</div>