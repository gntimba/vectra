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
					<td>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $album->id?>">Review <?php echo $album->album_name; ?></button>
					</td>
				</tr>
				<?php endforeach; ?>
		</table>

	</div>

</center>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">New message</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			
			</div>
			<div class="modal-body">
				<form id="review_form" method="post" action="">
					<div class="form-group">
						<label for="name" class="col-form-label">full Name:</label>
						<input required type="text" name="" class="form-control" id="name">
					</div>
					<div class="form-group">
						<label for="review" class="col-form-label">Review:</label>
						<textarea  required name="review" class="form-control" id="review-text"></textarea>
					</div>
				</form>
					<div style="display: none" class="alert alert-success" id='message'></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary review">Add Review</button>
			</div>
		</div>
	</div>
</div>

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
var ur="";
		$( '#exampleModal' ).on( 'show.bs.modal', function ( event ) {
			var button = $( event.relatedTarget ) // Button that triggered the modal
			var id = button.data( 'whatever' ) // Extract info from data-* attributes
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			//$( '#review' ).attr( 'action', '<?php echo base_url('albums/post_review/')?>' + id );
			ur='<?php echo base_url('albums/post_review/')?>' + id
			var modal = $( this )
				//modal.find('.modal-title').text('New message to ' + recipient)
				// modal.find('.modal-body input').val(recipient)
		} )
		$( '.review' ).click( function ( event ) {
			event.preventDefault();
			//var name =$('#name').val();
			//var review=$('#review-text').val();
			$.ajax( {
				url:ur,
				type: $( '#review_form' ).attr( "method" ),
				dataType: 'json',
				data: {
					name:$('#name').val(),
					review:$('#review-text').val()
				},
				success: function ( data ) {
					$( '#message' ).html( data.review );
					$( '#message' ).show();
					$( '#message' ).fadeOut( 5000 );
					$( "#review_form" )[ 0 ].reset();
					console.log( data.review );

				}
			} );


		} );


	} );
</script>