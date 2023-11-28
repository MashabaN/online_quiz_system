@extends('layout/admin-layout')

@section('space-work')
    <h2 class="mb-4>Exams</h2>

        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addExamModal">
    Add Exam
    </button>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Exam Name</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Time</th>
<<<<<<< HEAD
                <th>Attempted</th>
=======
                <th>Attempt</th>
                <th>Add question</th>
>>>>>>> cc878767fbb9ae45c6b3065fe3786941922a45d0
                <th>Edit</th>
                <th>Delete</th>
                
            </tr>
        </thead>
        <tbody>
            @if(count($exams)>0)
                @foreach($exams as $exam)
                    <tr>
                        <td>{{ $exams->ID }}</td>
                        <td>{{ $exams->Exam_name }}</td>
                        <td>{{ $exams->subjects }}</td>
                        <td>{{ $exams->Subject_ID }}</td>
                        <td>{{ $exams->Date }}</td>
                        <td>{{ $exams->Time	}} Hrs</td>
<<<<<<< HEAD
                        <td>{{ $exams->Attempted }} Time</td>

                        <td>
                            <button class="btn btn-info editButton" data-id="{{ $exam->ID }}" data-toggle="modal" data-target="#editExamModal">Edit</button>
=======
                        <td>  <a href="#" data-id="{{$exam->id}}" data-toggle="modal" data-target="#editExamModal"> Add answer</a></td>                        
                        <td>    <button class="btn btn-info editButton" data-id="{{ $exam->ID }}" data-toggle="modal" data-target="#editQnaModal">Edit</button>
>>>>>>> cc878767fbb9ae45c6b3065fe3786941922a45d0
                        </td>
                        <td>
                            <button class="btn btn-danger deleteButton" data-id="{{ $exam->ID }}" data-toggle="modal" data-target="#deleteExamModal">Delete</button>
                        </td>
                            
                        

                    
                    </tr>
                @endforeach
            @else
               <tr>

                   <td colspan="5">Exams not Found!</td>
                </tr>
            @endif
        </tbody>
</table>    


    <!-- Modal -->
<div class="modal fade" id="addExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    
    
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Exam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addExam">
      @csrf

          <div class="modal-body">
              
              <input type="text" name="Exam_name" placeholder="Enter Exam Name"  class="w-100" required>
              <br><br>
              <select name="Subject_ID" required class="w-100">
                <option value=" ">Select Subject</option>
                @if(count($subjects) > 0)
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->id }}</option>
                    @endforeach

                @endif
              </select>
              <br><br>
              <input type="date" name="Date"  class="w-100" required min="@php echo date('Y-m-d'); @endphp">
              <br><br>
              <input type="time" name="Time"  class="w-100" required>
              <br><br>
              <input type="number" min="1" name="Attempted" placeholder="Enter Exam Attempt Time" class="w-100" required>

            </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Exam</button>
          </div>
        
        </form>
        </div>
  </div>
</div>

   <!--Delete Exam Modal -->
<div class="modal fade" id="deleteExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    
    
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Exam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="deleteExam">
      @csrf

          <div class="modal-body">
              <input type ="hidden" name="Exam_ID" id="deleteExamID">
              <p> Are you sure want to Delete Exam?</p>
              
        
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        
        </form>
        </div>
  </div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="addExamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    
    
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Exam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addExam">
      @csrf

          <div class="modal-body">
              
              <input type="text" name="Exam_name" placeholder="Enter Exam Name"  class="w-100" required>
              <br><br>
              <select name="Subject_ID" required class="w-100">
                <option value=" ">Select Subject</option>
                @if(count($subjects) > 0)
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->id }}</option>
                    @endforeach

                @endif
              </select>
              <br><br>
              <input type="date" name="Date" id= "Date"  class="w-100" required min="@php echo date('Y-m-d'); @endphp">
              <br><br>
              <input type="time" name="Time" id="Time"  class="w-100" required>
              <br><br>
              <input type="number" min="1" id="Attempted" name="Attempted" placeholder="Enter Exam Attempt Time" class="w-100" required>

            </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Exam</button>
          </div>
        
        </form>
        </div>
  </div>
</div>


  <!-- add answerModal -->
  <div class="modal fade" id="addQnaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      
      
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add question and answer</h5> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="addQna">
        @csrf
  
            <div class="modal-body">
                <input type="text" name="exam_id" id="addExamId"  >
                <input type="search" name="search" placeholder="searchHere"  >
                <br> <br>
                <select name="questions" multiple multiselect-search="true" multiselect-select-all ="true" onchange="console.log(this.selectedOptions)">  
                    
                    
                    <option value=""> select questions </option>
                    <option value="hii"> hii </option>

              </div>
  
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Q&a</button>
            </div>
          
          </form>
          </div>
    </div>
  </div>
  
  
<script>
    $(document).ready(function(){
        $("#editExam").submit(function(e){
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url:"{{ route('updateExam') }}",
                type:"POST",
                data:formData,
                success:function(data){
                    if(data.success == true){
                        location.reload();
                    }
                    else{
                        alert(data.msg);
                    }
                    
                }
            });


        });

        $(".editButton").click(function(){
            var id = $(this).attr('data-id');
            $("#exam_id").val(id);

            var url = '{{ route("getExamDetail","id") }}';
            url = url.replace('id',ID);

            $.ajax({ 
                url:url,
                type:"GET",
                success:function(data){
                    if(data.success == true){
                        var exam = data.data;
                        $("#Exam_name").val(exam.[0].Exam_name);
                        $("#Subject_ID").val(exam.[0].Subject_ID);
                        $("#Date").val(exam.[0].Date);
                        $("#Time").val(exam.[0].Time);
                        $("#Attempted").val(exam.[0].Attempted);
                        



                    }
                    else{
                        alert(data.msg);
                    }
                    console.log(data);
                }
            });
        });
    
    //delete exam
    $(".deletebutton").click(function(){
        var id = $(this).attr('data-id');
        $("#deleteExamID").val(id);

    });

    $("#deleteExam").submit(function(e){
            e.preventDefault();

            var formData = $(this).serialize();

           
            $.ajax({
                url:"{{ route('deleteExam') }}",
                type:"POST",
                data:formData,
                success:function(data){
                    if(data.success == true){
                        location.reload();
                    }
                    else{
                        alert(data.msg);
                    }
                    
                }
            });


        });
            
</script>




@endsection







     
    /ami ekhane code gulo diye rakhchi exam dashboard load er/
    //exam dashboard load
    public function examDashboard()
    {
        $subjects = Subject::all();
        return view('admin.exam-dashboard',['subjects'=>$subjects]);

    }