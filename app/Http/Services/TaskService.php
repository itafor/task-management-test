<?php
namespace App\Http\Services;

use App\Models\Project;
use App\Models\Task;

/**
 *
 */
class TaskService
{
    public function storeNewTask($data)
    {
        $task = new Task();
        $task->task_name = $data['task_name'];
        $task->priority = $data['priority'];
        $task->project_id = isset($data['project_id']) ? $data['project_id'] : null;
        $task->save();

        return $task;
    }

    public function manageTask($data)
    {
        $task = Task::where('id', $data['task_id'])->first();
        $task->task_name = $data['task_name'];
        $task->priority = $data['priority'];
        $task->project_id = isset($data['project_id']) ? $data['project_id'] : null;
        $task->save();

        return $task;
    }

    public function sortTasks($data)
    {
        if (isset($data['tasks'])) {
            foreach ($data['tasks'] as $key => $task) {
                Task::findOrFail($task)->update([
                'priority' => $key+1,
            ]);
            }
        }
    }

     public function storeNewProject($data)
    {
        $project = new Project();
        $project->name = $data['name'];
        $project->description = isset($data['description']) ? $data['description'] : null;
        $project->save();

        return $project;
    }
}
