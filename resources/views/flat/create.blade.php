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

    <title>Task!</title>
</head>


<body>
    <div class="text-center">
        <h1>Add Flat</h1>

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
        <form method="post" action="{{ route('flat.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <label for="id" class="form-label">location</label>

                    <input type="text" name="location" class="form-control" placeholder="location">



                    <label for="rent" class="form-label"> Rent</label>
                    <input type="text" name="rent" class="form-control" placeholder="rent">
                    <label for="number" class="form-label"> WhatsApp</label>
                    <input type="text" name="number" class="form-control" placeholder="number">

                    <label for="flat_image" class="form-label">Image</label>
                    <input type="file" name="flat_image" class="form-control">




                </div>
                <div class="col">
                    <label for="status" class="form-label"> status</label>
                    <select name="status" class="form-control">
                        <option value="Furnished">Furnished</option>
                        <option value="No Furnished">No Furnished</option>

                    </select>
                    <label for="tax" class="form-label">Elcetricity , Wifi</label>
                    <select name="tax" class="form-control">
                        <option value="Included">Included</option>
                        <option value="Not_Included">Not Included</option>

                    </select>
                    <label for="status" class="form-label"> room_type</label>
                    <select name="room_type" class="form-control">
                        <option value="Ac">Ac</option>
                        <option value="Non_Ac">Non Ac</option>

                    </select>
                </div>
            </div>
            <br>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Save</button>
            </div>


        </form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
@endsection