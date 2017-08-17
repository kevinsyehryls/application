#
# Structure for the `tb_paket` table : 
#

DROP TABLE IF EXISTS `tb_paket`;
CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(100) NOT NULL,
  `nama_file` varchar(200) NOT NULL,
  PRIMARY KEY (`id_paket`)
);
