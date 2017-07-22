$(document).ready(function() {
	$('#country-table tfoot th.searchable').each( function () {
		var title = $(this).text();
		$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	} );

	var table = $('#country-table').DataTable({
		"pageLength": 25
	});

	table.columns().every( function () {
		var that = this;

		$( 'input', this.footer() ).on( 'keyup change', function () {
			if ( that.search() !== this.value ) {
				that
				.search( this.value )
				.draw();
			}
		} );
	} );
});