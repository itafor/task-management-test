<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Services\TaskService;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public $task_service;

    public function __construct(TaskService $task)
    {
        $this->task_service = $task;
    }

    public function index()
    {
        $data['tasks'] = Task::orderBy('priority', 'ASC')->get();
    	$data['projects'] = Project::all();

    	// dd($data['projects']);

        return view('task.index', $data);
    }

    public function create()
    {
    	$projects = Project::all();

        return view('task.create', compact('projects'));
    }

    public function storeTask(TaskRequest $request)
    {
        $this->task_service->storeNewTask($request->all());

        return Redirect()->route('task.index')->with('success', 'Task created successfully');
    }

    public function editTask(Task $task)
    {
    	$projects = Project::all();

        return view('task.edit', compact('task','projects'));
    }

    public function deleteTask(Task $task)
    {
        $task->delete();

        return Redirect()->route('task.index')->with('success', 'Task deleted successfully');
    }

    public function updateTask(TaskRequest $request)
    {
        $this->task_service->manageTask($request->all());

        return Redirect()->route('task.index')->with('success', 'Task updated successfully');
    }

    public function updateSortedTasks(Request $request)
    {
        $this->task_service->sortTasks($request->all());

        return response()->json(['status'=>'Sorted tasks successfully updated']);
    }

     public function createProject(Request $request)
    {
        return view('project.create');
    }

      public function storeProject(Request $request)
    {
        $this->task_service->storeNewProject($request->all());

        return Redirect()->route('task.index')->with('success', 'Project created successfully');
    }

     public function viewTaskByProject(Project $project)
    {
        $data['tasks'] = $project->tasks;
    	$data['projects'] = Project::all();


         return view('task.index', $data);
    }
}
