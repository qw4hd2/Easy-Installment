@include('admin.include.header')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Stock Management</h4>
                        <a href="{{url('/stockAdd')}}"><button type="button" class="btn btn-primary "
                                style="font-size: 12px;">Register Stock</button></a>
                        <a href="{{url('/stock')}}"><button type="button" class="btn btn-success "
                                style="font-size: 12px;">Go To Stock List</button></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table">
                                <thead class=" text-warning">

                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                               
                                    <tr>
                                        <td>{{$productDetail->p_code}}</td>
                                        <td>{{$productDetail->p_name}}</td>
                                        <td>{{$productDetail->p_category}}</td>
                                        <td>{{$productDetail->p_description}}</td>
                                        <td>{{$productDetail->p_quantity}}</td>
                                        <td>₱ {{$productDetail->p_mprice}}</td>
                                        <td><a href="{{url('/stockIn',$productDetail->p_id)}}">Stock-In</a> | <a
                                                href="{{url('/stockOut',$productDetail->p_id)}}">Stock-Out</a> </td>
                                    </tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
