@extends('layout.layout')
@section('content')

<div class="card-info">
    <div class="card-header">
        <h3>Detail Cars</h3> 
    </div>
    <div class="card-body">
        @foreach($data as $add)
        
        <table border="0">
            <tr>
                <td>Type Car
                </td>
                <td>:</td>
                <td>{{$add->type_car}}</td>
            </tr>
            <tr>
                <td>Year Car
                </td>
                <td>:</td>
                <td>{{$add->year_car}}</td>
            </tr>
            <tr>
                <td>Colour Car
                </td>
                <td>:</td>
                <td>{{$add->colour_car}}</td>
            </tr>
            <tr>
                <td>Remarks
                </td>
                <td>:</td>
                <td>{{$add->remarks}}</td>
            </tr>

        </table>
    
        <button class="btn btn-info" data-toggle="modal"  data-ids="{{$add->id}}" data-target="#modal-addimage">Add More Image</button>
        @endforeach
      <p>
        @foreach($image as $add)
        <img src="{{asset('image')}}/{{$add->file}}" class="img-circle elevation-2" height="150" width="180" alt="User Image">
       @endforeach
    </div>
    <div class="card-footer">

        <a href="/cars" class="btn btn-danger">Back</a>
    </div>
</div>



<div class="modal fade" id="modal-addimage">
    <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <i class="fas fa-fw fa-plus-circle"></i><span>Add &nbsp;<b>Image</b></span>
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
          <form method="post" enctype="multipart/form-data" action="/carsimage/store">
           @csrf
            
            <div class="form-group">
              <label for="Nama ">File Image</label>
                <input type="file" class="form-control" name="file" />
                @foreach($id as $ids)
                <input type="text" value="{{$ids->id}}" name="cars_id" class="form-control" hidden>
                @endforeach
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
        $('#modal-addimage').on('show.bs.modal', function (event){
          var button = $($event.relatedTarget)
          var id = button.data('ids')
          var modal = $(this)
        
          modal.find('.modal-body #id').val(id);
        })
        </script>
@endsection