@extends('layouts.master')
@section('title')
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"> Brochure
                <a href="{{route('brochure.create')}}" class="btn-sm btn-success float-right"><i class="fas fa-plus-square"></i></a>
            </div>
            <div class ="card-body">
                <div class="table-responsive">
                <table id="category" class="table table-hover">
                    <thead class ="thead-dark" style="font-size: 0.7em;">
                        <tr>
                            <th>Model</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brochures as $brochure)
                        <tr>
                            <td>{{$brochure->title}}</td>
                            <td><a href="{{$brochure->title}}">File</a></td>
                        <td> <a href="{{route('brochure-edit', $brochure->id)}}"  class="btn-sm btn-info"><i class="far fa-edit"></i></a>
                            <a href="{{route('brochure-delete', $brochure->id)}}"  class="btn-sm btn-danger"> <i class="fa fa-trash"></i></a>
                        </td>
                        </tr>
                        @endforeach
                    </body>
                </table>
            </div>
        </div>
    </div>
</div>




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


@endsection
