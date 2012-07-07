<div class="bandInfoLeft">
	<img src="img/bands/<?php echo $band->image; ?>" />
</div>
<div class="bandLargeInfo" style="overflow:hidden;">
	<form>
		<table>
			<tr>
				<td>Name: </td>
				<td><input type="text" name="name" class="span6" <?php if($band->name != ''){ echo 'value="'.$band->name.'"'; } ?>></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><input type="text" name="email" class="span6" <?php if($band->email != ''){ echo 'value="'.$band->email.'"'; } ?>></td>
			</tr>
			<tr>
				<td>Phone: </td>
				<td><input type="text" name="phone" class="span6" <?php if($band->phone != ''){ echo 'value="'.$band->phone.'"'; } ?>></td>
			</tr>
			<tr>
				<td>Tags</td>
				<td><input type="text" name="tags" class="span6" <?php if($band->tags != ''){ echo 'value="'.$band->tags; } ?> /></td>
			</tr>
			<tr class="shows">
				<td></td>
				<td></td>
			</tr>
		</table>
	</form>
</div>
<div class="clear"></div>