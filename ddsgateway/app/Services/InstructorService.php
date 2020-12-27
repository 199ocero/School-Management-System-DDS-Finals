<?php

    namespace App\Services;
    use App\Traits\ConsumesExternalService;

    class InstructorService{
        
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

    public function getInstructor(){
        return $this->performRequest('GET', '/instructor');
    }

    public function createInstructor($data)
    {
        return $this->performRequest('POST', '/instructor', $data);
    }

    public function findInstructor($id){
        return $this->performRequest('GET', "/instructor/{$id}");
    }

    public function updateInstructor($data,$id)
    {
        return $this->performRequest('PUT', "/instructor/{$id}", $data);
    }

    public function deleteInstructor($id)
    {
        return $this->performRequest('DELETE', "/instructor/{$id}");
    }

}

?>