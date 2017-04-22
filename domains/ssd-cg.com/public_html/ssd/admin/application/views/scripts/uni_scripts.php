<?php if (isset($datepicker)) { ?>
<?php //if ($page == lang('projects') OR $page == lang('add_invoice') OR $this->uri->segment(3) == 'edit' OR $this->uri->segment(3) == 'add') { ?>
<script src="<?=base_url()?>resource/js/slider/bootstrap-slider.js" cache="false"></script>


<?php } ?>
<?php if (isset($form)) { ?>
<script src="<?=base_url()?>resource/js/select2/select2.min.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/ImageSelect.js"></script>
<script src="<?=base_url()?>resource/js/file-input/bootstrap-filestyle.min.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/wysiwyg/jquery.hotkeys.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/wysiwyg/bootstrap-wysiwyg.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/wysiwyg/demo.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/parsley/parsley.min.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/parsley/parsley.extend.js" cache="false"></script>
<script type="text/javascript" src="<?=base_url()?>resource/js/editor/tinymce.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>resource/js/editor/jquery-tinymce.js"></script>

      <script type="text/javascript">
tinymce.init({
    selector: "textarea.editor",theme: "modern",


        plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table  directionality template visualchars emoticons template paste textcolor filemanager"
        ],

        toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste | pastetext pasteword selectall | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | inserttime preview | forecolor backcolor",
        toolbar3: "hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
		add_unload_trigger: false,
        paste_auto_cleanup_on_paste : false,
        menubar: true,
        toolbar_items_size: 'larg',
		language : 'fa',
  	    image_advtab: true ,
  	    external_filemanager_path:"filemanager/",
 	    filemanager_title:"Responsive Filemanager" ,
        external_plugins: { "filemanager" : "filemanager/plugin.js"},
        font_formats: "BKoodakBold=BKoodakBold,Arial, Helvetica, sans-serif;BBCNassim=BBCNassim,Arial, Helvetica, sans-serif;DroidKufi=DroidKufi,Arial, Helvetica, sans-serif;BYekan=BYekan,Arial, Helvetica, sans-serif;tahoma=tahoma",

        templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
        ]

 });
      </script>
<?php } ?>


<?php if (isset($cal)) { ?>

	  <script src='<?=base_url()?>resource/js/fullcalendar/fullcalendar.min.js'></script>
 <script src='<?=base_url()?>resource/js/fullcalendar/calendar.js'></script>
	  <script src="<?=base_url()?>resource/js/fullcalendar/jquery.qtip.js"></script>
<script>
$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},

    events: [
<?php
$query = $this->db->query("SELECT * FROM fx_events");
$counter = 0;
foreach ($query->result() as $row)
{
$numResults = $query->num_rows();

$counter+=1;
if ($counter == $numResults) 
{
?>
	     {
			allDay : false,
            title: '<?php  echo $row->title; ?>',
			<?php if($row->time_start=='') { ?> start: '<?php echo $row->start_date; ?>',<?php } else{ ?>start: '<?php echo $row->start_date; ?>T<?php echo $row->time_start; ?>',<?php } ?>
			<?php if($row->end_date=='') { } else { ?> end: '<?php echo $row->end_date; ?>T<?php echo $row->time_end; ?>',<?php } ?>
			backgroundColor: '<?php  echo $row->color; ?>',
            description: '<?php  echo $row->description; ?>',
        }

<?php } else { ?>
		{
			allDay : false,
            title: '<?php  echo $row->title; ?>',
			<?php if($row->time_start=='') { ?> start: '<?php echo $row->start_date; ?>',<?php } else{ ?>start: '<?php echo $row->start_date; ?>T<?php echo $row->time_start; ?>',<?php } ?>
			<?php if($row->time_start=='') { ?> start: '<?php echo $row->start_date; ?>',<?php } else{ ?>start: '<?php echo $row->start_date; ?>T<?php echo $row->time_start; ?>',<?php } ?>
			backgroundColor: '<?php  echo $row->color; ?>',
            description: '<?php  echo $row->description; ?>'
        },

<?php  }} ?>      
        
        
    ],
    eventRender: function(event, element) {
        element.qtip({
			   position: {
      corner: {
         target: 'topRight',
         tooltip: 'bottomLeft'
      }
   },
            content: event.description,
            
style: { 
      padding: 15,
      background: '#e26a6a',
      color: '#fff',
      textAlign: 'justify',
      content: { 'font-size': 5 },
      border: {
         width: 1,
         radius:1,
         color: '#d76464'
      },
      name: 'dark' // Inherit the rest of the attributes from the preset dark style
   }
        });
    }
});
</script>
<?php } ?>





<?php if (isset($img)) { ?>

  	<script type="text/javascript" src="<?=base_url()?>resource/js/source/jquery.fancybox.js?v=2.1.4"></script>
	<script type="text/javascript" src="<?=base_url()?>resource/js/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	<script type="text/javascript" src="<?=base_url()?>resource/js/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
	<script type="text/javascript" src="<?=base_url()?>resource/js/source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
	<script type="text/javascript">
jQuery(document).ready(function ($) {
      $('.iframe-btn').fancybox({
	  'type'	: 'iframe',
	  	'width'		: 900,
	  'autoScale'   : false
      });
      $('#download-button').on('click', function() {
	    ga('send', 'event', 'button', 'click', 'download-buttons');      
      });
      $('.toggle').click(function(){
	    var _this=$(this);
	    $('#'+_this.data('ref')).toggle(200);
	    var i=_this.find('i');
	    if (i.hasClass('icon-plus')) {
		  i.removeClass('icon-plus');
		  i.addClass('icon-minus');
	    }else{
		  i.removeClass('icon-minus');
		  i.addClass('icon-plus');
	    }
      });
});

function open_popup(url)
{
        var w = 880;
        var h = 570;
        var l = Math.floor((screen.width-w)/2);
        var t = Math.floor((screen.height-h)/2);
        var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
}
</script>

<?php }?>


<?php if ($this->uri->segment(2) == 'help') { ?>
 <!-- App --> 
<script src="<?=base_url()?>resource/js/intro/intro.min.js" cache="false"> </script>
<script src="<?=base_url()?>resource/js/intro/demo.js" cache="false"> </script>
<?php }  ?>

<?php
if (isset($datatables)) { ?>
<script src="<?=base_url()?>resource/js/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>resource/js/datatables/TableTools.js"></script>
<script src="<?=base_url()?>resource/js/datatables/ZeroClipboard.js"></script>

<script type="text/javascript">
		$(document).ready(function() {
			var oTable1 = $('.AppendDataTables').dataTable({
      "bProcessing": true,
       aaSorting : [[0, 'desc']],
      "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "sPaginationType": "full_numbers",
	  "oLanguage": {
    "sProcessing":   "درحال پردازش...",
    "sLengthMenu":   "نمایش محتویات _MENU_",
    "sZeroRecords":  "موردی یافت نشد",
    "sInfo":         "نمایش _START_ تا _END_ از مجموع _TOTAL_ مورد",
    "sInfoEmpty":    "تهی",
    "sInfoFiltered": "(فیلتر شده از مجموع _MAX_ مورد)",
    "sInfoPostFix":  "",
    "sSearch":       "جستجو:",
    "sUrl":          "",
    "oPaginate": {
        "sFirst":    "ابتدا",
        "sPrevious": "قبلی",
        "sNext":     "بعدی",
        "sLast":     "انتها",


    }
},




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