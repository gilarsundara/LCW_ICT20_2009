# LCW_ICT20_2009
Versi online sudah di publish di ict20.cangkangsuuk-creative.id

Project Lomba Cipta Web Dies Natalies ILKOM UPI 2009

Nama Team: ICT20 SMAN 20 Bandung
PHP & DBMS : Muhammad Irfan Maulana
We Design: Gilar Sundara
HTML & CSS: Haryo T.

ICT20 mendapatkan Juara 2 LCW Tingkat SMA/SMK Se-Jawa Barat



# Tutorial Instalasi Website

1. Extract LCW_ICT20_SMAN20Bandung.zip pada harddisk komputer anda.
Anda akan mendapatkan berkas:
    Anggota-Tim_ICT20.txt
    database.sql
    Tutorial_Instalasi.pdf
    Tutorial_Penggunaan.pdf
    v3.zip
2. Buka cPanel web hosting anda -> File Manager (membuka cPanel dilakukan dengan cara melalui
web browser dan membuka alamat [http://websiteanda.com/cpanel)](http://websiteanda.com/cpanel))
Pada /public_html/, klik Upload. Dan browse v3.zip
Pada /public_html/, klik v3.tar.zip yang tadi diupload dan klik Extract.
Klik Extract Files bila ada konfirmasi popup.
Sekarang di /public_html/ akan muncul direktori baru bernama "v3"
3. Buka cPanel -> MySQL Database Wizard
Step 1. Masukkan nama database. Klik Next Step.
Step 2. Masukkan username & password. Klik Next Step
Step 3. Contreng All Privileges. Klik Next Step dan Finish.
4. Buka cPanel -> phpMyAdmin. Lalu pilih database yang tadi dibuat.
Pada tab Import, browse database.sql dan klik Go.
5. Buka cPanel -> FileManager dan arahkan ke /public_html/v3/
Klik config.php dan klik Edit.
Isikan nama database, username, dan password yang tadi telah dibuat.
6. Langkah terakir adalah membuka [http://websiteanda.com/v3/default.php,](http://websiteanda.com/v3/default.php,) apakah website anda
sudah terinstall dengan baik atau belum :)

## ICT


# Login ke Administrator Area

Administrator Area adalah halaman yang memiliki banyak fungsi untuk menyunting halaman web,
membuat berita, membuat polling, upload foto & e-magz, dan lain-lain.
Untuk dapat masuk ke Administrator Area, Anda harus mengisikan nama pengguna (username)
dan kode sandi (password) terlebih dahulu.

Cara memasuki Administrator Area:

1. Buka Web Browser dan ketikkan: _[http://websiteanda.com/v3/admin/](http://websiteanda.com/v3/admin/)_

2. Masukkan username dan password anda, setelah itu klik Login.
(Default username adalah _admin_ dan passwordnya _admin1234_ )

3. Selamat anda telah berhasil masuk ke Administrator Area :)


# Menyunting Konten Halaman Depan

1. Pada halaman utama Administrator Area, klik _Edit halaman depan_.
2. Sunting judul atau isi konten sesuai yang anda inginkan
3. Setelah seleseai menyunting, klik _Submit_ untuk menyimpannya.

# Menambahkan Berita

1. Pada halaman utama Administrator Area, klik _Tambahkan Berita_.
    Cara lain klik menu Berita pada Administrator Area setelah itu klik _Tulis Berita._
2. Isikan Judul Berita, Nama Pengirim, dan Isi Berita.
3. Klik Submit untuk mengirim pesan. Klik Reset untuk mengulangnya. Klik Tidak pada
    Tampilkan, jika berita yang anda tulis tidak ingin dipublikasikan dahulu.


# Menyunting Berita

1. Buka Berita Manager dengan cara klik menu _Berita_ pada Administrator Area.
2. Cari berita yang ingin anda sunting dan klik _Edit_ pada pilihan Editor yang ada di sebelah
    kanan berita anda.

# Menghapus Berita

1. Buka Berita Manager dengan cara klik menu Berita pada Administrator Area.
2. Cari berita yang anda ingin hapus dan klik _Hapus_ pada pilihan Editor yang ada di sebelah
    kanan berita anda.

# Menyembunyikan Berita

1. Buka Berita Manager dengan cara klik menu _Berita_ pada Administrator Area.
2. Cari berita yang anda ingin sembunyikan pada halaman website anda dan klik _Jangan_
    _Tampilkan_ pada kolom status.
3. Klik _Tampilkan_ untuk menampilkannya lagi.

# Menambahkan Halaman Pada Profil

1. Buka Profil Manager dengan cara klik menu _Profil_ pada Administrator Area.
2. Klik _Tambah halaman pada profil_.

# Menyunting Halaman Profil

1. Buka Profil Manager dengan cara klik menu _Profil_ pada Administrator Area.
2. Cari halaman profil yang ingin anda sunting dan klik _Edit_ pada pilihan Editor yang ada di
    sebelah kanan halaman profil anda.

# Menghapus Halaman Profil

1. Buka Profil Manager dengan cara klik menu _Profil_ pada Administrator Area.
2. Cari halaman profil yang ingin anda hapus dan klik _Hapus_ pada pilihan Editor yang ada di
    sebelah kanan halaman profil anda.

# Menyembunyikan Halaman Profil

1. Buka Profil Manager dengan cara klik menu _Profil_ pada Administrator Area.
2. Cari berita yang anda ingin sembunyikan pada halaman website anda dan klik _Jangan_
    _Tampilkan_ pada kolom status.
3. Klik _Tampilkan_ untuk menampilkannya lagi.


# Menambahkan E-Magazine

1. Buka E-Magazine Manager dengan cara klik menu _E-Magz_ pada Administrator Area.
2. Klik _Tambah halaman pada profil_.

# Menyunting Detil E-Magazine

1. Buka E-Magazine Manager dengan cara klik menu _E-Magz_ pada Administrator Area.
2. Cari E-Magazine yang ingin anda sunting dan klik _Edit_ pada pilihan Editor yang ada di
    sebelah kanan.

# Menghapus E-Magazine

1. Buka E-Magazine Manager dengan cara klik menu _E-Magz_ pada Administrator Area.
2. Cari E-Magazine yang ingin anda hapus dan klik _Hapus_ pada pilihan Editor yang ada di
    sebelah kanan.

# Menambahkan Foto Pada Galeri

1. Buka Galeri Manager dengan cara klik menu _Galeri_ pada Administrator Area.
2. Klik _Tambah Gambar_.

# Menghapus Foto Pada Galeri

1. Buka E-Magazine Manager dengan cara klik menu _Galeri_ pada Administrator Area.
2. Klik thumbnail salah satu foto yang anda ingin hapus.
3. Klik _Hapus_.

# Menghapus Pesan Pada Buku Tamu

1. Buka Bukutamu Manager dengan cara klik menu _Bukutamu_ pada Administrator Area.
2. Cari pesan yang ingin anda hapus dan klik _Hapus_ pada pilihan Editor yang ada di sebelah
    kanan pesan anda.

# Mengosongkan Buku Tamu

1. Buka Bukutamu Manager dengan cara klik menu _Bukutamu_ pada Administrator Area.
2. Klik _Kosongkan Bukutamu_.


# Menambahkan Polling

1. Buka Polling Manager dengan cara klik menu _Polling_ pada Administrator Area.
2. Klik _Tambah Poll_.

# Menampilkan Polling Pada Website

1. Buka Polling Manager dengan cara klik menu _Polling_ pada Administrator Area.
2. Klik _Tampilkan Polling Pada Website_.
3. Ganti polling yang ingin ditampilkan dan klik _Submit_.

# Menghapus Polling

1. Buka Polling Manager dengan cara klik menu _Polling_ pada Administrator Area.
2. Cari Polling yang ingin anda hapus dan klik _Hapus_ pada pilihan Editor yang ada di sebelah
    kanan.

# Menambahkan User

1. Buka User Manager dengan cara klik menu _User_ pada Administrator Area.
2. Klik _Tambah User_.

# Menyunting User

1. Buka User Manager dengan cara klik menu _User_ pada Administrator Area.
2. Cari User yang ingin anda sunting dan klik _Edit_ pada pilihan Editor yang ada di sebelah
    kanan.
3. Ubah nama, password. atau e-mail.
4. Klik _Submit_ untuk menyimpan.

# Menghapus User

1. Buka User Manager dengan cara klik menu _User_ pada Administrator Area.
2. Cari User yang ingin anda hapus dan klik _Hapus_ pada pilihan Editor yang ada di sebelah
    kanan.

# Keluar Dari Administrator Area

1. Pada Administrator Area, klik menu _Logout_ untuk keluar.

```
ICT
```


