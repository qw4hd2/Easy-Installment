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
        <form method="POST" action="/loginAdmin" style="width: 30%">
        {{ csrf_field() }}
            <h2 class="text-center">Log in</h2><br>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="username" name="username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="password" name="password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="in">Log in</button>
            </div>
            <div class="clearfix">
                <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
                <a href="#" class="float-right">Forgot Password?</a>
            </div>
        </form>

        @if(session('error'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            buttons:false,
                            text: '{{ session('error') }}'
                        });
                    </script>
                @endif
    </div>

    <div class="footer">
        <center><label>Administrator Form</label></center>
    </div>
</body>