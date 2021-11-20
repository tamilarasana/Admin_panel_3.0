@extends('layouts.master')
@section('title')
@endsection
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Bike Varients
                <a href="{{route('varient.create')}}" class="btn-sm btn-success float-right"><i class="fas fa-plus-square"></i></a>

                <!-- <a hraf="#" class="btn-sm btn-success float-right"data-toggle="modal" data-target="#bikemodel"><i class="fas fa-plus-square"></i></a> -->
                </div>
                  <div class ="card-body">
               <div class="table-responsive">
                <table id ="varient" class="table table-hover">
                <thead class ="thead-dark" style="font-size: 0.7em;">
                            <tr>
                                <!-- <th>Id</th> -->
                                <th>Category</th>
                                <th>Bikemodel</th>
                                <th>Title</th>
                                <th>Description</th>
                                <!-- <th>status</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($varient as $item)
                                <tr>
                                    <!-- <td>{{$item->id}}</td> -->
                                    <td>{{$item->brand->brand_name}}</td>
                                    <td>{{$item->model->title}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{Str::limit($item->description, 20, $end='.....')}}</td>
                                    <!-- <td>{{$item->status}}</td>   -->
                                    <td>
                                        <a href="{{url('/spec-get/'. $item->id)}}" class="btn-sm btn-secondary" ><i class="fas fa-plus-circle"></i></a>
                                        <a href="{{url('varient-edit/'. $item->id)}}"  class="btn-sm btn-info"><i class="far fa-edit"></i></a>
                                        {{-- <a href="{{url('varient-delete/'.$item->id)}}"  class="btn-sm btn-danger"> <i class="fa fa-trash"></i></a> --}}
                                        <a href="#" data-id={{$item->id}} class="btn-sm btn-danger delete" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                         </body>
                    </table>
                </div>
            </div>
        </div>
    </div>

        <!-- Delete Warning Modal -->
<div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('varient.delete', 'id') }}" method="get">
                @csrf
                @method('get')
                <input type="hidden" id="id" name="id">
                Are you sure you want to delete this record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger ml-2"><i class="fa fa-trash"></i>Yes,Delete</button>
                </form>
        </div>
    </div>
</div>
        <!-- End Delete Modal -->

@endsection
@section('scripts')
@if(Session::has('success'))
		<script>
			toastr.success("{!! Session::get('success')!!}");
		</script>
	@endif
<script>
$(document).ready( function () {
    $('#varient').DataTable();
} );
</script>

<script>
    $(document).on('click','.delete',function(){
         let id = $(this).attr('data-id');
         $('#id').val(id);
    });
</script>

@endsection
