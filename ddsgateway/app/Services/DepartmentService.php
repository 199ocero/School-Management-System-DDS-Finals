<?php

    namespace App\Services;
    use App\Traits\ConsumesExternalService;

    class DepartmentService{
        
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

    public function getDepartment(){
        return $this->performRequest('GET', '/department');
    }

    public function createDepartment($data)
    {
        return $this->performRequest('POST', '/department', $data);
    }

    public function findDepartment($id){
        return $this->performRequest('GET', "/department/{$id}");
    }

    public function updateDepartment($data,$id)
    {
        return $this->performRequest('PUT', "/department/{$id}", $data);
    }

    public function deleteDepartment($id)
    {
        return $this->performRequest('DELETE', "/department/{$id}");
    }

}

?>