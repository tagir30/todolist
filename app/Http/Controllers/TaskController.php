<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Task;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tasks = auth()->user()->tasks()->orderBy('created_at', 'asc')->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTaskRequest $request
     * @return Response
     */
    public function store(StoreTaskRequest $request)
    {
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return void
     * @throws AuthorizationException
     */
    public function destroy(Task $task)
    {
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect()->route('tasks.index');
    }
}
