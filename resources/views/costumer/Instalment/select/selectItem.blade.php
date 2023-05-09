@include('costumer.include.header');
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
                        <h4 class="card-title ">Select Product Request</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table">
                                <thead class=" text-warning">

                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>status</th>
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
                                        <td><a href="{{url('/requestFormCostumer',$product->p_id)}}" >Select</a>  </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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