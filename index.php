<!DOCTYPE html>
<html lang="en-US">
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />

    <!-- Moment.js -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>

    <!-- Daterangepicker -->
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css" />
    <title>Data Table With Filter </title>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header">
                       
                        <div class="row">
                            <h3 class="card-title col-4 mt-1">Transaction List by Expense</h3>
                                <div class="col-4 nav justify-content-end">
                            <div class="form-group mx-sm-3 mb-2">
                               <button data-toggle="modal" data-target="#addModal" class="btn btn-primary">Add Product</button>
                            </div>
                            </div>
                            <div class="col-4 nav justify-content-end" id="export_buttonscc"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                        <table id="load_data" class="table table-striped table-bordered responsive display no-wrap" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <div id="data-loading">
                                    <img src="http://erp.superhostelbd.com/super_home/assets/img/loading.gif">
                                </div> -->
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
                </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label  class="col-form-label">Product Name:</label>
                        <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name">
                    </div>
                    <div class="form-group">
                        <label  class="col-form-label">Image Link:</label>
                        <input type="text" class="form-control" name="product_image" placeholder="Enter Product Image Link">
                    </div>
                    <div class="form-group">
                        <label  class="col-form-label">Price:</label>
                        <input type="text" class="form-control" name="product_price" placeholder="Enter Product Price ">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" id="addProductBtn" class="btn btn-primary">Add Product</button>
            </div>
            </div>
        </div>
    </div>







<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
   <?php
$conn = new mysqli("localhost", "root", "", "test");
$price_filter = '';
if ($__all__product_data = $conn->query("SELECT * FROM service_product")) {
    while ($rows = $__all__product_data->fetch_assoc()) {
        $price_filter .= '<option value="' . $rows['price'] . '">' . $rows['price'] . '</option>';
    }
}

$__product_name_filter = '';
if ($__all__product_name = $conn->query("SELECT * FROM service_product")) {
    while ($rowss = $__all__product_name->fetch_assoc()) {
        $__product_name_filter .= '<option value="' . $rowss['product_name'] . '">' . $rowss['product_name'] . '</option>';
    }
}

