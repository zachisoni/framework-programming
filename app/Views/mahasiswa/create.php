<div class="card card-primary rounded-0">
    <div class="card-header">
        <h4 class="text-muted"><i class="far fa-plus-square"></i> Add New Contact Details</h4>
    </div>
    <div class="card-body">
        <div class="contianer-fluid d-flex justify-content-center">
            <form action="<?= base_url('main/mhs_save') ?>" method="POST" id="create-form" class="w-50">
                <input type="hidden" name="id">
                
                <div class="mb-3">
                    <label for="nim" class="control-label">NIM</label>
                    <input type="text" autofocus class="form-control form-control-border" id="nim" name="nim" value="<?= !empty($request->getPost('nim')) ? $request->getPost('nim') : '' ?>" required="required" placeholder="NIM">
                </div>
                <div class="mb-3">
                    <label for="nama" class="control-label">NIM</label>
                    <input type="text" autofocus class="form-control form-control-border" id="nama" name="nama" value="<?= !empty($request->getPost('nama')) ? $request->getPost('nama') : '' ?>" required="required" placeholder="Nama">
                </div>
                <div class="mb-3">
                    <label for="jk" class="control-label">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-select form-select-border" required>
                        <option <?= !empty($request->getPost('jk')) && $request->getPost('jk') == 'Laki-laki' ? 'selecte' : '' ?>>Laki-laki</option>
                        <option <?= !empty($request->getPost('jk')) && $request->getPost('jk') == 'Perempuan' ? 'selecte' : '' ?>>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir" class="control-label">Tempat Lahir</label>
                    <input type="text" autofocus class="form-control form-control-border" id="tempat_lahir" name="tempat_lahir" value="<?= !empty($request->getPost('tempat_lahir')) ? $request->getPost('tempat_lahir') : '' ?>" required="required" placeholder="Tempat Lahir">
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="control-label">Tanggal Lahir</label>
                    <input type="date" autofocus class="form-control form-control-border" id="tanggal_lahir" name="tanggal_lahir" value="<?= !empty($request->getPost('tanggal_lahir')) ? $request->getPost('tanggal_lahir') : '' ?>" required="required" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="control-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" required="required" value="<?= !empty($request->getPost('no_telp')) ? $request->getPost('no_telp') : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="control-label">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" required="required"><?= !empty($request->getPost('alamat')) ? $request->getPost('alamat') : '' ?></textarea>
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer text-center">
        <button class="btn btn-primary" form="create-form" type="submit"><i class="fa fa-save"></i> Save Details</button>
        <button class="btn btn-secondary" form="create-form" type="reset"><i class="fa fa-times"></i> Reset</button>
    </div>
</div>