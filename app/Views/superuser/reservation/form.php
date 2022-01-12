<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Reservation</title>
    <style>
        body {
            font-family: tahoma;
            font-size: 12px;
        }
    </style>
</head>

<body onload="window.print()">
    <table border="0" cellspacing="0" cellpadding="10" style="border: 1px solid #000">
        <tr>
            <td style="border-bottom: 1px solid #000"><img src="/assets/media/image/logo-skala.png"></td>
            <td colspan="5" style="border-bottom: 1px solid #000">
                <h2>RESERVATION FORM</h2>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid #000">
                <strong><u>Name of Guest</u></strong><br>
                Nama Tamu
            </td>
            <td style="border-bottom: 1px solid #000">:</td>
            <td style="border-bottom: 1px solid #000"><?= $res->name ?></td>
            <td align="right" style="border-bottom: 1px solid #000">No. of Person</td>
            <td style="border-bottom: 1px solid #000">:</td>
            <td style="border-bottom: 1px solid #000"><?= $res->no_person ?></td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid #000">
                <strong><u>Made by</u></strong><br>
                Dibuat Oleh
            </td>
            <td style="border-bottom: 1px solid #000">:</td>
            <td colspan="4" style="border-bottom: 1px solid #000"><?= $res->made_by ?></td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid #000">
                <strong><u>Phone No</u></strong><br>
                Nomor Telepon
            </td>
            <td style="border-bottom: 1px solid #000">:</td>
            <td colspan="4" style="border-bottom: 1px solid #000"><?= $res->phone ?></td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid #000">
                <strong><u>Company</u></strong><br>
                Perusahaan
            </td>
            <td style="border-bottom: 1px solid #000">:</td>
            <td colspan="4" style="border-bottom: 1px solid #000"><?= $res->company ?></td>
        </tr>
        <tr>
            <td colspan="2" align="center" style="border-bottom: 1px solid #000; border-right: 1px solid #000"><strong><u>Arrival Date</u></strong> / Tanggal Kedatangan<br><?= $res->arrival_date ?></td>
            <td colspan="2" align="center" style="border-bottom: 1px solid #000; border-right: 1px solid #000"><strong><u>Flight No/Hour</u></strong> / No. Penerbangan/Jam<br><?= $res->flight_number ?>/<?= $res->flight_hour ?></td>
            <td colspan="2" align="center" style="border-bottom: 1px solid #000"><strong><u>Departure Date</u></strong> / Tanggal Keberangkatan<br><?= $res->departure_date ?></td>
        </tr>
        <tr>
            <td colspan="4" style="border-bottom: 1px solid #000">
                <strong><u>Type of Accommodation</u></strong> / Jenis Kamar<br>
                <?php foreach ($type as $t) : ?>
                    <?php $acc = unserialize($res->type_accommodation); ?>
                    <input type="checkbox" <?= (in_array($t->id, $acc)) ? 'checked' : '' ?> disabled> <?= $t->name ?>
                <?php endforeach; ?>
            </td>
            <td colspan="2" style="border-bottom: 1px solid #000">
                <strong><u>Daily Rate/Category</u></strong> / Harga Kamar/Kategori<br>
                <?= $res->daily ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center" style="border-bottom: 1px solid #000; border-right: 1px solid #000">
                <strong><u>By</u></strong> / oleh<br>
                <?= $res->officer ?>
            </td>
            <td colspan="2" align="center" style="border-bottom: 1px solid #000; border-right: 1px solid #000">
                <strong><u>Date</u></strong> / Tanggal<br>
                <?= $res->created_at ?>
            </td>
            <td colspan="2" align="center" style="border-bottom: 1px solid #000">
                <strong><u>Time</u></strong> / Waktu<br>
                <?= date("H:i:s", strtotime($res->created_at)) ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <strong><u>Guest Request</u></strong> / Permintaan Tamu<br>
                <?= $res->guest_request ?>
            </td>
            <td colspan="2" align="right"><strong><u>Payment</u></strong><br>Pembayaran</td>
            <td>
                <input type="radio" <?= ($res->payment == 'Personal/Pribadi') ? 'checked' : '' ?> disabled>Personal/Pribadi<br>
                <input type="radio" <?= ($res->payment == 'Company/Perusahaan') ? 'checked' : '' ?> disabled>Company/Perusahaan<br>
                <input type="radio" <?= ($res->payment == 'Travel Agent/Biro') ? 'checked' : '' ?> disabled>Travel Agent/Biro<br>
                <input type="radio" <?= ($res->payment == 'Airlines/Penerbangan') ? 'checked' : '' ?> disabled>Airlines/Penerbangan<br>
            </td>
        </tr>
    </table>
</body>

</html>