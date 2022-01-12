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
                    <form class="form-inline" action="" method="GET">
                        <input type="date" name="date" class="form-control form-control-lg mr-2">
                        <input type="submit" value="Filter" class="btn btn-primary btn-lg">
                    </form>

                    <?php if (isset($_GET['date'])) : ?>
                        <hr>
                        <div class="print">
                            <img src="/assets/media/image/logo-skala-big.png" alt="">
                            <h1 class="text-center my-3">EXPECTED ARRIVAL LIST</h1>
                            <table width="100%">
                                <tr>
                                    <td width="50%">
                                        <h3>Day: <?= date("l", strtotime($_GET['date'])) ?></h3>
                                    </td>
                                    <td width="50%">
                                        <h3>Date: <?= date("d F Y", strtotime($_GET['date'])) ?></h3>
                                    </td>
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Room Type</th>
                                        <th>Guest Name</th>
                                        <th>Departure Date</th>
                                        <th>Remaks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($expected as $ex) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $ex->type ?></td>
                                            <td><?= $ex->name ?></td>
                                            <td><?= date("d/m/Y", strtotime($ex->departure_date)) ?></td>
                                            <td><?= $ex->guest_request ?></td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <a href="#print" id="print-btn" class="btn btn-primary text-white"><i class="fa fa-print mr-2"></i> Print</a>
                    <?php endif; ?>

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