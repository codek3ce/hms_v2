<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Reservation</title>
    <style>
        body {
            font-family: arial;
            font-size: 12px;
        }

        .cetak {
            width: 700px;
            margin: auto;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="cetak">
        <center><img src="/assets/media/image/logo-skala.png" width="150px"></center>

        <table border="0" cellspacing="0" cellpadding="5" style="padding-left:50px; margin-top:50px" width="100%">
            <tr>
                <td width="150">To</td>
                <td width="5"></td>
                <td></td>
            </tr>
            <tr>
                <td>Fax</td>
                <td>:</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Date</td>
                <td>:</td>
                <td><?= $res->created_at ?></td>
            </tr>
            <tr>
                <td>From</td>
                <td>:</td>
                <td>Skala Hotel</td>
            </tr>
            <tr>
                <td>Subject</td>
                <td>:</td>
                <td>Room Reservation</td>
            </tr>
            <tr>
                <td>Page</td>
                <td>:</td>
                <td>1</td>
            </tr>
        </table>
        <p>Dear: <?= $res->name ?></p>
        <p>Further to your fax regarding room reservation, we are pleased to confirm your reservation as follows :</p>
        <table border="0" cellspacing="0" cellpadding="5" style="padding-left:50px" width="100%">
            <tr>
                <td width="150">Name</td>
                <td width="5">:</td>
                <td><?= $res->name ?></td>
            </tr>
            <tr>
                <td>Period of stay</td>
                <td>:</td>
                <td><?= $res->start_date . ' - ' . $res->end_date ?></td>
            </tr>
            <tr>
                <td>Room type</td>
                <td>:</td>
                <td><?= $res->name ?></td>
            </tr>
            <tr>
                <td>No. of guest</td>
                <td>:</td>
                <td><?= $res->no_person ?></td>
            </tr>
            <tr>
                <td>Room rate</td>
                <td>:</td>
                <td><?= $res->daily ?></td>
            </tr>
            <tr>
                <td>Arrival flight</td>
                <td>:</td>
                <td><?= $res->arrival_date ?></td>
            </tr>
            <tr>
                <td>Airport transfer</td>
                <td>:</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Method of payment</td>
                <td>:</td>
                <td><?= $res->payment ?></td>
            </tr>
            <tr>
                <td>Remarks</td>
                <td>:</td>
                <td><?= $res->guest_request ?></td>
            </tr>
        </table>
        <p>Thank you for choosing Skala Hotel, we are look forward to welcoming you to our hotel.</p>
        <p style="margin-bottom: 100px;">Sincerely yours,</p>
        <p>Reservation manager</p>
    </div>
</body>

</html>