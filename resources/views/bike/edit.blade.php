@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"> Bike Models </div>
            <div class ="card-body">
            <form action="{{ url('bike-update/'.$product->id) }}" method = "post" enctype="multipart/form-data">
            {{csrf_field()}}
          <!-- {{method_field('PUT')}} -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="name"  value="{{$product->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">About Bike</label>
                    <input type="text" name="about_bike" id="name"  value="{{$product->about_bike}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select required class="form-control" name="category_id" id="category_id">
                        @foreach($category as $key => $data)
                        <option  {{ $product->category_id === $data->id? 'selected' : ''}}  value="{{$data->id}}">{{$data->brand_name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="">Bike Model</label>
                    <select required class="form-control" name="bikemodel_id" id="bikemodel_id">
                        <option value="{{$product->id}}">{{$product->model->title}}</option>
                        @foreach($model as $key => $data)
                        <option  {{ $product->bikemodel_id === $data->id? 'selected' : ''}}  value="{{$data->id}}">{{$data->title}}</option>
                        @endforeach
                </select>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Varient</label>
                    <select  class="form-control" name="varient_id" id="varient_id">
                    <option value="{{$product->id}}">{{$product->varient->title}}</option>
                        @foreach($varient as $key => $data)
                        <option  {{ $product->varient_id === $data->id? 'selected' : ''}}  value="{{$data->id}}">{{$data->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" name="price" id="price" value="{{$product->price}}"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Route</label>
                  <input type="text" name="route" id="route" value="{{$product->route}}"  class="form-control" >
              </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea type="text" name="description"   id="description"  row="3" class=" form-control">{{$product->description}}</textarea>
                </div>

                <div class ="for-group">
                    <label for="">Image</label>
                    <input type="file" name="image[]"  id="image" class="form-control"  multiple required>
                    @foreach (explode('|', $product->image) as $image)
                          <img src="{{URL::to($image)}}" height="100px" width="100px" />

                          @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <a href ="{{url('bike.index')}}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
