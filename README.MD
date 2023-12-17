**Aisa Setia Primastuti**
**121140092**
**RB**

Bagian 1: Client-side Programming
1.1 membuat beberapa halaman seperti : loginPage.php, registerPage.php, index.php, edit.php, create.php. dan beberapa handle server seperti : logout.php, delete.php.

1.2 Membuat beberapa event untuk menghandle interaksi pada halaman web dengan memanipulasi dom saat input form, dalam beberapa file js seperti : validation.js, formValidation.js

Bagian 2: Server-side Programming 
2.1 Implementasikan script PHP untuk mengelola data dari formulir pada diatas file create, edit, delete, login, register, index menggunakan variabel `$_POST`  dan `$_GET` serta `$_SESSION`.


2.2  Buatlah sebuah objek PHP berbasis OOP yaitu  parent class = `Connection` dan `Film`yang merupakan turunan dari `Connection` dan `User` yang memiliki beberapa method CRUD


Bagian 3: Database Management
3.1 Buatlah sebuah tabel pada database MySQL

Panduan:
- Lampirkan langkah-langkah dalam membuat basisdata dengan syntax basisdata :

CREATE TABLE movies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    genre VARCHAR(20) NOT NULL,
    release_year INT NOT NULL,
    rating DECIMAL(3,1) NOT NULL
);

INSERT INTO movies (name, genre, release_year, rating) VALUES
('The Matrix', 'Action', 1999, 8.7),
('Inception', 'Sci-Fi', 2010, 8.8),
('The Dark Knight', 'Action', 2008, 9.0),
('Pulp Fiction', 'Action', 1994, 8.9),
('Interstellar', 'Sci-Fi', 2014, 8.6),
('The Silence of the Lambs', 'Horror', 1991, 8.6),
('The Shawshank Redemption', 'Action', 1994, 9.3),
('Aliens', 'Sci-Fi', 1986, 8.3),
('The Shining', 'Horror', 1980, 8.4),
('Avatar', 'Sci-Fi', 2009, 7.8),
('Die Hard', 'Action', 1988, 8.2),
('Blade Runner', 'Sci-Fi', 1982, 8.1),
('The Conjuring', 'Horror', 2013, 7.5),
('Jurassic Park', 'Sci-Fi', 1993, 8.1),
('The Terminator', 'Action', 1984, 8.0),
('Get Out', 'Horror', 2017, 7.7),
('Mad Max: Fury Road', 'Action', 2015, 8.1),
('E.T. the Extra-Terrestrial', 'Sci-Fi', 1982, 7.8),
('A Nightmare on Elm Street', 'Horror', 1984, 7.5),
('Gladiator', 'Action', 2000, 8.5);

3.2  Membuat konfigurasi koneksi ke database MySQL pada file menggunakan pendekatan PDO `koneksi`.

3.3  melakukan manipulasi data film pada tabel utama di index Misalnya, tambah data `$_POST`, ambil data `$_GET`, atau update data `$_POST`.

Bagian 4: State Management
4.1 membuatlah skrip PHP yang menggunakan session untuk menyimpan state pengguna user kedalam variabel global `$_SESSION` dengan isi :  
  `$_SESSION['username'] = $userData['username'];`
  `$_SESSION['full_name'] = $userData['full_name']`
  `setcookie("message", "delete", time() - 1);`


4.2 menerapkan manajemen status (state) dengan Menggunakan cookie dan penyimpanan lokal di sisi klien dengan JavaScript dapat dimanfaatkan. Sisipkan skrip khusus yang akan dijalankan ketika pengguna mengakses halaman utama, guna memastikan manajemen status data yang efisien dan responsif.

Bagian Bonus: Hosting Aplikasi Web 

- Bagaimana Anda meng-host aplikasi web Anda?
  Pilih penyedia hosting web gratis, lakukan pendaftaran dan login, kemudian ajukan permintaan untuk membuat situs web. Selanjutnya, buat database dan atur cPanel.

- Mengapa Anda memilih penyedia hosting web tertentu untuk aplikasi web Anda? Berikan alasan Anda.
  Saya memilih penyedia layanan hosting yang dianggap paling cocok untuk aplikasi web saya dengan pertimbangan biaya, terutama karena 000webhost menawarkan hosting gratis tanpa biaya bulanan atau tahunan. Ini menjadi pilihan hemat biaya, terutama untuk proyek-proyek kecil atau eksperimen, dan menyediakan lingkungan pengembangan yang lengkap. Proses pendaftaran dan konfigurasi dengan 000webhost cepat, memungkinkan pengguna untuk segera memulai hosting situs web tanpa menunggu lama. Layanan ini juga dirancang untuk pemula, menyediakan panel kontrol yang sederhana.

- Bagaimana Anda memastikan keamanan aplikasi web yang Anda host?
  Keamanan aplikasi web yang dihosting ditingkatkan dengan menerapkan protokol HTTPS untuk mengenkripsi data yang dikirimkan.

- Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda.
  Konfigurasi server untuk hosting gratis ini sederhana, mungkin hanya melibatkan penyesuaian versi PHP.