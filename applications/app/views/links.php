<h2>Links</h2>
<div class="errors">
<?php
if (@$errors) {
    echo $errors . "<br/>";
}

$privilege = Session::instance()->get('privilege');


?>
</div>
<table style="min-width:420px; width:100%;" class="fields_table">


        	<tr>
            	<th align="left">Company Name</th>
    			<th colspan="2" align="left">Link Name</th>
    		</tr>


    <?php
	if (@$links) {
		foreach($links  as $link) {
			?>
			
			<tr>
            	<td><a href='/company/info/<?php echo $link->cid; ?>'><?php echo $link->company_name; ?></a></td>
				<td><a href='<?php echo $link->link_url; ?>' target="_BLANK"><?php echo $link->link_name; ?></a></td>
                
				<td align="center">
                <?php
                if ($privilege == 2) {
                	?><a href="/links/delete_link/<?php echo $link->id; ?>"><img src="<?php echo IMGPATH . "/delete.png"; ?>" border="0" width="15" height="15"></a><?php
				}
				?>
            </td>
			</tr>
	
			<?php
		}
	}
	?>
    
</table>