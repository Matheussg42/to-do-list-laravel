<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tasks;
use App\User;

class TaskList extends Model
{
    protected $fillable = ['user_id','title','status'];

    public function index(){
        return auth()
        ->user()
        ->TaskList;
    }

    public function create($fields)
    {
        return auth()
        ->user()
        ->TaskList()
        ->create($fields);
    }

    public function show($id)
    {
        $show = auth()
        ->user()
        ->TaskList()
        ->find($id);
 
        if (!$show) {
            throw new \Exception('Nada Encontrado', -404);
        }

        return $show;
    }

    public function updateList($fields, $id)
    {
        $tasklist = $this->show($id);

        $tasklist->update($fields);
        return $tasklist;
    }

    public function destroyList($id)
    {
        $tasklist = $this->show($id);

        $tasklist->delete();
        return $tasklist;
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Tasks', 'user_id', 'user_id', 'list_id', 'id');
    }
}
