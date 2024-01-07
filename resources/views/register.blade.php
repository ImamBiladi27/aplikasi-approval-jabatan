<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('/css2/style.css') }}">

</head>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Register Page</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                    <div class="img" style="background-image: url(images2/bg-1.jpg);"></div>
                    <div class="login-wrap p-4 p-md-5">
                <div class="d-flex">
                    <div class="w-100">
                        <h3 class="mb-4">Sign Up</h3>
                    </div>
                </div>
          @if(session('error'))
                <div class="alert alert-danger">
                    <b>Opps!</b> {{session('error')}}
                </div>
                @endif
                <form action="{{ route('actionregister') }}" method="post"class="signin-form">
                    @csrf
                     <div class="form-group">

                        <input type="text" name="name" class="form-control" placeholder="Name" id="name" required>
                        <label for="Name" class="form-control-placeholder">Name</label>
                    </div>
                    <div class="form-group">

                        <input type="email" name="email" class="form-control" placeholder="Email" id="email" required>
                        <label for="email" class="form-control-placeholder">Email</label>
                    </div>
                    <div class="form-group">

                       <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" id="jabatan" required>
                       <label for="jabatan" class="form-control-placeholder">Jabatan</label>
                    </div>
                    <div class="form-group">

                    <select  class="form-control" name="manage_id" id="manage_id" required>
                        @foreach ($user as $users)
                   <option value=" {{$users->manage_id}}"  >{{$users->jabatan}}  -  {{ $users->name }}</option>
                          @endforeach
                    </select>
                       <label for="Atasan" class="form-control-placeholder">Atasan</label>
                    </div>
                   <div class="form-group">
                       <input id="password" name="password" type="password" class="form-control" required/>
                       <label for="password" class="form-control-placeholder">Password</label>
                       <span class="fa fa-fw fa-eye field-icon toggle-password" toggle="#password-field"></span>
                    </div>
                    <div class="form-group">

                       <input type="number" name="role" class="form-control" placeholder="Role" id="role" required>
                       <label for="role" class="form-control-placeholder">Role</label>
                   </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
                    </div>

            <div class="form-group d-md-flex">
                <div class="w-50 text-left">
                    <label class="checkbox-wrap checkbox-primary mb-0">
                        Remember Me
                        <input type="checkbox" checked>
                        <span class="checkmark"></span>
                    </label>
                </div>

                    <div class="w-50 text-md-right">
                        <a href="">
                            Forgot Password
                        </a>
                    </div>
            </div>
                </form>
                <p class="text-center">Have a member ? <a data-toogle="tab" href="{{ route('login') }}">Sign In</a></p>

            </div>
        </div>
    </section>

    <script src="{{ asset('js2/jquery.min.js') }}"></script>
  <script src="{{ asset('js2/popper.js') }}"></script>
  <script src="{{ asset('js2/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js2/main.js') }}"></script>

</body>
</html>
