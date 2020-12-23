<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Roles;
use App\Traits\ApiResponser;
use App\Http\Controllers\Response;

Class RoleController extends Controller {
    use ApiResponser;
    private $request;
    public function __construct(Request $request){

    $this->request = $request;
    }

    public function getRole(){
        $role =  Roles::all();
        return $this->successResponse($role);
    }

    public function findRole($id)
    {
        $role = Roles::findOrFail($id);
        return $this->successResponse($role);
    }
}

?>