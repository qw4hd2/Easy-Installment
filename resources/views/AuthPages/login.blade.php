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

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#index.php"><img src="{{asset('img/ye.gif')}}"
                    style="width: 30px; height: 30px" alt="..." /> Easy Installment</a>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/registration')}}"><span
                                class="fa fa-user mr-2"></span> Register</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('login')}}"><span
                                class="fa fa-sign-in mr-2"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="center" align="center" style="margin: 10% 0;">
        <label style="font-size: 30px">LOGIN USER TYPE SELECTION</label>
        <hr>
        <div class="form">
            <div class="form-group ">

                <div class="row" style="width: 300px; margin: 10px">
                    <div class="col">
                        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger form-control" href="{{url('/administrator')}}"
                            style=" border-radius: 100px">Administrator</a>
                    </div>
                </div>
                <div class="row" style="width: 300px; margin: 10px">
                    <div class="col">
                        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger form-control"
                            href="{{url('/employee')}}" style=" border-radius: 100px">Employeee</a>
                    </div>
                </div>
                <div class="row" style="width: 300px; margin: 10px">
                    <div class="col">
                        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger form-control"
                            href="{{url('/costumerLogin')}}" style=" border-radius: 100px">Costumer</a>
                    </div>
                </div>

                <hr>

            </div>
</body>