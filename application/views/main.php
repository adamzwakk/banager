<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Banager!</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<script type="text/javascript">
		$(document).ready(function(){
			$('.bandsInfo').isotope({
				itemSelector : '.element',
				layoutMode : 'fitRows'
			});

			$('form[name="searchF"]').submit(function(event){
				event.preventDefault();
				filterBands($('input[name="search"]').val());
			});

			function filterBands(search){
				if(search != ''){
					var tags = search.split(' ');
					var newtags = [];
					for(x in tags){
						newtags.push('.'+tags[x]);
					}
					tags = newtags;
				} else {
					var tags = "*";
				}
				console.log(tags);
				$('.bandsInfo').isotope({filter: tags.join()});
			}

			$('.element').hover(
				function () {
					$(this).children('.bandShortInfo').animate({
						top: '-70px'
					},300);
				}, function () {
					$(this).children('.bandShortInfo').animate({
						top: '15px'
					},300);
				}
			);

			$('.element').click(function(){
				if($(this).hasClass('large')){
					$(this).removeClass('large');
					$(this).children('.bandShortInfo').css('display','block');
					$('.showTime').remove();
				} else {
					$(this).addClass('large');
					$(this).children('.bandShortInfo').css('display','none');
					$.ajax({
						type: "POST",
						url: "<?php echo site_url(); ?>/bands/getShows/"+$(this).attr('data-id')
						}).done(function( msg ) {
							$('.shows').after(msg);
					});
				}
				$('.bandsInfo').isotope('reLayout');
			});

			$('.localBand').click(function(event){
				event.preventDefault();
				$('.bandsInfo').isotope({filter: '.local'});
			});

			$('.touringBand').click(function(event){
				event.preventDefault();
				$('.bandsInfo').isotope({filter: '.touring'});
			});

		});
	</script>
</head>
<body>
	<div class="container">
		<div class="header">
			<h1><a href="<?php echo site_url(); ?>">Banager!</a></h1>
			<form name="searchF">
			<input type="text" name="search" class="span10 input-xlarge" placeholder="Search by tag..." />
			<input type="submit" name="searchsub" class="btn" value="Search!" ?>
			</form>
			<a href="#" class="btn btn-info localBand">Local</a><a href="#" class="btn btn-info touringBand">Touring</a>
		</div>
		<div class="bandsInfo">
			<?php foreach($bands as $band) { ?>
				<?php $bandname = strtolower($band->name); ?>
				<div data-id="<?php echo $band->id; ?>" class="element <?php echo $bandname; ?> <?php if($band->tags != ''){ echo $band->tags; } ?> <?php if($band->localtouring == 0){ echo 'local'; } else { echo 'touring'; } ?>">
					<img src="<?php echo base_url(); ?>/img/bands/<?php echo $band->image; ?>">
					<div class="bandShortInfo">
						<?php echo $band->name; ?><br/>
						<?php if($band->email != ''){ ?>Email: <?php echo $band->email; ?><br/><?php } ?>
						<?php if($band->phone != ''){ ?>Phone: <?php echo $band->phone; ?><br/><?php } ?>
					</div>
					<div class="bandLargeInfo">
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
									<td><strong>Past Shows:</strong></td>
									<td></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>