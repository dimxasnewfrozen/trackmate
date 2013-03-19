<div>
    <div class="widget-box span12" style="margin-bottom:10px;">
        <div class="widget-title"><i class="icon icon-bullhorn pull-left" style="margin:10px; margin-right:0px;" ></i><h5>By Runner</h5></div>
        <div class="widget-content" style="min-height:400px; max-height:400px;">
        
        	<div class="span9 pull-left runners_chart" style="height:400px;" >
            </div>

            <div class="widget-box span3" style="margin-bottom:10px; height:400px; overflow: auto;">
            <div class="widget-title"><i class="icon icon-bullhorn pull-left" style="margin:10px; margin-right:0px;" ></i><h5>Runners</h5></div>
            <div class="widget-content">
            		<p id="choices">Show:</p>
    				<table>
                    <?php
                    foreach ($runners as $runner) {
                        ?><tr><td><input type="checkbox" value="<?php echo $runner->id; ?>" /></td>
                        	  <td><font style="font-size:11px;"><?php echo $runner->first_name . " " . $runner->last_name; ?></font></td>
                          </tr>
						<?php
                    }
                    ?>
                    </table>
                
             </div>
             </div>
            
        </div>
    </div>
</div>

<div>
    <div class="widget-box span12" style="margin-bottom:10px;">
        <div class="widget-title"><i class="icon icon-bullhorn pull-left" style="margin:10px; margin-right:0px;" ></i><h5>By Event</h5></div>
        <div class="widget-content" style="height:300px; max-height:400px; overflow:auto;">
            <div class="span9 pull-left" >
            
            </div>
            <div class="widget-box span3" style="margin-bottom:10px;">
            <div class="widget-title"><i class="icon icon-bullhorn pull-left" style="margin:10px; margin-right:0px;" ></i><h5>Events</h5></div>
            <div class="widget-content">
    				<table>
                    <?php
                    foreach ($events as $event) {
                        ?><tr><td><input type="checkbox" value="<?php echo $event->id; ?>" /></td>
                        	  <td><font style="font-size:11px;"><?php echo $event->name; ?></font></td>
                          </tr>
						<?php
                    }
                    ?>
                    </table>
                
             </div>
             </div>
            
        </div>
    </div>
</div>