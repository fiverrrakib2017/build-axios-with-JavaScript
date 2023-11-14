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
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bill from advance money</h3>
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

<script type="text/javascript">
   
    $(document).ready(function() {
      var  status_filter='<label style="margin-left: 10px;"> ';
   // var status_filter = '<label style="margin-left: 10px;"> Status: ';
    status_filter += '<select class="status_filter custom-select-sm form-control form-control-sm select2">';
    status_filter += '<option value="">--select--</option>';
    status_filter += '<option value="0">Pending</option>';
    status_filter += '<option value="1">Approved</option>';
    status_filter += '<option value="2">Reject</option>';
    status_filter += '</select></label>';
    

    status_filter += '<label style="margin-left: 10px;"> Adjustment: ';
    status_filter += '<select class="adjustment_filter custom-select-sm form-control form-control-sm select2">';
    status_filter += '<option value="">--select--</option>';
    status_filter += '<option value="0">Due (Accounts pay)</option>';
    status_filter += '<option value="1">Advance Money</option>';
    status_filter += '<option value="2">Petty Cash</option>';
    status_filter += '<option value="3">Received View</option>';
    status_filter += '</select></label>';

    // status_filter += '<label style="margin-left: 10px;"> Branch: ';
    // status_filter += '<select class="branch_filter custom-select-sm form-control form-control-sm select2">';
    // status_filter += '<option value="">--select--</option>';
    // status_filter += '<option value="">Something else</option>';
    // status_filter += '</select></label>';

    // status_filter += '<label style="margin-left: 10px;"> Vendor: ';
    // status_filter += '<select id="myInputTextField" class="custom-select-sm form-control form-control-sm select2">';
    // status_filter += '<option value="">--select--</option>';
    // status_filter += '<option value="">Something else</option>';
    // status_filter += '</select></label>';

    // status_filter += '<label style="margin-left: 10px;"> Date: ';
    // status_filter += '<div id="reportrange" class="form-control d-inline" style="background: #fff; cursor: pointer; padding: 5px 5px; border: 1px solid #ccc;">';
    // status_filter += '<i class="fa fa-calendar"></i>&nbsp;';
    // status_filter += '<span></span> <i class="fa fa-caret-down"></i>';
    // status_filter += '</div></label>';
    setTimeout(() => {
      $('.dataTables_length').append(status_filter);
      $('.select2').select2();
    }, 500);
        $('#load_data').DataTable( {      
            "searching": true,
            "paging": true, 
            "info": false,         
            "lengthChange":true ,
            "processing"		: false,
			"serverSide"		: true,
            "ajax"				: {
				url			: "./Config.php",
				type		: 'GET',	
			},
        });
    });   
</script>
   
</body>
</html>
