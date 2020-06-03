<?php

namespace App\Http\Controllers;

use App\TaskList;
use Illuminate\Http\Request;
use App\Http\Requests\TaskList\StoreTaskList;
use App\Services\ResponseService;
use App\Transformers\TaskList\TaskListResource;
use App\Transformers\TaskList\TaskListResourceCollection;

class TaskListController extends Controller
{
    private $tasklist;

    public function __construct(TaskList $tasklist){
        $this->tasklist = $tasklist;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TaskListResourceCollection($this->tasklist->index());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskList $request)
    {
        try{        
            $data = $this
            ->tasklist
            ->create($request->all());
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('tasklist.store',null,$e);
        }

        return new TaskListResource($data,array('type' => 'store','route' => 'tasklist.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TaskList  $taskList
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{        
            $data = $this
            ->tasklist
            ->show($id);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('tasklist.show',$id,$e);
        }

        return new TaskListResource($data,array('type' => 'show','route' => 'tasklist.show'));
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
            ->tasklist
            ->updateList($request->all(), $id);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('tasklist.update',$id,$e);
        }

        return new TaskListResource($data,array('type' => 'update','route' => 'tasklist.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaskList  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data = $this
            ->tasklist
            ->destroyList($id);
        }catch(\Throwable|\Exception $e){
            return ResponseService::exception('tasklist.destroy',$id,$e);
        }
        return new TaskListResource($data,array('type' => 'destroy','route' => 'tasklist.destroy')); 
    }
}
