<?php
    // Reads file containing dates and sets 'launch' to next one to go. If runs out of dates / student loan season done
    // then timer javascript will display end of season message.

    $lines = file('dates.txt', FILE_IGNORE_NEW_LINES);
    $dates = array();
    $currentDate = new DateTime();
    $nextDate = new DateTime();
    for($i = 0; $i < count($lines); $i++){
        $dates[] = strtotime($lines[$i]);
    }
    for($i = 0; $i < count($lines); $i++){
        if ($dates[$i] > $currentDate) {
            $nextDate = $dates[$i];
            break;
        }
    }
?>
    <script>
    var launch = new Date(<?php echo date_format($nextDate,'Y').', '.date_format($nextDate,'m').', '.date_format($nextDate,'d'); ?>, 00, 00);
    </script>