?>
    var table;
    $(document).ready(function() {
        
    var status_filter = '<label style="margin-left: 10px;">: ';
    status_filter += '<select class="product_filter custom-select-sm form-control form-control-sm select2">';
    status_filter += '<option value="">--Select Product Name--</option>';
    status_filter += '<?=$__product_name_filter;?>';
    status_filter += '</select></label>';


    status_filter += '<label style="margin-left: 10px;"> Price: ';
    status_filter += '<select class="price_filter custom-select-sm form-control form-control-sm select2">';
    status_filter += '<option value="">--select--</option>';
    status_filter += '<?=$price_filter;?>';
    status_filter += '</select></label>';


    status_filter += '<label style="margin-left: 10px;">';
    status_filter += '<div id="reportrange" class="form-control d-inline" style="background: #fff; cursor: pointer; padding: 5px 5px; border: 1px solid #ccc;">';
    status_filter += '<i class="fa fa-calendar"></i>&nbsp;';
    status_filter += '<span></span> <i class="fa fa-caret-down"></i>';
    status_filter += '</div></label>';


    setTimeout(() => {
      $('.dataTables_length').append(status_filter);
      $('.select2').select2();
    }, 500);
         table=$('#load_data').DataTable( {
            "searching": true,
            "paging": true,
            "info": false,
            "lengthChange":true ,
            "processing"		: false,
			"serverSide"		: true,
            "zeroRecords":    "No matching records found",
            "ajax"				: {
				url			: "./Config.php",
				type		: 'GET',
			},
            "buttons": [			
        {
            extend: 'copy',
            text: '<i class="fas fa-copy"></i> Copy',
            titleAttr: 'Copy',
            exportOptions: { columns: ':visible' }
        }, 
        {
            extend: 'excel',
            text: '<i class="fas fa-file-excel"></i> Excel',
            titleAttr: 'Excel',
            exportOptions: { columns: ':visible' }
        }, 
        {
            extend: 'csv',
            text: '<i class="fas fa-file-csv"></i> CSV',
            titleAttr: 'CSV',
            exportOptions: { columns: ':visible' }
        }, 
        {
            extend: 'pdf',
            exportOptions: { columns: ':visible' },
            orientation: 'landscape',
            pageSize: "LEGAL",
            text: '<i class="fas fa-file-pdf"></i> PDF',
            titleAttr: 'PDF'
        }, 
        {
            extend: 'print',
            text: '<i class="fas fa-print"></i> Print',
            titleAttr: 'Print',
            exportOptions: { columns: ':visible' }
        }, 
        {
            extend: 'colvis',
            text: '<i class="fas fa-list"></i> Column Visibility',
            titleAttr: 'Column Visibility'
        }
        ],
        });

        //table.buttons().container().appendTo($('#export_buttonscc'));	
    });

    /*--------------Filter Script------------------------------------*/
   
    // Product filter change event
    $(document).on('change','.price_filter, .product_filter',function(){
      
        var product_filter = $('.product_filter').val() == null ? '' : $('.product_filter').val();
        var price_filter = $('.price_filter').val() == null ? '' : $('.price_filter').val();

        table.columns(0).search(product_filter).draw();
        table.columns(2).search(price_filter).draw();
        
    });

    setTimeout(() => {
    
    $(function() {
        var start = moment().subtract(29, 'days');
        var end = moment().add(1, 'days');

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
            $('.dateClass').text('From '+start.format('MMM D, YYYY')+' To '+end.format('MMM D, YYYY'));
            time_filter(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
        }
        $('#reportrange').daterangepicker({
            "showDropdowns": true,
            startDate: start,
            endDate: end,
            ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

    });
  
  }, 1000);

  function time_filter(start,end){
    var ajax_data = "./Config.php?get-data-table=active&sdate="+start+"&edate="+end;
    $('#load_data').DataTable().ajax.url(ajax_data).load();
  }

  $(document).on('click','.deleteBtn',function(){
    if(confirm('Are You sure')){
        var id=$(this).data('id');
        if(id !=''){
            $.ajax({  
				url:"Filter.php",  
				method:"POST",  
				data:{delete_id:id},
				beforeSend:function(){		
                    //$('.deleteBtn').html('https://i.gifer.com/ZKZg.gif')	;		
										 
				},
				success:function(data){	
                    if (data==1) {
                        toastr.success('Delete Success!!!');
                        $('#load_data').DataTable().ajax.reload( null , false);
                    }else{
                        toastr.error('something else');
                    }
                    
				}  
			});	
           
        }
    }     
  });

    // Add Product button click event
    $('#addProductBtn').on('click', function () {
        var productName = $('input[name="product_name"]').val();
        var productImage = $('input[name="product_image"]').val();
        var productPrice = $('input[name="product_price"]').val();

        // Validate the form fields
        if (productName === '' || productImage === '' || productPrice === '') {
            toastr.error('Please fill in all the fields.');
            return;
        }

        // Send data to the server
        $.ajax({
            url: 'addProduct.php', // Replace with the actual path to your PHP file
            method: 'POST',
            data: {
                product_name: productName,
                product_image: productImage,
                product_price: productPrice
            },
            success: function (data) {
                if (data === 'success') {
                    toastr.success('Product added successfully!');
                    // Optionally, you can reload the DataTable after adding a product
                    $('#load_data').DataTable().ajax.reload(null, false);
                    // Clear the form fields
                    $('input[name="product_name"]').val('');
                    $('input[name="product_image"]').val('');
                    $('input[name="product_price"]').val('');
                    // Close the modal if needed
                    $('#addModal').modal('hide');
                } else {
                    toastr.error('Failed to add product. Please try again.');
                }
            }
        });
    });

</script>

</body>
</html>
