-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2017 at 06:23 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telkomsel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_corporate`
--

CREATE TABLE `tb_corporate` (
  `id_corporate` int(15) NOT NULL,
  `nama_corporate` varchar(50) NOT NULL,
  `alamat_corporate` text NOT NULL,
  `nama_pimpinan_corporate` varchar(50) NOT NULL,
  `jabatan_pimpinan_corporate` varchar(50) NOT NULL,
  `nama_pic_corporate` varchar(50) NOT NULL,
  `jabatan_pic_corporate` varchar(50) NOT NULL,
  `nomor_hp_pic_corporate` varchar(13) NOT NULL,
  `email_pic_corporate` varchar(100) NOT NULL,
  `nomor_tlp_kantor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_corporate`
--

INSERT INTO `tb_corporate` (`id_corporate`, `nama_corporate`, `alamat_corporate`, `nama_pimpinan_corporate`, `jabatan_pimpinan_corporate`, `nama_pic_corporate`, `jabatan_pic_corporate`, `nomor_hp_pic_corporate`, `email_pic_corporate`, `nomor_tlp_kantor`) VALUES
(101, 'PT. Mirage Bali Distribution', 'swssdwdwdwdwd', 'Thusen', 'Owner', 'Thusen', 'Owner', '811386772', 'mirage.bali@gmail.com', '121332'),
(102, 'PT. Bpr Sri Artha Lestari', 'wdwddw', 'Luh Ketut Citarasmini', 'Kadiv HCM & Complience', 'Ribka Kristin', 'Staff HCM', '823772382', 'ribka.kristin@bprlestari.com', '2147483647'),
(103, 'Potato Head And Club', 'Jl. Peti Tenget 51B Seminyak, Kuta, Badung, Bali', 'Ario Bimo Wicaksono', 'Financial Controller', 'Ni Ketut Suarini', 'Manager GA', '2147483647', 'suryani@pttfamily.com', '323234'),
(104, 'PT. Livit International Indonesia', 'Rukan No 14 Perum Bumi Santi, Banjar Sasih,Jl. Pratu Made Rembug Batu Bulan 80571, Gianyar, Bali', 'Nicholas John Martin', 'Operational Director', 'Ni Luh Putu Yunari', 'Finance & Operation Assistant', '2147483647', 'invoice@liv.it', '361292123'),
(106, 'CV Bali Dipta', 'Jl. Gunung Lumut No.63 Denpasar', 'I Gst Ngr Ag Aditya Naradipta', 'Direktur', 'I Gst Ngr Ag Aditya Naradipta', 'Direktur', '081338499288', 'athuagungaditya@gmail.com', '0361474096');

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_nomor`
--

