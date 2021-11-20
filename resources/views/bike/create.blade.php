@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">About Bike</div>
            <div class ="card-body">
            <form action="{{route('bike.store')}}" method = "post"  enctype="multipart/form-data" >
                {{csrf_field()}}
                <div class="modal-body">
          <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" name="name" id="name"  class="form-control" placeholder = "Please Enter Name" required>
              </div>
              <div class="form-group">
                  <label for="">About Bike</label>
                  <input type="text" name="about_bike" id="name"  class="form-control" placeholder = "Enter About Bike" required>
              </div>
              <div class="form-group">
                  <label for="">Category</label>
                      <select  class="form-control" name="category_id" id="category_id" required>
                      <option value="">Choose Our Category</option>
                      @foreach($category as $key => $data)
                        <option value="{{$data->id}}">{{$data->brand_name}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label for="">Bike Model</label>
                  <select  class="form-control" name="bikemodel_id" id="bikemodel_id" required>
                    <option value="">Choose Our Model</option>
                    @foreach($model as $key => $data)
                        <option value="{{$data->id}}">{{$data->title}}</option>
                    @endforeach

                </select>
              </div>
              <div class="form-group">
                  <label for="">Varient</label>
                      <select  class="form-control" name="varient_id" id="varient_id" required>
                      <option value="">Choose Our Varient</option>
                      @foreach($varient as $key => $data)
                        <option value="{{$data->id}}">{{$data->title}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label for="">Price</label>
                  <input type="text" name="price" id="price"  class="form-control" placeholder = "Please Enter Price" required>
              </div>
              <div class="form-group">
                  <label for="">Route</label>
                  <input type="text" name="route" id="route"  class="form-control" placeholder = "Please Enter Route" required>
              </div>
              <div class="form-group">
                  <label for="">Description</label>
                  <textarea type="text" name="description" id="description" row="3" class=" form-control" placeholder = "Description" required></textarea>
              </div>
               <div class ="for-group">
                        <label for="">Image</label>
                        <input type="file" name="image[]" id="image" class="form-control"  multiple required>
                </div>
              <div class="modal-footer">
                    <a href ="{{url('bike.index')}}" class="btn btn-secondary">Close</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
