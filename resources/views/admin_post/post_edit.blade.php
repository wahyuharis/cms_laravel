<div class="card">
    <div class="card-body">
        <form id="form_1" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="id" value="<?= $form['id'] ?>">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="<?= $form['title'] ?>" id="title" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" name="slug" value="<?= $form['slug'] ?>" id="slug" placeholder="Slug">
                    </div>


                    <div class="form-group">
                        <label for="id_post_category">Category</label>
                        <select id="id_post_category" name="id_post_category" class="form-control">
                            <option value=""> --Pilih Category-- </option>
                            <?php foreach ($form['opt_category'] as $row) { ?>
                                <option value="<?= $row->id_category ?>" <?php if ($row->id_category == $form['id_post_category']) echo 'selected' ?>> <?= $row->category_name ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_post_category">Tags</label>
                        <select id="tags" name="tags[]" class="form-control" multiple>
                            <?php foreach ($form['opt_tags'] as $row) { ?>
                                <?php
                                $selected = '';
                                foreach ($form['tags'] as $row2) {
                                    if ($row2->id_post_tags == $row->id_post_tags) {
                                        $selected = 'selected';
                                    }
                                }
                                ?>
                                <option value="<?= $row->id_post_tags ?>" <?= $selected ?>> <?= $row->tags_name ?> </option>
                            <?php } ?>
                        </select>
                    </div>


                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="post_date">Tanggal Post</label>
                        <input type="text" class="form-control" name="post_date" value="<?= $form['post_date'] ?>" id="post_date" placeholder="Tanggal Post">
                    </div>

                    <div class="form-group">
                        <label for="active">Status Post</label>
                        <select id="active" name="active" class="form-control">
                            <option value=""> --Pilih Status-- </option>
                            <?php foreach ($form['opt_active'] as $key => $val) { ?>
                                <option <?php if ($key == $form['active']) echo 'selected' ?> value="<?= $key ?>"> <?= $val ?> </option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="image">Image</label>
                                <br>
                                <?php if (!empty(trim($form['image']))) { ?>
                                    <img id="image_uploaded" src="<?= url('upload/' . $form['image']) ?>" style="height: 100px;width: 100px;border: 1px solid #ccc;">
                                <?php } ?><br>
                                <input type="file" name="image" id="image" accept="image/*" onchange="loadFile(event);">
                                <br>
                                <br>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea style="height: 550px;" id="content" name="content" class="form-control"><?= $form['content'] ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-secondary" href="<?= url('admin/post') ?>">
                        Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@include('admin_post.post_edit_script')