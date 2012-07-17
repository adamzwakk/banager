<h1>Add Band</h1>
<div class="bandLargeInfo" style="overflow:hidden;">
	<?php echo form_open_multipart('bands/addBand2'); ?>
		<table>
			<tr>
				<td><strong>Name: </strong></td>
				<td><?php echo form_input(array('name'=>'name', 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Email: </strong></td>
				<td><?php echo form_input(array('name'=>'email', 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Phone: </strong></td>
				<td><?php echo form_input(array('name'=>'phone', 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Genre: </strong></td>
				<td><?php echo form_input(array('name'=>'genre', 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Local/Touring: </strong></td>
				<td>Local: <?php echo form_radio('localtouring', 'local'); ?>Touring: <?php echo form_radio('localtouring', 'touring'); ?></td>
			</tr>
			<tr>
				<td><strong>Tags: </strong></td>
				<td><?php echo form_input(array('name'=>'tags','class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Sounds Like: </strong></td>
				<td><?php echo form_input(array('name'=>'soundslike', 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Homies: </strong></td>
				<td><?php echo form_input(array('name'=>'homies', 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Location: </strong></td>
				<td><?php echo form_input(array('name'=>'location', 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Bandcamp: </strong></td>
				<td><?php echo form_input(array('name'=>'bandcamp', 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Website: </strong></td>
				<td><?php echo form_input(array('name'=>'website', 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Notes: </strong></td>
				<td><?php echo form_textarea(array('name'=>'notes', 'class'=>'span6')); ?></td>
			</tr>
			<tr>
				<td><strong>Image: </strong></td>
				<td><input type="file" name="bandImg" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn" value="ADD" style="float:right;" /></td>
			</tr>
		</table>
	</form>
</div>