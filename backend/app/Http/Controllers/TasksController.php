<?php

namespace App\Http\Controllers;

use App\Tasks;
use Illuminate\Http\Request;
use App\Http\Requests\Task\StoreTask;
use App\Services\ResponseService;
use App\Transformers\Tasks\TasksResource;
use App\Transformers\Tasks\TasksResourceCollection;

class TasksController extends Controller
{
    private $tasks;

    public function __construct(Tasks $tasks){
        $this->tasks = $tasks;
    }

    /**
     * Display a listing of the resource.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TasksResourceCollection($this->tasks->index());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTask $request)
    {
        try{        
            $data = $this
            ->tasks
            ->store($request->all());
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('tasks.store',null,$e);
        }

        return new TasksResource($data,array('type' => 'store','route' => 'tasks.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{        
            $data = $this
            ->tasks
            ->show($id);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('tasks.show',$id,$e);
        }

        return new TasksResource($data,array('type' => 'show','route' => 'tasks.show'));
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function tasksByList($id)
    {
        try{        
            $data = $this
            ->tasks
            ->tasksByList($id);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('tasks.tasksByList',$id,$e);
        }

        return new TasksResourceCollection($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function closeTask($id)
    {
        try{        
            $data = $this
            ->tasks
            ->closeTask($id);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('tasks.closeTask',$id,$e);
        }

        return new TasksResource($data,array('type' => 'update','route' => 'tasks.closeTask'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{        
            $data = $this
            ->tasks
            ->updateTask($request->all(), $id);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('tasks.update',$id,$e);
        }

        return new TasksResource($data,array('type' => 'update','route' => 'tasks.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tasks  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data = $this
            ->tasks
            ->destroyTask($id);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('tasks.destroy',$id,$e);
        }
        return new TasksResource($data,array('type' => 'destroy','route' => 'tasks.destroy')); 
    }
}
