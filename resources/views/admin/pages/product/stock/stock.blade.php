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
                        <h4 class="card-title ">Stock Management</h4>
                        <a href="{{url('/stockAdd')}}"><button type="button" class="btn btn-primary "
                                style="font-size: 12px;">Register Stock</button></a>
                                <a href="{{url('/stockManage')}}"><button type="button" class="btn btn-success "
                                        style="font-size: 12px;">Manage Stock ( In/Out )</button></a>
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ..."
                            style="float: right; width: 20%; padding: 5px">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table" id="myTable">
                                <thead class=" text-warning">
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->p_code}}</td>
                                        <td>{{$product->p_name}}</td>
                                        <td>{{$product->p_category}}</td>
                                        <td>{{$product->p_description}}</td>
                                        <td><img src="{{$product->p_image}}" alt="" class="img img-fluid" data-toggle="modal" data-target="#productImageModal{{$product->p_id}}"></td>
                                        <td>{{$product->p_quantity}}</td>
                                        <td>Rs {{$product->p_mprice}}</td>
                                        <td><a href="{{ url('/stockEdit', $product->p_id) }}">Edit</a> | <form action="{{ url('/stockDelete', $product->p_id) }}" method="POST" class="delete-form" style="display: inline">
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
            </div>
        </div>
        @foreach($products as $product)
            <div class="modal fade" id="productImageModal{{$product->p_id}}" tabindex="-1" role="dialog" aria-labelledby="productImageModalLabel{{$product->p_id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img src="{{$product->p_image}}" alt="" class="img img-fluid">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        <div class="footer">
            <div id="pagination">
                        <?php 
                $total_records = DB::table('product')->count(); 
                $total_pages = ceil($total_records / 5); 

                for ($i=1; $i<=$total_pages; $i++) { 
                    echo "<a href='".route('admin.pages.product.stock')."?page=".$i."'";
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
