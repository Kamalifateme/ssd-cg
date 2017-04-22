<script type="text/javascript">
$(document).ready( function(){
 $('#calendar').fullCalendar({

  <?php
  $tasks = $this -> project -> retrieve('tasks',array('project'=>$project_id), $limit = NULL, $offset = 0, $sort =  NULL);
  ?>
    eventSources: [

        // your event source
        {
            events: [ // put the array in the `events` property
            <?php
            foreach ($tasks as $key => $t) { ?>
              {
                    title  : '<?=$t->task_name?>',
                    start  : '<?=date('Y-m-d', strtotime($t->due_date))?>',
                    end  : '<?=date('Y-m-d', strtotime($t->due_date))?>'
              },
            <?php } ?>
            ],
            color: 'black',     // an option!
            textColor: 'yellow' // an option!
        }

        // any other event sources...

    ]
});
});
</script>