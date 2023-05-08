@include('admin.include.header')
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title ">Costumer Add</h4>
        <hr>
        <div class="card-body">
            <form action="que/costumer_que.php" method="POST">
                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Id Number:</label>
                            <input type="text" class="form-control" name="idnum" required>
                        </div>

                    </div>
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Lastname:</label>
                            <input type="text" class="form-control" name="lastname" required>
                        </div>
                        <div class="col">
                            <label>Firstname:</label>
                            <input type="text" class="form-control" name="firstname" required>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Age:</label>
                            <input type="number" class="form-control" name="age" required>
                        </div>
                        <div class="col">
                            <label>Contact:</label>
                            <input type="number" class="form-control" name="contact" required>
                        </div>

                    </div>
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Email:</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="col">
                            <label>Address:</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>

                    </div>
                </div>

                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Postal:</label>
                            <input type="text" class="form-control" name="postal" required>
                        </div>
                        <div class="col">
                            <label>Job:</label>
                            <input type="text" class="form-control" name="job" required>
                        </div>
                        <div class="col">
                            <label>Salary:</label>
                            <input type="text" class="form-control" name="salary" required>
                        </div>

                    </div>
                </div>
                <div>
                    <label>Status:</label>
                    <input type="text" class="form-control" name="status" required>
                </div>


                <div class="modal-footer">
                    <a href="{{url('/costumer')}}"> <button type="button" class="btn btn-secondary"
                            style="font-size: 12px;">Close</button></a>
                    <button type="submit" class="btn btn-primary" name="savecostumer"
                        style="font-size: 12px;">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>