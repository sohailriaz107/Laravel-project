<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
    
  @if (session('error'))
  <div class="alert alert-danger">
      {{ session('error') }}
  </div>
  @endif
      <div class="row">
      <div class="col-5 mt-2">
        <div class="card">
          <div class="card-header">
        <h1>Login</h1>
      </div>
       
        <form action="{{ route('loginMatch') }}" method="POST">
        @csrf
      <div class="card-body">
         <div class="col-sm-8">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                
                @error('email')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
               @enderror
                
            </div>
          </div>
          <div class="col-sm-8">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                @error('password')
                {{ $message }}
              @enderror
            </div>
          </div>
          <div class="col-sm-6 mt-3">
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="/"><button type="button" class="btn btn-secondary">Back</button></a>
           <div class="col-sm-6">
        </div>
      </div>
      <div class="mt-3">
        <p>Don't have an account? <a href="/">Register here</a>.</p>
    </div>
  </div>

  
</div>
        </form>
      </div>
    </div>




    </div>
    
    







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>