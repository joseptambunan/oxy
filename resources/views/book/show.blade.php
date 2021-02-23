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
            <h1>Master Buku</h1>
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
                <h3 class="card-title">Data Buku</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('/')}}/book/update" method="post" name="form1">
                {{ csrf_field() }}
                <input type="hidden" name="book_id" value="{{$data['book']->id}}">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Buku</label>
                    <input type="text" class="form-control" id="nama_buku" name="nama_buku" required autocomplete="off" value="{{$data['book']->name}}">
                  </div>
                  <div class="form-group">
                    <label>Kode Buku</label>
                    <input type="text" class="form-control" id="kode_buku" name="kode_buku" required autocomplete="off" value="{{$data['book']->kode_buku}}">
                  </div>
                  <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" class="form-control" id="tahun" name="tahun" required autocomplete="off" maxlength="4" value="{{$data['book']->tahun_terbit}}">
                  </div>
                  <div class="form-group">
                    <label>Author</label>
                    <select class="form-control author" name="author[]"  multiple="multiple" >
                      @foreach($data['author'] as $key => $value )
                        <option value="{{$value->id}}">{{ $value->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  @if ( count($data['author']) >0 )
                    <button type="submit" class="btn btn-primary">Submit</button>
                  @endif
                  <a href="{{ url('/')}}/" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

            
          </div>
          <!--/.col (left) -->
          <!-- /.card -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <td>No.</td>
                  <td>Author</td>
                </tr>
              </thead>
              <tbody>
                @foreach ( $data['book']->authors as $key => $value )
                <tr>
                  <td>{{$key + 1}}</td>
                  <td>{{$value->author->name}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
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
