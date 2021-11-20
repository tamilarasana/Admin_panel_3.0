@extends('layouts.master')
@section('title')
@endsection
@section('content')

<div class="continer">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Add New Spectification
                </div>
                <div class ="card-body">
                    <div class="table-responsive">
                        @if($page_type == "add")
                    <form action="{{route('specification.store')}}" method="post" enctype="multipart/form-data">
                       @else
                    <form action="{{ url('specification-update/'.$varient_id) }}" method="post" enctype="multipart/form-data">
                    @endif
                    @csrf
                        <table class="table table-hover">
                        <thead class ="thead-dark" style="font-size: 0.7em;">
                            <tr>
                                <th>Specification Name</th>
                                <th>UpdateList</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($specification_fields as $key => $item)
                                <tr>
                                    <input type="hidden" name="spec[{{$key}}][varient_id]" value="{{$varient_id}}">
                                    <input type="hidden" name="spec[{{$key}}][specname_id]"value="{{ $item['specid']}}">
                                    <input type="hidden" name="spec[{{$key}}][specname]"value="{{$item['specname']}}">
                                    <input type="hidden" name="spec[{{$key}}][status]"  value="1">
                                    <td>{{$item['specname']}}</td>
                                <td>
                                @if(array_key_exists('value',$item))
                                <input type="hidden" name="spec[{{$key}}][updatespeval_id][speval_id]" value="{{$item['speval_id']}}">
                                <input type="text" name="spec[{{$key}}][updatespeval_id][value]"   value="{{$item['value']}}" placeholder ="Enter your Value" class="form-control"></td>
                                @else
                                <input type="text" name="spec[{{$key}}][value]"   value="" placeholder ="Enter your Value" class="form-control"></td>
                                @endif

                                </td>

                                </tr>
                            @endforeach
                        </body>
                        </table>
                           <div class="modal-footer">
                                <a href ="{{route('varient.index')}}" class="btn btn-secondary">Close</a>
                                <button type="submit" class="btn btn-danger sm-3 ">Submit</button>
                           </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image add Model  -->

@endsection

@section('scripts')



@endsection
