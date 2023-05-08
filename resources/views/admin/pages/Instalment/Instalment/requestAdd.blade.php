@include('admin.include.header')
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
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($result as $product)
                                    <tr>
                                        <td>{{$product->p_code}}</td>
                                        <td>{{$product->p_name}}</td>
                                        <td>{{$product->p_category}}</td>
                                        <td>{{$product->p_description}}</td>
                                        <td>{{$product->p_quantity}}</td>
                                        <td>{{$product->p_mprice}}</td>
                                        <td><a href="{{url('/requestForm',$product->p_id)}}">Select</a></td>
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
               