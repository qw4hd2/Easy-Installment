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
        <h4 class="card-title ">Supplier Edit</h4>
        <hr>
        <div class="card-body">
            <form action="/suppilerEditAction" method="POST">
                @csrf
                <div class="form-group ">

                    <input name="id" type="hidden" value="{{$supplierEdit->s_id}}">

                    <div class="row">
                        <div class="col">

                            <label>Id Number:</label>
                            <input type="text" class="form-control" name="idnum" required value="{{$supplierEdit->s_idnum}}">
                        </div>
                        <div class="col">
                            <label>Lastname:</label>
                            <input type="text" class="form-control" name="lastname" required value="{{$supplierEdit->s_lastname}}">
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Firstname:</label>
                            <input type="text" class="form-control" name="firstname" required value="{{$supplierEdit->s_firstname}}">
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Age:</label>
                            <input type="number" class="form-control" name="age" required value="{{$supplierEdit->s_age}}">
                        </div>
                        <div class="col">
                            <label>Contact:</label>
                            <input type="number" class="form-control" name="contact" required value="{{$supplierEdit->s_contact}}">
                        </div>

                    </div>
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Email:</label>
                            <input type="text" class="form-control" name="email" required value="{{$supplierEdit->s_email}}">
                        </div>
                        <div class="col">
                            <label>Address:</label>
                            <input type="text" class="form-control" name="address" required value="{{$supplierEdit->s_address}}">
                        </div>

                    </div>
                </div>
                <div>
                    <label>Company:</label>
                    <input type="text" class="form-control" name="company" required
                        value="{{$supplierEdit->s_company}}">
                </div>

                <div class="modal-footer">
                    <a href="{{url('/supplier')}}"> <button type="button" class="btn btn-secondary"
                            style="font-size: 12px;">Close</button></a>
                    <button type="submit" class="btn btn-primary" name="editsupplier"
                        style="font-size: 12px;">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>