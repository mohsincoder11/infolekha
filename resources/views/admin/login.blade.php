<!DOCTYPE html>
<html>
<head>
  <link href="{{asset('website_asset/images/favicon.png')}}" rel="shortcut icon">

  <title>Admin Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    .container {
      width: 400px;
      margin: 100px auto;
      background-color: #fff;
      padding: 40px 20px 40px 20px;
      border-radius: 4px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .container h2 {
      text-align: center;
    }
    div input {
      padding: 10px;
    }

    .container label,
    .container input[type="text"],
    .container input[type="password"],
    .container input[type="submit"] {
      display: block;
      width: 100%;
      margin-bottom: 10px;
      box-sizing: border-box;
    }
    
    .container input[type="submit"] {
      background-color: #073D5F;
      color: #fff;
      border: none;
      padding: 10px;
      cursor: pointer;
    }
    .error {
            color: #ff0202 !important;
            font-size: 14px !important;
        }
  </style>
</head>
<body>
  <div class="container">
    <h2>Admin Login</h2>
    <form action="{{route('admin.post_login')}}" method="POST" id="form1">
        @csrf
      <div>
        <label for="username">Email:</label>
      <input type="text" id="username" name="email" required>
    </div>
    <div>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
    </div>
      
      <input type="submit" value="Login">
    </form>
  </div>
  <script src="{{asset('website_asset/javascript/jquery.min.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>

  <script>

    $("#form1").validate({
            rules: {
                    email: {
                    required: true,
                    email:true,
                },
                password: {
                    required: true,

                },
               
            },
            messages: {
              
                email: {
                    required: "This field is required.",
                    email: "Please enter valid email address.",
                },
                password: {
                    required: "This field is required.",

                },
               
            },
            submitHandler: function(form) {
                return true;
            },
            errorPlacement: function(error, element) {
              
                    element.closest('div').after(error);

            },
        });
  </script>
</body>
</html>
