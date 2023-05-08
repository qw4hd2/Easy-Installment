@include('admin.include.header')
@if(session('success'))
<script>
Swal.fire({
    icon: 'sucess',
    title: 'success',
    buttons: false,
    text: '{{ session('success') }}'
});
</script>
@endif
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Request Management</h4>
                        <a href="{{url('/requestAdd')}}"><button type="button" class="btn btn-primary "
                                style="font-size: 12px;">Add Request</button></a>
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
                                    <th>Order</th>
                                    <th>Value</th>
                                    <th>Total Price</th>
                                    <th>Tax</th>
                                    <th>Monthly</th>
                                    <th>Down Paymnet</th>
                                    <th>Year</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($getRequest as $req)
                                    <tr>
                                        <td>{{$req->r_transactionid}}</td>
                                        <td>{{$req->r_productid}}</td>
                                        <td>{{$req->r_costumerid}}</td>
                                        <td>{{$req->r_quantity}}</td>
                                        <td>{{$req->r_price}}</td>
                                        <td>{{$req->r_total}}</td>
                                        <td>{{$req->r_tax}}</td>
                                        <td>{{$req->r_montly}}</td>
                                        <td>{{$req->r_downpayment}}</td>
                                        <td>{{$req->r_year}}</td>
                                        <td><label class="badge badge-danger">Pending</label></td>
                                        <td>{{$req->r_date}}</td>
                                        <td><a href="{{url('/requestApproval',$req->r_id)}}">Approve</a> | <form action="{{ url('/requestDelete', $req->r_id) }}" method="POST" class="delete-form" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="deleteButton">Delete</button>
                                        </form>
                                     </td>
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
                        $total_records = DB::table('costumer')->count(); 
                        $total_pages = ceil($total_records / 5); 

                        for ($i=1; $i<=$total_pages; $i++) { 
                            echo "<a href='".route('admin.pages.Instalment.Instalment.request')."?page=".$i."'";
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
<script>
    document.querySelector('.delete-form').addEventListener('submit', function(event) {
        event.preventDefault(); 
               Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit();
            }
        });
    });
</script>