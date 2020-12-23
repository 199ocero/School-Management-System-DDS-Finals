<?php

    namespace App\Services;
    use App\Traits\ConsumesExternalService;

    class User1Service{
        
    use ConsumesExternalService;
    /**
     * The base uri to consume the User1 Service
     * @var string
     */
    public $baseUri;
    public $secret;

    public function __construct(){
        $this->baseUri =config('services.users1.base_uri');
        $this->secret =config('services.users1.secret');
    }

    public function getUsers(){
        return $this->performRequest('GET', '/users');
    }

    public function createUsers($data)
    {
        return $this->performRequest('POST', '/users', $data);
    }

    public function findUsers($id){
        return $this->performRequest('GET', "/users/{$id}");
    }

    public function updateUsers($data,$id)
    {
        return $this->performRequest('PUT', "/users/{$id}", $data);
    }

    public function deleteUsers($id)
    {
        return $this->performRequest('DELETE', "/users/{$id}");
    }

    public function findRole($id)
    {
        return $this->performRequest('GET', "/roles/$id");
    }

}

?>