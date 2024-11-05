USE pendataan_hewan;

CREATE TABLE hewan (
  id_hewan INT NOT NULL PRIMARY KEY IDENTITY(1,1),
  nama VARCHAR(150) NOT NULL,
  jenis VARCHAR(150) NOT NULL,
  umur VARCHAR(150) NOT NULL,
  jumlah INT NOT NULL DEFAULT 1
);

INSERT INTO hewan (nama, jenis, umur, jumlah) VALUES
('macan kumbang', 'mamalia', '5 bulan', 1),
('badak putih', 'mamalia', '1 tahun', 1),
('gajah afrika', 'mamalia', '2 tahun', 3),
('panda', 'mamalia', '9 bulan', 2)
('king cobra', 'reptile', '7 bulan', 1)
('iguana', 'reptile', '4 bulan', 2);
