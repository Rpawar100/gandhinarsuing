$(document).ready(function(argument) {

	$('#datatable_list tfoot tr th').each( function () {
		var title = $(this).text();
		if(title!="")
		{
			$(this).html( '<input type="text" style="width: 100%;" placeholder="'+title+'" /> ' );	
		}
		else
		{
			$(this).html( '<input type="text" style="width: 100%;display: none;"  />' );		
		}
		
	} );
	
	if (enq_data) {
		column_array=[];
		if (col_cont) {}
			for (var i = 0; i<=col_cont; i++) {
				column_array.push(i);
			}
			var table = $('#datatable_list').DataTable({
				pageLength: 10,
				responsive: true,

				ordering:true,
				autoWidth: true,

				dom: '<"html5buttons"B>lTfgitp',

				buttons: [
				{
					"extend": 'print',
					title:'',
					exportOptions: {
						columns: column_array
					},

					// customize: function ( win ) {
					// 	$(win.document.body).find( 'thead' ).prepend('<tr><center><td colspan="12" style="font-size:24px;text-align:center;border:none !important;"><img src="'+SCHOOL_GENERAL_HEADER+'"></td></tr><tr><td colspan="12" style="font-size:24px;text-align:center;border:none !important;">'+title+'</td></center></tr>')
					// },
				},
				{
					"extend": 'excel',
					title:title,
					exportOptions: {
						columns: column_array
					},
				},
	// 		{
	// 			"extend": 'pdf',
	// 			customize: function ( doc ) {
	// 				doc.content.splice( 1, 0, {
	// 					margin: [ 0, 0, 0, 12 ],
	// 					alignment: 'center',
	// 					image: 'data:image/png;base64,'+SCHOOL_GENERAL_HEADER,
	// 				} )
	// 			} 
	// }
	],

});
			table.columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change', function () {
					if ( that.search() !== this.value ) {
						that.search( this.value).draw();
					}
				} );
			} );
		}

	});