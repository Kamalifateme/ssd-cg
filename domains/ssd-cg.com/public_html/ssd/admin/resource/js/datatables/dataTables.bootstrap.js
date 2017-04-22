		$(document).ready(function() {
			var oTable1 = $('.AppendDataTables').dataTable({
      "bProcessing": true,
      "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "sPaginationType": "full_numbers",
      "tableTools": {
                  "sSwfPath": "http://localhost/FreelancerOffice-v1.5.6/resource/js/datatables/tableTools/swf/copy_csv_xls_pdf.swf",
            "aButtons": [
                    {
                    "sExtends": "csv",
                    "sTitle": "اطلاعات دارویی پادرا - Invoices"
                },
				 "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "اطلاعاتی برای نمایش وجود ندارد",
                "info": "نمایش _START_ تا _END_ از _TOTAL_ رکورد",
                "infoEmpty": "رکوردی وجودی ندارد",
                "infoFiltered": "(فیلتر از _MAX_ تمام رکوردها)",
                "lengthMenu": "نمایش _MENU_ رکورد",
                "search": "جستجو",
                "zeroRecords": "رکوردی وجود ندارد"
            },
                    {
                    "sExtends": "xls",
                    "sTitle": "اطلاعات دارویی پادرا - Invoices"
                },
                    {
                    "sExtends": "pdf",
                    "sTitle": "اطلاعات دارویی پادرا - Invoices"
                },
            ],
      }
    });
	$('[data-rel=tooltip]').tooltip();
});