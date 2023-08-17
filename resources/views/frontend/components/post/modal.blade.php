<div class="container">
     <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Join this Event: {{ $post->title }}</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/event-registration') }}" method="POST">
                    <!-- Name input -->
                    <div class="form-group col-md-12">
                        <label class="form-label" for="name">Name * </label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name"/>
                        <input type="hidden" id="event_id" name="event_id" value="{{ $post->id }}"/>
                        <input type="hidden" id="user_id" name="user_id" value="{{ $post->user_id }}"/>
                        <label class="form-label" for="mobile">Mobile</label>
                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile" />
                        <label class="form-label" for="email">Email address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email"/>
                        <label class="form-label" for="remarks">Remarks</label>
                        <textarea id="remarks" name="remarks" rows="2" class="form-control" placeholder="Remarks"></textarea>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
  </div>