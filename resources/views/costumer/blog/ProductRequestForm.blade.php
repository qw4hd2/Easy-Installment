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
        <h4 class="card-title ">Request For Product Form</h4>
        <hr>
        <div class="card-body">

            <form action="/productSave" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Product Name:</label>
                            <input type="text" class="form-control" name="productname" required>
                        </div>
                        <div class="col">
                            <label>Company Name:</label>
                            <input type="text" class="form-control" id="companyname" name="companyname" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Quantity:</label>
                            <input type="number" class="form-control" name="quantity" id="Quantity" required>
                        </div>
                        <div class="col">
                            <label>Installment Plan:</label>
                            <select name="selectionPlan" id="selectionPlan" class="form-control">
                                <option value="" selected disabled>Select Plan</option>
                                <option value="1">1 year</option>
                                <option value="2">2 year</option>
                                <option value="3">3 year</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Description:</label>
                            <input type="text" class="form-control" name="description" id="Description" required>
                        </div>
                    </div>
                </div>

        </div>
        <br>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" value="Validate" onclick="return Validate()" name="savereq"
                style="font-size: 12px;">Save</button>

        </div>
        </form>
    </div>
</div>
</div>