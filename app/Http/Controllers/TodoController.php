<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo_list = Todo::all();

        if (!$todo_list) {
            return response()->json(['todos' => $todo_list, 'success' => false, 'error' => 'Nothing Found']);
        }

        return response()->json(['todos' => $todo_list, 'success' => true, 'error' => null]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created_task = Todo::create($request->all());
        if (!$created_task) {
            return response()->json(['todo' => $created_task, 'success' => false, 'error' => 'Operation failed']);
        }

        return response()->json(['todo' => $created_task, 'success' => true, 'error' => null]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $retrieved_data = Todo::find($id);

        if (!$retrieved_data) {
            return response()->json(['todo' => $retrieved_data, 'success' => false, 'error' => 'Nothing Found']);
        }

        return response()->json(['todo' => $retrieved_data, 'success' => true, 'error' => null]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update task
        $updated_info = Todo::find($id)->update($request->all());
        if (!$updated_info) {
            return response()->json(['todo' => $updated_info, 'success' => false, 'error' => 'Operation failed']);
        }

        return response()->json(['todo' => $updated_info, 'success' => true, 'error' => null]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find the task
        $find_task = Todo::find($id);

        //delete task
        $delete = Todo::destroy($id);
        if (!$delete) {
            return response()->json(['todo' => $find_task, 'success' => false, 'error' => 'Operation failed']);
        }

        return response()->json(['todo' => $find_task, 'success' => true, 'error' => null]);
    }

}
