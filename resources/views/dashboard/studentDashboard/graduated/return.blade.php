<!-- Deleted inFormation Student -->
<div class="modal fade" id="Return_Student{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class=" text-warning" style="font-family: 'Cairo', sans-serif;">Are you sure you want to cancel the graduation process?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('graduated.returnStudent',$student->id)}}" method="post" autocomplete="off">
                    @csrf

                    <input type="text" readonly value="{{$student->name}}" class="form-control">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button  class="btn btn-warning">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
