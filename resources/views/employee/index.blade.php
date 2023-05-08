@include('employee.include.header')
@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Error',
    buttons: false,
    text: '{{ session('error') }}'
});
</script>
@endif
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon" align="center">
                        <h4 class="card-category">Product</h4>
                        <hr>
                        <h3 class="card-title">{{ $productCount }}</h3>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon" align="center">

                        <h4 class="card-category">Category</h4>
                        <hr>
                        <h3 class="card-title">{{$categoryCount}}</h3>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon" align="center">

                        <h4 class="card-category">Supplier</h4>
                        <hr>
                        <h3 class="card-title">{{$supplierCount}}</h3>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon" align="center">

                        <h4 class="card-category">Costumer</h4>
                        <hr>
                        <h3 class="card-title">{{$costumerCount}}</h3>
                        <hr>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon" align="center">

                            <h4 class="card-category">Request</h4>
                            <hr>
                            <h3 class="card-title">{{$requestCount}}</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon" align="center">

                            <h4 class="card-category">Installment</h4>
                            <hr>
                            <h3 class="card-title">{{$installmentCount}}</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon" align="center">

                            <h4 class="card-category">Total Expenses</h4>
                            <hr>
                            <h3 class="card-title">{{$expensescount}}</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon" align="center">

                            <h4 class="card-category">Total Sales</h4>
                            <hr>
                            <h3 class="card-title">{{$sscount}}</h3>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>