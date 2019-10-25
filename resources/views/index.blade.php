<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-12 py-3">

                <form action="{{route('store')}}" method="POST">
                    @csrf
                    <label>Name : </label> <input type="text" name="name" />
                    <button class="btn btn-primary" type="submit">Create</button>
                </form>

            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <table class="table py-3">
                    <thead>
                        <tr>
                            <th scope="col">No. ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Parity (Odd/Even)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- LOGIC START -->
                        @foreach ($data as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->parity}}</td>
                            </tr>
                        @endforeach
                        <!-- LOGIC END -->
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>
