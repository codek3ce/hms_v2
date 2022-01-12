<?= $this->extend('/superuser/template') ?>

<?= $this->section('content') ?>

<div class="page-header">
    <div class="container-fluid d-sm-flex justify-content-between">
        <h4><?= $title ?></h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Reservations</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Add New Reservation</li>
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
                    <h1 class="text-center">Reservation Form</h1>
                    <hr>
                    <form method="POST" class="mt-5">
                        <?= csrf_field() ?>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Name of Guest</strong>
                                <div class="text-muted">Nama Tamu</div>
                            </label>
                            <div class="col-sm-4">
                                <input type="text" name="name" class="form-control form-control-lg" required>
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">No. of Person</strong>
                                <div class="text-muted">Jumlah Tamu</div>
                            </label>
                            <div class="col-sm-4">
                                <input type="number" name="person" class="form-control form-control-lg" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Made by</strong>
                                <div class="text-muted">Dibuat oleh</div>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="made_by" class="form-control form-control-lg" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Phone No</strong>
                                <div class="text-muted">No. Telepon</div>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" class="form-control form-control-lg" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Company</strong>
                                <div class="text-muted">Perusahaan</div>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="company" class="form-control form-control-lg">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-6 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Arrival Date</strong>
                                        <div class="text-muted">Tanggal Kedatangan</div>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="date" name="arrival_date" class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-6 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Flight Number</strong>
                                        <div class="text-muted">No. Penerbangan</div>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="flight_number" class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-6 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Flight Hour</strong>
                                        <div class="text-muted">Jam Penerbangan</div>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="time" name="flight_hour" class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Departure Date</strong>
                                        <div class="text-muted">Tanggal Keberangkatan</div>
                                    </label>
                                    <div class="col-sm-2">
                                        <input type="date" name="departure_date" class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-7">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Type of Accommodation</strong>
                                        <div class="text-muted">Jenis Kamar</div>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $no = 1; ?>
                                        <?php foreach ($type as $t) : ?>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" name="type_accommodation[]" value="<?= $t->id ?>" id="type_accommodation<?= $no ?>" class="custom-control-input">
                                                <label class="custom-control-label" for="type_accommodation<?= $no ?>"><?= $t->name ?></label>
                                            </div>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Daily Rate/Category</strong>
                                        <div class="text-muted">Harga Kamar/Kategori</div>
                                    </label>
                                    <div class="col-sm-7">
                                        <select name="daily_rate" class="form-control form-control-lg">
                                            <?php foreach ($price as $p) : ?>
                                                <option value="<?= $p->id ?>"><?= $p->name . ' - ' . $p->type ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-8">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Guest Request</strong>
                                        <div class="text-muted">Permintaan Tamu</div>
                                    </label>
                                    <div class="col-sm-9">
                                        <textarea name="guest_request" class="form-control form-control-lg" id="editor"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-6 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Payment</strong>
                                        <div class="text-muted">Pembayaran</div>
                                    </label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="payment" value="Personal/Pribadi" id="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio">Personal/Pribadi</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="payment" value="Company/Perusahaan" id="customRadio2" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">Company/Perusahaan</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="payment" value="Travel Agent/Biro Perjalanan" id="customRadio3" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio3">Travel Agent/Biro Perjalanan</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="payment" value="Airlines/Penerbangan" id="customRadio4" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">Airlines/Penerbangan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-2x"></i> &nbsp; ADD RESERVATION</button>
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