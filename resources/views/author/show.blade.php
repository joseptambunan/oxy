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
              <form role="form" action="{{ url('/')}}/author/update" method="post" name="form1">
                {{ csrf_field() }}
                <input type="hidden" name="author_id" value="{{$data['author']->id}}">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Author</label>
                    <input type="text" class="form-control" id="nama_author" name="nama_author" value="{{$data['author']->name }}" required autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{$data['author']->email }}" required autocomplete="off">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ url('/')}}/author" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <td>No.</td>
                  <td>Buku</td>
                </tr>
              </thead>
              <tbody>
                @foreach ( $data['author']->books as $key => $value )
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $value->detail->name }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
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
