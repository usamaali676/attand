<div aria-hidden="true" aria-labelledby="userReasonModalLabel" class="modal fade"
     id="delete_data_modal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

               <form action="{{ route('desg.delete') }}" enctype="multipart/form-data" method="post">
                @csrf
                <input type="hidden" name="desg_id" id="desg-id" value="" >


                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                        <h5 class="modal-title" id="userReasonModalLabel" >
                             Are you sure to delete this item
                          </h5>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit" > Yes</button>
                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> No</button>
                </div>
            </form>
        </div>
    </div>
</div>
