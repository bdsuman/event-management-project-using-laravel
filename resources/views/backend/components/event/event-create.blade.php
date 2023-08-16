<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create Event</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-4 p-1">
                                <label class="form-label">Date *</label>
                                <input type="date" class="form-control" id="eventDate">
                            </div>
                            <div class="col-4 p-1">
                                <label class="form-label">Time *</label>
                                <input type="time" class="form-control" id="eventTime">
                            </div>
                            <div class="col-4 p-1">
                                <label class="form-label">Category *</label>
                                <select name="type" id="eventType" class="form-control">
                                    <option value="">--select--</option>
                                    @forelse ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                    @empty
                                        <option value="Income">No Category Found!</option>
                                    @endforelse
                                    
                                </select>
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Title *</label>
                                <input type="text" class="form-control" id="eventTitle">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Description </label>
                                <textarea type="text" class="form-control" id="eventDescription"></textarea>
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Location *</label>
                                <input type="text" class="form-control" id="eventLocation">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Thumbnail *</label>
                                <input type="file" class="form-control" id="eventImage">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>

    async function Save() {

        let eventDate = document.getElementById('eventDate').value;
        let eventType = document.getElementById('eventType').value;
        let eventAmount = document.getElementById('eventAmount').value;
        let eventDescription = document.getElementById('eventDescription').value;
        //alert(isNaN(parseFloat(eventAmount)))
        if (eventDate.length === 0) {
            errorToast("Date Required !")
        }else if (eventType.length === 0) {
            errorToast("Income Type Required !")
        }else if (eventAmount.length === 0 || isNaN(parseFloat(eventAmount))) {
            errorToast("Income Amount Required !")
        }
        else {

            document.getElementById('modal-close').click();

            showLoader();
            let res = await axios.post("/create-event",{date:eventDate,amount:eventAmount,description:eventDescription,categorie_id:eventType})
            hideLoader();

            if(res.status===201){

                successToast('Request completed');

                document.getElementById("save-form").reset();

                await getList();
            }
            else{
                errorToast("Request fail !")
            }
        }
    }

</script>
