@extends('layouts.app')
@section('content')
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>


<body>
    <div class="text-center">
        <h1>Room list</h1>

    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif




    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">location</th>
                    <th scope="col">Rent</th>
                    <th scope="col">WhatsApp</th>
                    <th scope="col">status</th>

                    <th scope="col">Elcetricity , Wifi</th>

                    <th scope="col">room_type</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>


                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($valueData as $data)

                <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $data->location }}</td>
                    <td>{{ $data->rent }}</td>
                    <td>{{ $data->number }} </td>
                    <td>{{ $data->status }} </td>
                    <td>{{ $data->tax }} </td>
                    <td>{{ $data->room_type }} </td>
                    <td>
                        <img src="{{ asset('storage/images/' . $data->space_image) }}" alt="Bed Image" style="width: 90px; height: 50px;">

                    </td>



                    <td>
                        <div class="btn-group">
                            <a href="{{ route('room.space.edit', $data->id) }}">
                                <button class="p-1 btn btn-md btn-success me-1"><i class="fas fa-edit"></i></button>
                            </a>
                            <form action="{{ route('room.space.delete') }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="data_delete_id" value="{{ $data->id }}">
                                <button class="p-1 btn btn-md btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>

                        </div>
                    </td>


                </tr>

                @endforeach

            </tbody>
        </table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

@endsection