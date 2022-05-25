CREATE DATABASE facilities_management;

USE facilities_management;

CREATE TABLE toa_nha (
	ID_toanha int(2) PRIMARY KEY AUTO_INCREMENT,
  Ten_toanha varchar(128) NOT NULL
);

CREATE TABLE tang (
	ID_tang int(3) PRIMARY KEY AUTO_INCREMENT,
  Ten_Tang varchar(128) NOT null,
  ID_toanha int(2) NOT null,
  FOREIGN KEY (ID_toanha) REFERENCES toa_nha(ID_toanha)
);

CREATE TABLE loaiphong (
  ID_loaiphong int(2) PRIMARY KEY AUTO_INCREMENT,
  Ten_loaiphong varchar(128) not null
);

CREATE TABLE phong (
	ID_phong int(3) PRIMARY KEY AUTO_INCREMENT,
  ID_tang int(3) NOT null,
  FOREIGN KEY (ID_tang) REFERENCES tang(ID_tang),
  ID_loaiphong int(3) NOT null,
  FOREIGN KEY (ID_loaiphong) REFERENCES loaiphong(ID_loaiphong),
  Ten_phong varchar(128) not null,
  soluongbanghe int(2),
  soluongquat int(2),
  soluongmaytinh int(2),
  soluongloa int(2),
  soluongden int(2),
  soluongmaychieu int(2),
  soluongmic int(2),
  soluongtivi int(2)
  soluongmaylanh int(2)
);

CREATE TABLE den  (
  ID_dem int(3) PRIMARY KEY AUTO_INCREMENT,
  Ten_den varchar(128) not null,
  Ngay_mua_den date not null,
  ID_phong int(3) not null,
  FOREIGN KEY (ID_phong) REFERENCES phong(ID_phong)
);

CREATE TABLE tinhtrangden (
  ID_tinhtrang int(4) PRIMARY KEY AUTO_INCREMENT,
  ID_dem int(3) not null,
  FOREIGN KEY (ID_dem) REFERENCES den(ID_dem),
  ngay date not null,
  tinhtrang int(1) not null
);

CREATE TABLE tivi (
  ID_tivi int(3) PRIMARY KEY AUTO_INCREMENT,
  Ten_tivi varchar(128) not null,
  Ngay_mua_tivi date not null,
  ID_phong int(3) not null,
  FOREIGN KEY (ID_phong) REFERENCES phong(ID_phong)
);

CREATE TABLE tinhtrangtivi (
  ID_tinhtrang int(4) PRIMARY KEY AUTO_INCREMENT,
  ID_tivi int(3) not null,
  FOREIGN KEY (ID_tivi) REFERENCES tivi(ID_tivi),
  ngay date not null,
  tinhtrang int(1) not null
);

CREATE TABLE loa (
  ID_loa int(3) PRIMARY KEY AUTO_INCREMENT,
  Ten_loa varchar(128) not null,
  Ngay_mua_loa date not null,
  ID_phong int(3) not null,
  FOREIGN KEY (ID_phong) REFERENCES phong(ID_phong)
);

CREATE TABLE tinhtrangloa (
  ID_tinhtrang int(4) PRIMARY KEY AUTO_INCREMENT,
  ID_loa int(3) not null,
  FOREIGN KEY (ID_loa) REFERENCES loa(ID_loa),
  ngay date not null,
  tinhtrang int(1) not null
);

CREATE TABLE mic (
  ID_mic int(3) PRIMARY KEY AUTO_INCREMENT,
  Ten_mic varchar(128) not null,
  Ngay_mua_mic date not null,
  ID_phong int(3) not null,
  FOREIGN KEY (ID_phong) REFERENCES phong(ID_phong)
);

CREATE TABLE tinhtrangmic (
  ID_tinhtrang int(4) PRIMARY KEY AUTO_INCREMENT,
  ID_mic int(3) not null,
  FOREIGN KEY (ID_mic) REFERENCES mic(ID_mic),
  ngay date not null,
  tinhtrang int(1) not null
);

