<?php

    namespace App\Services;
    use App\Traits\ConsumesExternalService;

    class StudentRoleService{
        
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

    public function getStudentRole(){
        return $this->performRequest('GET', '/studentrole');
    }

    public function createStudentRole($data)
    {
        return $this->performRequest('POST', '/studentrole', $data);
    }

    public function findStudentRole($id){
        return $this->performRequest('GET', "/studentrole/{$id}");
    }

    public function updateStudentRole($data,$id)
    {
        return $this->performRequest('PUT', "/studentrole/{$id}", $data);
    }

    public function deleteStudentRole($id)
    {
        return $this->performRequest('DELETE', "/studentrole/{$id}");
    }

}

?>