<br>
<br>
<center>
	<h1>ALBUM LIST</h1>
</center>
<center>
	<div>
		<table class="table table-striped table-dark">
			<thead>
				<tr>
					<th scope="col">Picture</th>
					<th scope="col">Album Name</th>
					<th scope="col">Artist</th>
					<th scope="col">Release Year</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($albums as $album): ?>
				<tr id="<?php echo $album->id?>">
					<th scope="row"><a href="<?php echo base_url('albums/edit/').$album->id?>"><img src="<?php echo base_url('assets/album/').$album->album_cover ?>"  width="50px" height="50px"/></a>
					</th>
					<td>
						<a href="<?php echo base_url('albums/edit/').$album->id?>">
							<?php echo $album->album_name; ?>
						</a>
					</td>
					<td>
						<?php echo $album->album_artist; ?>
					</td>
					<td>
						<?php echo $album->released_year; ?>
					</td>
					<td><button class="btn btn-danger delete" value="<?php echo $album->id?>">Remove Album</button>
					</td>
				</tr>
				<?php endforeach; ?>
		</table>

	</div>

</center>

<script>
	$( document ).ready( function () {
		$( '.delete' ).click( function ( event ) {
			event.preventDefault();

			var album = '#' + $( this ).val();
			console.log( album );
			$.ajax( {
				type: 'POST',
				url: '<?php echo base_url('albums/delete') ?>',
				dataType: 'json',
				data: {
					albumid: $( this ).val()
				},
				success: function ( data ) {
					console.log( data.album );
				
				}
			} );
	$( album ).hide( 'slow', function () {
						$( album ).remove();
					} );

		} );
	} );
</script>