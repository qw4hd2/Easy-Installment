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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title ">Payment Form</h4>
        <hr>
        <div class="card-body">
            <form action="/instalmentEditHandler" method="POST">
                <div class="form-group ">
                  @csrf
                    <input name="id" type="hidden" value="{{$fetchById->i_id}}">

                    <div class="row">
                        <div class="col">
                            <label>Transaction ID:</label>
                            <input type="text" class="form-control" name="transacid" required value="{{$fetchById->i_transactionid}}" readonly>
                        </div>
                        <div class="col">
                            <label>Code:</label>
                            <input type="text" class="form-control" name="productid" required value="{{$fetchById->i_costumerid}}" readonly>
                        </div>
                        <div class="col">
                            <label>Product:</label>
                            <input type="text" class="form-control" name="costumerid" required value="{{$fetchById->i_productid}}" readonly>
                        </div>
                    </div>
                </div>




                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Quantity:</label>
                            <input type="number" class="form-control" name="quantity" required value="{{$fetchById->i_order}}" readonly>
                        </div>
                        <div class="col">
                            <label>Price:</label>
                            <input type="number" class="form-control" id="price" name="price" required value="{{$fetchById->i_value}}"
                                readonly>
                        </div>



                        <div class="col">
                            <label>balance:</label>
                            <input type="number" class="form-control" name="balance" id="balance" value="{{$fetchById->i_balance}}" required
                                readonly>
                        </div>

                    </div>
                </div>


                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Monthly Payment:</label>
                            <input type="number" class="form-control" id="mp" name="mp" readonly="" value="{{$fetchById->i_mp}}">
                        </div>
                        <div class="col">
                            <label>Tax:</label>
                            <input type="number" class="form-control" id="tax" name="tax" readonly="" value="{{$fetchById->i_tax}}">
                        </div>
                        <div class="col">
                            <label>Enter Year/s To Pay ( 1 to 3 ):</label>
                            <input type="number" class="form-control" id="yr" name="yr" readonly="" value="{{$fetchById->i_year}}">
                        </div>
                    </div>
                </div>


                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label>Date:</label>
                            <input type="text" class="form-control" id="date" name="date" readonly="" value="{{ date('m/d/Y', strtotime($fetchById->i_date)) }}">
                        </div>
                        <div class="col">
                            <label>Penalty:</label>

                            <select name="penalty" id="penalty" class="form-control">
                                <option value="0">0</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                            </select>
                        </div>
                        <div class="col">
                            <label>Enter Montly Payment:</label>
                            <input type="number" class="form-control" step="any" id="mpp" name="mpp">
                        </div>
                    </div>
                </div>
                <br />

                <div class="modal-footer">
                    <a href="{{url('/Instalment')}}"> <button type="button" class="btn btn-secondary"
                            style="font-size: 12px;">Close</button></a>
                    <button type="submit" class="btn btn-primary" value="Validate" onclick="return Validate()"
                        name="savepay" style="font-size: 12px;">Save</button>

                </div>


            </form>
        </div>
    </div>
</div>
