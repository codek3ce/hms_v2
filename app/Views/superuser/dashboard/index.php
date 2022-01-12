<?= $this->extend('/superuser/template') ?>

<?= $this->section('topbody') ?>
<div class="preloader-dashboard">
    <div class="preloader-icon"></div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- begin::page-header -->
<div class="page-header">
    <div class="container-fluid d-sm-flex justify-content-between">
        <h4><?= $title ?></h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Overview</li>
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

    $(window).on('load', function() {
        $('.preloader-dashboard').fadeOut(400, function() {
            setTimeout(function() {
                toastr.options = {
                    timeOut: 2000,
                    progressBar: true,
                    showMethod: "slideDown",
                    hideMethod: "slideUp",
                    showDuration: 200,
                    hideDuration: 200,
                    positionClass: "toast-top-center",
                };
                toastr.success('Welcome back <?= $session->full_name ?>');

                $('.theme-switcher').removeClass('open');
            }, 500);
        });
    });
</script>
<?= $this->endSection() ?>