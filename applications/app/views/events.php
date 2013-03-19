

<div class="widget-box span4 pull-left">


    <div class="widget-title"><i class="icon icon-bullhorn pull-left" style="margin:10px; margin-right:0px;" ></i><h5>Add Event</h5></div>
    
    <div class="widget-content">
        <form method="post" action="/events" >
            <input type="text" name="name" placeholder='Event Name' style="width:95%;" />
            <input type="text" name="num_runners" placeholder='Number of Runners' style="width:55%;"/>
            <select name="event_type" style="width:100%;">
                <option>[Event Type]</option>
                <option value="T">Track</option>
                <option value="F">Field</option>
                
            </select>
            <input type="submit" class="btn btn-success" value="Add Event" />
        </form>    
   </div>
   
</div>

<div class="widget-box span8 pull-left">


    <div class="widget-title"><i class="icon icon-bullhorn pull-left" style="margin:10px; margin-right:0px;" ></i><h5>Current Events</h5></div>
    
    <div class="widget-content">
    
        <button class="btn btn-info" ><i class="fa-icon-edit" ></i> Edit</button>
        <button class="btn btn-danger remove_event" ><i class="fa-icon-remove" ></i> Delete</button>
        
		<form method="post" class="current_event_form" action="/events/delete" >
    	<table class='table' style="margin-top:10px;">
            <tr>
            	<th><input type="checkbox" style="margin:0px;" /></th>
            	<th>Name </th>
            	<th>Number of Runners </th>
            	<th>Event Type </th>
            </tr>
            
            <?php
				foreach($events as $event) {
					?>
                    <tr>
                    	<td><input type="checkbox" name="id"  class="event_id" value="<?php echo $event->id; ?>" /></td>
                    	<td><?php echo $event->name; ?></td>
                    	<td><?php echo $event->num_runners; ?></td>
                    	<td>
						<?php 
							switch($event->event_type) {
								case "T":
									echo "Track";
								break;
								case "F":
									echo "Field";
								break;
								default:
									echo "Track";
								break;
							}
						?></td>
                    
                    </tr>
                    <?php
				}
			?>

        </table>
                    
   </div>
   
</div>

