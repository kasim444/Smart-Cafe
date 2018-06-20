<?php

require_once 'dbconnect.php';

$sql="SELECT * FROM `table`";

$sql1="INSERT INTO `table` (`tableID`, `tableName`) VALUES (NULL, 'a6')";

$sql2="UPDATE `table` SET `tableName`='a3' WHERE `tableID`=14";

$result=$DBcon->query($sql);

?>

<table>
  <tr>
    <th>Masa No</th>
    <th>Masa Adı</th>
    <th></th>
  </tr>

<?php

while($row=$result->fetch_array()){

?>

  <tr>
    <td><?php $row["tableID"] ?></td>
    <td><?php $row["tableName"] ?></td>
    <td></td>
  </tr>

<?php

}

?>

<tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>

<?php

?>
