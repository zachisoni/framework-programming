<div class="card card-outline card-primary rounded-0">
    <div class="card-header">
        <div class="h4 mb-0">Contact Details</div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <dl>
                <dt class="text-muted">NIM</dt>
                <dd class="ps-4"><?= isset($data['nim']) ? $data['nim'] : '' ?></dd>
                <dt class="text-muted">Nama</dt>
                <dd class="ps-4"><?= isset($data['nama']) ? $data['nama'] : '' ?></dd>
                <dt class="text-muted">Jenis Kelamin</dt>
                <dd class="ps-4"><?= isset($data['jk']) ? $data['jk'] : '' ?></dd>
                <dt class="text-muted">Jenjang Pendidikan</dt>
                <dd class="ps-4"><?= isset($data['jp']) ? $data['jp'] : '' ?></dd>
                <dt class="text-muted">Status Pernikahan</dt>
                <dd class="ps-4"><?= isset($data['status_pernikahan']) ? $data['status_pernikahan'] : '' ?></dd>
                <dt class="text-muted">Tempat Lahir</dt>
                <dd class="ps-4"><?= isset($data['tempat_lahir']) ? $data['tempat_lahir'] : '' ?></dd>
                <dt class="text-muted">Tanggal Lahir</dt>
                <dd class="ps-4"><?= isset($data['tanggal_lahir']) ? $data['tanggal_lahir'] : '' ?></dd>
                <dt class="text-muted">No Telp</dt>
                <dd class="ps-4"><?= isset($data['no_telp']) ? $data['no_telp'] : '' ?></dd>
                <dt class="text-muted">Alamat</dt>
                <dd class="ps-4"><?= isset($data['alamat']) ? $data['alamat'] : '' ?></dd>
            </dl>
        </div>
    </div>
    <div class="card-footer text-center">
            <a href="<?= base_url('main/mhs_edit/'.(isset($data['id']) ? $data['id'] : '')) ?>" class="btn btn btn-primary btn-sm rounded-0"><i class="fa fa-edit"></i> Edit</a>
            <a href="<?= base_url('main/mhs_delete/'.(isset($data['id']) ? $data['id'] : '')) ?>" class="btn btn btn-danger btn-sm rounded-0" onclick="if(confirm('Are you sure to delete this contact details?') === false) event.preventDefault()"><i class="fa fa-trash"></i> Delete</a>
            <a href="<?= base_url('main/mhs') ?>" class="btn btn btn-light bg-gradient-light border btn-sm rounded-0"><i class="fa fa-angle-left"></i> Back to List</a>
    </div>
</div>