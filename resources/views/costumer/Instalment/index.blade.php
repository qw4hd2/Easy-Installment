@include('costumer.include.header')
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
                        <h4 class="card-title ">Installment Management</h4>
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
                                    <th>Balance</th>
                                    <th>Monthly</th>
                                    <th>Year</th>
                                    <th>Total Down</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach ($totalInstalments as $item)
                                    <tr>
                                        <td>{{$item->i_transactionid}}</td>
                                        <td>{{$item->i_productid}}</td>
                                        <td>{{$item->i_costumerid}}</td>
                                        <td>{{$item->i_order}} Pc/s</td>
                                        <td>₱ {{$item->i_value}}</td>
                                        <td>₱ {{$item->i_balance}}</td>
                                        <td>₱ {{$item->i_mp}}</td>
                                        <td>{{$item->i_year}}Yr/s</td>
                                        <td>₱ {{$item->i_dpp}}</td>
                                        <td>{{$item->i_date}}</td>
                                        <td><a href="{{url('/paymentCostumer',$item->i_id)}}">Show</a> | <form action="{{ url('/instalmentDeleteHandlerCostumer', $item->i_id) }}" method="POST" class="delete-form" style="display: inline">
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
                        $total_records = DB::table('installment')->count(); 
                        $total_pages = ceil($total_records / 5); 

                        for ($i=1; $i<=$total_pages; $i++) { 
                            echo "<a href='".route('admin.pages.Instalment.Instalment.Instalment')."?page=".$i."'";
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