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
                        <div class="invoice">
                            <div class="d-md-flex justify-content-between align-items-center">
                                <h2 class="font-weight-800 d-flex align-items-center">
                                    <img class="m-r-20" src="/assets/media/image/logo-skala-big.png" alt="image" height="100px">
                                </h2>
                                <h3 class="text-xs-left m-b-0">Invoice #<?= $segment[3] ?></h3>
                            </div>
                            <hr class="m-t-b-50">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        <b>Hotel SKALA</b>
                                    </p>
                                    <p>Jl Jendral Sudirman No 18 Lamongan,<br>Jawa Timur<br>62212</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-right">
                                        <b>Invoice to</b>
                                    </p>
                                    <p class="text-right"><?= $res->name ?><br><?= $res->phone ?></p>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-4 mt-4">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Description</th>
                                            <!-- <th class="text-right">Quantity</th> -->
                                            <th class="text-right">Unit cost</th>
                                            <!-- <th class="text-right">Total</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $total = 0;
                                        ?>
                                        <?php foreach ($invoice as $inv) : ?>
                                            <tr class="text-right">
                                                <td class="text-left"><?= $no ?></td>
                                                <td class="text-left"><?= $inv->item ?></td>
                                                <!-- <td>2</td> -->
                                                <td>IDR <?= number_format($inv->price, 0, '.', ',') ?></td>
                                                <!-- <td>$40</td> -->
                                            </tr>
                                            <?php
                                            $no++;
                                            $total += $inv->price;
                                            ?>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right">
                                <!-- <p>Sub - Total amount: $12,348</p>
                                <p>vat (10%) : $138</p> -->
                                <h4 class="font-weight-800">Total : <?= number_format($total, 0, '.', ',') ?></h4>
                            </div>
                            <p class="text-center small text-muted  m-t-50">
                                <span class="row">
                                    <span class="col-md-6 offset-3">
                                        <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, at. -->
                                    </span>
                                </span>
                            </p>
                        </div>
                        <div class="text-right d-print-none">
                            <hr class="mb-5 mt-5">
                            <!-- <a href="#" class="btn btn-primary">
                                <i data-feather="send" class="mr-2"></i> Send Invoice
                            </a> -->
                            <a href="javascript:window.print()" class="btn btn-success m-l-5">
                                <i data-feather="printer" class="mr-2"></i> Print
                            </a>
                        </div>
                    </div>
                    <!-- <a href="#print" id="print-btn" class="btn btn-primary text-white"><i class="fa fa-print mr-2"></i> Print</a> -->

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