CREATE TABLE `role` (
  `role_id` int PRIMARY KEY,
  `nama` varchar(25)
);

CREATE TABLE `user` (
  `user_id` int PRIMARY KEY,
  `role_id` int,
  `nama_lengkap` varchar(40),
  `email` varchar(70) UNIQUE,
  `password` varchar(8)
);

CREATE TABLE `divisi` (
  `divisi_id` int PRIMARY KEY,
  `kepala_divisi_id` int DEFAULT 1,
  `user_id` int
);

CREATE TABLE `pekerjaan` (
  `pekerjaan_id` int PRIMARY KEY,
  `pekerjaan` varchar(150),
  `tanggal` timestamp DEFAULT (now()),
  `role_id` int,
  `divisi_id` int
);

ALTER TABLE `role` ADD FOREIGN KEY (`role_id`) REFERENCES `user` (`user_id`);

ALTER TABLE `pekerjaan` ADD FOREIGN KEY (`pekerjaan_id`) REFERENCES `user` (`user_id`);

ALTER TABLE `user` ADD FOREIGN KEY (`user_id`) REFERENCES `divisi` (`divisi_id`);

ALTER TABLE `pekerjaan` ADD FOREIGN KEY (`pekerjaan_id`) REFERENCES `divisi` (`divisi_id`);
