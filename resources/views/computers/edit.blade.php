@extends('layout')
@section('title','Edit Computer')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <h1> Edit an old Computer </h1>
        </div>
        <div class="flex justify-center">
            <form action="{{route('computers.update', ['computer'=>$computer->id])}}" method="post">
                @csrf
                @method('PUT')
                <div>
                    <label for="computer-name">Computer Name</label>
                    <input id="computer-name" name="name" value="{{$computer['name']}}" type="text">
                    @error('name')
                       <div class="form-error">
                        {{$message}} 
                       </div>
                    @enderror
                </div>

                <div>
                    <label for="computer-origin">Computer Origin</label>
                    <input id="computer-origin" name="origin" value="{{$computer['origin']}}" type="text">
                    @error('origin')
                    <div class="form-error">
                     {{$message}} 
                    </div>
                 @enderror
                </div>

                <div>
                    <label for="computer-price">Computer Price</label>
                    <input id="computer-price" name="price" value="{{$computer['price']}}" type="text">
                    @error('price')
                    <div class="form-error">
                     {{$message}} 
                    </div>
                 @enderror
                </div>

                <div>
                    <button  type="submit">Submit</button>
                </div>
            </form>
        </div>
        
    </div>
@endsection
           
