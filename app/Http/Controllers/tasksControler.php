<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\tasks;
use App\Models\catogories;


class tasksControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $task=tasks::all();
        // ['tasks'=>$task]


        return view('CRUD.task',);
    }
  

    /**
     * Show the form for creating a new resource.
     */
    public function create_task(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'priority' => 'required|string',
            'status' => 'required|string',
            'category_id' => 'required|exists:categories,id', 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $due_date = Carbon::parse($request->input('date'))->format('y-m-d');
           $task=new tasks();
          $task->title=$request->title;
          $task->description=$request->description;
          $task->due_date=$due_date;
          $task->priority=$request->priority;
          $task->status=$request->status;
          $task->category_id=$request->category_id;
          if ($request->hasFile('image')) {
            $imageName = time() . "." . $request->image->extension(); 
            $request->image->move(public_path('products'), $imageName); // Move image to 'public/products' folder
            $task->image_path = $imageName; // Save the image path to the database
        }
          $task->save();
          return redirect()->route('displayTask')->with('success', 'Task added successfully.');

    }

    public function displayTask()
    {
        // $task=tasks::all();
        $task=tasks::with('category')->get();
        return view('CRUD.show_task',['tasks'=>$task]);
    }
    public function edit(string $id)
    {
       $task=tasks::find($id);
       return view('CRUD.edit',['tasks'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'priority' => 'required|string',
            'status' => 'required|string',
            'category_id' => 'required|exists:categories,id', 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $due_date = Carbon::parse($request->input('date'))->format('y-m-d');
        $task=tasks::find($id);
        $task->title=$request->title;
        $task->description=$request->description;
        $task->due_date =$due_date;
        $task->priority=$request->priority;
        $task->status=$request->status;
        $task->category_id=$request->category_id;
        if ($request->hasFile('image')) {
          $imageName = time() . "." . $request->image->extension(); 
          $request->image->move(public_path('products'), $imageName); // Move image to 'public/products' folder
          $task->image_path = $imageName; // Save the image path to the database
      }
        $task->save();
        return redirect()->route('displayTask')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $task= tasks::destroy($id);
        return redirect()->route('displayTask',$task)->with('success', 'Task deleted successfully.');
    }
}
