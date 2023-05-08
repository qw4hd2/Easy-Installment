@include('admin.include.header')
@if(session('success'))
<script>
Swal.fire({
    icon: 'sucess',
    title: 'success',
    buttons: false,
    text: '{{ session('
    success ') }}'
});
</script>
@endif
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Supplier Management</h4>
                        <a href="{{url('supplierAdd')}}"><button type="button" class="btn btn-primary "
                                style="font-size: 12px;">Add Supplier</button></a>
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ..."
                            style="float: right; width: 20%; padding: 5px">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table" id="myTable">
                                <thead class=" text-warning">
                                    <th>ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Age</th>
                                    <th>Company</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($supplier as $s)
                                    <td>{{$s->s_id}}</td>
                                    <td>{{$s->s_lastname}}</td>
                                    <td>{{$s->s_firstname}}</td>
                                    <td>{{$s->s_age}}</td>
                                    <td>{{$s->s_company}}</td>
                                    <td>{{$s->s_contact}}</td>
                                    <td>{{$s->s_address}}</td>
                                    <td>{{$s->s_email}}</td>
                                    <td><a href="{{url('supplierEdit',$s->s_id)}}">Edit</a> | <form action="{{ url('supplierDelete', $s->s_id) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="deleteButton">Delete</button>
                                        </form>
                                    </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div id="pagination">
                <?php 
                $total_records = DB::table('supplier')->count(); 
                $total_pages = ceil($total_records / 5); 

                for ($i=1; $i<=$total_pages; $i++) { 
                    echo "<a href='".route('admin.pages.product.supplier.supplier')."?page=".$i."'";
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
