<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
        <div>
    <div class="container mt-5">
        @if(session('success'))
        <div class="alert alert-success">
         {{ session('success') }}
        </div>
        @endif
        <div class="buttons" style="display: flex;justify-content:space-between ;gap:10px">
          <div class="cate">
            <a href="{{ route('Cateindex') }}" class="btn btn-dark">Add Category</a>
          </div>
          <div class="cate">
            <a href="{{ route('displayTask') }}" class="btn btn-primary">Show Tasks</a>
          </div>
            <div class="logout">
              <a href="/logout">  <button type="button" class="btn btn-danger">LogOut</button></a>
            </div>
        </div>
       
           <center><h2>Categories</h2></center>
      <div class="row">
          <div class="col-sm-12">
              <table class="table table-bordered border-dark">
               <thead>
                <tr align="center">
                    <th scope="col">#SR</th>
                    <th scope="col" >Cetegories Name</th>
                    @if(auth()->user()->role=='Admin')
                    <th scope="col">Action</th>
                    @endif
                  
                </tr>
               </thead>
               <tbody>
                @foreach($categori as $cate)
                <tr align="center">
                <th>{{ $loop->iteration }}</th>
                
                <td>{{ $cate->name }}</td>
                @if(auth()->user()->role=='Admin')
                <td>
                  <a href="{{ url('catedit',$cate->id) }}" class=" btn btn-primary btn-sm  " >Edit</a>  
                  <a href="{{ url('delete',$cate->id) }}" class=" btn btn-danger" >DELTE</a>
               </td>
                @endif
                
                </tr>
                @endforeach
               </tbody>
              </table>
 
    
 
            </div>      
          </div>
      
  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>