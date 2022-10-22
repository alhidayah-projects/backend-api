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
            <td>
                    <br>1. Foto bukti transfer tidak sesuai dengan data donasi</br>
                    <br>2. Transfer dilakukan ke rekening yang tidak terdaftar</br>
                    <br>3. Transfer tidak sesuai nominal</br>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Tertanda</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><img src="./public/assets/logo.png"></td>
        </tr>
    </table>