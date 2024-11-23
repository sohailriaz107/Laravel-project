<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registeraion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Registeraion</h1>
      
        @if(session('error'))
        <div class="alert alert-danger">
         {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
           
            <div class="card">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="role" name="role" class="form-control" id="role" placeholder="role name" required>
            </div>
            <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/login"><button type="button" class="btn btn-secondary">Login</button></a>
         </div>
        </div>
        </form>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    


    </div>
    
    







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>