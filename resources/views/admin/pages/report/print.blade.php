<!DOCTYPE html>
<html lang="en">

<head>
    <title>Installment Management</title>
    <link rel="icon" href="{{ asset('img/ye.gif') }}" type="image/x-icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function($) {
        $('a[rel*=facebox]').facebox({
            loadingImage: 'src/loading.gif',
            closeImage: 'src/closelabel.png'
        })
    });
    </script>
</head>

<body>

    <div class="content">
        <div class="container">
            <h1>{{$id}}'s PURCHASE ORDER FORM</h1>
            <div>
                Payment ID : TR-{{$selectPayment->py_id}}<br />
                Transaction ID : {{$selectPayment->py_transactionid}}<br />
                Costumer ID : {{$selectPayment->py_costumerid}}<br />
                Date Inserted : {{$selectPayment->py_date}}
            </div>
            <table width="90%" class="table table-striped table-bordered table-hover" id="dataTables-example"
                align="center">
                <thead>
                    <tr>
                        <th width="5%">Transaction ID</th>
                        <th width="5%">Product ID</th>
                        <th width="5%">Customer ID</th>
                        <th width="5%">Penalty</th>
                        <th width="5%">Payment</th>
                        <th width="5%">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id=record>
                        <td>{{$selectPayment->py_transactionid}}</td>
                        <td>{{$selectPayment->py_productid}}</td>
                        <td>{{$selectPayment->py_costumerid}}</td>
                        <td>{{$selectPayment->py_penalty}}</td>         
                        <td>{{ formatMoney($selectPayment->py_payment, true) }}</td>
                        <td>{{$selectPayment->py_date}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong style="font-size: 12px; color: #222222;">Total:</strong></td>
                        <td colspan="2"><strong style="font-size: 12px; color: #222222;">
                                <?php
                            function formatMoney($number, $fractional = false)
                            {
                                if ($fractional) {
                                    $number = sprintf('%.2f', $number);
                                }
                                while (true) {
                                    $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                                    if ($replaced != $number) {
                                        $number = $replaced;
                                    } else {
                                        break;
                                    }
                                }
                                return $number;
                            }

                            $id = request('id');
                            $sum = DB::table('payment')
                                    ->where('py_id', $id)
                                    ->sum('py_payment');

                            echo formatMoney($sum, true);
                            ?>

                            </strong></td>
                    </tr>
                </tbody>
            </table>

            <div class="pull-right">
                <button onclick="myFunction()" id="btnPrint" class="btn btn-primary btn-m">Print PO Form</button>
            </div>
            <a href="{{ url('/paymentListPending') }}" class="btn btn-primary btn-m">Back</a>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

    <script>
    function myFunction() {
        window.print();
    }
    </script>

</body>

</html>