<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_receipt{{$online_session->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="text-warning" id="exampleModalLabel">Warning</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('onlineSessions.destroy',$online_session->id)}}" method="post">
                    @csrf
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title mb-3" id="exampleModalLabel">Delete Online Session : <span class=" text-success">{{$online_session->topic}}</span> </h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button  class="btn btn-danger">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
