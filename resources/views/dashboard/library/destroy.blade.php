<div class="modal fade" id="delete_book{{$book->id}}" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('library.destroy',$book->id)}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;"
                        class="text-danger" id="exampleModalLabel"> Warning</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Delete Book <span class="text-danger">{{$book->name}}</span></p>
                </div>
                <div class="modal-footer">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                        <button type="submit"
                                class="btn btn-danger">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
