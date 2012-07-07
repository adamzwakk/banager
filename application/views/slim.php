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
				if($('input[name="search"]').val().substring(0,10) == 'soundslike'){
					console.log('soundslike');
				} else {
					tags = filterBands($('input[name="search"]').val());
				}
				$('.bandList').isotope({filter: tags});
			});

			function filterBands(search){
				if(search != ''){
					var tags = search.split(' ');
					var newtags = [];
					for(x in tags){
						newtags.push('.'+tags[x]);
					}
					tags = newtags.join();
				} else {
					var tags = "*";
				}
				return tags;
			}

			$('.localBand').click(function(event){
				event.preventDefault();
				$('.bandList').isotope({filter: '.local'});
			});

			$('.touringBand').click(function(event){
				event.preventDefault();
				$('.bandList').isotope({filter: '.touring'});
			});

			$('.allBands').click(function(event){
				event.preventDefault();
				$('.bandList').isotope({filter: '*'});
			});

			$('.genreSelect').click(function(event){
				event.preventDefault()
				var tags = $(this).attr('data-genre').split(' ');
				var newtags = [];
				for(x in tags){
					newtags.push('.'+tags[x]);
				}
				tags = newtags.join();
				$('.bandList').isotope({filter: tags});
			});

			$('.bandClick').click(function(){
				var element = $(this).parent();
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
							element.append(msg);
					});
					var thisbandInfo = $(this).siblings('.bandLargeInfo');
					$(this).parent().addClass('large');
					$(this).addClass('open');
					
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
				<input type="text" name="search" class="span11 input-xlarge" placeholder="Search by name/genre/tag..." />
				<input type="submit" name="searchsub" class="btn" value="Search!" ?>
			</form>
			Location: <a href="#" class="btn btn-info allBands">All</a><a href="#" class="btn btn-info localBand">Local</a><a href="#" class="btn btn-info touringBand">Touring</a>
			Genres: 
			<?php foreach($genres as $genre){ ?>
				<a href="#" class="btn btn-info genreSelect" data-genre="<?php echo strtolower($genre->genre); ?>"><?php echo $genre->genre; ?></a>
			<?php } ?>
		</div>
		<br/>
		<div class="bandList">
			<?php foreach($bands as $band){ ?>
			<?php $soundslike = $band->soundslike; ?>
				<div class="element <?php echo strtolower($band->name); ?> <?php if($band->tags != ''){ echo $band->tags; } ?> <?php if($band->localtouring == 0){ echo 'local'; } else { echo 'touring'; } ?> <?php echo strtolower($band->genre); ?>" data-soundslike="<?php echo $soundslike; ?>">
					<a href="#" class="bandClick" data-id="<?php echo $band->id; ?>"><?php echo $band->name; ?>
					<?php if(!is_null($band->lastdate)) { ?><span class="lastShow">Last show: <?php echo date('M j Y',strtotime($band->lastdate)); ?></span> <?php } ?></a>
				</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>