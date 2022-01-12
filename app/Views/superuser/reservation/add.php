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
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">No. of Person</strong>
                                <div class="text-muted">Jumlah Tamu</div>
                            </label>
                            <div class="col-sm-4">
                                <input type="number" name="person" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Made by</strong>
                                <div class="text-muted">Dibuat oleh</div>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="made_by" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Phone No</strong>
                                <div class="text-muted">No. Telepon</div>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Company</strong>
                                <div class="text-muted">Perusahaan</div>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="company" class="form-control">
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
                                        <input type="date" name="arrival_date" class="form-control">
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
                                        <input type="text" name="flight_number" class="form-control">
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
                                        <input type="time" name="flight_hour" class="form-control">
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
                                        <input type="date" name="departure_date" class="form-control">
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
                                        <select name="daily_rate" class="form-control">
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
                            <div class="col-sm-4">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Guest Request</strong>
                                        <div class="text-muted">Permintaan Tamu</div>
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea name="guest_request" class="form-control" id="editor"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-6 col-form-label">
                                        <strong style="border-bottom: 2px solid #000">Guest Category</strong>
                                        <div class="text-muted">Kategori Tamu</div>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="guest_category" class="form-control">
                                            <option value="Personal/Pribadi">Personal/Pribadi</option>
                                            <option value="Company/Perusahaan">Company/Perusahaan</option>
                                            <option value="Travel Agent/Biro Perjalanan">Travel Agent/Biro Perjalanan</option>
                                            <option value="Airlines/Penerbangan">Airlines/Penerbangan</option>
                                        </select>
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
                                                <input type="radio" name="payment" value="Cash" id="cash" class="custom-control-input" onclick="javascript:depositChange();">
                                                <label class="custom-control-label" for="cash">Cash</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="payment" value="Deposit" id="deposit" class="custom-control-input" onclick="javascript:depositChange();">
                                                <label class="custom-control-label" for="deposit">Deposit</label>
                                            </div>
                                        </div>
                                        <input type="number" name="deposit" id="depositInput" class="form-control" value="" placeholder="Jumlah Deposit" style="display: none;">
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
    function depositChange() {
        if (document.getElementById('deposit').checked) {
            document.getElementById('depositInput').style.display = 'block';
        } else document.getElementById('depositInput').style.display = 'none';
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