CREATE TABLE maychieu (
  ID_maychieu int(3) PRIMARY KEY AUTO_INCREMENT,
  Ten_maychieu varchar(128) not null,
  Ngay_mua_maychieu date not null,
  ID_phong int(3) not null,
  FOREIGN KEY (ID_phong) REFERENCES phong(ID_phong)
);

CREATE TABLE tinhtrangmaychieu (
  ID_tinhtrang int(4) PRIMARY KEY AUTO_INCREMENT,
  ID_maychieu int(3) not null,
  FOREIGN KEY (ID_maychieu) REFERENCES maychieu(ID_maychieu),
  ngay date not null,
  tinhtrang int(1) not null
);

CREATE TABLE banghe (
  ID_banghe int(3) PRIMARY KEY AUTO_INCREMENT,
  Ten_banghe varchar(128) not null,
  Ngay_mua_banghe date not null,
  ID_phong int(3) not null,
  FOREIGN KEY (ID_phong) REFERENCES phong(ID_phong)
);

CREATE TABLE tinhtrangbanghe (
  ID_tinhtrang int PRIMARY KEY AUTO_INCREMENT,
  ID_banghe int(3) not null,
  FOREIGN KEY (ID_banghe) REFERENCES banghe(ID_banghe),
  ngay date not null,
  tinhtrang int(1) not null,
  soluonghuhai int(3) not null
);

CREATE TABLE maylanh (
  ID_maylanh int(3) PRIMARY KEY AUTO_INCREMENT,
  Ten_maylanh varchar(128) not null,
  Ngay_mua_maylanh date not null,
  ID_phong int(3) not null,
  FOREIGN KEY (ID_phong) REFERENCES phong(ID_phong)
);

CREATE TABLE tinhtrangmaylanh (
  ID_tinhtrang int(4) PRIMARY KEY AUTO_INCREMENT,
  ID_maylanh int(3) not null,
  FOREIGN KEY (ID_maylanh) REFERENCES maylanh(ID_maylanh),
  ngay date not null,
  tinhtrang int(1) not null
);

CREATE TABLE loaiquat (
  ID_loaiquat int(2) PRIMARY KEY AUTO_INCREMENT,
  Ten_loaiquat varchar(128) not null
);

CREATE TABLE quat (
  ID_quat int(3) PRIMARY KEY AUTO_INCREMENT,
  ID_loaiquat int(2) not null,
  Ten_quat varchar(128) not null,
  Ngay_mua_quat date not null,
  ID_phong int(3) not null,
  FOREIGN KEY (ID_phong) REFERENCES phong(ID_phong),
  FOREIGN KEY (ID_loaiquat) REFERENCES loaiquat(ID_loaiquat)
);

CREATE TABLE tinhtrangquat (
  ID_tinhtrang int(4) PRIMARY KEY AUTO_INCREMENT,
  ID_quat int(3) not null,
  FOREIGN KEY (ID_quat) REFERENCES quat(ID_quat),
  ngay date not null,
  tinhtrang int(1) not null
);

CREATE TABLE maytinh (
  ID_maytinh int(3) PRIMARY KEY AUTO_INCREMENT,
  Ten_maytinh varchar(128) not null,
  Ngay_mua_maytinh date not null,
  ID_phong int(3) not null,
  FOREIGN KEY (ID_phong) REFERENCES phong(ID_phong),
  cpu varchar(128),
  gpu varchar(128),
  ram varchar(128),
  ocung varchar(128),
  mainboard varchar(128),
  os varchar(128),
  manhinh varchar(128),
  banphim varchar(128),
  chuot varchar(128)
);

