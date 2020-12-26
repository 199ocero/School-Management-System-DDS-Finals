<?php

    namespace App\Services;
    use App\Traits\ConsumesExternalService;

    class SectionService{
        
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

    public function getSection(){
        return $this->performRequest('GET', '/section');
    }

    public function createSection($data)
    {
        return $this->performRequest('POST', '/section', $data);
    }

    public function findSection($id){
        return $this->performRequest('GET', "/section/{$id}");
    }

    public function updateSection($data,$id)
    {
        return $this->performRequest('PUT', "/section/{$id}", $data);
    }

    public function deleteSection($id)
    {
        return $this->performRequest('DELETE', "/section/{$id}");
    }

}

?>