<h1>Terima Kasih Anda Telah Berdonasi</h1>
    <p>Yang Terhormat Bapak/Ibu {{ $data->nama }},</p>
    <strong>Kami Memberitahukan Bahwa Donasi Anda Ditolak</strong>

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
        <tr>
            <td>Rekening Tujuan</td>
            <td>:</td>
            <td>{{$data->rekening_id}}</td>
        </tr>
        <tr>
            <td>Alasan Ditolak,</td>
            <td>:</td>
            <td>Donasi Tidak Sesuai Prosedur</td>
        </tr>
    </table>

        <table style="margin-left:auto;margin-right:auto;width:80%;text-align:center;background-color:red;">
            <tr>
                <th>Donasi ID : {{$data->donasi_id}}</th>
                <th>Status Donasi : Ditolak</th>
            </tr>
        </table>