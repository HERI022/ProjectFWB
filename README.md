# <div align="center">SISTEM DONASI BERBASIS ONLINE</div>

<div align="center">
  <img src="https://www.university-logo.example/logo.png" alt="Universitas Contoh" width="200">

</div>

### <p align="center">RIZKY ADIWIJAYA</p>

### <p align="center">D022045</p></br>

### <p align="center">FRAMEWORK WEB BASED</p>

### <p align="center">2025</p>

## Deskripsi Project

## <a id="role"></a>【 Role 】

**Admin**
**Donatur**
**Penerima donasi**

## <a id="fitur"></a>【 Fitur-Fitur 】

-   **Halaman Donasi**: Pengguna dapat melihat jumlah donasi yang terkumpul.
-   **Halaman Pembayaran**: Pengguna dapat memberikan donasi berupa nama, pesan, jumlah, dan jenis pembayaran.
-   **Halaman List Donatur**: Pengguna dapat melihat list pengguna yang telah berdonasi.
-   **Autentikasi Pengguna**: Registrasi dan login pengguna.
-   **Dashboard Admin**: Panel untuk mengelola donasi dan pengguna.
-   **CRUD Donasi**: Pengelolaan data donasi (Create, Read, Update, Delete).

## <a id="tabel"></a>【 Struktur Tabel Database 】

📂 Website Donasi
Berikut adalah daftar tabel, field, tipe data

🔹 users
Menyimpan data pengguna dengan berbagai role: admin, donatur, penerima.

Field Tipe Data Keterangan
id BIGINT (auto) Primary key
jenisAkun VARCHAR(50) Role: admin, donatur, atau penerima
username VARCHAR(255) Nama pengguna unik
email_verified_at TIMESTAMP NULL Tanggal verifikasi email
password VARCHAR(255) Password terenkripsi
remember_token VARCHAR(100) Token untuk "remember me"
created_at TIMESTAMP Otomatis dibuat oleh Laravel
updated_at TIMESTAMP Otomatis diubah oleh Laravel

🔹 sessions
Tabel sistem untuk menyimpan sesi login pengguna.

Field Tipe Data Keterangan
id VARCHAR(255) Primary key
user_id BIGINT NULL FK ke users(id)
ip_address VARCHAR(45) Alamat IP pengguna
user_agent TEXT Info browser pengguna
payload LONGTEXT Data session
last_activity INTEGER Timestamp aktivitas terakhir

🔹 donaturs
Menyimpan data donasi yang dilakukan oleh donatur.

Field Tipe Data Keterangan
id BIGINT Primary key
nama VARCHAR(255) Nama donatur
pesan TEXT Pesan/kesan dari donatur
total_donasi BIGINT Jumlah donasi
tipe_bayar VARCHAR(100) Metode pembayaran
bantuan_id BIGINT NULL FK ke permohonan_bantuan(id) (nullable)
created_at TIMESTAMP
updated_at TIMESTAMP

🔹 permohonan_bantuan
Menyimpan permohonan bantuan dari pengguna dengan role penerima.

Field Tipe Data Keterangan
id BIGINT Primary key
user_id BIGINT FK ke users(id)
judul VARCHAR(255) Judul pengajuan bantuan
deskripsi TEXT Penjelasan mengenai bantuan yang dibutuhkan
jumlah_dibutuhkan BIGINT Nominal dana yang dibutuhkan
status ENUM diajukan, disetujui, atau ditolak
created_at TIMESTAMP
updated_at TIMESTAMP

## <a id="relasi"></a>【 Jenis Relasi dan Tabel Yang Berelasi 】

🔗 Relasi: tabel Users

-   users berelasi One-to-Many ke permohonan_bantuan (jika role = penerima)
-   users bisa juga digunakan untuk donatur/admin tergantung jenisAkun

🔗 Relasi: Tabel Session

-   user_id adalah FK ke users.id

🔗 Relasi: Tabel Donatur

-   bantuan_id adalah FK ke permohonan_bantuan.id
    (jika donasi ditujukan ke permohonan tertentu)
-   donaturs dapat mengacu pada satu permohonan_bantuan (donasi terarah).

🔗 Relasi: Permohonan_bantuan
Many-to-One ke users (user sebagai penerima)
One-to-Many dari donaturs (donasi terhadap permohonan ini)

📌 Penjelasan Jenis Tabel:
Tabel Jenis Keterangan
users Master Menyimpan semua user & role
sessions Sistem / Auth Laravel's session management
donaturs Transaksi Data donasi yang masuk
permohonan_bantuan Transaksi/Operasional Permohonan dari penerima
