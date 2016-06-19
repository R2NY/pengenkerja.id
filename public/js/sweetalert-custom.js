$(".btn-delete").on('click', function() {
	var formID = '#' + $(this).attr('class').split(' '[0]);

	swal({
		title: "Apakah Anda yakin?",
	    text: "Anda tidak akan bisa mengembalikan data ini!",
	    type: "warning",   
	    showCancelButton: true,   
	    confirmButtonColor: "#DD6B55",
	    confirmButtonText: "Ya, hapus saja!", 
	    closeOnConfirm: false 
	}, 
		function(){   
	    	$(formID).submit();
	});
	return false;
});