

<div class="container">
    <h1>View All Coupon</h1>
    <div class="col-sm-12">

        <row>
            <div class="table-responsive">
                <table class="table table-striped clearfix">
                    <tr>
                        <th>Event ID</th>
                        <th>Creator Username</th>
                        <th>Title</th>
                        <th>Time Created</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Min. Parti.</th>
                        <th>Max. Parti.</th>
                        <th>Restaurant Name</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($eventInfo as $event){?>
                        <tr>
                            <th><?php echo $event->eventID;?></th>
                            <td><?php echo $event->eventCreatorName;?></td>
                            <td><?php echo $event->eventTitle;?></td>
                            <td><?php echo $event->eventCreateTime;?></td>
                            <td><?php echo $event->eventStartTime;?></td>
                            <td><?php echo $event->eventEndTime;?></td>
                            <td><?php echo $event->eventMinParti;?></td>
                            <td><?php echo $event->eventMaxParti;?></td>
                            <td><?php echo $event->eventRestaurantName;?></td>
                            <td><a type="button" class="btn btn-default btn-xs" href="<?php echo site_url("EventInfo/view/$event->eventID"); ?>" role="button">View</a></td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </row>
    </div>



    <a type="button" class="btn btn-default" href="<?php echo site_url("DiningEventHome"); ?>" role="button">Back</a>

</div>