CREATE TABLE tinhtrangmaytinh (
  ID_tinhtrang int(4) PRIMARY KEY AUTO_INCREMENT,
  ID_maytinh int(3) not null,
  FOREIGN KEY (ID_maytinh) REFERENCES maytinh(ID_maytinh),
  ngay date,
  tinhtrang int(1)
);

CREATE TABLE users (
  ID_user int PRIMARY KEY AUTO_INCREMENT,
  username varchar(128) not null,
  password varchar(50) not null,
  role int(1) not null
);

CREATE TABLE reports (
  ID_user int not null,
  ID_phong int(3) not null,
  FOREIGN KEY (ID_user) REFERENCES users(ID_user),
  FOREIGN KEY (ID_phong) REFERENCES phong(ID_phong),
  ngay date not null,
  noidung varchar(500) not null,
  for varchar(30) not null
)

INSERT INTO `phong` (`ID_phong`, `ID_tang`, `ID_loaiphong`, `Ten_phong`, `soluongbanghe`, `soluongquat`, `soluongmaytinh`, `soluongloa`, `soluongden`, `soluongmaychieu`, `soluongmic`, `soluongtivi`) VALUES (NULL, '1', '2', '101', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL), (NULL, '1', '2', '102', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL), (NULL, '1', '2', '103', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL), (NULL, '1', '2', '104', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO `phong` (`ID_phong`, `ID_tang`, `ID_loaiphong`, `Ten_phong`, `soluongbanghe`, `soluongquat`, `soluongmaytinh`, `soluongloa`, `soluongden`, `soluongmaychieu`, `soluongmic`, `soluongtivi`) VALUES (NULL, '2', '1', '201', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL), (NULL, '2', '3', '202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL), (NULL, '2', '3', '203', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL), (NULL, '2', '3', '204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO `phong` (`ID_phong`, `ID_tang`, `ID_loaiphong`, `Ten_phong`, `soluongbanghe`, `soluongquat`, `soluongmaytinh`, `soluongloa`, `soluongden`, `soluongmaychieu`, `soluongmic`, `soluongtivi`) VALUES (NULL, '3', '2', '301', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL), (NULL, '3', '2', '302', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL), (NULL, '3', '2', '303', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL), (NULL, '3', '2', '304', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO `phong` (`ID_phong`, `ID_tang`, `ID_loaiphong`, `Ten_phong`, `soluongbanghe`, `soluongquat`, `soluongmaytinh`, `soluongloa`, `soluongden`, `soluongmaychieu`, `soluongmic`, `soluongtivi`) VALUES (NULL, '7', '4', '101', '100', '6', NULL, '6', '8', NULL, '1', NULL), (NULL, '7', '4', '103', '80', '6', NULL, '6', '8', NULL, '1', NULL), (NULL, '7', '4', '104', '80', '6', NULL, '6', '8', NULL, '1', NULL), (NULL, '7', '4', '102', '100', '6', NULL, '6', '8', NULL, '1', NULL);

INSERT INTO `phong` (`ID_phong`, `ID_tang`, `ID_loaiphong`, `Ten_phong`, `soluongbanghe`, `soluongquat`, `soluongmaytinh`, `soluongloa`, `soluongden`, `soluongmaychieu`, `soluongmic`, `soluongtivi`) VALUES (NULL, '8', '4', '108', '60', '6', NULL, '6', '8', NULL, '1', NULL), (NULL, '8', '4', '109', '80', '6', NULL, '6', '8', NULL, '1', NULL), (NULL, '8', '4', '110', '80', '6', NULL, '6', '8', NULL, '1', NULL), (NULL, '8', '4', '111', '80', '6', NULL, '6', '8', NULL, '1', NULL);

INSERT INTO `banghe` (`ID_banghe`, `Ten_banghe`, `Ngay_mua_banghe`, `soluong`, `ID_phong`) VALUES (NULL, 'Gỗ', '2022-05-20', '25', '10'), (NULL, 'Gỗ', '2022-05-20', '25', '38'), (NULL, 'Gỗ', '2022-05-20', '25', '11'), (NULL, 'Gỗ', '2022-05-20', '25', '39'), (NULL, 'Gỗ', '2022-05-20', '25', '40'), (NULL, 'Gỗ', '2022-05-20', '25', '12'), (NULL, 'Gỗ', '2022-05-20', '25', '41'), (NULL, 'Gỗ', '2022-05-20', '25', '42'), (NULL, 'Gỗ', '2022-05-20', '25', '6'), (NULL, 'Gỗ', '2022-05-20', '25', '43'), (NULL, 'Gỗ', '2022-05-20', '25', '7'), (NULL, 'Gỗ', '2022-05-20', '25', '44'), (NULL, 'Gỗ', '2022-05-20', '25', '8'), (NULL, 'Gỗ', '2022-05-20', '25', '9'), (NULL, 'Gỗ', '2022-05-20', '25', '45'), (NULL, 'Gỗ', '2022-05-20', '25', '46'), (NULL, 'Gỗ', '2022-05-20', '25', '2'), (NULL, 'Gỗ', '2022-05-20', '25', '47'), (NULL, 'Gỗ', '2022-05-20', '25', '3'), (NULL, 'Gỗ', '2022-05-20', '25', '48'), (NULL, 'Bàn máy tính (Gỗ)', '2022-05-20', '35', '4'), (NULL, 'Bàn máy tính (Gỗ)', '2022-05-20', '35', '5'), (NULL, 'Gỗ', '2022-05-20', '25', '49'), (NULL, 'Gỗ', '2022-05-20', '50', '54'), (NULL, 'Gỗ', '2022-05-20', '40', '55'), (NULL, 'Gỗ', '2022-05-20', '40', '56'), (NULL, 'Gỗ', '2022-05-20', '50', '57'), (NULL, 'Gỗ', '2022-05-20', '30', '58'), (NULL, 'Gỗ', '2022-05-20', '40', '59'), (NULL, 'Gỗ', '2022-05-20', '40', '60'), (NULL, 'Gỗ', '2022-05-20', '40', '61');

INSERT INTO `tinhtrangbanghe` (`ID_banghe`, `ngay`, `tinhtrang`, `soluonghuhai`) VALUES ('1', '2022-05-20', '0', '0'), ('2', '2022-05-20', '0', '0'), ('3', '2022-05-20', '0', '0'), ('4', '2022-05-20', '0', '0'), ('5', '2022-05-20', '0', '0'), ('6', '2022-05-20', '0', '0'), ('7', '2022-05-20', '0', '0'), ('8', '2022-05-20', '0', '0'), ('9', '2022-05-20', '0', '0'), ('10', '2022-05-20', '0', '0'), ('11', '2022-05-20', '0', '0'), ('12', '2022-05-20', '0', '0'), ('13', '2022-05-20', '0', '0'), ('14', '2022-05-20', '0', '0'), ('15', '2022-05-20', '0', '0'), ('16', '2022-05-20', '0', '0'), ('17', '2022-05-20', '0', '0'), ('18', '2022-05-20', '0', '0'), ('19', '2022-05-20', '0', '0'), ('20', '2022-05-20', '0', '0'), ('21', '2022-05-20', '0', '0'), ('22', '2022-05-20', '0', '0'), ('23', '2022-05-20', '0', '0'), ('24', '2022-05-20', '0', '0'), ('25', '2022-05-20', '0', '0'), ('26', '2022-05-20', '0', '0'), ('27', '2022-05-20', '0', '0'), ('28', '2022-05-20', '0', '0'), ('29', '2022-05-20', '0', '0'), ('30', '2022-05-20', '0', '0'), ('31', '2022-05-20', '0', '0');

INSERT INTO `loaiquat` (`ID_loaiquat`, `Ten_loaiquat`) VALUES (NULL, 'Quạt trần'), (NULL, 'Quạt treo tường');