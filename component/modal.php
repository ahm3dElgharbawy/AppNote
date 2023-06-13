<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Note</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="updateNote.php">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="modalNoteTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="modalNoteTitle" placeholder="Enter title..." name="title" required>
                        <input type="hidden" id="modalNoteId" name="id">
                    </div>
                    <div class="mb-3">
                        <label for="modalNoteBody" class="form-label">Note</label>
                        <textarea class="form-control" placeholder="Enter Description..." id="modalNoteBody" name="body" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>