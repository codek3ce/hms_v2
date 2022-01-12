<?= $this->extend('/superuser/template') ?>

<?= $this->section('css') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="page-header">
    <div class="container-fluid d-sm-flex justify-content-between">
        <h4><?= $title ?></h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Setup</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Rooms</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Rooms</li>
            </ol>
        </nav>
    </div>
</div>
<!-- end::page-header -->

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Room Type</strong>
                                        <div class="text-muted">Tipe Kamar</div>
                                    </label>
                                    <div class="col-sm-9">
                                        <select name="type_id" class="form-control form-control-lg">
                                            <?php foreach ($type as $type) : ?>
                                                <option value="<?= $type->id ?>" <?= ($rooms->type_id == $type->id) ? 'selected' : '' ?>><?= $type->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Room Type Code</strong>
                                        <div class="text-muted">Kode Tipe Kamar</div>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="number" class="form-control form-control-lg" value="<?= $rooms->number ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Room Status</strong>
                                        <div class="text-muted">Status Kamar</div>
                                    </label>
                                    <div class="col-sm-9">
                                        <select name="status" class="form-control form-control-lg">
                                            <option value="Occupied Dirty (OD)" <?= ($rooms->status == 'Occupied Dirty (OD)') ? 'selected' : '' ?>>Occupied Dirty (OD)</option>
                                            <option value="Occupied Clean (OC) [Ready For Booking]" <?= ($rooms->status == 'Occupied Clean (OC) [Ready For Booking]') ? 'selected' : '' ?>>Occupied Clean (OC) [Ready For Booking]</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-2x"></i> &nbsp; SAVE</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>

<script>
    <?php if (session()->getFlashdata('success')) : ?>
        Swal.fire({
            title: 'Success!',
            text: '<?= session()->getFlashdata('success') ?>',
            icon: 'success',
            confirmButtonText: 'Oke'
        })
    <?php elseif (session()->getFlashdata('failed')) : ?>
        Swal.fire({
            title: 'Failed!',
            text: '<?= session()->getFlashdata('failed') ?>',
            icon: 'error',
            confirmButtonText: 'Oke'
        })
    <?php endif; ?>
</script>
<?= $this->endSection() ?>