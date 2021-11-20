@extends('layouts.master')
@section('title')
@endsection
@section('content')

<div class="continer">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header"> Add New Spectification
                <a href="{{route('specname.index')}}"  class="btn-sm btn-info float-right mr-1"><i class="far fa-edit"></i></a>
                <a href="{{route('specification.create')}}" class="btn-sm btn-success float-right  mr-1"><i class="fas fa-plus-square"></i></a>


            </div>
                <div class ="card-body">
               <div class="table-responsive">
                <table class="table table-hover">
                <thead class ="thead-dark" style="font-size: 0.7em;">

                            <tr>
                                <th>Id</th>
                                <th>Product Name</th>
                                <th>Specification Name</th>
                                <th>Value</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($specification as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->bike->name}}</td>
                                <td>{{$item->specName->specname}}</td>
                                <td>{{$item->value}}</td>


                                    @if($item->status == 1)
                                      <td>Active</td>
                                    @else
                                      <td>Deactive</td>
                                    @endif
                                <td>
                                <a href="{{url('specification-edit/'.$item->id)}}"  class="btn-sm btn-info"><i class="far fa-edit"></i></a>

                                <a href="{{url('specification-delete/'.$item->id)}}"  class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                            </tr>
                            @endforeach


                        </body>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Image add Model  -->

@endsection

@section('scripts')
<script>
			toastr.success("{!! Session::get('success')!!}");
		</script>
	@endif



@endsection
