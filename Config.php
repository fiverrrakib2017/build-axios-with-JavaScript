<?php
$table = 'service_product';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'product_name', 'dt' => 0 ),
    array( 'db' => 'product_image',  'dt' => 1 ),
    array( 'db' => 'price',   'dt' => 2 ),
    array(
        'db'        => 'date',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
        }
    ),
    array(
        'db'        => 'id',
        'dt'        => 4,
        'formatter' => function( $d, $row ) {
            return '<a href="edit.php?id='.$d.'">Edit</a> | <a onclick="confirm("Are You Sure");" href="delete.php?id='.$d.'">Delete</a>';
        }
    )
   
);
 
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'test',
    'host' => 'localhost'
);
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);










?>