<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 16/09/2016
 * Time: 15:40
 */

//Modul
define('MODUL_USER_SEWA_BAJU',1);
define('MODUL_COMPANY_SEWA_BAJU',2);
define('MODUL_USER_GROUP_SEWA_BAJU',3);
define('MODUL_KATEGORI_SEWA_BAJU',4);
define('MODUL_BAJU_SEWA_BAJU',5);
define('MODUL_CUSTOMER_SEWA_BAJU',6);
define('MODUL_PARTNER_SEWA_BAJU',7);
define('MODUL_PROMO_SEWA_BAJU',8);
define('MODUL_ACCESSORIES_SEWA_BAJU',9);
define('MODUL_TYPE_SEWA_BAJU',10);
define('MODUL_ARUSKAS_SEWA_BAJU',11);
define('MODUL_LABARUGI_SEWA_BAJU',12);
define('MODUL_APPOINTMENT_SEWA_BAJU',13);
define('MODUL_HISTORY_SEWA_BAJU',14);
define('MODUL_OPERASIONAL_SEWA_BAJU',15);
define('MODUL_VOUCHER_SEWA_BAJU',16);

//Status
define('STATUS_APPOINTMENT',1);
define('STATUS_DEAL',2);
define('STATUS_SIAP_AMBIL',3);
define('STATUS_DIPINJAM',4);
define('STATUS_KEMBALI',5);
define('STATUS_COMPLETE',6);

//Proses
define('PROSES_RENT',1);
define('PROSES_MADE_FOR_RENT',2);
define('PROSES_MADE_FOR_SALE',3);
define('PROSES_SALE',4);

//Shipping
define('SHIPPING_PICKUP',1);
define('SHIPPING_TO',2);

//Jenis Pembayaran
define('PAY_CASH',1);
define('PAY_CREDIT',2);
define('PAY_DEBIT',3);
define('PAY_TRANSFER',4);

//STATUS BARANG RETURN
define('RETURN_COMPLETE',1);
define('RETURN_RUSAK',2);
define('RETURN_TELAT',3);