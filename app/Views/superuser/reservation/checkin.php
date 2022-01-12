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
                <li class="breadcrumb-item active" aria-current="page">Check In</li>
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
                    <h1 class="text-center">Registration Form</h1>
                    <hr>
                    <form method="POST" class="mt-5">
                        <?= csrf_field() ?>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Sure Name:</strong>
                                <div class="text-muted">Nama Keluarga</div>
                            </label>
                            <div class="col-sm-2">
                                <input type="text" name="sure_name" class="form-control form-control-lg" value="<?= $res->name ?>" required>
                            </div>
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Room Number:</strong>
                                <div class="text-muted">Nomor Kamar</div>
                            </label>
                            <div class="col-sm-2">
                                <?php foreach ($booking as $b) : ?>
                                    <?= $b->number ?>,
                                <?php endforeach; ?>
                            </div>
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Type of room:</strong>
                                <div class="text-muted">Tipe kamar</div>
                            </label>
                            <div class="col-sm-2">
                                <?= $res->type ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">First Name</strong>
                                <div class="text-muted">Nama Depan</div>
                            </label>
                            <div class="col-sm-2">
                                <?= $res->name ?>
                            </div>
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Number of guest</strong>
                                <div class="text-muted">Jumlah tamu</div>
                            </label>
                            <div class="col-sm-2">
                                <?= $res->no_person ?>
                            </div>
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Room Rate:</strong>
                                <div class="text-muted">Harga Kamar</div>
                            </label>
                            <div class="col-sm-2">
                                Regular
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Sex:</strong>
                                <div class="text-muted">Jenis Kelamin</div>
                            </label>
                            <div class="col-sm-2">
                                <input type="text" name="sex" class="form-control form-control-lg" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Address:</strong>
                                <div class="text-muted">Alamat</div>
                            </label>
                            <div class="col-sm-2">
                                <input type="text" name="address" class="form-control form-control-lg" required>
                            </div>
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">ID Number:</strong>
                                <div class="text-muted">Nomor Identitas</div>
                            </label>
                            <div class="col-sm-2">
                                <input type="text" name="id_number" class="form-control form-control-lg" required>
                            </div>
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Date & place of issued</strong>
                                <div class="text-muted">Tanggal & Tempat di keluarkan</div>
                            </label>
                            <div class="col-sm-2">
                                <input type="text" name="date_issue" class="form-control form-control-lg" required>
                            </div>
                            <label class="col-sm-2 col-form-label">
                                &nbsp;
                            </label>
                            <div class="col-sm-2">
                                &nbsp;
                            </div>
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Nationality:</strong>
                                <div class="text-muted">Kebangsaan</div>
                            </label>
                            <div class="col-sm-2">
                                <input type="text" name="nationality" class="form-control form-control-lg" required>
                            </div>
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Date of Birth</strong>
                                <div class="text-muted">Tanggal kelahiran</div>
                            </label>
                            <div class="col-sm-2">
                                <input type="date" name="date_birth" class="form-control form-control-lg" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Company Name:</strong>
                                <div class="text-muted">Nama perusahaan</div>
                            </label>
                            <div class="col-sm-2">
                                <?= $res->company ?>
                            </div>
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Purposed Visit:</strong>
                                <div class="text-muted">Maksud kedatangan</div>
                            </label>
                            <div class="col-sm-2">
                                <select name="purposed_visit" class="form-control form-control-lg">
                                    <option value="Pleasure">Pleasure</option>
                                    <option value="Business">Business</option>
                                    <option value="Official">Official</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Occupation:</strong>
                                <div class="text-muted">Pekerjaan</div>
                            </label>
                            <div class="col-sm-2">
                                <input type="text" name="occupation" class="form-control form-control-lg" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Payment method:</strong>
                                <div class="text-muted">Jenis Pembayaran</div>
                            </label>
                            <div class="col-sm-2">
                                <?= $res->payment ?>
                            </div>
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Arrival Date:</strong>
                                <div class="text-muted">Tanggal Kedatangan</div>
                            </label>
                            <div class="col-sm-2">
                                <input type="date" value="<?= $res->arrival_date ?>" name="arrival_date" class="form-control form-control-lg" required>
                            </div>
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Time:</strong>
                                <div class="text-muted">Jam</div>
                            </label>
                            <div class="col-sm-2">
                                <input type="time" name="arrival_time" class="form-control form-control-lg" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                            </label>
                            <div class="col-sm-2">
                            </div>
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Departure Date:</strong>
                                <div class="text-muted">Tanggal keberangkatan</div>
                            </label>
                            <div class="col-sm-2">
                                <input type="date" value="<?= $res->departure_date ?>" name="departure_date" class="form-control form-control-lg" required>
                            </div>
                            <label class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Time:</strong>
                                <div class="text-muted">Jam</div>
                            </label>
                            <div class="col-sm-2">
                                <input type="time" name="departure_time" class="form-control form-control-lg" required>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <a href="/superuser/reservation/cancel/<?= $res->id ?>" class="btn btn-warning" onclick="return confirm('Are you sure?')"><i class="fa fa-ban fa-2x"></i> &nbsp; CANCEL BOOKING</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-arrow-down fa-2x"></i> &nbsp; CHECK IN</button>
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