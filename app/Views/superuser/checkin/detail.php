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
                    <div class="print">
                        <img src="/assets/media/image/logo-skala-big.png" alt="">

                        <h1 class="text-center my-3">Registration Form</h1>

                        <table border="0" width="100%" cellpadding="5">
                            <tr>
                                <td width="16%" style="border-top: 1px solid #000; border-left: 1px solid #000;">
                                    <strong style="border-bottom: 2px solid #000">Sure Name:</strong>
                                    <div class="text-muted">Nama Keluarga</div>
                                </td>
                                <td width="16%" style="border-top: 1px solid #000;"><?= $checkin->sure_name ?></td>
                                <td width="16%" style="border-top: 1px solid #000; border-left: 1px solid #000;">
                                    <strong style="border-bottom: 2px solid #000">Room Number:</strong>
                                    <div class="text-muted">Nomor Kamar</div>
                                </td>
                                <td width="16%" style="border-top: 1px solid #000;">
                                    <?php foreach ($booking as $b) : ?>
                                        <?= $b->number ?>,
                                    <?php endforeach; ?>
                                </td>
                                <td width="16%" style="border-top: 1px solid #000;">
                                    <strong style="border-bottom: 2px solid #000">Type of room:</strong>
                                    <div class="text-muted">Tipe kamar</div>
                                </td>
                                <td width="16%" style="border-top: 1px solid #000; border-right: 1px solid #000;">
                                    <?= $res->type ?>
                                </td>
                            </tr>

                            <tr>
                                <td width="16%" style="border-left: 1px solid #000;">
                                    <strong style="border-bottom: 2px solid #000">First Name</strong>
                                    <div class="text-muted">Nama Depan</div>
                                </td>
                                <td width="16%"><?= $res->name ?></td>
                                <td width="16%" style="border-left: 1px solid #000;">
                                    <strong style="border-bottom: 2px solid #000">Number of guest</strong>
                                    <div class="text-muted">Jumlah tamu</div>
                                </td>
                                <td width="16%">
                                    <?= $res->no_person ?>
                                </td>
                                <td width="16%">
                                    <strong style="border-bottom: 2px solid #000">Room Rate:</strong>
                                    <div class="text-muted">Harga Kamar</div>
                                </td>
                                <td width="16%" style="border-right: 1px solid #000;">
                                    Regular
                                </td>
                            </tr>

                            <tr>
                                <td width="16%" style="border-left: 1px solid #000;border-bottom: 1px solid #000;">
                                    <strong style="border-bottom: 2px solid #000;">Sex</strong>
                                    <div class="text-muted">Jenis Kelamin</div>
                                </td>
                                <td width="16%" style="border-bottom: 1px solid #000;"><?= $checkin->sex ?></td>
                                <td width="16%" style="border-bottom: 1px solid #000; border-left: 1px solid #000;"></td>
                                <td width="16%" style="border-bottom: 1px solid #000;"></td>
                                <td width="16%" style="border-bottom: 1px solid #000;"></td>
                                <td width="16%" style="border-bottom: 1px solid #000; border-right: 1px solid #000;"></td>
                            </tr>

                            <tr>
                                <td width="16%" style="border-left: 1px solid #000;">
                                    <strong style="border-bottom: 2px solid #000">Address:</strong>
                                    <div class="text-muted">Alamat</div>
                                </td>
                                <td width="16%"><?= $checkin->address ?></td>
                                <td width="16%" style="border-left: 1px solid #000;">
                                    <strong style="border-bottom: 2px solid #000">ID Number:</strong>
                                    <div class="text-muted">Nomor Identitas</div>
                                </td>
                                <td width="16%">
                                    <?= $checkin->id_number ?>
                                </td>
                                <td width="16%">
                                    <strong style="border-bottom: 2px solid #000">Date & place of issued</strong>
                                    <div class="text-muted">Tanggal & Tempat di keluarkan</div>
                                </td>
                                <td width="16%" style="border-right: 1px solid #000;">
                                    <?= $checkin->date_place_issued ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="16%" style="border-left: 1px solid #000; border-bottom: 1px solid #000;">

                                </td>
                                <td width="16%" style="border-bottom: 1px solid #000;"></td>
                                <td width="16%" style="border-left: 1px solid #000; border-bottom: 1px solid #000">
                                    <strong style="border-bottom: 2px solid #000">Nationality:</strong>
                                    <div class="text-muted">Kebangsaan</div>
                                </td>
                                <td width="16%" style="border-bottom: 1px solid #000">
                                    <?= $checkin->nationality ?>
                                </td>
                                <td width="16%" style="border-bottom: 1px solid #000">
                                    <strong style="border-bottom: 2px solid #000">Date of Birth</strong>
                                    <div class="text-muted">Tanggal kelahiran</div>
                                </td>
                                <td width="16%" style="border-right: 1px solid #000; border-bottom: 1px solid #000;">
                                    <?= $checkin->date_birth ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="16%" style="border-left: 1px solid #000;">
                                    <strong style="border-bottom: 2px solid #000">Company Name:</strong>
                                    <div class="text-muted">Nama perusahaan</div>
                                </td>
                                <td width="16%"><?= $res->company ?></td>
                                <td width="16%" style="border-left: 1px solid #000;">
                                    <strong style="border-bottom: 2px solid #000">Purposed Visit:</strong>
                                    <div class="text-muted">Maksud kedatangan</div>
                                </td>
                                <td width="16%">
                                    <?= $checkin->purposed_visit ?>
                                </td>
                                <td width="16%">
                                </td>
                                <td width="16%" style="border-right: 1px solid #000;">
                                </td>
                            </tr>
                            <tr>
                                <td width="16%" style="border-left: 1px solid #000;  border-bottom: 1px solid #000;">
                                    <strong style="border-bottom: 2px solid #000">Occupation:</strong>
                                    <div class="text-muted">Pekerjaan</div>
                                </td>
                                <td width="16%" style=" border-bottom: 1px solid #000;"><?= $checkin->occupation ?></td>
                                <td width="16%" style="border-left: 1px solid #000;  border-bottom: 1px solid #000;">
                                </td>
                                <td width="16%" style=" border-bottom: 1px solid #000;">
                                </td>
                                <td width="16%" style=" border-bottom: 1px solid #000;">
                                </td>
                                <td width="16%" style="border-right: 1px solid #000;  border-bottom: 1px solid #000;">
                                </td>
                            </tr>
                            <tr>
                                <td width="16%" style="border-left: 1px solid #000;">
                                    <strong style="border-bottom: 2px solid #000">Payment method:</strong>
                                    <div class="text-muted">Jenis Pembayaran</div>
                                </td>
                                <td width="16%"><?= $res->payment ?></td>
                                <td width="16%" style="border-left: 1px solid #000;">
                                    <strong style="border-bottom: 2px solid #000">Arrival Date:</strong>
                                    <div class="text-muted">Tanggal Kedatangan</div>
                                </td>
                                <td width="16%">
                                    <?= $checkin->arrival_date ?>
                                </td>
                                <td width="16%">
                                    <strong style="border-bottom: 2px solid #000">Time:</strong>
                                    <div class="text-muted">Jam</div>
                                </td>
                                <td width="16%" style="border-right: 1px solid #000;">
                                    <?= $checkin->arrival_time ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="16%" style="border-left: 1px solid #000; border-bottom: 1px solid #000;">

                                </td>
                                <td width="16%" style="border-bottom: 1px solid #000;"></td>
                                <td width="16%" style="border-left: 1px solid #000; border-bottom: 1px solid #000;">
                                    <strong style="border-bottom: 2px solid #000">Departure Date:</strong>
                                    <div class="text-muted">Tanggal keberangkatan</div>
                                </td>
                                <td width="16%" style="border-bottom: 1px solid #000;">
                                    <?= $checkin->departure_date ?>
                                </td>
                                <td width="16%" style="border-bottom: 1px solid #000;">
                                    <strong style="border-bottom: 2px solid #000">Time:</strong>
                                    <div class="text-muted">Jam</div>
                                </td>
                                <td width="16%" style="border-right: 1px solid #000; border-bottom: 1px solid #000;">
                                    <?= $checkin->departure_time ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" style="border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                    <b><u>Terms/ condition :</u></b><br>
                                    Syarat dan kondisi
                                    <p>
                                        1. The management reserves the right to demand full settlement of your account at any time Manajemen berhak meminta pembayaran penuh setiap saat<br>
                                        2. The management will not be responsible for valuable left or lost in the room Manajemen tidak bertanggungjawab atas hilangnya barang-barang berharga yang ditinggal di kamar<br>
                                        3. Guest may be required to place an advance deposit Tamu diminta untuk memberikan uang muka pembayaran<br>
                                        4. Check out time is 12 noon Jam keberangkatan adalah 12 siang<br>
                                        5. All rates are subject to 21% for service and tax Harga belum termasuk 21% untuk pelayanan dan pajak
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" valign="top" style="border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
                                    <b><u>Guest signature</u></b><br>
                                    Tanda tangan tamu
                                </td>
                                <td colspan="3" valign="top" style="border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                    <b><u>Clerk signature</u></b><br>
                                    Tanda tangan petugas
                                    <br><br><br><br>
                                    <b><u>Supervisor</u></b><br>
                                    Penyelia

                                </td>
                            </tr>
                        </table>
                    </div>

                    <hr>

                    <div class="text-center">
                        <a href="/superuser/reservation/cancel/<?= $res->id ?>" class="btn btn-warning" onclick="return confirm('Are you sure?')"><i class="fa fa-ban fa-2x"></i> &nbsp; CANCEL BOOKING</a>
                        <a href="#print" id="print-btn" class="btn btn-info"><i class="fa fa-print fa-2x"></i> &nbsp; Print</a>
                        <!-- <a href="/superuser/reservation/cancel/<?= $res->id ?>" class="btn btn-warning" onclick="return confirm('Are you sure?')"><i class="fa fa-ban fa-2x"></i> &nbsp; CHECKOUT</a> -->
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    $('#print-btn').on("click", function() {
        $('.print').printThis();
    });

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