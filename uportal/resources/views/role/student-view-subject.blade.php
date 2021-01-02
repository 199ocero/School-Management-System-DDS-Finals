@extends('layouts.master')

@section('title')
    Student Role | UPortal
@endsection

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View Student Subjects</h6>
        </div>
        <div class="card-body">
                {{ csrf_field() }}
                {{method_field('PUT')}}

                @for ($i = 0; $i < count($student); $i++)
                    @if ($studentrole['student_id']==$student[$i]['id'])
                        <p><strong>Student Name:</strong> {{$student[$i]['fname']}} {{$student[$i]['mname'][0]}}. {{$student[$i]['lname']}}</p>
                        @break         
                    @endif
                @endfor
                @for ($i = 0; $i <count($subject); $i++)
                    @if ($studentrole['subject_id']==$subject[$i]['id'])
                        <p><strong>Year Level:</strong> {{$subject[$i]['year']}}</p>
                        <p><strong>Semester:</strong> {{$subject[$i]['semester']}}</p>
                        @for ($j = 0; $j < count($course); $j++)
                            @if ($subject[$i]['course']==$course[$j]['id'])
                              <p><strong>Course:</strong> {{$course[$j]['name']}}</p>
                            @endif
                        @endfor
                        @break
                    @endif
                @endfor
                
                <div class="form-group table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-primary">
                          <tr>
                            <th>Subject</th>
                            <th>Instructor</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                            @for ($i = 0; $i <count($studentrole2); $i++)
                              <tr>
                                @if ($studentrole['id']==$studentrole2[$i]['id'])
                                  @for ($x = 0; $x < count($subject); $x++)
                                      @if ($studentrole2[$i]['subject_id']==$subject[$x]['id'])
                                        <td>{{$subject[$x]['name']}}</td>
                                        @for ($y= 0; $y < count($instructor); $y++)
                                            @if ($subject[$x]['instructor']==$instructor[$y]['id'])
                                              <td>{{$instructor[$y]['fname']}} {{$instructor[$y]['mname'][0]}}. {{$instructor[$y]['lname']}}</td>
                                            @endif
                                        @endfor
                                      @endif
                                  @endfor
                                @endif
                              </tr>
                            @endfor
                         
                          
                      </table>
                </div>
                <div class="text-right" style="margin-right: 13px">
                    <a href="/student-role" class="btn btn-primary">Back</a>
                </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
@endsection