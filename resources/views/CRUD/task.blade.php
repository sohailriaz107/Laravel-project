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
      <div class="row">
          <div class="col-sm-8">
              <div class="card">
                  <div class="card-header">
                    <center><h2>Task Creation</h2></center>
                      
                  </div>
                  <div class="card-body">
                      <form action="{{ route('create_task') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                         
                          <div class="mb-3">
                              <label for="title">Title</label>
                              <input type="text" class="form-control" name="title" id="title" placeholder="Enter the title" required>
                              @error('title')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3">
                              <label for="description">Description</label>
                              <textarea class="form-control" name="description" id="description" placeholder="Task Description" required></textarea>
                              @error('description')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3">
                              <label for="due_date">Due Date</label>
                              <input type="date" class="form-control" name="date" id="due_date" required>
                              @error('due_date')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3">
                              <label for="priority">Priority</label>
                              <input type="text" class="form-control" name="priority" id="priority" placeholder="Enter Priority" required>
                              @error('priority')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3">
                            <label for="status">Status</label>
                             
                            <select name="status" id="status" class="form-control" required>
                                <option value="" disabled selected>Select a stats</option>
                                <option >pending</option>
                                <option >Compelte </option>
                            </select>
                              @error('status')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3">
                              <label for="image">Image</label>
                              <input type="file" class="form-control" name="image" id="image" required>
                              @error('image')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3">
                              <label for="category_id">Category ID</label>
                             
                              <select name="category_id" id="category_id" class="form-control" required>
                                  <option value="" disabled selected>Select a category</option>
                                  <option value="1">Category 1</option>
                                  <option value="2">Category 2</option>
                                  <option value="3">Category 3</option>
                                  <option value="4">Category 4</option>
                                  <option value="5">Category 5</option>
                                  
                              </select>
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