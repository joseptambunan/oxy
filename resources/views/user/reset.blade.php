<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  @include("header")
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Forgot Password</p>

      <form action="{{url('/')}}/reset" method="post">
        {{ csrf_field()}}
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="email" autocomplete="off" placeholder="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Reset</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@include("footer")
<script type="text/javascript">
  function login(){
    var request = $.ajax({
      url : "{{url('/')}}/user/login",
      dataType : "json",
      data : {

      }
    });
  }
</script>
</body>
</html>
