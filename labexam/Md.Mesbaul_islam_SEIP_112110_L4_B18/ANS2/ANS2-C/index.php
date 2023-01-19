<?php
$csv = "csv.txt";
$handle = fopen("$csv", "r");
$get = fgetcsv($handle);

?>
<table width="100%" border="1">
    <tr>
        <td><?php echo $get[0]; ?></td>
        <td><?php echo $get[1]; ?></td>
        <td><?php echo $get[2]; ?></td>
        <td><?php echo $get[3]; ?></td>
    </tr>
    <tr>
        <td><?php echo $get[4]; ?></td>
        <td><?php echo $get[5]; ?></td>
        <td><?php echo $get[6]; ?></td>
        <td><?php echo $get[7]; ?></td>
    </tr>
</table>

