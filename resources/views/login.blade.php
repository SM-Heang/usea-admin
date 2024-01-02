<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>USEA Admin</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Poppins:wght@300;400;500;600;700&display=swap");
            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            }
            body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ccc;
            font-family: "Poppins", sans-serif;
            }
            .container-login {
            position: relative;
            width: 460px;
            height: 640px;
            border-radius: 12px;
            padding: 20px 30px 120px;
            background: #303f9f;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            }

            .container-login .login-section {
            margin-top: 30px;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: calc(100% + 180px);
            padding: 20px 140px;
            height: 100%;
            transition: all 0.6s ease;
            }
            .container-login form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            }
            .container-login form header {
            display: flex;
            flex-direction: column;
            /* justify-content: center; */
            align-items: center;
            font-size: 30px;
            text-align: center;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            }
            .container-login form header img {
            width: 100px;
            height: 100px;
            }
            .login-section input {
            border: 1px solid #aaa;
            }
            .container-login form input {
            outline: none;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            color: #333;
            font-weight: 400;
            border-radius: 8px;
            background: #fff;
            }
            .container-login form input:focus {
            border: 1px solid #000;
            }
            .separator {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            }
            .line {
            width: 100%;
            height: 1px;
            background: #ccc;
            }
            .container-login form .btn-login {
            margin-top: 15px;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            }
            .container-login form .btn-login:hover {
            background: #4d61e4;
            color: #fff;
            border: 1px solid #fff;
            }
        </style>
  </head>
  <body>
    <!-- Page content-->
    <div class="container-login">
        <div class="login-section">
          <form method="POST" action="{{ route('authenticate') }}">
            @csrf
            <header>
              <img src="{{ asset('media/asset/LOGO_UPDATE_2022.png') }}" alt="USEA LOGO" />Admin Login
            </header>
            <div class="separator">
              <div class="line"></div>
            </div>
            <input type="email" placeholder="Email adress" class="@error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required />
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            <input type="password" placeholder="Password" id="password" name="password" required />
            <button type="submit" class="btn-login">Login</button>
          </form>
        </div>
      </div>
    {{-- <div class="d-flex justify-content-center mt-5">
      <div class="card p-3 w-25">
        <h3>Admin Login</h3>
        <form method="POST" action="{{ route('authenticate') }}">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}"/>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password"/>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div> --}}

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
