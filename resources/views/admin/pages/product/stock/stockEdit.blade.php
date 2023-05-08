@include('admin.include.header')
<div class="card">
 <div class="card-header card-header-primary">
      <h4 class="card-title ">Stock Edit</h4>
   <hr>
  <div class="card-body">
  <form action="/product_que" method="POST">
  {{ csrf_field() }}
  	  <div class="form-group">
    
    <input name="id" type="hidden" value="{{$productDetail->p_id}}">

   <div class="row">
    <div class="col">
      <label>Code:</label>
      <input type="text" class="form-control" name="code" required value="{{$productDetail->p_code}}">
    </div>
    <div class="col">
       <label>Product:</label>
      <input type="text" class="form-control" name="name" required value="{{$productDetail->p_name}}">
    </div>
  </div>
  </div>
 <div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Description:</label>
      <input type="text" class="form-control" name="description" required value="{{$productDetail->p_description}}">
    </div>
    <div class="col">
       <label>Category:</label>
      <input type="text" class="form-control" name="category" required value="{{$productDetail->p_category}}">
    </div>
     
  </div>
  </div>

 <div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Quantity:</label>
      <input type="number" class="form-control" name="quantity" required value="{{$productDetail->p_quantity}}">
    </div>
    <div class="col">
       <label>Price:</label>
      <input type="number" class="form-control" name="value" required value="{{$productDetail->p_value}}">
    </div>
     
  </div>
  </div>
      <label>Supplier Name:</label>
            <input type="text" class="form-control" name="supname" required value="{{$productDetail->p_supname}}">
          </div>
        

      <div class="modal-footer">
       <a href="{{url('/stock')}}"> <button type="button" class="btn btn-secondary" style="font-size: 12px;">Close</button></a>
        <button type="submit" class="btn btn-primary" name="editproduct" style="font-size: 12px;">Update</button>
      </div>
  </form>