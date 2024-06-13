$(document).ready(function(argument) {
	$('#report_datatable_list tfoot tr th').each( function () {
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
			var table = $('#report_datatable_list').DataTable({
				// pageLength: false,
				responsive: true,
				deferRender:false,
				ordering:true,
				buttons: true,
				autoWidth: true,
				"initComplete": function (settings, json) {
				 	var api = this.api();
				 	CalculateTableSummary(this);
				},

		        "footerCallback": function ( row, data, start, end, display ) {
			    	var api = this.api(), data;	 
			     	CalculateTableSummary(this);
			     	return ;		
				},
				dom: 'Bfrtip',
				order:[],
				buttons: [
				{
					"extend": 'print',
					title:"<center style='font-size:18px;text-align:center;border:none !important;'>"+title+"<center>",
					exportOptions: {
						columns: column_array
					},
				},
				{
					"extend": 'pdf',
					orientation:'landscape',
					title:title,
					exportOptions: {
						columns: column_array,
						
					},
				},
				{
					"extend": 'excelHtml5',
					title:title,
					exportOptions: {
						columns: column_array
					},
				},
				],

			});
			function CalculateTableSummary(table) {
			    try {
				        var intVal = function (i) {
				            return typeof i === 'string' ?
				                    i.replace(/[\$,]/g, '') * 1 :
				                    typeof i === 'number' ?
				                        i : 0;
				        };

				        var api = table.api();
				        api.columns(".sum").eq(0).each(function (index) {
				            var column = api.column(index,{page:'all',search: 'applied',});
				            var sum = column
				               .data()
				               .reduce(function (a, b) {
				                   //return parseInt(a, 10) + parseInt(b, 10);
				                   return intVal(a) + intVal(b);
				               }, 0);
				            if ($(column.footer()).hasClass("total")) {
				                $(column.footer()).html('' + sum.toFixed(0));
				            } else {
				                $(column.footer()).html('' + sum.toFixed(2));
				            }
				          
				        });
				    } catch (e) {
				        console.log('Error in CalculateTableSummary');
				        console.log(e)
				    }
				}
			table.columns().every( function () {
				var that = this;
				$( 'input[type=text]', this.footer() ).on( 'keyup', function (e) {
						if (that.search() !== this.value) {
							that
							.search(this.value)
							.draw();
						}
					
				});
			} );
	}

});
