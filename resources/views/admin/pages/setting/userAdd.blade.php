@include('admin.include.header');
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
        <h4 class="card-title ">User Add</h4>
        <hr>
        <div class="card-body">
            <form action="/userAddHanlder" method="POST">
                @csrf
                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Username:</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="col">
                            <label>Password:</label>
                            <input type="Password" class="form-control" name="password" required>
                        </div>
                    </div>
                </div>
                <label>Position:</label>
                <select class="form-control" name="usertype">
                    <option>Select An Option</option>
                    <option>Admin</option>
                    <option>Employee</option>
                </select>
        </div>

        <div class="modal-footer">
            <a href="user.php"> <button type="button" class="btn btn-secondary"
                    style="font-size: 12px;">Close</button></a>
            <button type="submit" class="btn btn-primary" name="saveuser" style="font-size: 12px;">Save</button>
        </div>
        </form>