

<div class="widget-box span4 pull-left">


    <div class="widget-title"><i class="icon icon-bullhorn pull-left" style="margin:10px; margin-right:0px;" ></i><h5>Add Runner</h5></div>
    
    <div class="widget-content">
        <form method="post" action="/runners" >
            <input type="text" name="first_name" placeholder='First Name' style="width:95%;" />
            <input type="text" name="last_name" placeholder='Last Name' style="width:95%;"/>
            <input type="text" name="age" placeholder='Age' style="width:30px;"/>
            <select name="gender" style="width:100%;">
                <option>[Gender]</option>
                <option value="M">Male</option>
                <option value="M">Female</option>
                
            </select>
            
            <select name="class" style="width:100%;">
                <option>[Class]</option>
                <option value="1">Other</option>
                <option value="2">8th Grade</option>
                <option value="3">Freshman</option>
                <option value="4">Sophmore</option>
                <option value="5">Junior</option>
                <option value="6">Senior</option>
                
            </select>
            
            <input type="submit" class="btn btn-success" value="Add Runner" />
        </form>    
   </div>
   
</div>

<div class="widget-box span8 pull-left">


    <div class="widget-title"><i class="icon icon-bullhorn pull-left" style="margin:10px; margin-right:0px;" ></i><h5>Current Runners</h5></div>
    
    <div class="widget-content">
    
        <button class="btn btn-info" ><i class="fa-icon-edit" ></i> Edit</button>
        <button class="btn btn-danger remove_runner" ><i class="fa-icon-remove" ></i> Delete</button>
        
		<form method="post" class="current_runnner_form" action="/runners/delete" >
    	<table class='table' style="margin-top:10px;">
            <tr>
            	<th><input type="checkbox" style="margin:0px;" /></th>
            	<th>First Name </th>
            	<th>Last Name </th>
            	<th>Age </th>
            	<th>Gender </th>
            	<th>Class </th>
            </tr>
        	
            <?php 
			
				foreach ($runners as $runner) {
					?>
                    <tr>
                    	<td><input type="checkbox" name="id" class="runner_id" value="<?php echo $runner->id; ?>"  /></td>
                    	<td><?php echo $runner->first_name; ?></td>
                    	<td><?php echo $runner->last_name; ?></td>
                    	<td><?php echo $runner->age; ?></td>
                    	<td><?php echo $runner->gender; ?></td>
                    	<td><?php echo $runner->type_class; ?></td>
                    
                    </tr>
                   	<?php 
				}
			
			?>
            
        </table>
        </form>           
   </div>
   
</div>

