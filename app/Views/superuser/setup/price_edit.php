<?= $this->extend('/superuser/template') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="/vendors/datepicker/daterangepicker.css" type="text/css">
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
                    <a href="#">Price Lists</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Price</li>
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
                                    <label for="inputPassword" class="col-sm-2 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Room Type</strong>
                                        <div class="text-muted">Tipe Kamar</div>
                                    </label>
                                    <div class="col-sm-10">
                                        <select name="rooms_type_id" class="form-control form-control-lg" disabled>
                                            <?php foreach ($type as $type) : ?>
                                                <option value="<?= $type->id ?>" <?= ($type->id == $price->rooms_type_id) ?>><?= $type->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Set Regular Price</strong>
                                        <div class="text-muted">Set Harga Normal</div>
                                    </label>
                                    <div class="col-sm-3">
                                        <input type="text" name="regular" class="form-control form-control-lg" id="regularPrice">
                                    </div>
                                    <div class="col-sm-7">
                                        <button type="button" onclick="setRegular()" class="btn btn-primary">Set Price to All Day</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Regular Price</strong>
                                        <div class="text-muted">Harga Normal</div>
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Monday</label>
                                                <input type="number" name="mon" class="form-control form-control-lg" id="dayRegular1" value="<?= $price->mon ?>" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Tuesday</label>
                                                <input type="number" name="tue" class="form-control form-control-lg" id="dayRegular2" value="<?= $price->tue ?>" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Wednesday</label>
                                                <input type="number" name="wed" class="form-control form-control-lg" id="dayRegular3" value="<?= $price->wed ?>" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Thursday</label>
                                                <input type="number" name="thu" class="form-control form-control-lg" id="dayRegular4" value="<?= $price->thu ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-3">
                                                <label for="">Friday</label>
                                                <input type="number" name="fri" class="form-control form-control-lg" id="dayRegular5" value="<?= $price->fri ?>" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Saturday</label>
                                                <input type="number" name="sat" class="form-control form-control-lg" id="dayRegular6" value="<?= $price->sat ?>" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Sunday</label>
                                                <input type="number" name="sun" class="form-control form-control-lg" id="dayRegular7" value="<?= $price->sun ?>" required>
                                            </div>
                                        </div>
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
<script src="/vendors/datepicker/daterangepicker.js"></script>

<script>
    function setRegular() {

        var text = document.getElementById('regularPrice');
        var input1 = document.getElementById('dayRegular1');
        var input2 = document.getElementById('dayRegular2');
        var input3 = document.getElementById('dayRegular3');
        var input4 = document.getElementById('dayRegular4');
        var input5 = document.getElementById('dayRegular5');
        var input6 = document.getElementById('dayRegular6');
        var input7 = document.getElementById('dayRegular7');
        input1.value = text.value;
        input2.value = text.value;
        input3.value = text.value;
        input4.value = text.value;
        input5.value = text.value;
        input6.value = text.value;
        input7.value = text.value;
    }

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