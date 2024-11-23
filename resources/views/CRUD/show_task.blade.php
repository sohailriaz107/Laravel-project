<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
     
        <div class="buttons" style="display: flex; justify-content: space-between; align-items: center;">
          <div class="left-buttons">
            <a href="{{ route('index') }}" class="btn btn-dark">Add Task</a>
            <a href="{{ route('showCategori') }}" class="btn btn-success">Show Categories</a>
          </div>
          <div class="right-buttons">
            <a href="/create_categori">
              <button type="button" class="btn btn-primary">Add Categori</button>
            </a>
            <a href="/logout">
              <button type="button" class="btn btn-danger">LogOut</button>
            </a>
          </div>
        </div>
       

        <div class="row">
            
            </div>
            <h2>Tasks</h2>
            <div class="col-sm-12">
                <table class="table table-bordered border-dark">
                    <thead>
                        <tr>
                            <th scope="col">#SR</th>
                            <th scope="col">Title</th>
                            <th scope="col">Discription</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Status</th>
                            <th scope="col">image</th>
                            <th scope="col">Categori Name</th>
                            @if (auth()->user()->role === 'Admin')
                                <th scope="col">Action</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($tasks as $tsk)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $tsk->title }}</td>
                                <td>{{ $tsk->description }}</td>
                                <td>{{ $tsk->due_date }}</td>
                                <td>{{ $tsk->priority }}</td>
                                <td>{{ $tsk->status }}</td>
                                <td><img src="products/{{ $tsk->image_path }}" class="rounded-circle" width="50px"
                                        height="50px" alt="/"></td>
                                {{-- <td>{{ $tsk->category_id }}</td> --}}

                                <td>{{ $tsk->category->name }}</td>
                                @if (auth()->user()->role === 'Admin')
                                    <td>
                                <a href="{{ url('edit', $tsk->id) }}" class=" btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('delete', $tsk->id) }}" class=" btn btn-danger   ">DELTE</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
