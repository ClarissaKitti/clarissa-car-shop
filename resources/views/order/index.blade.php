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
</div>
<h3>Data Order</h3>
<div class="card card-info">
<div class="card-header">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-addcars">Input data</button>
 
</div>
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Nomor Order</th>
        <th>Nama Mobil</th>
        <th>Nama Customer</th>
        <th>Alamat</th>
        <th>Tanggal Order</th>
        <th>Price</th>
        <th>Tipe Pembayaran</th>
        <th>Deskripsi</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      </thead>
      <tbody>
          @foreach($order as $add)
      <tr>
        <td>{{$add->id}}</td>
        <td>{{$add->type_car}}</td>
        <td>{{$add->nama_cust}}</td>
        <td>{{$add->alamat}}</td>
        <td> {{$add->date}}</td>
        <td> {{$add->price}}</td>
        <td> {{$add->type_payment}}</td>
        <td> {{$add->order_desc}}</td>
        <td><a href="/order/edit/{{$add->id}}" class="btn btn-primary">Edit</a></td>
        <td>
            <form action="/order/delete/{{$add->id}}" method="post">
              @csrf
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
      </tr>
      @endforeach
      </tbody>
      <tfoot>
      <tr>
        <th>Nomor Order</th>
        <th>Nama Mobil</th>
        <th>Nama Customer</th>
        <th>Alamat</th>
        <th>Tanggal Order</th>
        <th>Price</th>
        <th>Tipe Pembayaran</th>
        <th>Deskripsi</th>
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
            <i class="fas fa-fw fa-plus-circle"></i><span>Tambah &nbsp;<b>Data</b></span>
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
        <form method="post" enctype="multipart/form-data" action="/order/store">
          @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="Nama ">Choose Car</label>
                <select name="cars_id" class="form-control select2bs4">
                @foreach($cars as $add)
                <option value="{{$add->id}}">{{$add->type_car}} | {{$add->year_car}} | {{$add->colour_car}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Nama ">Choose Customer</label>
                <select name="custs_id" class="form-control select2bs4">
                @foreach($cust as $add)
                <option value="{{$add->id}}">{{$add->nama_cust}} | {{$add->email}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Nama ">Date</label>
                  <input type="date" class="form-control" name="date" />
            </div>
            <div class="form-group">
                <label for="Nama ">Price</label>
                  <input type="number" class="form-control" name="price" />
            </div>
            <div class="form-group">
                <label for="Nama ">Tipe Pembayaran</label>
                <select name="type_payment" class="form-control">
                    <option value="Cash">Cash on Demand</option>
                    <option value="Transfer">Transfer</option>
                </select>
                
            </div>
            <div class="form-group">
                <label for="Nama ">Deskripsi</label>
                  <textarea class="form-control" name="order_desc"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Add Order">
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
      $('.select2').select2()
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    });
  </script>

@endsection