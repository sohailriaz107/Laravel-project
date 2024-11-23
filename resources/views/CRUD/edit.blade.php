<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
        
    <div class="container mt-5">
      <div class="row">
          <div class="col-sm-6">
              <div class="card">
                  <div class="card-header">
                      <h2>Task Creation</h2>
                  </div>
                  <div class="card-body">
                      <form action="{{ route('update', $tasks->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                         @method('put')
                          <div class="mb-3">
                              <label for="title">Title</label>
                              <input type="text" class="form-control" name="title" id="title"  value="{{ $tasks->title }}">
                              @error('title')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3">
                              <label for="description">Description</label>
                              <textarea class="form-control" name="description" id="description"
                               >{{ $tasks->description }}</textarea>
                              @error('description')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3">
                              <label for="due_date">Due Date</label>
                              <input type="date" class="form-control" name="date" id="due_date" value="{{ $tasks->due_date }}" >
                              @error('due_date')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3">
                              <label for="priority">Priority</label>
                              <input type="text" class="form-control" name="priority" id="priority" value="{{ $tasks->priority }}">
                              @error('priority')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3">
                              <label for="status">Status</label>
                              <input type="text" class="form-control" name="status" id="status" value="{{ $tasks->status }}">
                              @error('status')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3">
                              <label for="image">Image</label>
                              <input type="file" class="form-control" name="image" id="image" value="{{ $tasks->image }}">
                              @error('image')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="mb-3">
                            <label for="text">Category Name</label>
                            <input type="text" class="form-control" name="name" id="image" value="{{ $tasks->category->name }}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                          <div class="mb-3">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" disabled>Select a category</option>
                                <option value="1" {{ $tasks->category_id == 1 ? 'selected' : '' }}>Category 1</option>
                                <option value="2" {{ $tasks->category_id == 2 ? 'selected' : '' }}>Category 2</option>
                                <option value="3" {{ $tasks->category_id == 3 ? 'selected' : '' }}>Category 3</option>
                                <option value="4" {{ $tasks->category_id == 4 ? 'selected' : '' }}>Category 4</option>
                                <option value="5" {{ $tasks->category_id == 5 ? 'selected' : '' }}>Category 5</option>
                                <!-- Add more categories as needed -->
                            </select>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>

                          <div class="mb-2">
                              <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>

          {{-- showing --}}
          
      </div>
  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>