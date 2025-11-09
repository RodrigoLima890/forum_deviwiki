<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\Task as TaskResource;

class CompleteTaskController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Task $task)
    {
        $task->is_complete = $request->is_completed ?? true;
        $task->save();
        return TaskResource::make($task);
    }
}
