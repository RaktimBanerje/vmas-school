
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Permission Manager</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bxs-user"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>        
               
            
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-md-12 text-start">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
                                        <h5 class="mb-0 text-primary">Permission Management</h5>
                                    </div>      
                                </div>
                            </div>
        
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Create</th>
                                            <th scope="col">View</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Vehicle</td>
                                            <td>
                                                <div class="form-check">
                                                    <input 
                                                        class="form-check-input" 
                                                        type="checkbox" 
                                                        name="can_create_vehicle" 
                                                        value="{{ $data['can_create_vehicle'] }}" 
                                                        <?php if($data['can_create_vehicle']) { echo "checked"; } ?>
                                                    >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input 
                                                        class="form-check-input" 
                                                        type="checkbox" 
                                                        name="can_view_vehicle" 
                                                        value="{{ $data['can_view_vehicle'] }}" 
                                                        <?php if($data['can_view_vehicle']) { echo "checked"; } ?>
                                                    >
                                                </div>
                                            </td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_edit_vehicle" 
                                                    value="{{ $data['can_edit_vehicle'] }}" 
                                                    <?php if($data['can_edit_vehicle']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_delete_vehicle" 
                                                    value="{{ $data['can_delete_vehicle'] }}" 
                                                    <?php if($data['can_delete_vehicle']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Broker</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_create_broker" 
                                                    value="{{ $data['can_create_broker'] }}" 
                                                    <?php if($data['can_create_broker']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_broker" 
                                                    value="{{ $data['can_view_broker'] }}" 
                                                    <?php if($data['can_view_broker']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_edit_broker" 
                                                    value="{{ $data['can_edit_broker'] }}" 
                                                    <?php if($data['can_edit_broker']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                 <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_delete_broker" 
                                                    value="{{ $data['can_delete_broker'] }}" 
                                                    <?php if($data['can_delete_broker']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Client</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_create_client" 
                                                    value="{{ $data['can_create_client'] }}" 
                                                    <?php if($data['can_create_client']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_client" 
                                                    value="{{ $data['can_view_client'] }}" 
                                                    <?php if($data['can_view_client']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_edit_client" 
                                                    value="{{ $data['can_edit_client'] }}" 
                                                    <?php if($data['can_edit_client']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_delete_client" 
                                                    value="{{ $data['can_delete_client'] }}" 
                                                    <?php if($data['can_delete_client']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr><tr>
                                            <td>Workorder</td>
                                            <td>
                                                                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_create_workorder" 
                                                    value="{{ $data['can_create_workorder'] }}" 
                                                    <?php if($data['can_create_workorder']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_workorder" 
                                                    value="{{ $data['can_view_workorder'] }}" 
                                                    <?php if($data['can_view_workorder']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_edit_workorder" 
                                                    value="{{ $data['can_edit_workorder'] }}" 
                                                    <?php if($data['can_edit_workorder']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_delete_workorder" 
                                                    value="{{ $data['can_delete_workorder'] }}" 
                                                    <?php if($data['can_delete_workorder']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Product</td>
                                            <td>
                                                                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_create_product" 
                                                    value="{{ $data['can_create_product'] }}" 
                                                    <?php if($data['can_create_product']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_product" 
                                                    value="{{ $data['can_view_product'] }}" 
                                                    <?php if($data['can_view_product']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_edit_product" 
                                                    value="{{ $data['can_edit_product'] }}" 
                                                    <?php if($data['can_edit_product']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_delete_product" 
                                                    value="{{ $data['can_delete_product'] }}" 
                                                    <?php if($data['can_delete_product']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fuel Station</td>
                                            <td>
                                                                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_create_fuelstation" 
                                                    value="{{ $data['can_create_fuelstation'] }}" 
                                                    <?php if($data['can_create_fuelstation']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_fuelstation" 
                                                    value="{{ $data['can_view_fuelstation'] }}" 
                                                    <?php if($data['can_view_fuelstation']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_edit_fuelstation" 
                                                    value="{{ $data['can_edit_fuelstation'] }}" 
                                                    <?php if($data['can_edit_fuelstation']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_delete_fuelstation" 
                                                    value="{{ $data['can_delete_fuelstation'] }}" 
                                                    <?php if($data['can_delete_fuelstation']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Cash</td>
                                            <td>
                                                                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_create_cash" 
                                                    value="{{ $data['can_create_cash'] }}" 
                                                    <?php if($data['can_create_cash']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_cash" 
                                                    value="{{ $data['can_view_cash'] }}" 
                                                    <?php if($data['can_view_cash']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_edit_cash" 
                                                    value="{{ $data['can_edit_cash'] }}" 
                                                    <?php if($data['can_edit_cash']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_delete_cash" 
                                                    value="{{ $data['can_delete_cash'] }}" 
                                                    <?php if($data['can_delete_cash']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Loading</td>
                                            <td>
                                                                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_create_loading" 
                                                    value="{{ $data['can_create_loading'] }}" 
                                                    <?php if($data['can_create_loading']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_loading" 
                                                    value="{{ $data['can_view_loading'] }}" 
                                                    <?php if($data['can_view_loading']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_edit_loading" 
                                                    value="{{ $data['can_edit_loading'] }}" 
                                                    <?php if($data['can_edit_loading']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_delete_loading" 
                                                    value="{{ $data['can_delete_loading'] }}" 
                                                    <?php if($data['can_delete_loading']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Unloading</td>
                                            <td>
                                                                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_create_unloading" 
                                                    value="{{ $data['can_create_unloading'] }}" 
                                                    <?php if($data['can_create_unloading']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_unloading" 
                                                    value="{{ $data['can_view_unloading'] }}" 
                                                    <?php if($data['can_view_unloading']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_edit_unloading" 
                                                    value="{{ $data['can_edit_unloading'] }}" 
                                                    <?php if($data['can_edit_unloading']) { echo "checked"; } ?>
                                                >
                                            </td>
                                            <td>
                                                                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_delete_unloading" 
                                                    value="{{ $data['can_delete_unloading'] }}" 
                                                    <?php if($data['can_delete_unloading']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-md-12 text-start">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
                                        <h5 class="mb-0 text-primary">Permission Management</h5>
                                    </div>      
                                </div>
                            </div>
        
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Visible</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Broker Payment Entry</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_payment_entry_broker" 
                                                    value="{{ $data['can_payment_entry_broker'] }}" 
                                                    <?php if($data['can_payment_entry_broker']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>Broker Payment View</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_payment_view_broker" 
                                                    value="{{ $data['can_payment_view_broker'] }}" 
                                                    <?php if($data['can_payment_view_broker']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>Broker Payment Due</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_payment_due_broker" 
                                                    value="{{ $data['can_payment_due_broker'] }}" 
                                                    <?php if($data['can_payment_due_broker']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>Broker Report</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_report_broker" 
                                                    value="{{ $data['can_view_report_broker'] }}" 
                                                    <?php if($data['can_view_report_broker']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Broker Ledger</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_ledger_broker" 
                                                    value="{{ $data['can_view_ledger_broker'] }}" 
                                                    <?php if($data['can_view_ledger_broker']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        
                                        
                                        
                                        <tr>
                                            <td>Client Create Bill</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_create_bill_client" 
                                                    value="{{ $data['can_create_bill_client'] }}" 
                                                    <?php if($data['can_create_bill_client']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Client View Bills</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_bill_client" 
                                                    value="{{ $data['can_view_bill_client'] }}" 
                                                    <?php if($data['can_view_bill_client']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Client Unbilled Trips</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_unbilled_trips_client" 
                                                    value="{{ $data['can_view_unbilled_trips_client'] }}" 
                                                    <?php if($data['can_view_unbilled_trips_client']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Client Payment Receipt Entry</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_payment_receipt_entry_client" 
                                                    value="{{ $data['can_payment_receipt_entry_client'] }}" 
                                                    <?php if($data['can_payment_receipt_entry_client']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Client View Client Payment</td>
                                            <td>
                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_payment_client" 
                                                    value="{{ $data['can_view_payment_client'] }}" 
                                                    <?php if($data['can_view_payment_client']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        
                                        
                                        
                                        
                                        <tr>
                                            <td>Fuelstation Create Payment</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_payment_fuelstation" 
                                                    value="{{ $data['can_payment_fuelstation'] }}" 
                                                    <?php if($data['can_payment_fuelstation']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fuelstation Extra Fuel Entryt</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_extra_fuelentry_fuelstation" 
                                                    value="{{ $data['can_extra_fuelentry_fuelstation'] }}" 
                                                    <?php if($data['can_extra_fuelentry_fuelstation']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fuelstation Payment Report</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_payment_fuelstation" 
                                                    value="{{ $data['can_view_payment_fuelstation'] }}" 
                                                    <?php if($data['can_view_payment_fuelstation']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fuelstation Payment Ledger</td>
                                            <td>
                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_ledger_fuelstation" 
                                                    value="{{ $data['can_view_ledger_fuelstation'] }}" 
                                                    <?php if($data['can_view_ledger_fuelstation']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        
                                        
                                        
                                        <tr>
                                            <td>Cash Book</td>
                                            <td>
                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_cashbook_cash" 
                                                    value="{{ $data['can_view_cashbook_cash'] }}" 
                                                    <?php if($data['can_view_cashbook_cash']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Create Transaction</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_create_transaction_cash" 
                                                    value="{{ $data['can_create_transaction_cash'] }}" 
                                                    <?php if($data['can_create_transaction_cash']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>View Cash Book</td>
                                            <td>
                                               <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_cashbook_ledger_cash" 
                                                    value="{{ $data['can_view_cashbook_ledger_cash'] }}" 
                                                    <?php if($data['can_view_cashbook_ledger_cash']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        
                                        
                                        
                                        <tr>
                                            <td>Owner Create New Bill</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_create_bill_owner" 
                                                    value="{{ $data['can_create_bill_owner'] }}" 
                                                    <?php if($data['can_create_bill_owner']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Owner View Bill</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_bill_owner" 
                                                    value="{{ $data['can_view_bill_owner'] }}" 
                                                    <?php if($data['can_view_bill_owner']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Owner Payment Entry</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_create_payment_owner" 
                                                    value="{{ $data['can_create_payment_owner'] }}" 
                                                    <?php if($data['can_create_payment_owner']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Owner Payment View</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_payment_view_owner" 
                                                    value="{{ $data['can_payment_view_owner'] }}" 
                                                    <?php if($data['can_payment_view_owner']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Owner Unbilled Trips</td>
                                            <td>
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="can_view_unbilled_trips_owner" 
                                                    value="{{ $data['can_view_unbilled_trips_owner'] }}" 
                                                    <?php if($data['can_view_unbilled_trips_owner']) { echo "checked"; } ?>
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <form>
        @csrf
    </form>
    
    <script>
        $("input").on("change", function(event) {
            let name = event.target.name
            let formdata = new FormData()
            
            formdata.append("permission", name)
            formdata.append("user_id", {{$user->id}})
            
            fetch("{{ route('users.store_permission_manager') }}", {
              headers: {
                "X-CSRF-Token": $('input[name="_token"]').val()
              },
              method: "POST",
              body: formdata
            })
            .then(response => response.json())
            .then(console.log)
            .catch(console.log)
            
        })
    </script>
    <!--end page wrapper -->
