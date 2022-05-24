<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form id="form_1">
                    <input type="hidden" name="id" value="<?= $form['id'] ?>">

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" value="<?= $form['username'] ?>" id="username" placeholder="Username">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value="<?= $form['email'] ?>" id="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>

                        <select class="form-control" name="role" id="role" placeholder="Role">
                            <option value="" >--Pilih Role--</option>
                            <?php
                            foreach ($form['opt_role'] as $roleopt) {
                            ?>
                                <option value="<?= $roleopt->id_users_role ?>" <?php if($roleopt->id_users_role==$form['role']) echo "selected" ?> >
                                    <?= $roleopt->users_role_name ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" value="<?= $form['password'] ?>" id="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="password2">Re Enter Password</label>
                        <input type="password" class="form-control" name="password2" value="<?= $form['password2'] ?>" id="password2" placeholder="Password">
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-secondary" href="<?= url('admin/user') ?>">
                        Kembali</a>
                </form>
            </div>
            <div class="col-md-6">
            </div>
        </div>

    </div>
</div>
@include('admin_users.users_edit_script')