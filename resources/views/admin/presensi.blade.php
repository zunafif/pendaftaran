<table>
  <tbody>
      <tr>
          <td colspan="16" style="text-align:center; font-size:16px"><h1><b>Presensi Siswa Tahun Ajaran {{ $daftarulang[0]->nama_tahun_ajaran }}</b></h1></td>
      </tr>
      <tr>
        <td colspan="16" style="text-align:center; font-size:16px"><h1></h1></td>
      </tr>
      <tr>
        <td colspan="1" style="text-align:center; font-size:16px"><b>ID</b></td>
        <td colspan="2" style=" font-size:16px;text-align:center; "><b>NISN</b></td>
        <td colspan="4" style=" font-size:16px;text-align:center;"><b>Nama</b></td>
        <td colspan="2" style=" font-size:16px;text-align:center;"><b>Jenis Kelamin</b></td>
        <td colspan="4" style=" font-size:16px;text-align:center;"><b>TTL</b></td>
          <td colspan="3" style=" font-size:16px;text-align:center;"><b>Agama</b></td>
          <td colspan="6" style=" font-size:16px;text-align:center;"><b>Alamat Siswa</b></td>
          <td colspan="3" style=" font-size:16px;text-align:center;"><b>Kota/Kode POS Siswa</b></td>
          <td colspan="3" style=" font-size:16px;text-align:center;"><b>Nomor Siswa</b></td>
          <td colspan="4" style=" font-size:16px;text-align:center;"><b>Nama Ortu</b></td>
          <td colspan="6" style=" font-size:16px;text-align:center;"><b>Alamat Ortu</b></td>
          <td colspan="3" style=" font-size:16px;text-align:center;"><b>Kota/Kode POS Ortu</b></td>
          <td colspan="4" style=" font-size:16px;text-align:center;"><b>Pendidikan Ortu</b></td>
          <td colspan="4" style=" font-size:16px;text-align:center;"><b>Pekerjaan Ortu</b></td>
          <td colspan="3" style=" font-size:16px;text-align:center;"><b>Tahun Lulus SMP</b></td>
          <td colspan="4" style=" font-size:16px;text-align:center;"><b>Asal SMP</b></td>
          <td colspan="6" style=" font-size:16px;text-align:center;"><b>Alamat SMP</b></td>
          <td colspan="3" style=" font-size:16px;text-align:center;"><b>Kota/Kode POS SMP</b></td>
          <td colspan="3" style=" font-size:16px;text-align:center;"><b>No. Telp SMP</b></td>
          <td colspan="6" style=" font-size:16px;text-align:center;"><b>Alamat Surat Menyurat</b></td>
          <td colspan="3" style=" font-size:16px;text-align:center;"><b>Kota/Kode POS</b></td>
      </tr>

    @foreach($daftarulang as $d)
      <tr>
        <td colspan="1" style="text-align:center; font-size:16px">{{ $d->id_pendaftaran }}</td>
        <td colspan="2" style="text-align:center; font-size:16px">{{ $d->nisn }}</td>
        <td colspan="4" style="text-align:center; font-size:16px">{{ $d->nama }}</td>
        <td colspan="2" style="text-align:center; font-size:16px">{{ $d->jenis_kelamin }}</td>
        <td colspan="4" style="text-align:center; font-size:16px">{{ $d->tempat_lahir }}, {{ $d->tanggal_lahir }}</td>
          <td colspan="3" style="text-align:center; font-size:16px">{{ $d->agama }}</td>
          <td colspan="6" style="text-align:center; font-size:16px">{{ $d->alamat_siswa }}</td>
          <td colspan="3" style="text-align:center; font-size:16px">{{ $d->kota_siswa }}/{{ $d->kodepos_siswa }}</td>
          <td colspan="3" style="text-align:center; font-size:16px">{{ $d->nomorhp_siswa }}</td>
          <td colspan="4" style="text-align:center; font-size:16px">{{ $d->nama_ortu }}</td>
          <td colspan="6" style="text-align:center; font-size:16px">{{ $d->alamat_ortu }}</td>
          <td colspan="3" style="text-align:center; font-size:16px">{{ $d->kota_ortu }}/{{ $d->kodepos_ortu }}</td>
          <td colspan="4" style="text-align:center; font-size:16px">
              <?php
              switch($d->pendidikan_ortu){
                  case 1:
                      echo "Tak Tamat SD";
                      break;
                  case 2:
                      echo "Tamat SD";
                      break;
                  case 3:
                      echo "Tamat SLTP";
                      break;
                  case 4:
                      echo "Tamat SLTA";
                      break;
                  case 5:
                      echo "Diploma";
                      break;
                  case 6:
                      echo "Sarjana Muda";
                      break;
                  case 7:
                      echo "Sarjana";
                      break;
                  case 8:
                      echo "Magister";
                      break;
                  case 9:
                      echo "Doktor";
                      break;
              }
              ?>
          </td>
          <td colspan="4" style="text-align:center; font-size:16px">
              <?php
              switch($d->pekerjaan_ortu){
                  case 1:
                      echo "Peg. Negeri";
                      break;
                  case 2:
                      echo "ABRI";
                      break;
                  case 3:
                      echo "Petani";
                      break;
                  case 4:
                      echo "Peg. Swasta";
                      break;
                  case 5:
                      echo "Usaha Sendiri";
                      break;
                  case 6:
                      echo "Tak Bekerja";
                      break;
                  case 7:
                      echo "Pensiun";
                      break;
                  case 8:
                      echo "Lain-Lain";
                      break;
              }
              ?>
          </td>
          <td colspan="3" style="text-align:center; font-size:16px">{{ $d->tahunlulus_smp }}</td>
          <td colspan="4" style="text-align:center; font-size:16px">{{ $d->asal_smp }}</td>
          <td colspan="6" style="text-align:center; font-size:16px">{{ $d->alamat_smp }}</td>
          <td colspan="3" style="text-align:center; font-size:16px">{{ $d->kota_smp }}/{{ $d->kota_smp }}</td>
          <td colspan="3" style="text-align:center; font-size:16px">{{ $d->nomortelp_smp }}</td>
          <td colspan="6" style="text-align:center; font-size:16px">{{ $d->alamatsuratmenyurat }}</td>
          <td colspan="3" style="text-align:center; font-size:16px">{{ $d->kota_alamatsuratmenyurat }}/{{ $d->kodepos_alamatsuratmenyurat }}</td>
      </tr>
    @endforeach

 </tbody>
</table>
