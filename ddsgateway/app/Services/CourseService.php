<?php

    namespace App\Services;
    use App\Traits\ConsumesExternalService;

    class CourseService{
        
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

    public function getCourse(){
        return $this->performRequest('GET', '/course');
    }

    public function createCourse($data)
    {
        return $this->performRequest('POST', '/course', $data);
    }

    public function findCourse($id){
        return $this->performRequest('GET', "/course/{$id}");
    }

    public function updateCourse($data,$id)
    {
        return $this->performRequest('PUT', "/course/{$id}", $data);
    }

    public function deleteCourse($id)
    {
        return $this->performRequest('DELETE', "/course/{$id}");
    }

}

?>