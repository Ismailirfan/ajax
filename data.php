<?php
include "connection.php";
$cat_id = $_POST['cat_id'];
$q = "select * from `subcategory` where cat_id = '$cat_id'";
$res = mysqli_query($con,$q);
while($row = mysqli_fetch_assoc($res))
{
    ?>
<option value="<?=$row['id']?>"><?=$row['name']?></option>
    <?php
}
?>