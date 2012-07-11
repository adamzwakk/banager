<?php $showscheck = false; ?>
<tr class="showTime">
	<td colspan="3"><strong>Coming Up Shows</strong></td>
</tr>
<?php foreach($shows as $show){ ?>
	<?php if(strtotime($show->date) > time() && (strpos($show->band_ids, $bID) === 0 || strpos($show->band_ids, $bID) > 0)){ ?>
		<tr class="showTime">
			<td><?php echo date('M j',strtotime($show->date)); ?></td>
			<td><?php echo $show->name; ?> with <?php echo $show->bands; ?></td>
			<td><a href="#">Del</a></td>
		</tr>
		<?php $showscheck = true; ?>
	<?php } ?> ?>
<?php } ?>
<?php if(!$showscheck){ ?>
	<tr class="showTime">
		<td colspan="3">No shows yet dawg.</td>
	</tr>
<?php } ?>

<?php $showscheck = false; ?>
<tr class="showTime">
	<td colspan="3"><strong>Past Shows</strong></td>
</tr>
<?php foreach($shows as $show){ ?>
	<?php if(strtotime($show->date) < time() && (strpos($show->band_ids, $bID) === 0 || strpos($show->band_ids, $bID) > 0)){ ?>
		<tr class="showTime">
			<td><?php echo date('m/d',strtotime($show->date)); ?></td>
			<td colspan="2"><?php echo $show->name; ?> with <?php echo $show->bands; ?></td>
		</tr>
		<?php $showscheck = true; ?>
	<?php } ?> ?>
<?php } ?>

<?php if(!$showscheck){ ?>
	<tr class="showTime">
		<td colspan="3">No shows yet dawg.</td>
	</tr>
<?php } ?>