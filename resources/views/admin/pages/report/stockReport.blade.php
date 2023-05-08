@include('admin.include.header')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Report Management</h4>

                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ..."
                            style="float: right; width: 20%; padding: 5px">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table" id="myTable">
                                <thead class=" text-warning">

                                    <th>Product ID</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Order</th>
                                    <th>Total Price</th>
                                    <th>Transaction</th>
                                    <th>User ID</th>
                                    <th>Date</th>
                                    <!-- <th>Action</th> -->
                                </thead>
                                <tbody>
                                    @foreach ($result as $item)
                                    <tr>
                                        <td>{{$item->l_productid}}</td>
                                        <td>{{$item->l_stock}}</td>
                                        <td>{{$item->l_price}}</td>
                                        <td>{{$item->l_order}}</td>
                                        <td>{{$item->l_totalprice}}</td>
                                        <td>{{$item->l_transaction}}</td>
                                        <td>{{$item->l_user}}</td>
                                        <td>{{$item->l_date}}</td>
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
                            echo "<a href='".route('admin.pages.report.stockReport')."?page=".$i."'";
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
        <div class="mt-2">
            <a href="" onclick="window.print()" class="btn btn-primary"><i class="icon-print icon-large"></i> Print</a>
        </div>
    </div>
</div>