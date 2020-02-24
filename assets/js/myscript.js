const flashdanger = $('.flash-danger').data('flashdata');
console.log(flashdanger);
if (flashdanger) {
	Swal.fire({
		position: 'center',
		icon: 'error',
		title: 'Danger',
		text: flashdanger,
		showConfirmButton: false,
		timer: 1500
	});
}

const flashwarning = $('.flash-warning').data('flashdata');
console.log(flashwarning);
if (flashwarning) {
	Swal.fire({
		position: 'center',
		icon: 'warning',
		title: "Warning",
		text: flashwarning,
		showConfirmButton: false,
		timer: 1500
	});
}

const flashsuccess = $('.flash-success').data('flashdata');
console.log(flashsuccess);
if (flashsuccess) {
	Swal.fire({
		position: 'center',
		icon: 'success',
		title: 'Success',
		text: flashsuccess,
		showConfirmButton: false,
		timer: 1500
	});
}

// Tombol-hapus
$('.tombol-hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Anda yakin ?',
		text: "Hapus Data Terpilih !",
		icon: 'question',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});
