@extends('layout.layout')
@section('content')
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      {{ session()->get('success') }}  
    </div><br />
  @endif
  @if(session()->get('danger'))
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      {{ session()->get('danger') }}  
    </div><br />
  @endif
  @if(session()->get('info'))
    <div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      {{ session()->get('info') }}  
    </div><br />
  @endif
</div>
<h3>Merci Cars</h3>
<div class="card card-info">
<div class="card-header">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-addcars">Add Cars</button>
   
</div>
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Detail</th>
        <th>Type Car</th>
        <th>Year Car</th>
        <th>Colour Car</th>
        <th>Remarks</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      </thead>
      <tbody>
          @foreach($cars as $add)
      <tr>
        <td><a href="cars/detail/{{$add->id}}"><i class="fas fa-eye"></i></a></td>
        <td>{{$add->type_car}}</td>
        <td>{{$add->year_car}}</td>
        <td>{{$add->colour_car}}</td>
        <td> {{$add->remarks}}</td>
        <td><a href="/cars/edit/{{$add->id}}" class="btn btn-primary">Edit</a></td>
        <td>
            <form action="/cars/delete/{{$add->id}}" method="post">
              @csrf
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
      </tr>
      @endforeach
      </tbody>
      <tfoot>
      <tr>
        <th>Detail</th>
        <th>Type Car</th>
        <th>Year Car</th>
        <th>Colour Car</th>
        <th>Remarks</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      </tfoot>
    </table>
  </div>
</div>

<div class="modal fade" id="modal-addcars">
    <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <i class="fas fa-fw fa-plus-circle"></i><span>Tambah &nbsp;<b>Produk</b></span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div><br />
        @endif
          <form method="post" enctype="multipart/form-data" action="/cars/store">
           @csrf
            <div class="form-group">
                <label for="Nama ">Type Car</label>
                  <input type="text" class="form-control" name="type_car" />
            </div>
            <div class="form-group">
                <label for="Nama ">Year Car</label>
                  <input type="text" class="form-control" name="year_car" />
            </div>
            <div class="form-group">
                <label for="Nama ">Colour Car</label>
                  <input type="text" class="form-control" name="colour_car" />
            </div>
            <div class="form-group">
              <label for="Nama ">File Image</label>
                <input type="file" class="form-control" name="file" />
          </div>
            <div class="form-group">
                <label for="Nama ">Remarks</label>
                  <textarea class="form-control" name="remarks"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Add Cars">
        </form>
        </div>
    </div>
    </div>
    </div>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection