CREATE TABLE `tb_user` (
  `id_user` int PRIMARY KEY AUTO_INCREMENT,
  `nama_user` varchar(50),
  `username` varchar(20),
  `password` varchar(255),
  `level_user` varchar(255)
);

CREATE TABLE `tb_beasiswa` (
  `id_beasiswa` int PRIMARY KEY AUTO_INCREMENT,
  `nama_beasiswa` varchar(255)
);

CREATE TABLE `tb_detail_beasiswa` (
  `id_detail_beasiswa` int PRIMARY KEY AUTO_INCREMENT,
  `id_beasiswa` int,
  `id_kriteria` int,
  `bobot_beasiswa` float
);

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa` int PRIMARY KEY AUTO_INCREMENT,
  `nama_mahasiswa` varchar(255),
  `nim_mahasiswa` varchar(255),
  `alamat_mahasiswa` text,
  `email_mahasiswa` varchar(255),
  `id_prodi` int
);

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int PRIMARY KEY AUTO_INCREMENT,
  `kode_kriteria` varchar(255),
  `nama_kriteria` varchar(255)
);

CREATE TABLE `tb_detail_kriteria` (
  `id_detail_kriteria` int PRIMARY KEY AUTO_INCREMENT,
  `id_kriteria` int,
  `min_value` float,
  `max_value` float,
  `bobot_detail_kriteria` float
);

CREATE TABLE `tb_hasil` (
  `id_hasil` int PRIMARY KEY AUTO_INCREMENT,
  `id_mahasiswa` int,
  `id_beasiswa` int,
  `status_hasil` varchar(255)
);

CREATE TABLE `tb_detail_hasil` (
  `id_detail_hasil` int PRIMARY KEY AUTO_INCREMENT,
  `id_hasil` int,
  `id_kriteria` int,
  `bobot_hasil` float
);

CREATE TABLE `tb_prodi` (
  `id_prodi` int PRIMARY KEY AUTO_INCREMENT,
  `nama_prodi` varchar(255)
);

CREATE TABLE `tb_kuota` (
  `id_kuota` int PRIMARY KEY AUTO_INCREMENT,
  `id_beasiswa` int,
  `id_prodi` int,
  `kuota` int
);

CREATE TABLE `tb_data_mahasiswa` (
  `id_data_mahasiswa` int PRIMARY KEY AUTO_INCREMENT,
  `id_mahasiswa` int,
  `id_kriteria` int,
  `value` float,
  `dokumen` varchar(255)
);
