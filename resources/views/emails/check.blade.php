<h1>Terima Kasih Anda Telah Berdonasi</h1>

<h2>Assalamualaikum Wr. Wb</h2>
    <p>Yang Terhormat Bapak/Ibu <strong>{{ $data->nama }},</strong></p>
    <p>Kami segenap keluarga besar Yayasan Alhidayah Baitul Hatim mengucapkan Jazakumullah Khairan Katsiran, Terima kasih banyak atas donasi yang telah diberikan kepada kami.</p>
    <strong>Dengan Rincian Sebagai Berikut :</strong>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $data->nama }}</td>
        </tr>
        <tr>
            <td>Nominal</td>
            <td>:</td>
            <td>Rp. {{ $data->nominal }}</td>
        </tr>
        <tr>
            <td>Tanggal Donasi</td>
            <td>:</td>
            <td>{{ $data->created_at->Format('d-m-Y');}}</td>
        </tr>
    </table>
    <table style="margin-left:auto;margin-right:auto;width:80%;text-align:center;background-color:gold;">
        <tr>
            <th>Donasi ID : {{$data->donasi_id}}</th>
            <th>Status Donasi : Dalam Proses</th>
        </tr>
    </table>
    <p>Semoga Allah SWT memberikan Pahala, keberkahan serta kemudahan dunia akhirat,</p>
    <p>Admin</p>