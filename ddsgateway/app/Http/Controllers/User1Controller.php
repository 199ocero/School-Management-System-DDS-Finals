<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\User1Service;
use App\Services\User2Service;

Class User1Controller extends Controller {
    use ApiResponser;
    /**
     * The service to consume the User1 Microservice
     * @var User1Service
     */
    public $user1Service;
    public $user2Service;
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(User1Service $user1Service,User2Service $user2Service)
    {
        $this->user1Service = $user1Service;
        $this->user2Service = $user2Service;
    }

    public function getUsers()
    {
        return $this->successResponse($this->user1Service->getUsers()); 
    }

    public function createUser(Request $request)
    {   
        if($request->roleid <=3){
            $this->user1Service->findRole($request->roleid);
        }
        else{
            $this->user2Service->findRole($request->roleid);
        }
        return $this->successResponse($this->user1Service->createUsers($request->all()));
    }

    public function findUser($id){
        return $this->successResponse($this->user1Service->findUsers($id));
    }

    public function updateUser(Request $request, $id)
    {
        return $this->successResponse($this->user1Service->updateUsers($request->all(),$id));
    }

    public function deleteUser($id)
    {
        return $this->successResponse($this->user1Service->deleteUsers($id));
    }

}

?>