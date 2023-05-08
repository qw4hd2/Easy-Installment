<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{ asset('img/ye.gif') }}" type="image/x-icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
    <style type="text/css">
        #pagination {
            text-align: center;
            margin-top: 20px;
        }

        #pagination a {
            border: 1px solid #CCCCCC;
            padding: 5px 10px;
            font-family: arial;
            text-decoration: none;
            background: none repeat scroll 0 0 #EEEEEE !important;
            color: #222222;
        }

        #pagination a:hover {
            background-color: #FFFFFF;
        }

        a#active {
            background-color: #FFFFFF;
        }
    </style>


    <style type="text/css">
        #pagination {
            text-align: center;
            margin-top: 20px;
        }

        #pagination a {
            border: 1px solid #CCCCCC;
            padding: 5px 10px;
            font-family: arial;
            text-decoration: none;
            background: none repeat scroll 0 0 #EEEEEE;
            color: #222222;
        }

        #pagination a:hover {
            background-color: #FFFFFF;
        }

        a#active {
            background-color: #FFFFFF;
        }
    </style>
</head>


<body style="font-size: 12px">


    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-1">
                <a href="#" class="img logo rounded-circle mb-1" style="background-image: url({{asset('img/ye.gif')}})"
                    data-toggle="modal" data-target="#myModal"></a>
                <center><label style="letter-spacing: 2px">Easy Installment</label></center>

                <hr style="border: 2px solid white">
                <ul class="list-unstyled components mb-5">
                    <li>

                        <a href="{{url('/homeCostumer')}}"><span class="fa fa-home mr-3"></span>Home</a>
                    </li>

                    <li>
                        <a href="#insSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span
                                class="fa fa-inbox mr-3"></span>Instalment</a>
                        <ul class="collapse list-unstyled" id="insSubmenu">
                            <li>
                                <a href="{{url('/InstalmentCostumer')}}"><span
                                        class="fa fa-caret-right mr-3"></span>Installment</a>
                            </li>
                            <li>
                                <a href="{{url('/selectItem')}}"><span class="fa fa-caret-right mr-3"></span>Select Item</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#settSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle"><span class="fa fa-cog mr-3"></span>Setting</a>
                        <ul class="collapse list-unstyled" id="settSubmenu">
                            <li>
                            <form action="{{ route('logoutCostumer') }}" method="POST" style="display: inline"
                                    class="fa fa-caret-right mr-3">
                                    @csrf
                                    <button type="submit" class="logoutBtn">logout</button>
                                </form>
                            </li>

                        </ul>
                    </li>


                </ul>



                <div class="footer">
                    <center><label style="letter-spacing: 2px">Product Installment</label></center>
                </div>

            </div>
        </nav>


        <div id="content" class="p-4 p-md-5">



            <script src="{{ asset('js/jquery.min.js') }}"></script>
            <script src="{{ asset('js/popper.js') }}"></script>
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>