<?php

$db = mysqli_connect("localhost", "root", "", "envios");

if(isset($_POST["query"]))
{

	$output = '';
	
	$query = "SELECT * FROM CLIENTE WHERE dni LIKE '%" .$_POST["query"] . "%'";


	$result = mysqli_query($db, $query);

	$output = '<ul class="list-unstyled">';

	if(mysqli_num_rows($result)>0)
	{
		while($row= mysqli_fetch_array($result))
		{	
		$output .= '<li>'.$row["dni"] . '</li>';
		}
	}else
	{
		$output.= '<li> DNI NO ENCONTRADO </li>';
	}
		$output .= '</ul>';
		echo $output;
}



?>