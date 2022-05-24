<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="<?= url('/admin/password/submit') ?>">
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" value="" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password2">Re Enter Password:</label>
                        <input type="password" class="form-control" id="password2" placeholder="Re Enter Password" value="" name="password2">
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
</div>