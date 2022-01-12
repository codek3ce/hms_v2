<?= $this->extend('/superuser/template') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="/vendors/dataTable/dataTables.min.css" type="text/css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="page-header">
    <div class="container-fluid d-sm-flex justify-content-between">
        <h4><?= $title ?></h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Reservations</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">All Reservation</li>
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
                        <h1 class="text-center my-3">RESERVATION DIARY</h1>

                        <table class="table table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>Date of Booking</th>
                                    <th>Folio No</th>
                                    <th>Date of Arrival</th>
                                    <th>Name</th>
                                    <th>Room Type</th>
                                    <th>Rate</th>
                                    <th>Length of Stay</th>
                                    <th>Remaks</th>
                                    <th>Room No</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?= $diary ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="#print" id="print-btn" class="btn btn-primary text-white"><i class="fa fa-print mr-2"></i> Print</a>
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

    <?php if (session()->getFlashdata('delete_success')) : ?>
        Swal.fire({
            title: 'Success!',
            text: '<?= session()->getFlashdata('delete_success') ?>',
            icon: 'success',
            confirmButtonText: 'Oke'
        })
    <?php elseif (session()->getFlashdata('delete_failed')) : ?>
        Swal.fire({
            title: 'Failed!',
            text: '<?= session()->getFlashdata('delete_failed') ?>',
            icon: 'error',
            confirmButtonText: 'Oke'
        })
    <?php endif; ?>
</script>
<?= $this->endSection() ?>