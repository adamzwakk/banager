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
			$('.bandList').isotope({
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
				$('.bandList').isotope({filter: tags.join()});
			}

			$('.localBand').click(function(event){
				event.preventDefault();
				$('.bandList').isotope({filter: '.local'});
			});

			$('.touringBand').click(function(event){
				event.preventDefault();
				$('.bandList').isotope({filter: '.touring'});
			});

			$('.bandClick').click(function(){
				var thisband = $(this);
				var bandID = $(this).attr('data-id');
				if($(this).hasClass('open')){
					var thisbandInfo = $(this).siblings('.bandLargeInfo, .bandInfoLeft');
					$(this).parent().removeClass('large');
					$(this).removeClass('open');
					thisbandInfo.remove();
				} else {
					$.ajax({
						url: "<?php echo site_url(); ?>/bands/getBandInfo/"+bandID
						}).done(function(msg) {
							console.log(thisband);
							thisband.after(msg);
					});
					var thisbandInfo = $(this).siblings('.bandLargeInfo');
					$(this).parent().addClass('large');
					$(this).addClass('open');
					$.ajax({
						url: "<?php echo site_url(); ?>/bands/getShows/"+bandID
						}).done(function(msg) {
							thisbandInfo.find('.shows').after(msg);
					});
				}
				$('.bandList').isotope('reLayout');
			});

		});
	</script>
</head>
<body>
	<div class="container">
		<div class="header">
			<h1><a href="<?php echo site_url(); ?>">Banager!</a></h1>
			<form name="searchF" class="form-search">
				<input type="text" name="search" class="span10 input-xlarge" placeholder="Search by tag..." />
				<input type="submit" name="searchsub" class="btn" value="Search!" ?>
			</form>
			<a href="#" class="btn btn-info localBand">Local</a><a href="#" class="btn btn-info touringBand">Touring</a>
		</div>
		<div class="bandList">
			<?php foreach($bands as $band){ ?>
				<?php $bandname = strtolower($band->name); ?>
				<div class="element <?php echo $bandname; ?> <?php if($band->tags != ''){ echo $band->tags; } ?> <?php if($band->localtouring == 0){ echo 'local'; } else { echo 'touring'; } ?>">
					<a href="#" class="bandClick" data-id="<?php echo $band->id; ?>"><?php echo $band->name; ?>
					<?php if(!is_null($band->lastdate)) { ?><span class="lastShow">Last show: <?php echo date('M j Y',strtotime($band->lastdate)); ?></span> <?php } ?></a>
				</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>