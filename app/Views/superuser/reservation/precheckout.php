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
                <li class="breadcrumb-item active" aria-current="page">Payment</li>
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
                    <form method="POST" action="<?= base_url('superuser/reservation/checkout/' . $segment[3]) ?>">
                        <?= csrf_field() ?>
                        <h3>Pilih metode pembayaran</h3>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" name="payment" value="Cash" id="cash" class="custom-control-input" onclick="javascript:depositChange();" <?= ($res->payment == 'Cash') ? 'checked' : '' ?>>
                                <label class="custom-control-label" for="cash">Cash</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" name="payment" value="Deposit" id="deposit" class="custom-control-input" onclick="javascript:depositChange();" <?= ($res->payment == 'Deposit') ? 'checked' : '' ?>>
                                <label class="custom-control-label" for="deposit">Deposit</label>
                            </div>
                        </div>
                        <div <?= ($res->payment == 'Cash') ? 'style="display: none;"' : '' ?> id="depositInput">
                            <h4>Saldo: Rp. <?= $res->deposit ?></h4>
                        </div>
                        <input type="hidden" name="deposit" value="<?= $res->deposit ?>">
                        <hr>
                        Total Invoice:
                        <input type="number" name="jumlah_tagihan" value="<?= $invoice->price ?>" id="depositInput2" class="form-control" readonly>
                        <input type="submit" class="btn btn-primary mt-3" value="Checkout">
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