<?= $this->extend('/superuser/template') ?>

<?= $this->section('css') ?>
<link type="text/css" rel="stylesheet" href="/vendors/image-uploader/src/image-uploader.css">

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
                    <a href="#">Rooms Type</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Add New Rooms Type</li>
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
                            <div class="col-md-7">
                                <h2>General Information</h2>
                                <hr>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Room Type Name</strong>
                                        <div class="text-muted">Nama Tipe Kamar</div>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control form-control-lg" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Room Type Code</strong>
                                        <div class="text-muted">Kode Tipe Kamar</div>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="code" class="form-control form-control-lg" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Facility</strong>
                                        <div class="text-muted">Fasilitas</div>
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" name="facility[]" value="Free Coffee" id="customCheckBoxInline1" class="custom-control-input">
                                            <label class="custom-control-label" for="customCheckBoxInline1">Free Coffee</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" name="facility[]" value="Morning News Paper" id="customCheckBoxInline2" class="custom-control-input">
                                            <label class="custom-control-label" for="customCheckBoxInline2">Morning News Paper</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" name="facility[]" value="WiFi" id="customCheckBoxInline3" class="custom-control-input">
                                            <label class="custom-control-label" for="customCheckBoxInline3">WiFi</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" name="facility[]" value="Swimming Poll" id="customCheckBoxInline4" class="custom-control-input">
                                            <label class="custom-control-label" for="customCheckBoxInline4">Swimming Poll</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Description</strong>
                                        <div class="text-muted">Kapasitas Umum</div>
                                    </label>
                                    <div class="col-sm-9">
                                        <textarea name="description" class="form-control form-control-lg"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Base Occupancy</strong>
                                        <div class="text-muted">Kapasitas Umum</div>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="number" name="base_occupancy" class="form-control form-control-lg">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Kids Occupancy</strong>
                                        <div class="text-muted">Kapasitas Anak</div>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="number" name="kids_occupancy" class="form-control form-control-lg">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Higher Occupancy</strong>
                                        <div class="text-muted">Kapasitas Maksimal</div>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="number" name="higher_occupancy" class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <h2>Images Gallery</h2>
                                <hr>
                                <div class="input-images"></div>
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
<script type="text/javascript" src="/vendors/image-uploader/src/image-uploader.js"></script>
<script>
    $('.input-images').imageUploader({
        imagesInputName: 'gallery',
    });
</script>
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