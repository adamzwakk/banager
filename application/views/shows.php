<?php $showscheck = false; ?>
<tr class="showTime">
	<td colspan="2"><strong>Comming Up Shows</strong></td>
</tr>
<?php foreach($shows as $show){ ?>
	<?php if(strtotime($show->date) > time() && (strpos($show->band_ids, $bID) === 0 || strpos($show->band_ids, $bID) > 0)){ ?>
		<tr class="showTime">
			<td><?php echo date('M j Y',strtotime($show->date)); ?></td>
			<td><?php echo $show->name; ?> with <?php echo $show->bands; ?></td>
		</tr>
		<?php $showscheck = true; ?>
	<?php } ?> ?>
<?php } ?>
<?php if(!$showscheck){ ?>
	<tr class="showTime" colspan="2"><td>No shows yet dawg.</td></tr>
<?php } ?>

<?php $showscheck = false; ?>
<tr class="showTime">
	<td colspan="2"><strong>Past Shows</strong></td>
</tr>
<?php foreach($shows as $show){ ?>
	<?php if(strtotime($show->date) < time() && (strpos($show->band_ids, $bID) === 0 || strpos($show->band_ids, $bID) > 0)){ ?>
		<tr class="showTime">
			<td><?php echo date('M j Y',strtotime($show->date)); ?></td>
			<td><?php echo $show->name; ?> with <?php echo $show->bands; ?></td>
		</tr>
		<?php $showscheck = true; ?>
	<?php } ?> ?>
<?php } ?>

<?php if(!$showscheck){ ?>
	<tr class="showTime">
		<td colspan="2">No shows yet dawg.</td>
	</tr>
<?php } ?>