CREATE TABLE `tb_list_nomor` (
  `id_list_msisdn` int(15) NOT NULL,
  `id_corporate` int(15) NOT NULL,
  `msisdn` int(12) NOT NULL,
  `user` varchar(30) NOT NULL,
  `division` varchar(30) NOT NULL,
  `short_code` varchar(30) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_list_nomor`
--

INSERT INTO `tb_list_nomor` (`id_list_msisdn`, `id_corporate`, `msisdn`, `user`, `division`, `short_code`, `deskripsi`) VALUES
(10001, 101, 323232, 'fvf', 'fvf', 'vfv', 'vf'),
(10002, 102, 90392090, 'cdcd', 'cdc', 'cd', 'cd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_months`
--

CREATE TABLE `tb_months` (
  `nomor` int(11) DEFAULT NULL,
  `bulan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_months`
--

INSERT INTO `tb_months` (`nomor`, `bulan`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` varchar(11) NOT NULL,
  `nama_paket` varchar(30) NOT NULL,
  `html_paket` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `nama_paket`, `html_paket`) VALUES
('P001', 'My Group', '<table width="100%" style="font-size:10x">\r\n  <tr>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <strong>LAYANAN MY GROUP</strong><strong>          </strong>\r\n      </center>\r\n    </strong></td>\r\n    <td>&nbsp;</td>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <center>\r\n          <p align="center"><strong>MY  GROUPSERVICES</strong></p>\r\n        </center><strong><strong>\r\n          </strong></strong>\r\n      </center>\r\n    </strong></td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <strong>PAKET TARIF LAYANAN MY GROUP</strong>\r\n      </center>\r\n    </strong></td>\r\n    <td>&nbsp;</td>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <center>\r\n          <p align="center"><strong>MY GROUP SERVICES TARIFF PACKAGE</strong></p>\r\n        </center>\r\n        <strong><strong> </strong></strong>\r\n      </center>\r\n    </strong></td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="7">\r\n    <table width="100%" border="1" style="font-size:10px">\r\n      <tr>\r\n        <td width="3%"><div align="center"><strong>Service  Type</strong></div></td>\r\n        <td width="12%"><div align="center"><strong>CUG  Postpaid</strong></div></td>\r\n        <td width="18%"><div align="center"><strong>CUG  Prepaid</strong></div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>Monthly  Fee</td>\r\n        <td><div align="center">50.000</div></td>\r\n        <td>&nbsp;</td>\r\n        </tr>\r\n      <tr>\r\n        <td>Commitment</td>\r\n        <td><div align="center">50.000</div></td>\r\n        <td>&nbsp;</td>\r\n        </tr>\r\n      <tr>\r\n        <td>Bonus  Pulsa</td>\r\n        <td>&nbsp;</td>\r\n        <td>&nbsp;</td>\r\n        </tr>\r\n      <tr>\r\n        <td colspan="3"><div align="center"><strong>Bonus  Value</strong></div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>Bonus  CUG</td>\r\n        <td colspan="2"><div align="center">Unlimited</div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>SMS  CUG</td>\r\n        <td colspan="2"><div align="center">Unlimited</div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>Voice  Onnet</td>\r\n        <td colspan="2"><div align="center">-</div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>SMS  Onnet</td>\r\n        <td colspan="2"><div align="center">-</div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>Voice  PSTN</td>\r\n        <td colspan="2"><div align="center">-</div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>Data</td>\r\n        <td colspan="2"><div align="center">-</div></td>\r\n        </tr>\r\n    </table></td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="3"><div align="center"><span style="font-size:10px">Harga tersebut di atas belum termasuk pajak.<strong></strong></span></div></td>\r\n    <td width="2%"><div align="center"></div></td>\r\n    <td colspan="3"><div align="center"><span style="font-size:10px">The prices mentioned above are excluding taxes.<strong></strong></span></div></td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%" style="font-size:10px">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n</table>'),
('P002', 'MVPN', '<table width="100%" style="font-size:10x">\r\n  <tr>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <strong>LAYANAN MOBILE VPN</strong>\r\n      </center>\r\n    </strong></td>\r\n    <td>&nbsp;</td>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <center>\r\n          <strong>MOBILE VPN SERVICE</strong>\r\n        </center>         \r\n      </center>\r\n    </td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <strong><em>(VIRTUAL PRIVATE  NETWORK)</em></strong>\r\n      </center>\r\n    </strong></td>\r\n    <td>&nbsp;</td>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <center>\r\n          <strong><em>(VIRTUAL PRIVATE  NETWORK)</em></strong>\r\n        </center>\r\n        <strong><strong> </strong></strong>\r\n      </center>\r\n    </strong></td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n      </center>\r\n    </strong></td>\r\n    <td>&nbsp;</td>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <center>\r\n          <strong></strong>\r\n        </center>\r\n        <strong><strong> </strong></strong>\r\n      </center>\r\n    </strong></td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <strong>PAKET TARIF LAYANAN MOBILE VPN</strong>\r\n      </center>\r\n    </strong></td>\r\n    <td>&nbsp;</td>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <center>\r\n          <strong>MOBILE VPN SERVICES TARIFF PACKAGE</strong>\r\n        </center>\r\n        <strong><strong> </strong></strong>\r\n      </center>\r\n    </strong></td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n      </center>\r\n    </strong></td>\r\n    <td>&nbsp;</td>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <center>\r\n        </center>\r\n        <strong><strong> </strong></strong>\r\n      </center>\r\n    </strong></td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="7">\r\n    <table width="100%" border="1" style="font-size:10px">\r\n      <tr>\r\n        <td width="3%"><strong>Service Type</strong></td>\r\n        <td width="3%"><strong>CUG Postpaid</strong></td>\r\n        </tr>\r\n      <tr>\r\n        <td>Monthly Fee</td>\r\n        <td><div align="right">50,000</div></td>\r\n        </tr>\r\n      <tr>\r\n        <td colspan="2"><div align="center"><strong>Bonus Value</strong></div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>Bonus CUG</td>\r\n        <td><div align="right">Unlimited</div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>SMS CUG</td>\r\n        <td><div align="right">Unlimited</div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>Voice Onnet / Sesama Telkomsel</td>\r\n        <td><div align="right">100 min</div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>SMS Onnet / Sesama Telkomsel</td>\r\n        <td><div align="right">-</div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>Voice PSTN</td>\r\n        <td><div align="right">-</div></td>\r\n        </tr>\r\n       <tr>\r\n        <td colspan="2"><div align="center"><strong>Basic Tariff (Basic Package Corporate Executive)</strong></div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>Voice Onnet Local / Sesama Telkomsel</td>\r\n        <td><div align="right">12</div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>Voice OnnetInterlocal / Sesama Telkomsel</td>\r\n        <td><div align="right">12</div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>Voice Offnet Local / Operator Lain</td>\r\n        <td><div align="right">20</div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>Voice OffnetInterlocal / Operator Lain</td>\r\n        <td><div align="right">20</div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>Voice PSTN Local</td>\r\n        <td><div align="right">20</div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>Voice PSTN Interlocal</td>\r\n        <td><div align="right">20</div></td>\r\n        </tr>\r\n      <tr>\r\n        <td>SMS Onnet</td>\r\n        <td><div align="right">150</div></td>\r\n      </tr>\r\n      <tr>\r\n        <td>SMS Offnet</td>\r\n        <td><div align="right">150</div></td>\r\n        </tr>\r\n    </table>\r\n    </td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="3"style="font-size:10px"><strong>Keterangan:</strong></td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td colspan="3"style="font-size:10px"><strong>Notes:</strong></td>\r\n  </tr>\r\n  <tr style="font-size:10px">\r\n    <td valign="top"><div align="right">1.</div></td>\r\n    <td colspan="2">Seluruh harga tersebut di atas belum termasuk Pajak  Pertambahan Nilai (PPN) sebesar 10%.</td>\r\n    <td>&nbsp;</td>\r\n    <td valign="top"><div align="right">1.</div></td>\r\n    <td colspan="2">All  prices mentioned above package do not include Value Added Tax (VAT) of 10%. </td>\r\n  </tr>\r\n  <tr style="font-size:10px">\r\n    <td valign="top"><div align="right">2.</div></td>\r\n    <td colspan="2">Tarif Layanan  Mobile VPN hanya berlaku jika menekan nomor tujuan dengan menggunakan nomor  extension (short code).</td>\r\n    <td>&nbsp;</td>\r\n    <td valign="top"><div align="right">2.</div></td>\r\n    <td colspan="2">Tariffs of the Mobile VPN Services shall only  apply if phone callsare made by using the extension (short code) number.</td>\r\n  </tr>\r\n  <tr style="font-size:10px">\r\n    <td valign="top"><div align="right">3.</div></td>\r\n    <td colspan="2">Komitmen  PELANGGAN<em>: </em>Pengurus PELANGGAN berkomitmen untuk  membantu distribusi kartuHalo kepada seluruh karyawan PELANGGAN diseluruh  Indonesia dalam bentuk:</td>\r\n    <td>&nbsp;</td>\r\n    <td valign="top"><div align="right">3.</div></td>\r\n    <td colspan="2">Instructions  fromthe SUBSCRIBER&rsquo;s management to allSUBSCRIBER&rsquo;s employees to use kartuHalo  from TELKOMSEL;    </td>\r\n  </tr>\r\n  <tr style="font-size:10px">\r\n    <td>&nbsp;</td>\r\n    <td valign="top">(a)</td>\r\n    <td>Instruksi  dari pengurus PELANGGAN kepada seluruh karyawan PELANGGAN untuk menggunakan  kartuHalodari TELKOMSEL;    </td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td valign="top">(a)</td>\r\n    <td>Instructions  fromthe SUBSCRIBER&rsquo;s management to allSUBSCRIBER&rsquo;s employees to use kartuHalo  from TELKOMSEL;    </td>\r\n  </tr>\r\n  <tr style="font-size:10px"> \r\n    <td>&nbsp;</td>\r\n    <td valign="top">(b)</td>\r\n    <td>Broadcast  informasi melalui e-mail keseluruh karyawanPELANGGAN mengenai kerjasama antara  TELKOMSEL dan PELANGGAN sebagaimana dimaksud dalam Perjanjian ini;    </td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td valign="top">(b)</td>\r\n    <td>Broadcasting  of information through e-mail to all SUBSCRIBER&rsquo;s employees regarding the cooperation  between TELKOMSEL andthe SUBSCRIBER as refered to in this Agreement;    </td>\r\n  </tr>\r\n  <tr style="font-size:10px">\r\n    <td>&nbsp;</td>\r\n    <td valign="top">(c)</td>\r\n    <td>Promosi yang mendukung, seperti melalui pemasangan  poster dan flyer di seluruh lokasi kerja maupun tempat usaha PELANGGAN.</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td valign="top">(c)</td>\r\n    <td>Support promotion, such as through the placement  of posters and flyers in allSUBSCRIBER&rsquo;sworking locations and business  premises.</td>\r\n  </tr><tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr><tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n</table>'),
('P003', 'Flash', '<table width="100%" style="font-size:10x">\r\n  <tr>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <strong>LAYANAN TELKOMSELFlash</strong><br />\r\n        <strong>PAKET DATA TELKOMSELFlash</strong><strong>\r\n      </center>\r\n    </td>\r\n    <td>&nbsp;</td>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <strong>TELKOMSELFlash SERVICES</strong><br />\r\n        <strong>TELKOMSELFlash  DATA PLAN</strong><strong>\r\n      </center>\r\n    </td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="7" style="font-size:10px"><div align="center"><strong>PAKET BERLANGGANAN BULANAN</strong></div></td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="7" style="font-size:10px"><div align="center"><strong><em>MONTHLY  SUBSCRIPTION PACKAGE</em></strong></div></td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="7" style="font-size:10px"><div align="center"><strong><u>PAKET KONTRAK FLASH OPTIMA</u></strong></div></td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="7" style="font-size:10px"><div align="center"><strong><em>FLASH OPTIMA CONTRACT PACKAGE</em></strong></div></td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="7">\r\n    <table width="100%" border="1" style="font-size:10px">\r\n      <tr>\r\n        <td width="3%">No</td>\r\n        <td width="12%"><p align="center">Paket (Package)</p></td>\r\n        <td width="18%"><p align="center">Biaya per Bulan (Monthly Fee)</p></td>\r\n        <td width="17%"><p align="center">Kecepatan Maksimum (Maximum Speed)</p></td>\r\n        <td width="9%">Prioritas Jaringan</td>\r\n        <td width="19%">Batas Pemakaian Wajar (Fair Use Quota)</td>\r\n        <td width="22%">Kecepatan Setelah Quota (Throttle Speed)</td>\r\n      </tr>\r\n      <tr>\r\n        <td>1</td>\r\n        <td>Basic</td>\r\n        <td>Rp.  125.000.-</td>\r\n        <td>14.4  Mbps</td>\r\n        <td>1</td>\r\n        <td>4 GB </td>\r\n        <td>64  Kbps</td>\r\n      </tr>\r\n      <tr>\r\n        <td>2</td>\r\n        <td>Advance </td>\r\n        <td>Rp.  200.000.-</td>\r\n        <td>14.4  Mbps</td>\r\n        <td>1</td>\r\n        <td>8 GB </td>\r\n        <td>64  Kbps</td>\r\n      </tr>\r\n      <tr>\r\n        <td>3</td>\r\n        <td>Pro</td>\r\n        <td>Rp.  375.000.-</td>\r\n        <td>14.4  Mbps</td>\r\n        <td>1</td>\r\n        <td>10 GB </td>\r\n        <td>128  Kbps</td>\r\n      </tr>\r\n    </table></td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%" style="font-size:10px">-</td>\r\n    <td width="43%" style="font-size:10px">Mengacu kepada batas pemakaian wajar sesuai  paketnya masing-masing</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%" style="font-size:10px"><p><em>Subject to Fair Use Policy  correspond to each package</em></p></td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td style="font-size:10px">-</td>\r\n    <td style="font-size:10px">Untuk paket 1 kecepatan akses akan disesuaikan sampai  dengan 64 kbps setelah pemakaian 4 GB <strong></strong></td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td style="font-size:10px"><p><em>For Package </em><em>1</em><em>  the speed will be  adjusted up to 64 kbps after </em><em>4 </em><em>GB usage</em></p></td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td style="font-size:10px">-</td>\r\n    <td style="font-size:10px">Untuk paket 2 kecepatan akses akan disesuaikan sampai  dengan 128 kbps setelah pemakaian 8 GB<strong></strong></td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td style="font-size:10px"><p><em>For Package </em><em>2</em><em> the speed will be adjusted up to </em><em>64</em><em> kbps after </em><em>8 </em><em>GB usage</em></p></td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td style="font-size:10px">-</td>\r\n    <td style="font-size:10px">Untuk  paket 3 kecepatan akses akan disesuaikan sampai dengan 128 kbps setelah pemakaian 10 GB</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td style="font-size:10px"><p><em>For Package 3 the speed will be adjusted  up to 128 kbps after 10 GB usage</em></p></td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td style="font-size:10px">-</td>\r\n    <td style="font-size:10px">Kontrak  minimum 12 bulan<strong> </strong></td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td style="font-size:10px"><p><em>Minimum contract 12 months</em></p></td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n</table>'),
('P004', 'Flash Denom', '<table width="100%" style="font-size:10x">\r\n  <tr>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <strong>LAYANAN TELKOMSELFlash</strong>\r\n        <strong>          </strong>\r\n      </center>\r\n    </strong></td>\r\n    <td>&nbsp;</td>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <center>\r\n          <strong>TELKOMSELFlash SERVICES</strong>\r\n        </center><strong><strong>\r\n          </strong></strong>\r\n      </center>\r\n    </strong></td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <strong>Small Denom</strong><br />\r\n        <strong>PAKET DATA TELKOMSELFlash</strong><strong>\r\n      </center>\r\n    </td>\r\n    <td>&nbsp;</td>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <strong>Small Denom</strong><br />\r\n        <strong>TELKOMSELFlash DATA PLAN</strong><strong>\r\n      </center>\r\n    </td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="7" style="font-size:10px"><div align="center"><strong>PAKET BERLANGGANAN BULANAN</strong></div></td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="7" style="font-size:10px"><div align="center"><strong><em>MONTHLY  SUBSCRIPTION PACKAGE</em></strong></div></td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="7" style="font-size:10px"><div align="center"><strong><u>PAKET </u></strong><strong><u> ULTIMA CORPORATE</u></strong></div></td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="7" style="font-size:10px"><div align="center"><strong><em>CORPORATE ULTIMA</em></strong><strong><em> PACKAGE</em></strong><strong> </strong></div></td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="7">\r\n    <table width="100%" border="1" style="font-size:10px">\r\n      <tr>\r\n        <td width="3%" rowspan="2">No</td>\r\n        <td width="12%" rowspan="2">Harga</td>\r\n        <td width="18%" rowspan="2">Quota/Fair Usage</td>\r\n        <td width="17%">QoS Downlink</td>\r\n        <td width="16%">QoS Upnlink</td>\r\n        <td width="12%" rowspan="2">Periode</td>\r\n        <td width="22%" rowspan="2">Speed After Fair Usage</td>\r\n      </tr>\r\n      <tr>\r\n        <td>(Speed Downlink)</td>\r\n        <td>(Speed Upnlink)</td>\r\n        </tr>\r\n      <tr>\r\n        <td>1</td>\r\n        <td>Rp20,000</td>\r\n        <td>150  MB</td>\r\n        <td>14.4  Mbps</td>\r\n        <td>2  Mbps</td>\r\n        <td>30 hari</td>\r\n        <td>1  Kbps</td>\r\n      </tr>\r\n      <tr>\r\n        <td>2</td>\r\n        <td>Rp35,000</td>\r\n        <td>300  MB</td>\r\n        <td>14.4  Mbps</td>\r\n        <td>2  Mbps</td>\r\n        <td>30 hari</td>\r\n        <td>1  Kbps</td>\r\n      </tr>\r\n      <tr>\r\n        <td>3</td>\r\n        <td>Rp50,000</td>\r\n        <td>600  MB</td>\r\n        <td>14.4  Mbps</td>\r\n        <td>2  Mbps</td>\r\n        <td>30 hari</td>\r\n        <td>1  Kbps</td>\r\n      </tr>\r\n      <tr>\r\n        <td>4</td>\r\n        <td>Rp100,000</td>\r\n        <td>1792  MB</td>\r\n        <td>14.4  Mbps</td>\r\n        <td>2  Mbps</td>\r\n        <td>30 hari</td>\r\n        <td>1  Kbps</td>\r\n      </tr>\r\n      <tr>\r\n        <td>5</td>\r\n        <td>Rp225,000</td>\r\n        <td>4608  MB</td>\r\n        <td>14.4  Mbps</td>\r\n        <td>2  Mbps</td>\r\n        <td>30 hari</td>\r\n        <td>1  Kbps</td>\r\n      </tr>\r\n      <tr>\r\n        <td>6</td>\r\n        <td>Rp400,000</td>\r\n        <td>8704  MB</td>\r\n        <td>14.4  Mbps</td>\r\n        <td>2  Mbps</td>\r\n        <td>30 hari</td>\r\n        <td>1  Kbps</td>\r\n      </tr>\r\n    </table></td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%" style="font-size:10px">-</td>\r\n    <td width="43%" style="font-size:10px">Setelah melebihi kuota, maka PELANGGAN tidak dapat mengakses internet. </td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%" style="font-size:10px"><p><em>After exceed  quota, the subscribers can not access the internet.</em></p></td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n</table>'),
('P005', 'Web2sms', '<table width="100%" style="font-size:10x">\r\n  <tr>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <strong>LAYANAN WEB2SMS CORPORATE</strong><strong>          </strong>\r\n      </center>\r\n    </strong></td>\r\n    <td>&nbsp;</td>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <center>\r\n          <strong>WEB2SMS CORPORATE SERVICES</strong>\r\n        </center>         \r\n      </center>\r\n    </td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n      </center>\r\n    </strong></td>\r\n    <td>&nbsp;</td>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <center>\r\n        </center>\r\n        <strong><strong> </strong></strong>\r\n      </center>\r\n    </strong></td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n       <strong>DATA  PLAN</strong>\r\n      </center>\r\n    </strong></td>\r\n    <td>&nbsp;</td>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <center>\r\n          <strong>WEB2SMS  CORPORATE</strong><strong> SERVICES </strong>\r\n</center>\r\n        <strong><strong> </strong></strong>\r\n      </center>\r\n    </strong></td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <strong>LAYANAN WEB2SMS CORPORATE</strong>\r\n      </center>\r\n    </strong></td>\r\n    <td>&nbsp;</td>\r\n    <td colspan="3" style="font-size:12px"><strong>\r\n      <center>\r\n        <center>\r\n         <strong>DATA  PLAN</strong>\r\n</center>\r\n        <strong><strong> </strong></strong>\r\n      </center>\r\n    </strong></td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%"  style="font-size:12px"><strong>a.</strong></td>\r\n    <td colspan="2" style="font-size:12px"><strong>Web2SMS  Corporate</strong></td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td colspan="3" style="font-size:12px">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%" style="font-size:12px">Tariff : Rp. 125 / SMS / MSISDN</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n   <tr>\r\n    <td width="3%"  style="font-size:12px"><strong>b.</strong></td>\r\n    <td colspan="2" style="font-size:12px"><strong>Web2SMS  Corporate Bulk</strong></td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td colspan="3" style="font-size:12px">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="7">\r\n    <table width="100%" border="1" style="font-size:10px">\r\n      <tr>\r\n        <td colspan="4"><div align="center"><strong>Model of Packages</strong></div></td>\r\n        </tr>\r\n      <tr>\r\n        <td width="3%"><strong>SMS Package</strong></td>\r\n        <td width="3%"><strong>Traffic SMS</strong></td>\r\n        <td width="12%"><strong>Package Price (Rp. per month)</strong></td>\r\n        <td width="18%"><strong>Excess Usage (Rp. /SMS)</strong></td>\r\n        </tr>\r\n      <tr>\r\n        <td>package  1</td>\r\n        <td>10,000</td>\r\n        <td>1,200,000</td>\r\n        <td>120</td>\r\n        </tr>\r\n      <tr>\r\n        <td>package  2</td>\r\n        <td>50,000</td>\r\n        <td>5,750,000</td>\r\n        <td>115</td>\r\n      </tr>\r\n      <tr>\r\n        <td>package  3</td>\r\n        <td>100,000</td>\r\n        <td>11,000,000</td>\r\n        <td>110</td>\r\n      </tr>\r\n      <tr>\r\n        <td>package  4</td>\r\n        <td>300,000</td>\r\n        <td>30,000,000</td>\r\n        <td>100</td>\r\n      </tr>\r\n      <tr>\r\n        <td>package  5</td>\r\n        <td>500,000</td>\r\n        <td>45,000,000</td>\r\n        <td>90</td>\r\n      </tr>\r\n      <tr>\r\n        <td>package  6</td>\r\n        <td>1,000,000</td>\r\n        <td>80,000,000</td>\r\n        <td>80</td>\r\n        </tr>\r\n    </table></td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan="3"style="font-size:10px"><strong>Syarat dan Ketentuan:</strong></td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td colspan="3"style="font-size:10px"><strong>Terms and Conditions:</strong></td>\r\n  </tr>\r\n  <tr style="font-size:10px">\r\n    <td>&nbsp;</td>\r\n    <td valign="top">(a)</td>\r\n    <td>Harga tersebut di atas belum termasuk pajak.</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td valign="top">(a)</td>\r\n    <td>The  prices mentioned above are excluding taxes.</td>\r\n  </tr>\r\n  <tr style="font-size:10px"> \r\n    <td>&nbsp;</td>\r\n    <td valign="top">(b)</td>\r\n    <td>Peralihan dari suatu paket ke paket lainnya berlaku  efektif pada saat dimulainya suatu <em>billing  cycle</em> terdekat setelah permohonan peralihan diajukan.</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td valign="top">(b)</td>\r\n    <td>Any change from one package to any  other package shall take into effect upon the commencement of the nearest  billing cycle after the submission of the application for change. </td>\r\n  </tr>\r\n  <tr style="font-size:10px">\r\n    <td>&nbsp;</td>\r\n    <td valign="top">(c)</td>\r\n    <td>Atas layanan Voice, SMS,  MMS dan lainnya dikenakan tarif normal yang berlaku atau tarif paket Halo  Corporate yang berlaku.</td>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td valign="top">(c)</td>\r\n    <td>Voice, SMS, MMS, and other services will be charged with  regular tariffs or tariffs of the Halo Corporate package. </td>\r\n  </tr><tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr><tr>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n    <td width="2%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="3%">&nbsp;</td>\r\n    <td width="43%">&nbsp;</td>\r\n  </tr>\r\n</table>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pic_telkomsel`
--

CREATE TABLE `tb_pic_telkomsel` (
  `id_pic_telkomsel` varchar(15) NOT NULL,
  `nama_pic_telkomsel` varchar(50) NOT NULL,
  `jabatan_pic_telkomsel` varchar(50) NOT NULL,
  `nomor_hp_pic_telkomsel` int(14) NOT NULL,
  `email_pic_telkomsel` varchar(50) NOT NULL,
  `nomor_tlp_kantor` int(12) NOT NULL,
  `alamat_kantor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pic_telkomsel`
--

INSERT INTO `tb_pic_telkomsel` (`id_pic_telkomsel`, `nama_pic_telkomsel`, `jabatan_pic_telkomsel`, `nomor_hp_pic_telkomsel`, `email_pic_telkomsel`, `nomor_tlp_kantor`, `alamat_kantor`) VALUES
('73245', 'Ida Bagus Wisnu Singarsa', 'Account Manager', 811391737, 'ida_bw_singarsa@telkomsel.co.id', 361244235, 'dsds'),
('87928', 'Ni Komang Meigawati', 'Account Manager', 811390008, 'nikomang_meigawati@telkomsel.co.id', 361244235, 'Jl. Raya Puputan No.33, Renon, Denpasar Tim., Kota Denpasar, Bali 80234'),
('88132', 'Pandu Adi Setiawan', 'Account Manager', 2147483647, 'pandu_a_setiawan@telkomsel.co.id', 361244235, 'Jl. Raya Puputan No.33, Renon, Denpasar Tim., Kota Denpasar, Bali 80234'),
('88145', 'Jonathan', 'Account Manager', 2147483647, 'jonathan@telkomsel.co.id', 361244235, 'Jl. Raya Puputan No.33, Renon, Denpasar Tim., Kota Denpasar, Bali 80234'),
('90532', 'Andhi Prabowo', 'Account Manager', 2147483647, 'andhi_prabowo@telkomsel.co.id', 361244235, 'Jl. Raya Puputan No.33, Renon, Denpasar Tim., Kota Denpasar, Bali 80234');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pimpinan_telkomsel`
--

CREATE TABLE `tb_pimpinan_telkomsel` (
  `id_pimpinan_telkomsel` varchar(15) NOT NULL,
  `nama_pimpinan_telkomsel` varchar(50) NOT NULL,
  `jabatan_pimpinan_telkomsel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pimpinan_telkomsel`
--

INSERT INTO `tb_pimpinan_telkomsel` (`id_pimpinan_telkomsel`, `nama_pimpinan_telkomsel`, `jabatan_pimpinan_telkomsel`) VALUES
('67292', 'Roeswandi', 'GM Account Management Jawa Bali'),
('71829', 'Ihsan', 'GM Sales Bali Nusra');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pks`
--

CREATE TABLE `tb_pks` (
  `id_pks` int(15) NOT NULL,
  `nomor_pks` varchar(50) NOT NULL,
  `id_pimpinan_telkomsel` varchar(15) NOT NULL,
  `id_pic_telkomsel` varchar(15) NOT NULL,
  `id_corporate` int(15) NOT NULL,
  `id_paket` varchar(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `sign_pimpinan_corporate` varchar(5) NOT NULL,
  `sign_pic_corporate` varchar(5) NOT NULL,
  `sign_pimpinan_telkomsel` varchar(5) NOT NULL,
  `sign_pic_telkomsel` varchar(5) NOT NULL,
  `file_pdf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pks`
--

INSERT INTO `tb_pks` (`id_pks`, `nomor_pks`, `id_pimpinan_telkomsel`, `id_pic_telkomsel`, `id_corporate`, `id_paket`, `start_date`, `end_date`, `sign_pimpinan_corporate`, `sign_pic_corporate`, `sign_pimpinan_telkomsel`, `sign_pic_telkomsel`, `file_pdf`) VALUES
(2001, '010/LG.05/CM.73/VIII/2017', '67292', '87928', 103, 'P002', '2017-09-01', '2018-09-01', 'T', 'T', 'F', 'F', ''),
(2002, 'ddddddddddddd', '67292', '87928', 101, 'P002', '2016-10-13', '2017-10-06', 'F', 'F', 'F', 'F', ''),
(2004, 'ddddddd', '67292', '87928', 104, 'P003', '2017-08-01', '2017-09-10', 'F', 'F', 'F', 'F', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `pass`, `nama`, `level`) VALUES
(99, 'azizah@telkomsel.co.id', '1234', 'Azizarssdd,l,l,', 'Administrasi'),
(106, 'aldi@telkomsel.co.id', '1234', 'paijo91115', 'Administrasi'),
(108, 'imade_abimayu@telkomsel.co.id', '1234', 'I Made Abimayu', 'SPV'),
(212121, 'coba2@gmail.com', '1234', 'coba administrasiff', 'Administrasi'),
(222222, 'coba@gmail.com', '1234', 'coba spv', 'SPV');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_chart_rekap_pks`
--
CREATE TABLE `vw_chart_rekap_pks` (
`bulans` varchar(55)
,`jml` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_rekap_pks_monthly`
--
CREATE TABLE `vw_rekap_pks_monthly` (
`bulan` varchar(69)
,`jml` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_seri_pks_monthly`
--
CREATE TABLE `vw_seri_pks_monthly` (
`nomor` int(11)
,`bulans` varchar(55)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_chart_rekap_pks`
--
DROP TABLE IF EXISTS `vw_chart_rekap_pks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_chart_rekap_pks`  AS  select `s`.`bulans` AS `bulans`,coalesce(`v`.`jml`,0) AS `jml` from (`vw_seri_pks_monthly` `s` left join `vw_rekap_pks_monthly` `v` on((convert(`v`.`bulan` using utf8) = `s`.`bulans`))) order by `s`.`nomor` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_rekap_pks_monthly`
--
DROP TABLE IF EXISTS `vw_rekap_pks_monthly`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_rekap_pks_monthly`  AS  select date_format(`p`.`start_date`,'%M %Y') AS `bulan`,count(`p`.`id_pks`) AS `jml` from `tb_pks` `p` group by 1 ;

-- --------------------------------------------------------

--
-- Structure for view `vw_seri_pks_monthly`
--
DROP TABLE IF EXISTS `vw_seri_pks_monthly`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_seri_pks_monthly`  AS  select `m`.`nomor` AS `nomor`,concat(`m`.`bulan`,' ',convert(date_format(now(),'%Y') using utf8)) AS `bulans` from `tb_months` `m` order by `m`.`nomor` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_corporate`
--
ALTER TABLE `tb_corporate`
  ADD PRIMARY KEY (`id_corporate`);

--
-- Indexes for table `tb_list_nomor`
--
ALTER TABLE `tb_list_nomor`
  ADD PRIMARY KEY (`id_list_msisdn`),
  ADD KEY `id_corporate` (`id_corporate`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tb_pic_telkomsel`
--
ALTER TABLE `tb_pic_telkomsel`
  ADD PRIMARY KEY (`id_pic_telkomsel`);

--
-- Indexes for table `tb_pimpinan_telkomsel`
--
ALTER TABLE `tb_pimpinan_telkomsel`
  ADD PRIMARY KEY (`id_pimpinan_telkomsel`);

--
-- Indexes for table `tb_pks`
--
ALTER TABLE `tb_pks`
  ADD PRIMARY KEY (`id_pks`),
  ADD KEY `id_pimpinan_telkomsel` (`id_pimpinan_telkomsel`),
  ADD KEY `id_corporate` (`id_corporate`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_corporate`
--
ALTER TABLE `tb_corporate`
  MODIFY `id_corporate` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `tb_list_nomor`
--
ALTER TABLE `tb_list_nomor`
  MODIFY `id_list_msisdn` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10003;
--
-- AUTO_INCREMENT for table `tb_pks`
--
ALTER TABLE `tb_pks`
  MODIFY `id_pks` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2006;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222223;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_list_nomor`
--
ALTER TABLE `tb_list_nomor`
  ADD CONSTRAINT `FK_corporate_list` FOREIGN KEY (`id_corporate`) REFERENCES `tb_corporate` (`id_corporate`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_pks`
--
ALTER TABLE `tb_pks`
  ADD CONSTRAINT `FK_corporate_pks` FOREIGN KEY (`id_corporate`) REFERENCES `tb_corporate` (`id_corporate`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_paket` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pic_telkomsel` FOREIGN KEY (`id_pimpinan_telkomsel`) REFERENCES `tb_pimpinan_telkomsel` (`id_pimpinan_telkomsel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pimpinan_telkomsel` FOREIGN KEY (`id_pimpinan_telkomsel`) REFERENCES `tb_pimpinan_telkomsel` (`id_pimpinan_telkomsel`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
