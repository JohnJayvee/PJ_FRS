$(document).ready(function(){

	$('#resTable').DataTable({
		dom : 'tp'
	});

	$('#usersTable').DataTable({
		dom : 'tp'
	});

	$('#adminTable').DataTable({
		dom : 'tp'
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#preview').attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	$('#upload').change(function(){
		readURL(this);
	});

});