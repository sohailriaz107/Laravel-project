<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
        
    <div class="container mt-5">
        @if(session('success'))
        <div class="alert alert-success">
         {{ session('success') }}
        </div>
        @endif

      <div class="row">
     
          <div class="col-sm-6">
              <div class="card">
                  <div class="card-header">
                      <h2>Add Categori</h2>
                  </div>
                  <div class="card-body">
                      <form action="{{ route('CateUpdate',$categorii->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                         
                          <div class="mb-3">
                              <label for="title">Name Categori</label>
                              <input type="text" class="form-control" name="name" id="name" value="{{$categorii->name  }}">
                              @error('name')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-2">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </form>
                  </div>
              </div>
 
    
 
            </div>      
          </div>
      
  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>