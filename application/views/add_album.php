<br>
<br>
<center>
	<h1>ADD ALBUM</h1>
</center>
<center>
	<div class="form-group">
	<?php
	$attributes = array( 'id' => 'form' );
	echo form_open_multipart( 'albums/postAlbum', $attributes );
	?>
	<input type="text" placeholder="Album Name" required name="name" class="form-control"/>
	<input type="text" placeholder="Artist" name="artist" required class="form-control"/>
	<input type="file" placeholder="Album Name" name="cover" accept='image/*' required class="form-control"/>
	<input type="date" placeholder="Album Released" required name="released" class="form-control"/>
	<input type="submit" placeholder="Album Name" name="submit" value="Add Album" class="btn btn-success"/>
	<br>
	<br>
	
	</form>
	<div style="display: none" class="alert alert-success" id='message'></div>
	<div style="display: none" class="alert alert-danger" id='error'></div>
</div>
</center>
<div id="loading" style="display: none">
	<center><img src="<?php echo base_url();?>assets/img/Ripple-0.7s-200px.svg" alt=""/>
	</center>
</div>


<script>
	$( document ).ready( function () {
		$( '#form' ).submit( function ( event ) {

			event.preventDefault();

			$( "#loading" ).show();
			//$( "#form" ).hide();

			$.ajax( {
				url: $( this ).attr( "action" ),
				type: $( this ).attr( "method" ),
				dataType: "json",
				data: new FormData( this ),
				processData: false,
				contentType: false,
				success: function ( data, status ) {
					console.log( data )
					$( "#loading" ).hide();
					//$( "#form" ).show();
					if ( data.feedback[ 1 ] == true ) {
						$( '#message' ).html( data.feedback[ 0 ] );
						$( '#message' ).show();
						$( '#message' ).fadeOut( 5000 );

					} else {
						$( '#error' ).html( data.feedback[ 0 ] );
						$( '#error' ).show();
						$( '#error' ).fadeOut( 5000 );

					}
					$( "#form" )[ 0 ].reset();
				},
				error: function ( xhr, desc, err ) {


				}
			} );
		} );
	} );
</script>