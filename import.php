<?php

//import.php

include 'vendor/autoload.php';

$connect = new PDO("mysql:host=localhost;dbname=base;charset=utf8", "homestead", "secret");

if($_FILES["import_excel"]["name"] != '')
{
    $allowed_extension = array('xls', 'csv', 'xlsx');
    $file_array = explode(".", $_FILES["import_excel"]["name"]);
    $file_extension = end($file_array);

    if(in_array($file_extension, $allowed_extension))
    {
        $file_name = time() . '.' . $file_extension;
        move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
        $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

        $spreadsheet = $reader->load($file_name);

        unlink($file_name);

        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach($data as $row)
        {

            $insert_data = array(
                ':product_name'  => $row[0],
                ':the_cost_rub'  => (float)$row[1],
                ':wholesale_price_rub'  => (int)$row[2],
                ':stock_availability_1_st'  => (int)$row[3],
                ':stock_availability_2_st'  => (int)$row[4],
                ':producing_country'  => $row[5]
            );

            $query = "
   INSERT INTO pricelist 
   (product_name, the_cost_rub, wholesale_price_rub, stock_availability_1_st, stock_availability_2_st, producing_country) 
   VALUES (:product_name, :the_cost_rub, :wholesale_price_rub, :stock_availability_1_st, :stock_availability_2_st, :producing_country)
   ";


            $statement = $connect->prepare($query);
            $statement->execute($insert_data);
        }
        $message = '<div class="alert alert-success">Data Imported Successfully</div>';

    }
    else
    {
        $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
    }
}
else
{
    $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;


