<div class="widget-box span12" style="margin-bottom:10px;">
    <div class="widget-title"><i class="icon icon-bullhorn pull-left" style="margin:10px; margin-right:0px;" ></i><h5>Meet Schedule</h5></div>
    <div class="widget-content" style="max-height:300px; overflow:auto;">
    	<table class="table">
        	<tr>
            	<th>Name</th>
            	<th>Location</th>
                <th>Result</th>
                <th>Date</th>
            </tr>
            <?php
			for ($i=0;$i<60;$i++) {
				?>
                
                <tr>
                	<td><?php echo "Meet number: " . $i; ?></td>
                	<td><?php echo $i; ?></td>
                	<td><?php echo $i; ?></td>
                	<td><?php echo $i; ?></td>
                
                </tr>
                <?php
			}
			?>
        </table>
    </div>
</div>

<div>
    <div class="widget-box span6 pull-left">
        <div class="widget-title"><i class="icon icon-bullhorn pull-left" style="margin:10px; margin-right:0px;" ></i><h5>Current PR's</h5></div>
        <div class="widget-content">
           <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Event</th>
                    <th>Time/Distance</th>
                </tr>
            </table>
       </div>
    </div>
    
    <div class="widget-box span6 pull-left">
        <div class="widget-title"><i class="icon icon-bullhorn pull-left" style="margin:10px; margin-right:0px;" ></i><h5>Latest Recordings</h5></div>
        <div class="widget-content">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Event</th>
                    <th>Time/Distance</th>
                </tr>
            </table>
        </div>
    </div>
</div>