@include('admin.include.header')
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title ">Costumer Edit</h4>
        <hr>
        <div class="card-body">
            <form action="/costumerAddedHandler" method="POST">
                @csrf
                <div class="form-group ">

                    <input name="id" type="hidden" value="{{$checkId->z_id}}">

                    <div class="row">
                        <div class="col">
                            <label>Id Number:</label>
                            <input type="text" class="form-control" name="idnum" required value="{{$checkId->z_idnum}}">
                        </div>
                        <div class="col">
                            <label>Lastname:</label>
                            <input type="text" class="form-control" name="lastname" required value="{{$checkId->z_lastname}}">
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Firstname:</label>
                            <input type="text" class="form-control" name="firstname" required value="{{$checkId->z_firstname}}">
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Age:</label>
                            <input type="number" class="form-control" name="age" required value="{{$checkId->z_age}}">
                        </div>
                        <div class="col">
                            <label>Contact:</label>
                            <input type="number" class="form-control" name="contact" required value="{{$checkId->z_contact}}">
                        </div>

                    </div>
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Email:</label>
                            <input type="text" class="form-control" name="email" required value="{{$checkId->z_email}}">
                        </div>
                        <div class="col">
                            <label>Address:</label>
                            <input type="text" class="form-control" name="address" required value="{{$checkId->z_address}}">
                        </div>

                    </div>
                </div>

                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Postal:</label>
                            <input type="text" class="form-control" name="postal" required value="{{$checkId->z_postal}}">
                        </div>
                        <div class="col">
                            <label>Job:</label>
                            <input type="text" class="form-control" name="job" required value="{{$checkId->z_job}}">
                        </div>
                        <div class="col">
                            <label>Salary:</label>
                            <input type="text" class="form-control" name="salary" required value="{{$checkId->z_salary}}">
                        </div>

                    </div>
                </div>
                <div>
                    <label>Status:</label>
                    <input type="text" class="form-control" name="status" required
                        value="{{$checkId->z_status}}">
                </div>
                <div class="modal-footer">
                    <a href="{{url('costumer')}}"> <button type="button" class="btn btn-secondary"
                            style="font-size: 12px;">Close</button></a>
                    <button type="submit" class="btn btn-primary" name="editcostumer"
                        style="font-size: 12px;">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>