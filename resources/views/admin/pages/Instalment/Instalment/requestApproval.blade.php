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
        <h4 class="card-title ">Approve Form</h4>
        <hr>
        <div class="card-body">

            <form action="/requestApprovalHandler" method="POST">
               @csrf
                <div class="form-group ">

                    <input name="id" type="hidden" value="{{$getDetailViaId->r_id}}">

                    <div class="row">
                        <div class="col">
                            <label>Transaction ID:</label>
                            <input type="text" class="form-control" name="transacid" required value="{{$getDetailViaId->r_transactionid}}" readonly>
                        </div>
                        <div class="col">
                            <label>Product ID:</label>
                            <input type="text" class="form-control" name="productid" required value="{{$getDetailViaId->r_productid}}" readonly>
                        </div>
                        <div class="col">
                            <label>Costumer ID:</label>
                            <input type="text" class="form-control" name="costumerid" required value="{{$getDetailViaId->r_costumerid}}" readonly>
                        </div>

                    </div>




                    <div class="form-group ">
                        <div class="row">
                            <div class="col">
                                <label>Order:</label>
                                <input type="number" class="form-control" name="order" required value="{{$getDetailViaId->r_quantity}}" readonly>
                            </div>
                            <div class="col">
                                <label>Price:</label>
                                <input type="number" class="form-control" id="price" name="price" required value="{{$getDetailViaId->r_price}}"
                                    readonly>
                            </div>

                        </div>
                    </div>


                    <div class="form-group ">
                        <div class="row">
                            <div class="col">
                                <label>Total Price:</label>
                                <input type="number" class="form-control" id="total" name="total" value="{{$getDetailViaId->r_total}}" readonly="">
                            </div>
                            <div class="col">
                                <label>Tax:</label>
                                <input type="number" class="form-control" id="tax" value="{{$getDetailViaId->r_tax}}" name="tax" readonly="">
                            </div>
                            <div class="col">
                                <label>Enter Year/s To Pay ( 1 to 3 ):</label>
                                <input type="number" class="form-control" id="yr" name="yr" value="{{$getDetailViaId->r_year}}" min="1" max="3"
                                    readonly>
                            </div>
                        </div>
                    </div>



                    <div class="form-group ">
                        <div class="row">
                            <div class="col">
                                <label>Monthly Payment:</label>
                                <input type="text" class="form-control" id="mp" name="mp" readonly value="{{$getDetailViaId->r_montly}}" required>
                            </div>
                            <div class="col">
                                <label>Down Payment:</label>
                                <input type="text" class="form-control" id="dp" name="dp" readonly required="" value="{{$getDetailViaId->r_downpayment}}">
                            </div>

                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="row">
                            <div class="col">
                                <label>Enter Down Payment Value:</label>
                                <input type="text" class="form-control" id="dpp" name="dpp" required="">
                            </div>
                        </div>

                        <br>

                        <div class="modal-footer">
                            <a href="{{url('/request')}}"> <button type="button" class="btn btn-secondary"
                                    style="font-size: 12px;">Close</button></a>
                            <button type="submit" class="btn btn-primary" name="approvereq"
                                style="font-size: 12px;">Save</button>

                        </div>
            </form>
        </div>
    </div>
</div>