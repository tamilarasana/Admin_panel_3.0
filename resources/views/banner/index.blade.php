@extends('layouts.master')
@section('title')
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"> Banner Image
                <a href="{{route('banner.create')}}" class="btn-sm btn-success float-right"><i class="fas fa-plus-square"></i></a>
            </div>
            <div class ="card-body">
                <div class="table-responsive">
                <table id="category" class="table table-hover">
                    <thead class ="thead-dark" style="font-size: 0.7em;">
                        <tr>
                            <th>Bennar Image</th>
                            <th>Position</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach($banners as $banner)
                        <td><img src="{{asset($banner->banner_img)}}" height="75px" width="75px" /> </td>
                        <td>{{$banner->position}}</td>
                        @if($banner->type == 1)
                        <td>Desktop View</td>
                      @else
                        <td>Mobile View</td>
                      @endif
                        {{-- <td> <a href="{{route('banner-edit', $banner->id)}}"  class="btn-sm btn-info"><i class="far fa-edit"></i></a> --}}
                         {{-- <td>   <a href="{{route('banner-delete',$banner->id)}}"  class="btn-sm btn-danger"> <i class="fa fa-trash"></i></a> --}}
                       <td> <a href="#" data-id={{$banner->id}} class="btn-sm btn-danger delete" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>

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
            <form action="{{ route('banner.delete', 'id') }}" method="get">
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
<!-- {!! Toastr::message() !!} -->


@endsection

@section('scripts')
@if(Session::has('success'))
<script>
toastr.success("{!! Session::get('success')!!}");
</script>
@endif

<script>

$(document).ready( function () {
$('#category').DataTable();
} );
</script>

<script>
    $(document).on('click','.delete',function(){
         let id = $(this).attr('data-id');
         $('#id').val(id);
    });
</script>



@endsection



