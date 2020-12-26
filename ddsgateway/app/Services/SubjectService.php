<?php

    namespace App\Services;
    use App\Traits\ConsumesExternalService;

    class SubjectService{
        
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

    public function getSubject(){
        return $this->performRequest('GET', '/subject');
    }

    public function createSubject($data)
    {
        return $this->performRequest('POST', '/subject', $data);
    }

    public function findSubject($id){
        return $this->performRequest('GET', "/subject/{$id}");
    }

    public function updateSubject($data,$id)
    {
        return $this->performRequest('PUT', "/subject/{$id}", $data);
    }

    public function deleteSubject($id)
    {
        return $this->performRequest('DELETE', "/subject/{$id}");
    }

}

?>