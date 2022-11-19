<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Form</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            .frmb:after{
                display: none;
            }
        </style>
    </head>

    <body class="antialiased">
        <div class="container-fluid">
            <a class="btn btn-primary mt-3 mb-5" href="{{route('list')}}">Form List</a>
            <input type="hidden" id="form_id" value="{{ $data->id }}">
            <div id="fb-editor">
{{--                {!! $data->form !!}--}}
            </div>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
    <script>
    $(document).ready(function(){
        var formBuilder = $(document.getElementById('fb-editor')).formBuilder();
        setTimeout(function(){
            $('#fb-editor .frmb').html('<?= $data->form ?>');
        }, 1000);
        $(document).on('click','.save-template',function(){
            var ddd = $('#fb-editor ul').html();
            var id = $('#form_id').attr('value');
            var json_data = $('.get-data').html();
            console.log(json_data);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/update/' + id+'?_method=PUT',
                method: 'post',
                dataType: 'json',
                data: { form: ddd, form_id: id, json_data: formBuilder.formData },
                complete: function (data) {
                    if (data.success) {
                        window.location.href = "http://127.0.0.1:8000/list";
                    }
                }
            });
        })
    });
  </script>
    </body>
</html>
