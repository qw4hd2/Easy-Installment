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
      <h4 class="card-title ">Supplier Add</h4>
   <hr>
  <div class="card-body">
            
 <form action="/supplierAddedAction" method="POST">
  @csrf
  <div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Id Number:</label>
      <input type="text" class="form-control" name="idnum" required>
    </div>
    <div class="col">
       <label>Lastname:</label>
      <input type="text" class="form-control" name="lastname" required>
    </div>
  </div>
  </div>
 <div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Firstname:</label>
      <input type="text" class="form-control" name="firstname" required>
    </div>
  </div>
  </div>

 <div class="form-group " >
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
   <div class="form-group " >
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

       <label>Company:</label>
      <input type="text" class="form-control" name="company" required>
    </div>

      <div class="modal-footer">
         <a href="{{url('/supplier')}}"> <button type="button" class="btn btn-secondary" style="font-size: 12px;">Close</button></a>
        <button type="submit" class="btn btn-primary" name="savesupplier" style="font-size: 12px;">Save</button>
      </div>
      </form>
