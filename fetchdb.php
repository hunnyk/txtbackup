<?php

$link=mysqli_connect('localhost','root','root');

$database='demo';

$loop = mysqli_query($link,"SHOW tables FROM $database")
or die ('cannot select tables');

while($table = mysqli_fetch_array($loop))
{

    echo "$table[0]";

    $i = 0; //row counter
    $row = mysqli_query("SHOW columns FROM " . $table[0])
    or die ('cannot select table fields');

    while ($col = mysql_fetch_array($row))
    {
        echo "<tr";

        if ($i % 2 == 0)
            echo " bgcolor=\"#CCCCCC\"";

        echo "<tr>
            <td>" . $col[0] . "</td>
            <td>" . $col[1] . "</td>
            <td>" . $col[2] . "</td>
            <td>" . $col[3] . "</td>
            <td>" . $col[4] . "</td>
        </tr>";

        $i++;
    } //end row loop

    echo "</table><br/><br/>";
} //end table loop
?>