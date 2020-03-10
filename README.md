# Projek-Penjualan

**UPDATED SQL**
```
ALTER TABLE `penjualan_header` ADD `potongan_harga` INT NULL DEFAULT '0' AFTER `bayar`, ADD `ongkos_kirim` INT NULL DEFAULT '0' AFTER `potongan_harga`, ADD `pembulatan` INT NULL DEFAULT '0' AFTER `ongkos_kirim`;

```