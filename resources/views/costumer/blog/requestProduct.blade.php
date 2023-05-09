@include('costumer.include.header')
@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'error',
    buttons: false,
    text: '{{ session('error') }}'
});
</script>
@endif
@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'success',
    buttons: false,
    text: '{{ session('success') }}'
});
</script>
@endif
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<div class="card">
<div class="card-header card-header-primary">
    <h4 class="card-title ">Request Product</h4>
    <a href="{{url('/producttable')}}"><button type="button" class="btn btn-primary "
            style="font-size: 12px;">Request Product Form</button></a>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search ..."
        style="float: right; width: 20%; padding: 5px">

</div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table" id="myTable">
                    <thead class=" text-warning">
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Company Name</th>
                        <th>Quantity</th>
                        <th>Selection Plan</th>
                        <th>Description</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($requestProduct as $s)
                        <tr>
                        <td>{{$s->id}}</td>
                        <td>{{$s->productname}}</td>
                        <td>{{$s->companyname}}</td>
                        <td>{{$s->quantity}}</td>
                        <td>{{$s->selectionPlan}}</td>
                        <td>{{$s->description}}</td>
                        <td><form action="{{ url('/deleteProductBlog', $s->id) }}" method="POST" class="delete-form">
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