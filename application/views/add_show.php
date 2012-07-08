<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.timepicker.js"></script>
<?php foreach($venues as $venue){
	$selectVenue[$venue->id] = $venue->name;
} 

foreach($bands as $band){
	$selectBand[$band->id] = $band->name;
}?>
<script type="text/javascript">
	$(document).ready(function(){
		$('[name="date"]').datetimepicker({
			timeFormat: 'hh:mm:ss',
			dateFormat: 'yy-mm-dd'
		});

		$('.addBand').live('click',	function(event){
			event.preventDefault();
			var nextBand = $(this).parent().parent().html();
			$('.band:last').after('<tr class="band">'+nextBand+'</tr>');
		});
	});
</script>

<h1>Add Show</h1>
<?php echo form_open_multipart('bands/addShow2'); ?>
	<table>
		<tr>
			<td><strong>Date/Time: </strong></td>
			<td><?php echo form_input(array('name'=>'date', 'class'=>'span6')); ?></td>
		</tr>
		<tr>
			<td><strong>Venue: </strong></td>
			<td><?php echo form_dropdown('venue',$selectVenue); ?></td>
		</tr>
		<tr class="band">
			<td><strong>Bands: </strong></td>
			<td><?php echo form_dropdown('band[]',$selectBand); ?> <a href="#" class="addBand">Add Band</a></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" class="btn" value="ADD" style="float:right;" /></td>
		</tr>
	</table>
</form>