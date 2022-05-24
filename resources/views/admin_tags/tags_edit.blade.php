<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form id="form_1">
                    <input type="hidden" name="id" value="<?=$form['id']?>">
                    <div class="form-group">
                        <label for="tags_name">Tags</label>
                        <input type="text" class="form-control" name="tags_name" 
                        value="<?=$form['tags_name']?>"
                        id="tags_name" placeholder="Tags">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-secondary" href="<?=url('admin/tags')?>">
                Kembali</a>
                </form>
            </div>
            <div class="col-md-6">
            </div>
        </div>

    </div>
</div>
@include('admin_tags.tags_edit_script')