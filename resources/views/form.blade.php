<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <title>Form</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Styles -->
</head>

<body class="antialiased">
<div class="container">
    @if (session()->has('success'))
        <div class="alert alert-success mt-5">
             {{ session('success') }}
        </div>
    @endif
    <div id="form_1254">
        <form method="post" action="{{ route('store') }}">
            @csrf;
            {{--@dd(json_decode($data->json))--}}
            <input type="hidden" name="form_id" value="{{$data->id}}">

            @foreach(json_decode($data->json) as $value)
                @if($value->type == 'header')
                    <h1>{{ $value->type }}</h1>
                @endif

                @if($value->type == 'autocomplete')
                    <select class="form-control mb-3" name="{{$value->name}}" id="">
                        @foreach($value->values as $values)
                            <option value="{{ $values->value }}">{{ $values->label }}</option>
                        @endforeach
                    </select>
                @endif

                @if($value->type == 'date')
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">{{ $value->label }}</label>
                        <input type="{{ $value->type }}" class="form-control" name="{{ $value->name }}">
                    </div>
                @endif

                @if($value->type == 'text')
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">{{ $value->label }}</label>
                        <input type="{{ $value->type }}" class="form-control" name="{{ $value->name }}">
                    </div>
                @endif


                @if($value->type == 'textarea')
                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">{{ $value->label }}</label>
                        <textarea class="form-control" name="{{ $value->name }}" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                @endif

                @if($value->type == 'button')
                    <div class="form-group mb-3">
                        <button type="{{ $value->subtype }}" class="btn btn-primary">{{ $value->label }}</button>
                    </div>
                @endif
            @endforeach
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>
