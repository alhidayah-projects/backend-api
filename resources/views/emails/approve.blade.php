<h1>Terima Kasih Anda Telah Berdonasi</h1>
    <p>Yang Terhormat Bapak/Ibu {{ $data->nama }},</p>
    <strong>Kami Memberitahukan Bahwa Donasi Anda Telah Disetujui</strong>
    <p>Dengan rician donasi sebagai berikut :</p>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{$data->nama}}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{$data->alamat}}</td>
        </tr>
        <tr>
            <td>No.telepon</td>
            <td>:</td>
            <td>{{$data->telepon}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{$data->email}}</td>
        </tr>
        <tr>
            <td>Jenis donasi</td>
            <td>:</td>
            <td>{{$data->jenis_donasi}}</td>
        </tr>
        <tr>
            <td>Nominal</td>
            <td>:</td>
            <td>{{$data->nominal}}</td>
        </tr>
        <!-- join table rekening_id in name rekenings -->
        <tr>
            <td>Bank</td>
            <td>:</td>
            <td>{{$data->nama_bank}}</td>
        </tr>

        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td>{{$data->keterangan}}</td>
        </tr>
    </table>

    <table style="margin-left:auto;margin-right:auto;width:80%;text-align:center;background-color:green;">
        <tr>
            <th>Donasi ID : {{$data->donasi_id}}</th>
            <th>Status Donasi : Berhasil</th>
        </tr>
    </table>

    <p>Semoga Allah SWT memberikan Pahala, keberkahan serta kemudahan dunia akhirat,</p>
    <p>Admin</p>