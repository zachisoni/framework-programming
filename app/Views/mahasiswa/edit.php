<div class="card card-primary rounded-0">
    <div class="card-header">
        <h4 class="text-muted"><i class="far fa-edit"></i> Edit Contact Details</h4>
    </div>
    <div class="card-body">
    <div class="contianer-fluid d-flex justify-content-center">
            <form action="<?= base_url('main/mhs_save') ?>" method="POST" id="create-form" class="w-50">
                <input type="hidden" name="id" value="<?= isset($data['id']) ? $data['id'] : '' ?>">
                
                <div class="mb-3">
                    <label for="nim" class="control-label">NIM</label>
                    <input type="text" autofocus class="form-control form-control-border" id="nim" name="nim" value="<?= isset($data['nim']) ? $data['nim'] : '' ?>" required="required" placeholder="NIM">
                </div>
                <div class="mb-3">
                    <label for="nama" class="control-label">NIM</label>
                    <input type="text" autofocus class="form-control form-control-border" id="nama" name="nama" value="<?= isset($data['nama']) ? $data['nama'] : '' ?>" required="required" placeholder="Nama">
                </div>
                <div class="mb-3">
                    <label for="jk" class="control-label">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-select form-select-border" required>
                        <option <?= isset($data['jk']) && $data['jk'] == 'Laki-laki' ? 'selecte' : '' ?>>Laki-laki</option>
                        <option <?= isset($data['jk']) && $data['jk'] == 'Perempuan' ? 'selecte' : '' ?>>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jp" class="control-label">Jenjang Pendidikan</label>
                    <select name="jp" id="jp" class="form-select form-select-border" required>
                        <option disabled>Pilih Jenjang</option>
                        <?php foreach ($jenjang as $jp): ?>
                            <option value="<?= $jp->nama?>" <?= isset($data['jp']) && $data['jp'] == $jp->nama ? 'selected' : '' ?>><?= $jp->nama;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status_nikah">Status Pernikahan</label>
                    <div class="form-check">
                        <input type="radio" name="status_pernikahan" 
                                id="lajang" value="Lajang" 
                                <?= isset($data['status_pernikahan']) && $data['status_pernikahan'] == 'Lajang' ? 'checked' : '' ?>>
                        <label for="lajang">Lajang</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="status_pernikahan" 
                                id="menikah" value="Sudah Menikah"
                                <?= isset($data['status_pernikahan']) && $data['status_pernikahan'] == 'Sudah Menikah' ? 'checked' : '' ?>>
                        <label for="menikah">Sudah Menikah</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir" class="control-label">Tempat Lahir</label>
                    <input type="text" autofocus class="form-control form-control-border" id="tempat_lahir" name="tempat_lahir" value="<?= isset($data['tempat_lahir']) ? $data['tempat_lahir'] : '' ?>" required="required" placeholder="Tempat Lahir">
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="control-label">Tanggal Lahir</label>
                    <input type="date" autofocus class="form-control form-control-border" id="tanggal_lahir" name="tanggal_lahir" value="<?= isset($data['tanggal_lahir']) ? $data['tanggal_lahir'] : '' ?>" required="required" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="control-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" required="required" value="<?= isset($data['no_telp']) ? $data['no_telp'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="control-label">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" required="required"><?= isset($data['alamat']) ? $data['alamat'] : '' ?></textarea>
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer text-center">
        <button class="btn btn-primary" form="create-form" type="submit"><i class="fa fa-save"></i> Save Details</button>
        <a class="btn btn-secondary" href="<?= base_url('main/mhs_view_details/'.(isset($data['id']) ? $data['id'] : '')) ?>"><i class="fa fa-times"></i> Cancel</a>
    </div>
</div>