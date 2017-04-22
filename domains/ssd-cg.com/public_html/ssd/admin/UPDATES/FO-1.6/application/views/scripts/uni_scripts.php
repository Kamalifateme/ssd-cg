<?php if (isset($datepicker)) { ?>
<?php //if ($page == lang('projects') OR $page == lang('add_invoice') OR $this->uri->segment(3) == 'edit' OR $this->uri->segment(3) == 'add') { ?>
<script src="<?=base_url()?>resource/js/slider/bootstrap-slider.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/datepicker/bootstrap-datepicker.js" cache="false"></script>
<?php } ?>

<?php if (isset($form)) { ?>
<script src="<?=base_url()?>resource/js/select2/select2.min.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/file-input/bootstrap-filestyle.min.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/wysiwyg/jquery.hotkeys.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/wysiwyg/bootstrap-wysiwyg.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/wysiwyg/demo.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/parsley/parsley.min.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/parsley/parsley.extend.js" cache="false"></script>
<?php } ?>
<?php if ($this->uri->segment(2) == 'help') { ?>
 <!-- App --> 
<script src="<?=base_url()?>resource/js/intro/intro.min.js" cache="false"> </script>
<script src="<?=base_url()?>resource/js/intro/demo.js" cache="false"> </script>
<?php }  ?>

<?php
if (isset($datatables)) { ?>
<script src="<?=base_url()?>resource/js/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript">
		$(document).ready(function() {
			var oTable1 = $('.AppendDataTables').dataTable({
      "bProcessing": true,
      "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "sPaginationType": "full_numbers",
      "tableTools": {
                  "sSwfPath": "<?=base_url()?>resource/js/datatables/tableTools/swf/copy_csv_xls_pdf.swf",
            "aButtons": [
                    {
                    "sExtends": "csv",
                    "sTitle": "<?=$this->config->item('company_name').' - '.lang('invoices')?>"
                },
                    {
                    "sExtends": "xls",
                    "sTitle": "<?=$this->config->item('company_name').' - '.lang('invoices')?>"
                },
                    {
                    "sExtends": "pdf",
                    "sTitle": "<?=$this->config->item('company_name').' - '.lang('invoices')?>"
                },
            ],
      }
    });
	$('[data-rel=tooltip]').tooltip();
});

		</script>
<?php }  ?>

<?php
if (isset($stripe)) { ?>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<?php echo '<script type="text/javascript">Stripe.setPublishableKey("' .config_item('stripe_public_key'). '");</script>'; ?>


<?php } ?>

<?php if (isset($calendar)) { ?>
<script src="<?=base_url()?>resource/js/fullcalendar/fullcalendar.min.js"></script>
 <?=$this->load->view('sub_group/calendarjs')?>
<?php } ?>


<?php if (isset($set_fixed_rate)) { ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#fixed_rate").click(function(){
			//if checked
			if($("#fixed_rate").is(":checked")){
				$("#fixed_price").show("fast");
				$("#hourly_rate").hide("fast");
				}else{
					$("#fixed_price").hide("fast");
					$("#hourly_rate").show("fast");
				}
		});
	});
</script>
<?php } ?>
<?php if(isset($chart)){ ?>
<!-- App -->
<script src="<?=base_url()?>resource/js/charts/Chart.js"></script>
<?php $this->load->language('calendar');?>
<script>
		var lineChartData = {
			labels : ['<?=lang('cal_jan')?>','<?=lang('cal_feb')?>','<?=lang('cal_mar')?>','<?=lang('cal_apr')?>','<?=lang('cal_may')?>','<?=lang('cal_jun')?>','<?=lang('cal_jul')?>','<?=lang('cal_aug')?>','<?=lang('cal_sep')?>','<?=lang('cal_oct')?>','<?=lang('cal_nov')?>','<?=lang('cal_dec')?>'],
			datasets: [
        {
            label: '<?=lang('yearly_overview')?>',
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "#4acab4",
            pointColor: "#4acab4",
            pointStrokeColor: "#4acab4",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            scaleGridLineColor : "#4acab4",
            data: [<?=$this->AppModel->monthly_data('01')?>, <?=$this->AppModel->monthly_data('02')?>, <?=$this->AppModel->monthly_data('03')?>, <?=$this->AppModel->monthly_data('04')?>, <?=$this->AppModel->monthly_data('05')?>, <?=$this->AppModel->monthly_data('06')?>, <?=$this->AppModel->monthly_data('07')?>, <?=$this->AppModel->monthly_data('08')?>, <?=$this->AppModel->monthly_data('09')?>, <?=$this->AppModel->monthly_data('10')?>, <?=$this->AppModel->monthly_data('11')?>, <?=$this->AppModel->monthly_data('12')?>]
        }
			]

		}

	window.onload = function(){
		var ctx = document.getElementById("invoice_revenue").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}


	</script>
<?php }  ?>
 <?php
if($this->session->flashdata('message')){ 
$message = $this->session->flashdata('message');
$alert = $this->session->flashdata('response_status');
	?>
<script type="text/javascript">
	$(document).ready(function(){
toastr.<?=$alert?>("<?=$message?>", "<?=lang('response_status')?>");
toastr.options = {
  "closeButton": true,
  "debug": false,
  "positionClass": "toast-bottom-right",
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
});
</script>
<?php } ?>