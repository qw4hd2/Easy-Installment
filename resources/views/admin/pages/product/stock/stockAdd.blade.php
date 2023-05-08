@include('admin.include.header')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title ">Register Product</h4>
        <hr>
        <div class="card-body">

            <form action="/stockAddDB" method="POST">
                @csrf
                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Code:</label>
                            <input type="text" class="form-control" name="code" required>
                        </div>
                        <div class="col">
                            <label>Product:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Description:</label>
                            <input type="text" class="form-control" name="description" required>
                        </div>

                    </div>
                </div>

                <label>Category:</label>
                <select class="form-control" name="category" readonly>
                    <!-- here i will place a option fetch from database -->
                    @foreach($category as $c)
                        <option value="{{$c->c_name}}">{{$c->c_name}}</option>
                    @endforeach
                </select>

                <div class="modal-footer">
                    <a href="{{url('/stock')}}"> <button type="button" class="btn btn-secondary"
                            style="font-size: 12px;">Close</button></a>
                    <button type="submit" class="btn btn-primary" name="saveproduct"
                        style="font-size: 12px;">Save</button>
                </div>
            </form>