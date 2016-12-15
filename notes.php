<?php

$days_of_week =  array('monday','tuesday','wednesday','thursday','friday','saturday','sunday');
$note_types = array('weekend','vacations','changes');

require_once 'config.php';

if ( isset($_POST['submit']) ):
    // is it current or next week?
    $file_name = ( isset($_POST['week']) && $_POST['week'] === 'next' ) ? 'ps-notes-next.json' : 'ps-notes.json';
    //echo $_POST['week'];
    $notes = array();
    foreach ( $days_of_week as $day ):
        foreach ( $note_types as $type ):
            $notes[$day][$type] = $_POST["{$type}-{$day}"];
        endforeach;
    endforeach;

    $json = json_encode($notes);
    //echo "<pre>{$json}</pre>";

    // save notes
    require_once 'common/FileWriter.php';
    //echo SCHEDULES_PATH . $file_name;
    try {
        $file = new FileWriter(SCHEDULES_PATH . $file_name);
        $file->open('w');
        $file->write($json);
        $file->close();
        echo 'success';
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
else:
?>
<?php

require_once "header.inc.php";


?>
<script>
    var days_of_week = ["monday","tuesday","wednesday","thursday","friday","saturday","sunday"];
    $(function() {
        // get the current schedule notes files
        var schedule_notes = {};
         $.ajax({
            url: "schedules/ps-notes.json",
            cache: false,
            dataType: 'json',
            success: function(data){
                schedule_notes.current = data;
                //console.log("notes: ",schedule_notes.current);
                add_notes("current");
            }
         });
        $.ajax({
            url: "schedules/ps-notes-next.json",
            cache: false,
            dataType: 'json',
            success: function(data){
                schedule_notes.next = data;
                //console.log("notes: ",schedule_notes.next);
                add_notes("next");
            }
         });
        var add_notes = function (week) {
            for ( var i = 0; i < 7; i++ ) {
               var day = days_of_week[i];
               $("."+week+" #weekend-"+day).val(schedule_notes[week][day].weekend);
               $("."+week+" #vacations-"+day).val(schedule_notes[week][day].vacations);
               $("."+week+" #changes-"+day).val(schedule_notes[week][day].changes);
            }
            $(':input[title]').each(function() {
                var $this = $(this);
                if($this.val() === '') {
                    $this.val($this.attr('title')).addClass("placeholder");
                }
                if($this.val() !== $this.attr('title')) {
                    $this.removeClass("placeholder");
                }
            });
        };
        $(':input[title]').each(function() {
            var $this = $(this);
            $this.focus(function() {
                if($this.val() === $this.attr('title')) {
                    $this.val('').removeClass("placeholder");
                }
            });
            $this.blur(function() {
                if($this.val() === '') {
                    $this.val($this.attr('title')).addClass("placeholder");
                }
            });
        });
        $("button").click(function() {
            $(".week").toggle();
        });

        $("input").focus(function() {
            $("fieldset").removeClass("focus");
            $(this).parent().addClass("focus");
        });
        $("form").submit(function(){
           $(':input[title]').each(function() {
               var $this = $(this);
               if($this.val() === $this.attr('title')) {
                    $this.val('');
                }
           });
        });


    });
</script>
</head>
<body>
    <div id="container">
    <div class="entry">

    </div>
    <button class="switcher">This/Next Week</button>
    <div class="week current">
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="notes">
        <input type="hidden" name="week" value="current" />
        <?php for ($i = 0; $i < 7; $i++): ?>
        <fieldset>
            <h3 class="date-<?=$days_of_week[$i]?>">THIS <?=$days_of_week[$i]?></h3>
            <input type="text" name="weekend-<?=$days_of_week[$i]?>" id="weekend-<?=$days_of_week[$i]?>" title="Weekend" class="placeholder" />
            <input type="text" name="vacations-<?=$days_of_week[$i]?>" id="vacations-<?=$days_of_week[$i]?>" title="Vacations" class="placeholder" />
            <input type="text" name="changes-<?=$days_of_week[$i]?>" id="changes-<?=$days_of_week[$i]?>" title="Changes" class="placeholder" />
        </fieldset>
        <?php endfor; ?>
        <input type="submit" name="submit" value="Submit" />
    </form>
    </div>
    <div class="week next">
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="notes">
        <input type="hidden" name="week" value="next" />
        <?php for ($i = 0; $i < 7; $i++): ?>
        <fieldset>
            <h3 class="date-<?=$days_of_week[$i]?>">NEXT <?=$days_of_week[$i]?></h3>
            <input type="text" name="weekend-<?=$days_of_week[$i]?>" id="weekend-<?=$days_of_week[$i]?>" title="Weekend" class="placeholder" />
            <input type="text" name="vacations-<?=$days_of_week[$i]?>" id="vacations-<?=$days_of_week[$i]?>" title="Vacations" class="placeholder" />
            <input type="text" name="changes-<?=$days_of_week[$i]?>" id="changes-<?=$days_of_week[$i]?>" title="Changes" class="placeholder" />
        </fieldset>
        <?php endfor; ?>
        <input type="submit" name="submit" value="Submit" />
    </form>
    </div>

    
  </div>
</body>
</html>
<?php endif; ?>
