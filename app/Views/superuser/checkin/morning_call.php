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
                    <a href="#">Check In</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Morning Call Sheet</li>
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
                            <h1 class="text-center my-3">Morning Call Sheet</h1>
                            <table align="right">
                                <tr>
                                    <td>

                                        <h4>Prepared By: Night Operator on Duty</h4>
                                        <h4>Double Checked: Co-operator on duty</h4>
                                        <h4>Date: <?= date("d F Y", strtotime($_GET['date'])) ?></h4>
                                    </td>
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th align="center" colspan="2" width="10%">5.00</th>
                                        <th align="center" colspan="2" width="10%">5.15</th>
                                        <th align="center" colspan="2" width="10%">5.30</th>
                                        <th align="center" colspan="2" width="10%">5.45</th>
                                        <th align="center" colspan="2" width="10%">6.00</th>
                                        <th align="center" colspan="2" width="10%">6.15</th>
                                        <th align="center" colspan="2" width="10%">6.30</th>
                                        <th align="center" colspan="2" width="10%">6.45</th>
                                        <th align="center" colspan="2" width="10%">7.00</th>
                                        <th align="center" colspan="2" width="10%">7.15</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($call as $mc) : ?>
                                        <tr>
                                            <?php if ($mc->time == '5.00') : ?>
                                                <td>Room: <?= $mc->number ?></td>
                                                <td>Guest: <?= $mc->name ?></td>
                                            <?php else : ?>
                                                <td></td>
                                                <td></td>
                                            <?php endif ?>
                                            <?php if ($mc->time == '5.15') : ?>
                                                <td>Room: <?= $mc->number ?></td>
                                                <td>Guest: <?= $mc->name ?></td>
                                            <?php else : ?>
                                                <td></td>
                                                <td></td>
                                            <?php endif ?>
                                            <?php if ($mc->time == '5.30') : ?>
                                                <td>Room: <?= $mc->number ?></td>
                                                <td>Guest: <?= $mc->name ?></td>
                                            <?php else : ?>
                                                <td></td>
                                                <td></td>
                                            <?php endif ?>
                                            <?php if ($mc->time == '5.45') : ?>
                                                <td>Room: <?= $mc->number ?></td>
                                                <td>Guest: <?= $mc->name ?></td>
                                            <?php else : ?>
                                                <td></td>
                                                <td></td>
                                            <?php endif ?>
                                            <?php if ($mc->time == '6.00') : ?>
                                                <td>Room: <?= $mc->number ?></td>
                                                <td>Guest: <?= $mc->name ?></td>
                                            <?php else : ?>
                                                <td></td>
                                                <td></td>
                                            <?php endif ?>
                                            <?php if ($mc->time == '6.15') : ?>
                                                <td>Room: <?= $mc->number ?></td>
                                                <td>Guest: <?= $mc->name ?></td>
                                            <?php else : ?>
                                                <td></td>
                                                <td></td>
                                            <?php endif ?>
                                            <?php if ($mc->time == '6.30') : ?>
                                                <td>Room: <?= $mc->number ?></td>
                                                <td>Guest: <?= $mc->name ?></td>
                                            <?php else : ?>
                                                <td></td>
                                                <td></td>
                                            <?php endif ?>
                                            <?php if ($mc->time == '6.45') : ?>
                                                <td>Room: <?= $mc->number ?></td>
                                                <td>Guest: <?= $mc->name ?></td>
                                            <?php else : ?>
                                                <td></td>
                                                <td></td>
                                            <?php endif ?>
                                            <?php if ($mc->time == '7.00') : ?>
                                                <td>Room: <?= $mc->number ?></td>
                                                <td>Guest: <?= $mc->name ?></td>
                                            <?php else : ?>
                                                <td></td>
                                                <td></td>
                                            <?php endif ?>
                                            <?php if ($mc->time == '7.15') : ?>
                                                <td>Room: <?= $mc->number ?></td>
                                                <td>Guest: <?= $mc->name ?></td>
                                            <?php else : ?>
                                                <td></td>
                                                <td></td>
                                            <?php endif ?>
                                        </tr>
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