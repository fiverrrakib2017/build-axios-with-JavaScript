<?php
echo 'sfdsd';
$conn = new mysqli("localhost", "root", "", "test");


if (isset($_POST['get_data_table'])=='active') {

	$search_query = '';	

    $sdate=isset($_POST['sdate'])?$_POST['sdate']:'';
    $edate=isset($_POST['edate'])?$_POST['edate']:'';

    if (isset($_POST['sdate'])) {
        if (empty($search_query)) {
            $search_query .="date BETWEEN '$sdate' AND '$edate'";
        }else{
            //return false;
            $search_query .='';
        }
    }
    


    $table = 'service_product';
	$primaryKey = 'id';
	 $where = $search_query;
    // Table's primary key
    $primaryKey = 'id';

 
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
        SSP::simple($_POST, $sql_details, $table, $primaryKey, $columns, $where)
    );
    
    
    
    


}





?>