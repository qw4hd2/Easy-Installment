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
                        <h4 class="card-title ">Category Management</h4>
                        <a href="{{url('categoryAdd')}}"><button type="button" class="btn btn-primary "
                                style="font-size: 12px;">Add Category</button></a>
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ..."
                            style="float: right; width: 20%; padding: 5px">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table" id="myTable">
                                <thead class=" text-warning">

                                    <th>Code</th>
                                    <th>Category Name</th>
                                    <th>Descrition</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($categoryAll as $c)
                                        <tr>
                                            <td>{{$c->c_code}}</td>
                                            <td>{{$c->c_name}}</td>
                                            <td>{{$c->c_description}}</td>
                                            <td><a href="{{url('/categoryEdit',$c->c_id)}}">Edit</a> | <form action="{{ url('/categoryDeleteHandler', $c->c_id) }}" method="POST" class="delete-form" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="deleteButton">Delete</button>
                                        </form> </td>
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
                        $total_records = DB::table('category')->count(); 
                        $total_pages = ceil($total_records / 5); 

                        for ($i=1; $i<=$total_pages; $i++) { 
                            echo "<a href='".route('admin.pages.product.category.category')."?page=".$i."'";
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