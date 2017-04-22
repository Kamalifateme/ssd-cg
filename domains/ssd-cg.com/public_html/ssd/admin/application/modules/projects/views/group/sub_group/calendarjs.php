<script type="text/javascript">
$(document).ready( function(){
 $('#calendar').fullCalendar({

  <?php
  $tasks = Applib::retrieve(Applib::$tasks_table,array('project'=>$project_id));
  ?>
    eventSources: [

        // your event source
        {
            events: [ // put the array in the `events` property
            <?php
            foreach ($tasks as $key => $t) { ?>
              {
                    title  : '<?=addslashes($t->task_name)?>',
                    start  : '<?=date('Y-m-d', strtotime($t->due_date))?>',
                    end  : '<?=date('Y-m-d', strtotime($t->due_date))?>'
              },
            <?php } ?>
            ],
            color: '#7266BA',     // an option!
            textColor: 'white' // an option!
        }

        // any other event sources...

    ]
});
});
</script>