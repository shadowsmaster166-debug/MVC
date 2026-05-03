
CREATE TABLE `barang` (
    `barang_id` INT(11) NOT NULL AUTO_INCREMENT,
    `nama_barang` VARCHAR(255) NOT NULL COLLATE 'latin1_swedish_ci',
    `jumlah` INT(11) NOT NULL DEFAULT '0',
    `harga_satuan` DECIMAL(15,0) NOT NULL DEFAULT '0',
    `expired_date` DATE NULL DEFAULT NULL,
    `tanggal_dibuat` DATE NULL DEFAULT NULL,
    PRIMARY KEY (`barang_id`) USING BTREE
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=44
;

INSERT INTO latihan.barang (barang_id, nama_barang, jumlah, harga_satuan, expired_date, tanggal_dibuat) VALUES
(1, 'sarung', 2, 15000, NULL, '22025-04-27'),
(9, 'mouse', 5, 120000, NULL, NULL),
(23, 'klepon', 1, 5000, '2026-01-01', NULL);