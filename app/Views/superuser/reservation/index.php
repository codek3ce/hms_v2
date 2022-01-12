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
                    <table id="table" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Created At</th>
                                <th>Name</th>
                                <th width="150">Number Person</th>
                                <th>Made By</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="/vendors/dataTable/jquery.dataTables.min.js"></script>
<script src="/vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="/vendors/dataTable/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function() {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '/superuser/reservation/data',
            order: [
                [1, "desc"]
            ],
            columns: [{
                    data: 'no',
                    orderable: false
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'name'
                },
                {
                    data: 'no_person'
                },
                {
                    data: 'made_by'
                },
                {
                    data: 'phone'
                },
                {
                    data: 'status'
                },
                {
                    data: 'action',
                    orderable: false
                },
            ]
        });
    });
</script>

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
    <?php if (session()->getFlashdata('checkout_success')) : ?>
        Swal.fire({
            title: 'Success!',
            text: '<?= session()->getFlashdata('checkout_success') ?>',
            icon: 'success',
            confirmButtonText: 'Oke'
        })
    <?php elseif (session()->getFlashdata('checkout_failed')) : ?>
        Swal.fire({
            title: 'Failed!',
            text: '<?= session()->getFlashdata('checkout_failed') ?>',
            icon: 'error',
            confirmButtonText: 'Oke'
        })
    <?php endif; ?>
</script>
<?= $this->endSection() ?>