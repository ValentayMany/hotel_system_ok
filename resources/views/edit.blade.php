@extends('layout.Add')

@section('title', 'AddBook')

<style>
    label{
        display: inline-block;
        width: 200px;
        color: white;
         }
    .div_deg{
        color: rgb(7, 7, 6);
        font:bold;
        padding: 10px;
    }
</style>
@section('contents')
   

    <form method="POST" action="{{ route('admin/upload',$room->id) }}" enctype="multipart/form-data">

        @csrf 
        <div class="div_deg">
            <label for="">room_type_id</label>
           <select name="room_type_id" id="" required value="{{$room->room_type_id}}">
               <option value="">Select Room Type</option>
               @foreach ($data as $room_type)
                   <option value="{{ $room_type->id }}">{{ $room_type->name }}</option>
               @endforeach
        </div>

        <div class="div_deg">
            <label for="">room_number</label>
            <input type="text" name="room_number" required value="{{$room->room_number}}">
        </div>

        <div class="div_deg">
            <label for="">description </label>
            <input type="text" name="description" required value="{{$room->description}}">
        </div>

        <div class="div_deg">
            <label for="">Images</label>
            <input type="file" name="image" required value="{{$room->image}}">
        </div>

        <div class="div_deg">
            <label for="">price</label>
            <input type="text" name="price" required value="{{$room->price}}">
        </div>

        <div class="div_deg">
            <input type="submit" value="Add Room" class="btn btn-warning">
        </div>
    
    </form>


@endsection



