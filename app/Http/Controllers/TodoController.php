<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use App\Trait\Helpers as Helper;

class TodoController extends Controller
{
    use Helper;
    
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        return $this->todo->all();
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required',
            'description'   => 'required',
            'status'        => 'required'
        ]);
        return $this->todo->create($request->all());
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    //
}
