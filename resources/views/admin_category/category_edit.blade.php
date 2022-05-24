<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form id="form_1">
                    <input type="hidden" name="id" value="<?=$form['id']?>">
                    <div class="form-group">
                        <label for="category_name">Category</label>
                        <input type="text" class="form-control" name="category_name" 
                        value="<?=$form['category_name']?>"
                        id="category_name" placeholder="Category">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-secondary" href="<?=url('admin/category')?>">
                Kembali</a>
                </form>
            </div>
            <div class="col-md-6">
            </div>
        </div>

    </div>
</div>
@include('admin_category.category_edit_script')