<?php

    namespace App\Services;
    use App\Traits\ConsumesExternalService;

    class CollegeService{
        
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

    public function getCollege(){
        return $this->performRequest('GET', '/college');
    }

    public function createCollege($data)
    {
        return $this->performRequest('POST', '/college', $data);
    }

    public function findCollege($id){
        return $this->performRequest('GET', "/college/{$id}");
    }

    public function updateCollege($data,$id)
    {
        return $this->performRequest('PUT', "/college/{$id}", $data);
    }

    public function deleteCollege($id)
    {
        return $this->performRequest('DELETE', "/college/{$id}");
    }

}

?>