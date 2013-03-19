

<div class="widget-box span4 pull-left">


    <div class="widget-title"><i class="icon icon-bullhorn pull-left" style="margin:10px; margin-right:0px;" ></i><h5>Timer Recording</h5></div>
    
    <div class="widget-content">
         
    	<select name="" style="width:100%;">
        	<option>[Select an event]</option>
             <?php
				
				foreach($events as $event) {
					?><option value="<?php echo $event->id; ?>"> <?php echo $event->name; ?> </option> <?php
				}
			
			?>
        </select>
                     
        <input type='text' readonly='readonly' value="00:00:0000" style="width:95%;"/> <br/>
        
        <button class="btn btn-success start_timer" >Start</button>
        <button class="btn btn-info split_timer" >Split</button>    
        <button class="btn btn-warning split_timer" >Reset</button>    
              
   </div>
   
</div>

<div class="widget-box span8 pull-left">


    <div class="widget-title"><i class="icon icon-bullhorn pull-left" style="margin:10px; margin-right:0px;" ></i><h5>Manual Recording</h5></div>
    
    <div class="widget-content">
         <form method="post" action="/record" class="record_form" >
    	<select name="event" class="event"  style="width:100%;">
        	<option value="0">[Select an event]</option>
             <?php
				
				foreach($events as $event) {
					?><option value="<?php echo $event->id; ?>"> <?php echo $event->name; ?> </option> <?php
				}
			
			?>
        </select>
        
        <hr style="margin:10px;">
        
        <select name="runner" class="runner" style="width:65%;">
        	<option value="0">[Select a runner]</option>
            <?php
				
				foreach($runners as $runner) {
					?><option value="<?php echo $runner->id; ?>"> <?php echo $runner->first_name . " " . $runner->last_name; ?> </option> <?php
				}
			
			?>
        </select> 
        <br/>
        <input type="number" placeholder="Hours" 	name="hours" class="hours" 	style="width:65px;"/>
        <input type="number" placeholder="Minutes"  name="minutes" class="minutes"  style="width:65px;"/>
        <input type="number" placeholder="Seconds" 	name="seconds" class="seconds"  style="width:75px;"/>
        <input type="number" placeholder="Miliseconds" name="miliseconds" class="miliseconds"  style="width:95px;"/>
        
        <br/>
        
        <div class="input-append date"  style="display:inline; margin-bottom:10px;" id="datepicker" data-date="<?php echo date('m/d/Y'); ?>" data-date-format="mm/dd/yyyy">
				<input class="span2" name="date_recorded" type="text" value="<?php echo date('m/d/Y'); ?>" style="width:25%;">
			<span class="add-on"><i class="icon-calendar"></i></span>
		</div>

		<br/>
        <input type="button" class="btn btn-success submit_record" style="width:160px; margin-top:10px;"value="Add Recording" />
        </form>    
       <div class="alert alert-error record_error hide"></div>       
       <?php
       	if ($record_added != 0) {
			?><div class="alert alert-success"><b>Success:</b> The time has been recorded!<</div><?php
		}         
	   ?>
   </div>
   
</div>

