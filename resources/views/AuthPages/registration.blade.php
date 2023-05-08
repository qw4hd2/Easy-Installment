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


    <div class="container" style="margin: 8% 18% ; width: 900px">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Costumer Form</h4>
                <hr>
                <div class="card-body">
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

                @if(session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            buttons:{},
                            text: '{{ session('success') }}'
                        });
                    </script>
                @endif
                    <form action="/register" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group ">
                            <div class="row">
                                <div class="col">
                                    <label>Id Number:</label>
                                    <input type="text" class="form-control" name="idnum" required>
                                </div>
                                <div class="col">
                                    <label>Password:</label>
                                    <input type="text" class="form-control" name="pass" required>
                                </div>
                                <input type="hidden" name="position" value="position">

                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col">
                                    <label>Lastname:</label>
                                    <input type="text" class="form-control" name="lastname" required>
                                </div>
                                <div class="col">
                                    <label>Firstname:</label>
                                    <input type="text" class="form-control" name="firstname" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
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
                        <div class="form-group ">
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

                        <div class="form-group ">
                            <div class="row">
                                <div class="col">
                                    <label>Postal:</label>
                                    <input type="text" class="form-control" name="postal" required>
                                </div>
                                <div class="col">
                                    <label>Job:</label>
                                    <input type="text" class="form-control" name="job" required>
                                </div>
                                <div class="col">
                                    <label>Salary:</label>
                                    <input type="text" class="form-control" name="salary" required>
                                </div>

                            </div>
                        </div>
                        <div>
                            <label>Status:</label>
                            <input type="text" class="form-control" name="status" required>
                        </div>


                        <div class="modal-footer">
                            <a href="supplier.php"> <button type="button" class="btn btn-secondary"
                                    style="font-size: 12px;">Close</button></a>
                            <button type="submit" class="btn btn-primary" name="savecostumer"
                                style="font-size: 12px;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>