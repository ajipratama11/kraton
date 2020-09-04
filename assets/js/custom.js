$(document).ready(function () {
	var baseUrl = $("#baseUrl").data("url");
	$(".datatable").DataTable();
	$(".select2").select2();
	$(".datepicker").datepicker({
		format: "yyyy/mm/dd",
	});
	$("button[type='reset']").click(function () {
		$(".select2").val(null).trigger("change");
	});
	$(".custom-file-input").on("change", function () {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});

	$(".submitConfirm").submit(function (e) {
		var id = $(this).attr("id");
		e.preventDefault();
		swal(
			{
				title: "Validasi Judul",
				text: "Apakah anda yakin untuk memvalidasi tugas akhir ini?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Perbarui",
				closeOnConfirm: false,
			},
			function () {
				$("#" + id)
					.unbind("submit")
					.submit();
			}
		);
	});
	$(".confirm").click(function (e) {
		e.preventDefault();
		var url = $(this).attr("href");
		swal(
			{
				title: "Data Akan Dihapus",
				text: "Apakah anda yakin untuk menghapus data ini?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Hapus",
				closeOnConfirm: false,
			},
			function () {
				window.location = url;
			}
		);
	});
	$(".openModal").click(function (e) {
		e.preventDefault();
		var url = $(this).attr("href");
		$.ajax({
			url: url,
			success: function (data) {
				$(".place-modal").html(data);
				$(".modalJS").modal("show");
			},
		});
	});
});
