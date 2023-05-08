@include('admin.include.header')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Payment Management</h4>
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ..."
                            style="float: right; width: 20%; padding: 5px">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table" id="myTable">
                                <thead class=" text-warning">

                                    <th>Transaction ID</th>
                                    <th>Product ID</th>
                                    <th>Costumer ID</th>
                                    <th>Penalty</th>
                                    <th>Payment</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($result as $pay)
                                    <tr>
                                        <td>{{$pay->py_transactionid}}</td>
                                        <td>{{$pay->py_productid}}</td>
                                        <td>{{$pay->py_costumerid}}</td>
                                        <td>{{$pay->py_penalty}}</td>
                                        <td>{{$pay->py_payment}}</td>
                                        <td>{{$pay->py_date}}</td>
                                        <td><a  href="{{url('/printIt',$pay->py_id)}}">Print</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div id="pagination">
                        <?php 
                        $total_records = DB::table('payment')->count(); 
                        $total_pages = ceil($total_records / 5); 

                        for ($i=1; $i<=$total_pages; $i++) { 
                            echo "<a href='".route('admin.pages.report.paymentListPending')."?page=".$i."'";
                            if($page==$i) {
                                echo "id=active";
                            }
                            echo ">";
                            echo "".$i."</a> "; 
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>