<?php $showscheck = false; ?>
<tr class="showTime">
	<td><strong>Comming Up Shows</strong></td>
	<td></td>
</tr>
<?php foreach($shows as $show){ ?>
	<?php if(strtotime($show->date) > time() && (strpos($show->band_ids, $bID) === 0 || strpos($show->band_ids, $bID) > 0)){ ?>
		<tr class="showTime"><td><?php echo date('M j Y',strtotime($show->date)); ?></td><td><?php echo $show->name; ?> with <?php echo $show->bands; ?></td></tr>
		<?php $showscheck = true; ?>
	<?php } ?> ?>
<?php } ?>
<?php if(!$showscheck){ ?>
	<tr class="showTime"><td>No shows yet dawg.</td><td></td></tr>
<?php } ?>

<?php $showscheck = false; ?>
<tr class="showTime">
	<td><strong>Past Shows</strong></td>
	<td></td>
</tr>
<?php foreach($shows as $show){ ?>
	<?php if(strtotime($show->date) < time() && (strpos($show->band_ids, $bID) === 0 || strpos($show->band_ids, $bID) > 0)){ ?>
		<tr class="showTime"><td><?php echo date('M j Y',strtotime($show->date)); ?></td><td><?php echo $show->name; ?> with <?php echo $show->bands; ?></td></tr>
		<?php $showscheck = true; ?>
	<?php } ?> ?>
<?php } ?>

<?php if(!$showscheck){ ?>
	<tr class="showTime"><td>No shows yet dawg.</td><td></td></tr>
<?php } ?>