
<div class="container">
    <h1>View Dining Event Information</h1>

    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <?php foreach($eventInfo as $event){?>
                <tr>
                    <th>Event ID</th>
                    <td><?php echo $event->eventID;?></td>
                </tr>
                <tr>
                    <th>Creator Username</th>
                    <td><?php echo $event->eventCreatorName;?></td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td><?php echo $event->eventTitle;?></td>
                </tr>
                <tr>
                    <th>Aim</th>
                    <td><?php echo $event->eventAim;?></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><?php echo $event->eventDesc;?></td>
                </tr>
                <tr>
                    <th>Time Created</th>
                    <td><?php echo $event->eventCreateTime;?></td>
                </tr>
                <tr>
                    <th>Start Time</th>
                    <td><?php echo $event->eventStartTime;?></td>
                </tr>
                <tr>
                    <th>End Time</th>
                    <td><?php echo $event->eventEndTime;?></td>
                </tr>
                <tr>
                    <th>Min. Participant</th>
                    <td><?php echo $event->eventMinParti;?></td>
                </tr>
                <tr>
                    <th>Max. Participant</th>
                    <td><?php echo $event->eventMaxParti;?></td>
                </tr>
                <tr>
                    <th>Estimated Fee</th>
                    <td>$<?php echo $event->eventEstFee;?></td>
                </tr>
                <tr>
                    <th>Restaurant Name</th>
                    <td><?php echo $event->eventRestaurantName;?></td>
                </tr>
                <tr>
                    <th>Restaurant Address</th>
                    <td><?php echo $event->eventAddress;?></td>
                </tr>

                <?php }?>
            </table>
        </div>
    </div>

    <div class="col-sm-12 row" style="margin-bottom: 40px">
        <a type="button" class="btn btn-default" style="margin-right: 30px;" href="<?php echo site_url("ComingSoon"); ?>" role="button">Edit</a>
        <a type="button" class="btn btn-default" href="<?php echo site_url("EventInfo/delete/$event->eventID"); ?>" role="button">Delete</a>
    </div>

    <a type="button" class="btn btn-default" style="margin-top: 40px" href="javascript:window.history.go(-1);" role="button">Back</a>

</div>