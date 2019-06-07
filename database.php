
<?php

  define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'vmkart');
   $conn = new mysqli('localhost', 'root', '');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if (!$db_selected) {
    $sql = 'CREATE DATABASE vmkart';
    $conn->query($sql);
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


$sql1 = "CREATE TABLE product_db (
      product_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      category text,
      subcategory text,
      company text,
      product_name text,
      price varchar(50),
      availability varchar(50),
      seller text,
      seller_address text,
      product_desc text,
      height varchar(50),
      width varchar(50),
      weight varchar(50),
      rating varchar(50)
      )";

$sql2 = "CREATE TABLE user (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  uname text,
  password varchar(50),
  name varchar(50),
  country varchar(50),
  state varchar(50),
  address text,
  pincode int(11),
  phno int(11),
  cart_details text
  )";

$db->query($sql1);

$db->query($sql2);

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
   }
?>