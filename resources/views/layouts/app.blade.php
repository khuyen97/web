<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="app">
    <form action="{{route('ndvt.store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="form-label" for="title">Nguoi dung:</label>

        <select class="form-control" id="sel1" name="giangvien">
            @foreach($nd as $g)
            <option value="{{$g->nguoidungID}}">{{$g->tennguoidung}}</option>
            @endforeach
        </select>

        <label class="form-label" for="title">Vai tro:</label>

        <select class="form-control" name="monhoc">
            @foreach($vt as $m)
            <option value="{{$m->vaitroID}}">{{$m->tenvaitro}}</option>
            @endforeach
        </select>

        <label class="form-label" for="title">Ngay cap:</label>
        <input class="form-control" type="date" placeholder="Chon..." name="date" required></br>
        <button type="submit" class="btn btn-primary">Luu</button>
    </form>
    <table class="table table-striped">
    <tr>
    <th>Nguoi dung</th>
    <th>Vai tro</th>
    <th>Ngay cap</th>
    <th>Hanh dong<th>
    </tr>
    @foreach($ndvt as $gd)
    <tr>
    <td id="nd{{$gd->id}}">{{$gd->nguoidung->tennguoidung}}</td>
    <td id="vt{{$gd->id}}">{{$gd->vaitro->tenvaitro}}</td>
    <td id="nc{{$gd->id}}">{{$gd->ngaycap}}</td>
    <td>
    <form style="display:inline" method="POST" class="form-inline" action="{{ route('ndvt.destroy',[$gd->id]) }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE" >
		<button type="submit" class="btn btn-danger btn-sm">Xoa</button>
	</form>
    <button class="btn btn-info btn-sm" style="display:inline" id="edit{{$gd->id}}">Sua</button>
    <form style="display:inline" method="POST" class="form-inline" action="" id="form{{$gd->id}}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" style="display:none" class="btn btn-primary btn-sm" id="post{{$gd->id}}"></button>
	</form>
    <button style="display:inline" class="btn btn-primary btn-sm" id="save{{$gd->id}}" disabled>Luu</button>
    </tr>
    @endforeach
    </table>
    </div>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
    @foreach($ndvt as $gd)
    $("#edit{{$gd->id}}").on('click',function() {
        var html1 = `<select class="form-control" name="giangvien" id="nd{{$gd->id}}f">
            @foreach($nd as $g)
            @if($g == $gd->nguoidung)
            <option value="{{$g->nguoidungID}}" selected>{{$g->tennguoidung}}</option>
            @else
            <option value="{{$g->nguoidungID}}">{{$g->tennguoidung}}</option>
            @endif
            @endforeach
        </select>`;
        $("#nd{{$gd->id}}").empty();
        $("#nd{{$gd->id}}").html(html1);
        var html2 = `<select class="form-control" name="monhoc" id="vt{{$gd->id}}f">
            @foreach($vt as $m)
            @if($m == $gd->vaitro)
            <option value="{{$m->vaitroID}}" selected>{{$m->tenvaitro}}</option>
            @else
            <option value="{{$m->vaitroID}}">{{$m->tenvaitro}}</option>
            @endif
            @endforeach
        </select>`;
        $("#vt{{$gd->id}}").empty();
        $("#vt{{$gd->id}}").html(html2);
        var html3 = `<input class="form-control" type="date" placeholder="Chon..." name="date" required value="{{$gd->ngaycap}}" id="nc{{$gd->id}}f"></br>`;
        $("#nc{{$gd->id}}").empty();
        $("#nc{{$gd->id}}").html(html3);
        document.getElementById("save{{$gd->id}}").disabled = false;
    });
    $("#save{{$gd->id}}").on('click',function() {
        $('#form{{$gd->id}}').attr('action', '/{{$gd->id}}/' + $("#nd{{$gd->id}}f").val() + '/' + $("#vt{{$gd->id}}f").val() + '/' +$("#nc{{$gd->id}}f").val());
        document.getElementById("post{{$gd->id}}").click();
    })
    @endforeach
    </script>
</body>
</html>
