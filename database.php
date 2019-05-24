<?php include("config.php");?>
<?php
if (($h = fopen("data.csv", "r")) !== FALSE) 
{
  // Convert each line into the local $data variable
  while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
  {		
    $query = "INSERT INTO product_db values('','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]')";
    $result = $db->query($query);
    echo   $result;
  }

  // Close the file
  fclose($h);
}
?>