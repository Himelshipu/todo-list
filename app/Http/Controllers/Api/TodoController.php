<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Validator;

class TodoController extends Controller
{
    public function index()
    {
        try {
            $todos = Todo::all();

            return response()->json([
                'status' => true,
                'todos' => $todos
            ]);
            
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 404,
                'message' => 'something went wrong!'
            ]);
        }
       
    }

     public function store(Request $request)
     {
         $input = $request->all();
         $validator = Validator::make($input, [
         'title' => 'required',
         ]);

        if($validator->fails()){
              return $this->sendError('Validation Error.', $validator->errors());       
        }

        $todos = Todo::create($input);
         return response()->json([
            "success" => true,
            "message" => "Task of TodoList created successfully.",
            "data" => $todos
        ]);
        } 

 
    public function update($id)
    {
        try {
            $todo= Todo::find($id);
            if ($todo->isDone == true) {
                $todo ->update(['isDone' => false]);
            } else {
                $todo ->update(['isDone' => true]);
            }
            return response()->json([
                "success" => true,
                "message" => "Task of Todolist updated successfully.",
                "data" => $todo
                ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 404,
                'message' => 'Task Not AVailable!'
                ]);
        }

       

    }

    public function destroy($id)
    {
        try {
            $todo= Todo::find($id);

            $todo->delete();
            return response()->json([
            "status" => 200,
            "message" => "Task of Todolist deleted successfully.",
            "data" => $todo
            ]);


        } catch (\Throwable $th) {
            return response()->json([
                "status" => 404,
                "message" => "Task Not AVailable!",
                ]);
        }
        

    }
}
