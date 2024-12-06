<?php 
function PrintTable($tableName,$connect)
{

	try {

	//Query
		$sql = "SELECT * FROM $tableName";

	//excute the quey
		$result = mysqli_query($connect,$sql);
	//check if data exists in the table
		if (mysqli_num_rows($result)>0) {
		// fetch the data from rows
			echo "<table border='1'>";
			$col = mysqli_fetch_fields($result);
		//print the colums
			echo "<tr>";
			foreach ($col as $value) {
			//return an object
			//print_r($value);
				echo "<td>$value->name</td>";
			}
			echo "</tr>";
			
			while ($row = mysqli_fetch_assoc($result)) {
			//print the data in a table format
				echo "<tr>";
				foreach ($row as $key => $value) {
					echo "<td>$value</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "No results";
		}
		
	} catch (Exception $e) {
		die($e->getMessage());
	}
}
function PrintTableCols($tableName,$connect,$colnames)
{
	try {

		//Query
		$sql = "SELECT ";
		for ($i=0; $i < sizeof($colnames)-1; $i++) { 
			$sql .=$colnames[$i].",";
			//echo $sql;
		}
		$sql .=$colnames[sizeof($colnames)-1]." from $tableName";
		//echo $sql;
		//excute the quey

		$result = mysqli_query($connect,$sql);
		//check if data exists in the table
		if (mysqli_num_rows($result)>0) {
			// fetch the data from rows
			echo "<table border='1'>";
			$col = mysqli_fetch_fields($result);
			//print the colums
			echo "<tr>";
			foreach ($col as $value) {
				//return an object
				//print_r($value);
				echo "<td>$value->name</td>";
			}
			echo "</tr>";
			
			while ($row = mysqli_fetch_assoc($result)) {
				//print the data in a table format
				echo "<tr>";
				foreach ($row as $key => $value) {
					echo "<td>$value</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "No results";
		}
		
	} catch (Exception $e) {
		die($e->getMessage());
	}
}

//wrtie a function to search the books by name
function SearchBooks($name,$connect)
{
	try {

	//Query
		$sql = "SELECT * FROM books where title like '%$name%' ";
		//echo $sql;
	//excute the quey
		$result = mysqli_query($connect,$sql);
	//check if data exists in the table
		if (mysqli_num_rows($result)>0) {
		// fetch the data from rows
			echo "<table border='1'>";
			$col = mysqli_fetch_fields($result);
		//print the colums
			echo "<tr>";
			foreach ($col as $value) {
			//return an object
			//print_r($value);
				echo "<td>$value->name</td>";
			}
			echo "</tr>";
			
			while ($row = mysqli_fetch_assoc($result)) {
			//print the data in a table format
				echo "<tr>";
				foreach ($row as $key => $value) {
					echo "<td>$value</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "No results";
		}
		
	} catch (Exception $e) {
		die($e->getMessage());
	}
}

?>