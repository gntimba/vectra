<br>
<br>
<center>
	<h1>Reviews for <?php echo $reviews[0]->album_name?></h1>
</center>

<center>
	<div class="review">
	<img src="<?php echo base_url('assets/album/').$reviews[0]->album_cover ?>"  width="200px" height="200px"/>
		<br>
		<br>
	<div>
		<?php foreach($reviews as $review): ?>
		<div class="card">
			
			<div class="card-header"><?php echo $review->name?></div>
			
			<div class="card-body">
			<blockquote class="blockquote mb-0">
				
				<footer class="blockquote-footer"><cite title="Source title"><?php echo $review->review?></cite></footer>
				
				</blockquote>
			
			</div>
		
		
		</div>
		<br>
		<?php endforeach; ?>
	
	
	</div>
	</div>
</center>