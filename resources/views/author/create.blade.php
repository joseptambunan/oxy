<!DOCTYPE html>
<html>
<head>
  @include("header")
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include("sidebar")
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Master Author</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Author</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('/')}}/author/store" method="post" name="form1">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Author</label>
                    <input type="text" class="form-control" id="nama_author" name="nama_author" required autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" required autocomplete="off">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ url('/')}}/" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

            
          </div>
          <!--/.col (left) -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
</div>
<!-- ./wrapper -->


@include("footer")

</body>
</html>
