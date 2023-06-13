<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-10 custom-border py-3">
            <form method="post" action="index.php">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter title..." name="title" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Note</label>
                    <textarea class="form-control" placeholder="Enter Description..." id="floatingTextarea" name="body" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>