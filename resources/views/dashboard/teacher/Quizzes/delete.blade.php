<div class="modal fade" id="delete_exam{{$quiz->id}}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <form action="{{route('quizzes.destroy',$quiz->id)}}" method="post">
           @csrf
           <div class="modal-content">
               <div class="modal-header">
                   <h5 style="font-family: 'Cairo', sans-serif;"
                       class=" text-warning" id="exampleModalLabel"> Warning</h5>
                   <button type="button" class="close" data-dismiss="modal"
                           aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <p> Delete Quiz <span class=" text-success">  {{$quiz->name}}</span></p>
               </div>
               <div class="modal-footer">
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary"
                               data-dismiss="modal">Close</button>
                       <button type="submit"
                               class="btn btn-danger">submit</button>
                   </div>
               </div>
           </div>
       </form>
   </div>
</div>