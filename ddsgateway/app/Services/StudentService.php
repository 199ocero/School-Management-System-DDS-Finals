<?php

    namespace App\Services;
    use App\Traits\ConsumesExternalService;

    class StudentService{
        
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

    public function getStudent(){
        return $this->performRequest('GET', '/student');
    }

    public function createStudent($data)
    {
        return $this->performRequest('POST', '/student', $data);
    }

    public function findStudent($id){
        return $this->performRequest('GET', "/student/{$id}");
    }

    public function updateStudent($data,$id)
    {
        return $this->performRequest('PUT', "/student/{$id}", $data);
    }

    public function deleteStudent($id)
    {
        return $this->performRequest('DELETE', "/student/{$id}");
    }

}

?>