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
                <li class="breadcrumb-item active" aria-current="page">Choose Rooms</li>
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
                    <h1 class="text-center">Choose Rooms</h1>
                    <hr>
                    <h2>Room Type</h2>
                    <form action="/superuser/reservation/change_room/<?= $segment[3] ?>">
                        <?php
                        $type_accommodation = unserialize($res->type_accommodation);
                        ?>
                        <?php $no = 1; ?>
                        <?php foreach ($rooms_type as $t) : ?>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" name="type_accommodation[]" value="<?= $t->id ?>" id="type_accommodation<?= $no ?>" class="custom-control-input" <?= (in_array($t->id, $type_accommodation)) ? 'checked' : '' ?> onchange="this.form.submit()">
                                <label class="custom-control-label" for="type_accommodation<?= $no ?>"><?= $t->name ?></label>
                            </div>
                            <?php $no++; ?>
                        <?php endforeach; ?>

                    </form>
                    <form method="POST" class="mt-5" action="/superuser/reservation/book_finish/<?= $segment[3] ?>">
                        <?= csrf_field() ?>
                        <h2>Available Rooms</h2>
                        <?= $rooms ?>

                        <div class="alert alert-info mt-3">
                            Please select the room availability above, if the red room means the room has been booked, please choose another room or select the room type above.
                            <hr>
                            Silahkan Pilih ketersediaan kamar di atas, jika kamar warna merah berarti kamar sudah di booking, silahkan pilih kamar lain atau pilih jenis kamar di atas.
                        </div>

                        <hr>


                        <h2>Selected Rooms</h2>
                        <table class="table table-bordered">
                            <tr class="thead-dark">
                                <th>Type</th>
                                <th>Number Room</th>
                                <th>Reg. Price</th>
                            </tr>
                            <?php foreach ($booked as $b) : ?>
                                <tr>
                                    <td><a href="/superuser/reservation/book_delete/<?= $segment[3] ?>/<?= $b->id ?>"><i class="fa fa-trash"></i></a> <?= $b->type ?></td>
                                    <td><?= $b->number ?></td>
                                    <td><?= $b->price ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <hr>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Date Check in</strong>
                                <div class="text-muted">Tanggal Check in</div>
                            </label>
                            <div class="col-sm-4">
                                <input type="date" name="start" value="<?= $res->arrival_date ?>" class="form-control form-control-lg" required>
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label">
                                <strong style="border-bottom: 2px solid #000">Date Check out</strong>
                                <div class="text-muted">Tanggal Check out</div>
                            </label>
                            <div class="col-sm-4">
                                <input type="date" name="end" value="<?= $res->departure_date ?>" class="form-control form-control-lg" required>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-2x"></i> &nbsp; BOOK NOW</button>
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