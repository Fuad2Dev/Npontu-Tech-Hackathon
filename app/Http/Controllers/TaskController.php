<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Activity $activity)
    {
        return view('task.index', compact('activity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Activity $activity)
    {
        $users = User::where('is_admin', false)->get();

        return view('task.create', compact('activity', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskStoreRequest $request, Activity $activity)
    {
        $data = array_merge($request->validated(), ['activity_id' => $activity->id]);
        Task::create($data);

        return redirect()->route('tasks.index', $activity);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity, Task $task)
    {
        return view('task.show', compact('task', 'activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\View\View
     */
    public function edit(Activity $activity,Task $task)
    {
        $users = User::where('is_admin', false)->get();
        return view('task.edit', compact('activity', 'task', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskStoreRequest $request, Activity $activity, Task $task)
    {
        Task::find($task->id)->update($request->validated());

        return redirect()->route('tasks.index', $activity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity,Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index', compact('activity'));
    }
}
