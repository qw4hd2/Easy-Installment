@include('admin.include.header')
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title ">Category Add</h4>
        <hr>
        <div class="card-body">

            <form action="/categoryAddedHandler" method="POST">
                @csrf
                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Code:</label>
                            <input type="text" class="form-control" name="catid" required>
                        </div>
                        <div class="col">
                            <label>Category Name:</label>
                            <input type="text" class="form-control" name="catname" required>
                        </div>
                    </div>
                </div>


                <label>Description:</label>
                <input type="text" class="form-control" name="description" required>
        </div>

        <div class="modal-footer">
            <a href="{{url('/category')}}"> <button type="button" class="btn btn-secondary"
                    style="font-size: 12px;">Close</button></a>
            <button type="submit" class="btn btn-primary" name="savecategory" style="font-size: 12px;">Save</button>
        </div>
        </form>
    </div>
</div>