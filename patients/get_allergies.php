<?php
 // Copyright (C) 2011 Cassian LUP <cassi.lup@gmail.com>
 //
 // This program is free software; you can redistribute it and/or
 // modify it under the terms of the GNU General Public License
 // as published by the Free Software Foundation; either version 2
 // of the License, or (at your option) any later version.

        require_once("verify_session.php");

        $sql = "SELECT * FROM lists WHERE pid = ? AND type = 'allergy' ORDER BY begdate";

        $res = sqlStatement($sql, array($pid));

if (sqlNumRows($res)>0) {
    ?>
    <table class="class1">
        <tr class="header">
    <th><?php echo htmlspecialchars(xlt('Title'), ENT_NOQUOTES); ?></th>
    <th><?php echo htmlspecialchars(xlt('Reported Date'), ENT_NOQUOTES); ?></th>
    <th><?php echo htmlspecialchars(xlt('Start Date'), ENT_NOQUOTES); ?></th>
    <th><?php echo htmlspecialchars(xlt('End Date'), ENT_NOQUOTES); ?></th>
    <th><?php echo htmlspecialchars(xlt('Referrer'), ENT_NOQUOTES); ?></th>
        </tr>
    <?php
    $even=false;
    while ($row = sqlFetchArray($res)) {
        if ($even) {
            $class="class1_even";
            $even=false;
        } else {
            $class="class1_odd";
            $even=true;
        }

        echo "<tr class='".attr($class)."'>";
        echo "<td>".text($row['title'])."</td>";
        echo "<td>".text($row['date'])."</td>";
        echo "<td>".text($row['begdate'])."</td>";
        echo "<td>".text($row['enddate'])."</td>";
        echo "<td>".text($row['referredby'])."</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo htmlspecialchars(xlt("No Results"), ENT_NOQUOTES);
}
?>
