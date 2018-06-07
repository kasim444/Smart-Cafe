<?php

//fetch_item.php

include('database_connection.php');


$query = "SELECT * FROM urunler ORDER BY urun_id DESC";

$statement = $connect->prepare($query);

if($statement->execute())
{
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '
		<div class="col-md-3" style="margin-top:12px;">  
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:auto;" align="center">
                  <h4 class="text-info">'.@$row["urun_adi"].'</h4>
            	<h4 class="text-danger">$ '.@$row["birim_fiyati"] .'</h4>
            	<input type="text" name="quantity" id="quantity' .@$row["id"] .'" class="form-control" value="1" />
            	<input type="hidden" name="hidden_name" id="name'.@$row["id"].'" value="'.@$row["urun_adi"].'" />
            	<input type="hidden" name="hidden_price" id="price'.@$row["id"].'" value="'.@$row["birim_fiyati"].'" />
            	<input type="button" name="add_to_cart" id="'.@$row["id"].'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart" />
            </div>
        </div>
		';
	}
	echo $output;
}


?>