@include('admin.include.header')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<div class="card">
 <div class="card-header card-header-primary">
      <h4 class="card-title ">Stock In</h4>
   <hr>
  <div class="card-body">
  <form action="/productCalculation" method="POST">
     @csrf
      <div class="form-group" >
  
    <input name="id" type="hidden" value="{{$productDetail->p_id}}">

   <div class="row">
    <div class="col">
      <label>Code:</label>
      <input type="text" class="form-control" name="code" required value="{{$productDetail->p_code}}" readonly>
    </div>
    <div class="col">
       <label>Product:</label>
      <input type="text" class="form-control" name="name" required value="{{$productDetail->p_name}}" readonly>
    </div>
  </div>
  </div>
 <div class="form-group " hidden="hidden">
   <div class="row">
    <div class="col">
      <label>Description:</label>
      <input type="hidden" class="form-control" name="description" required value="{{$productDetail->p_description}}">
    </div>
    <div class="col">
       <label>Category:</label>
      <input type="hidden" class="form-control" name="category" required value="{{$productDetail->p_category}}">
    </div>
     
  </div>
  </div>

 <div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Quantity:</label>
      <input type="number" class="form-control" name="quantity" id="quantity" required value="{{$productDetail->p_quantity}}" readonly>
    </div>
      <div class="col">
       <label>Presernt Price:</label>
      <input type="number" class="form-control" name="pvalue" id="pvalue" required value="{{$productDetail->p_mprice}}" readonly>
    </div>
    <div class="col">
       <label>Supplier Price:</label>
      <input type="number" class="form-control" name="value" id="value" required >
    </div>
    <div class="col">
       <label>Stock-In:</label>
      <input type="number" class="form-control" name="stockin" id="stockin" required >
    </div>
     
  </div>
  </div>

  <div class="form-group " >
   <div class="row">     
<script>

    $('#stockin').keyup(function(){
    var order;
    var qty;
    var value;
    order = parseFloat($('#stockin').val());
    value = parseFloat($('#value').val());
    var c1 = order * value;
    var c2 = c1 * .20;
    var c3 = c1 + c2;
    var cc1 = value * .20;
    var cc2 = cc1 + value;
    var cc3 = cc2 * 1;
    var mprice = cc3;
    var newvalue = c1;
    
    $('#mprice').val(mprice.toFixed(2));
    $('#newvalue').val(newvalue.toFixed(2));
    });


</script>

 <div class="col">
       <label>Market Price:</label>
      <input type="number" class="form-control" name="mprice" id="mprice" required readonly>
    </div>
     

    <div class="col">
       <label>Total Price:</label>
      <input type="number" class="form-control" name="newvalue" id="newvalue" required readonly>
    </div>
     
        <div class="col">
       <label>Present Total Price:</label>
      <input type="number" class="form-control" name="ptotal" id="ptotal" required readonly value="{{$productDetail->p_newvalue}}">
    </div>
  </div>
  </div>


      <label>User ID:</label>
            <input type="text" class="form-control" name="supname" readonly="" value="{{ session('username') }}" required >
          </div>
        

      <div class="modal-footer">
       <a href="{{url('/stockManage',$productDetail->p_id)}}"> <button type="button" class="btn btn-secondary" style="font-size: 12px;">Close</button></a>
        <button type="submit" class="btn btn-primary" name="inproduct" style="font-size: 12px;">Stock-In</button>
      </div>
  </form>