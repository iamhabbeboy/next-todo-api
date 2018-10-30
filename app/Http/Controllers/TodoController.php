<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Traits\Helper as Helper;
use App\Interfaces\Response as Res;

class TodoController extends Controller
{
    use Helper;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        $res    = $this->todo->all();
        $status = ($res->count() > 0) ? Res::SUCCESS_CODE : Res::ERROR_CODE; 
        return Helper::withMessage($res, $status, 200);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required',
            'description'   => 'required'
        ]);
        $resp   = $this->todo->storeHelper($request);
        $status = ($resp) ? Res::SUCCESS_CODE: Res::ERROR_CODE;
        return Helper::withMessage([], $status, 201);
    }

    public function update($id, Request $request)
    {
       $resp = $this->todo->updateHelper($id, $request);
       $status = ($resp) ? Res::SUCCESS_CODE: Res::ERROR_CODE;
       return Helper::withMessage([], $status, 200);
    }

    public function delete()
    {

    }

    //
}
