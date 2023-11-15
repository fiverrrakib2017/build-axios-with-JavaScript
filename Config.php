<?php


$sdate=isset($_GET['sdate'])?$_GET['sdate']:'';
$edate=isset($_GET['edate'])?$_GET['edate']:'';
$search_query = '1';
if (!empty($_GET['sdate'])) {
    $search_query .=" AND date BETWEEN '$sdate' AND '$edate'";
}

$table = 'service_product';
// Table's primary key
$primaryKey = 'id';
$where = $search_query;



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
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $where , null )
);










?>