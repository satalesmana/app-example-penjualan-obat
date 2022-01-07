<form action="<?php echo site_url('register'); ?>" method="POST">
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Nama Pengguna</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" name="nama_pengguna">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Alamat Email</label>
        <div class="col-sm-9">
        <input type="email" class="form-control" name="email">
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-9">
        <input type="passord" class="form-control" name="password">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-3 col-form-label"> &nbsp; </label>
        <div class="col-sm-9">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>
</form>