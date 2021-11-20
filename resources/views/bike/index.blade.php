@extends('layouts.master')
@section('title')
@endsection
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Bike Models
                {{-- <a href="{!! route('image.index')!!}"class="btn btn-info float-right  mr-1">Image</a> --}}
                <!-- <a href="#"class=" colour_code btn btn-info float-right  mr-1">Create Colour</a> -->
                <a href="{!! route('bike.create')!!}" class="btn-sm btn-success float-right"><i class="fas fa-plus-square"></i></a>

                <!-- <a hraf="#" class="btn btn-primary float-right"data-toggle="modal" data-target="#bikemodel"  >Add</a> -->
              </div>
                  <div class ="card-body">
               <div class="table-responsive">
                <table  id ="bike" class="table table-hover">
                <thead class ="thead-dark" style="font-size: 0.7em;">
                            <tr>
                                <!-- <th>Id</th> -->
                                <th>Name</th>
                                <th>About Bike</th>
                                <th>Category</th>
                                <th>Bikemodel</th>
                                <th>Varient</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Image</th>

                                {{-- <th>Colour</th> --}}

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                      @foreach($product as $item)
                        <tr>
                                <!-- <td>{{$item->id}}</td> -->
                                <td>{{$item->name}}</td>

                                <td>{{Str::limit($item->about_bike, 50, $end='.....')}}</td>
                                <td>{{$item->brand->brand_name}}</td>
                                <td>{{$item->model->title}}</td>
                                <td>{{$item->varient->title}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{Str::limit($item->description, 50, $end='.....')}}</td>
                                <td>
                                    <div class="row" >
                                        @foreach (explode('|', $item->image) as $image)
                                        <div style="width: 30px; height: 30px; margin:3px" >
                                                <img src="{{URL::to($image)}}" height="30" widht="30"/>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                                {{-- <td><a href="{{url('/bike-colour/'.$item->id)}}"><i class="fas fa-palette "></i></a></td> --}}
                                <td>
                                <a href="{{url('/bike-colour/'.$item->id)}}"><i class="fas fa-palette "></i></a>

                                  {{-- <a href="{{url('/spec-get/'. $item->id)}}"><i class="fas fa-plus-circle"></i></a> --}}
                                  <a href="{{url('/bike-edit/'. $item->id)}}" ><i class="far fa-edit"></i></a>
                                  {{-- <a href="{{url('bike-delete/'.$item->id)}}" > <i class="fa fa-trash"></i></a> --}}
                                  <a href="#" data-id={{$item->id}} class="delete" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>
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
            <form action="{{ route('bike.delete', 'id') }}" method="get">
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
    $('#bike').DataTable();
} );
</script>
<script>
    $(document).on('click','.delete',function(){
         let id = $(this).attr('data-id');
         $('#id').val(id);
    });

</script>

@endsection





