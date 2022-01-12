<?= $this->extend('/superuser/template') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="/vendors/dataTable/dataTables.min.css" type="text/css">
<link rel="stylesheet" href="/vendors/dataTable/responsive.bootstrap4.min.js" type="text/css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="page-header">
    <div class="container-fluid d-sm-flex justify-content-between">
        <h4><?= $title ?></h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Setup</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Rooms</li>
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
                                <th>Room Number</th>
                                <th>Room Type</th>
                                <th>Status</th>
                                <th>Act.</th>
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
            ajax: '/superuser/setup/rooms_data',
            order: [],
            columns: [{
                    data: 'no',
                    orderable: false
                },
                {
                    data: 'number'
                },
                {
                    data: 'type'
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