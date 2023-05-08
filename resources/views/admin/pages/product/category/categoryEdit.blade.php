@include('admin.include.header')
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
        <h4 class="card-title ">Category Edit</h4>
        <hr>
        <div class="card-body">

            <form action="/categoryEditHandler" method="POST">
                @csrf
                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <input name="id" type="hidden" value="{{$checkId->c_id}}">
                            <label>Code:</label>
                            <input type="text" class="form-control" name="catid" required value="{{$checkId->c_code}}">
                        </div>
                        <div class="col">
                            <label>Category Name:</label>
                            <input type="text" class="form-control" name="catname" required value="{{$checkId->c_name}}">
                        </div>
                    </div>
                </div>

                <div>
                    <label>Description:</label>
                    <input type="text" class="form-control" name="description" required value="{{$checkId->c_description}}">
                </div>

                <div class="modal-footer">
                    <a href="{{url('/category')}}"> <button type="button" class="btn btn-secondary"
                            style="font-size: 12px;">Close</button></a>
                    <button type="submit" class="btn btn-primary" name="editcategory"
                        style="font-size: 12px;">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>