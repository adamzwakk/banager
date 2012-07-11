<div class="bandInfoLeft">
	<img src="img/bands/<?php echo $band->image; ?>" style="width:290px;" />
	<table class="table table-striped" style="margin-top: 10px;">

	</table>
</div>
<div class="bandLargeInfo" style="overflow:hidden;">
	<?php echo form_open('bands/updateBand'); ?>
		<table>
			<tr>
				<td><strong>Name: </strong></td>
				<td><?php echo form_input(array('name'=>'name','value'=>$band->name, 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Email: </strong></td>
				<td><?php echo form_input(array('name'=>'email','value'=>$band->email, 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Phone: </strong></td>
				<td><?php echo form_input(array('name'=>'phone','value'=>$band->phone, 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Genre: </strong></td>
				<td><?php echo form_input(array('name'=>'genre','value'=>$band->genre, 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Local/Touring: </strong></td>
				<td>Local: <?php echo form_radio('localtouring', 'local', (!$band->localtouring) ? TRUE : FALSE); ?>Touring: <?php echo form_radio('localtouring', 'touring', ($band->localtouring) ? TRUE : FALSE); ?></td>
			</tr>
			<tr>
				<td><strong>Tags: </strong></td>
				<td><?php echo form_input(array('name'=>'tags','value'=>$band->tags, 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Sounds Like: </strong></td>
				<td><?php echo form_input(array('name'=>'soundslike','value'=>$band->soundslike, 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Homies: </strong></td>
				<td><?php echo form_input(array('name'=>'homies','value'=>$band->homies, 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Notes: </strong></td>
				<td><?php echo form_textarea(array('name'=>'notes','value'=>$band->notes, 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><input type="hidden" name="bID" value="<?php echo $band->id; ?>"></td>
				<td><input type="submit" class="btn" value="EDIT" style="float:right;" /><a href="<?php echo site_url('bands/delete/'.$band->id); ?>" class="btn btn-danger">Delete :(</a></td>
			</tr>
		</table>
	</form>
</div>
<div class="clear"></div>
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			url: "<?php echo site_url(); ?>/bands/getShows/<?php echo $band->id; ?>"
			}).done(function(msg) {
				$('.bandInfoLeft table').html(msg);
		});
	});
</script>