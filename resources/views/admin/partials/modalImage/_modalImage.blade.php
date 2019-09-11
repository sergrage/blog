<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Загрузка &amp; Обрезка фото</h4>
				<button type="button" class="close" data-dismiss="madal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 text-center">
						<div id="image_demo" style="width:450px; margin-top:20px"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success crop_image">Загрузка &amp; Обрезка фото</button>
				<button class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>

</div>

<script>

$(document).ready(function(){
	$image_crop = $('#image_demo').croppie({
		enableExif: true,
		viewport: {
			width: 240,
			height: 240,
			type: 'square'
		},
		boundary: {
			width:400,
			height: 400
		}
	});
	
	$('#upload_image').on('change', function(){
		var reader = new FileReader();
		reader.onload = function(event){
			var contents = event.target.result;
			// console.log(contents);
			$image_crop.croppie('bind', {
				url: contents
			}).then(function(){
				console.log('jQuery bind complete');
			});
		}
		console.log(this.files[0]);
		reader.readAsDataURL(this.files[0]);
		$('#uploadimageModal').modal('show');
	});

	$('.close').click(function(){
		$('#uploadimageModal').modal('hide');
	});

	$('.crop_image').click(function(event){
	    $image_crop.croppie('result', {
	      type: 'canvas',
	      size: 'viewport'
	    }).then(function(response){
		    $.ajax({
		        url: "/administrator/users/avatarUpload",
		        type: "POST",
		        data:{
		        	"image": response,
				},
				headers:{
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
		        success: function(data)
		        {
		        	console.log(data);
		            $('#uploadimageModal').modal('hide');
		            $('#uploaded_image').html(data);
		        },
		        error: function(){
		        	$('#uploadimageModal').modal('hide');
		        	alert('Что-то пошло не так!');
		        }
		    });
	    })
	});
});

</script>