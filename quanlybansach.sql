-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 24, 2024 lúc 04:04 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybansach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisach`
--

CREATE TABLE `loaisach` (
  `MaLoaiSach` int(11) NOT NULL,
  `LoaiSach` varchar(255) NOT NULL,
  `SachMode` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisach`
--

INSERT INTO `loaisach` (`MaLoaiSach`, `LoaiSach`, `SachMode`) VALUES
(1, 'Sách thiếu nhi', '1'),
(2, 'Sách tâm lý, tình cảm\n', '1'),
(3, 'Sách tôn giáo', '1'),
(4, 'Sách văn hoá xã hội', '1'),
(5, 'Sách lịch sử', '1'),
(6, 'Sách văn học viễn tưởng', '1'),
(24, 'test', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tensach`
--

CREATE TABLE `tensach` (
  `MaSach` int(11) NOT NULL,
  `TenSach` varchar(255) NOT NULL,
  `TacGia` varchar(255) NOT NULL,
  `Gia` double NOT NULL,
  `SachImage` varchar(255) NOT NULL,
  `MaLoaiSach` int(11) NOT NULL,
  `ProdMode` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tensach`
--

INSERT INTO `tensach` (`MaSach`, `TenSach`, `TacGia`, `Gia`, `SachImage`, `MaLoaiSach`, `ProdMode`) VALUES
(1, 'Hoàng Tử Bé', 'Antoine De Saint-Exupéry', 100000, 'hoangtube.jpg', 1, '1'),
(2, 'Alice ở xứ sở diệu kỳ', 'Lewis Carroll', 200000, 'alice.jpg', 1, '1'),
(3, 'Charlie và nhà máy Sô-cô-la ', 'Roald Dahl', 150000, 'charlie.jpg', 1, '1'),
(4, 'Không gia đình', 'Hector Malot', 80000, 'khonggiadinh.jpg', 1, '1'),
(5, ' Những tấm lòng cao cả', 'Edmondo De Amicis', 70000, 'tamlongcaoca.jpg', 1, '1'),
(6, 'Những Người Đàn Ông Không Có Đàn Bà', 'Haruki Murakami', 77000, 'nhungnguoidanong.jpg', 2, '1'),
(7, 'Trà Hoa Nữ', 'Marguerite Gautier', 80500, 'trahoanu.jpg', 2, '1'),
(8, 'Đàn Ông Sao Hỏa Đàn Bà Sao Kim', 'John Gray', 129720, 'danongsaohoa.jpg', 2, '1'),
(9, 'Tại Sao Đàn Ông Thích Tình Dục Và Phụ Nữ Cần Tình Yêu', 'Barte Nhi', 187000, 'taisaodanong.jpg', 2, '1'),
(10, 'Cư Xử Như Đàn Bà Suy Nghĩ Như Đàn Ông', 'Steve Harvey', 78100, 'suynghinhudanba.jpg', 2, '1'),
(11, 'Nơi rìa thế giới', ' Michael Pye', 216000, 'noi-ria-the-gioi.jpg', 3, '1'),
(12, 'World Religions - Tôn Giáo Thế Giới', 'John Bowker', 286000, 'WorldReligions.jpg', 3, '1'),
(13, 'The Little Book - Những Tôn Giáo Trên Thế Giới', 'Ross Dickinson', 58100, 'nhungtongiao.jpg', 3, '1'),
(14, 'Từ Điển Tôn Giáo Thế Giới Giản Yếu', 'John Bowker', 90200, 'tudientongiao.jpg', 3, '1'),
(15, 'Muôn Kiếp Nhân Sinh - Many Times, Many Lives', 'John Vu', 122640, 'muonkiepnhansinh.jpg', 3, '1'),
(16, 'Việt Nam phong tục', 'Phan Kế Bính', 143100, 'vnphongtuc.jpg', 4, '1'),
(17, 'Combo sách Không gian Văn hóa Việt Nam', 'Hà Nguyễn', 170850, 'khongianvanhoaVN.jpg', 4, '1'),
(18, 'Bản sắc văn hóa vùng ở Việt Nam', 'GS.TS. Ngô Đức Thịnh', 126000, 'ban-sac-van-hoa-vung.jpg', 4, '1'),
(19, '500 câu hỏi đáp sắc màu văn hóa Việt Nam', 'Thông Tấn', 123250, 'sacmau.jpg', 4, '1'),
(20, 'Gương Phong Tục', 'Đoàn Duy Bình', 80750, 'guong-phong-tuc.jpg', 4, '1'),
(21, 'Việt Nam Sử Lược', 'Trần Trọng Kim', 382500, 'viet nam su luoc.jpg', 5, '1'),
(22, 'Đại Việt Sử Ký Toàn Thư', 'Nhiều tác giả', 655500, 'dai_viet_su_ky_toan_thu.jpg', 5, '1'),
(23, 'Lịch sử Việt Nam từ nguồn gốc đến giữa thế kỷ XX', 'Lê Thành Khôi', 160000, 'lichsuVN.jpg', 5, '1'),
(24, 'Sử Việt - 12 khúc tráng ca', 'Dũng Phan', 113500, 'suViet12.jpg', 5, '1'),
(25, 'Tâm lý dân tộc An Nam', 'Paul Giran', 87200, 'tamlydantocAnNam.jpg', 5, '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `loaisach`
--
ALTER TABLE `loaisach`
  ADD PRIMARY KEY (`MaLoaiSach`),
  ADD UNIQUE KEY `LoaiSach` (`LoaiSach`);

--
-- Chỉ mục cho bảng `tensach`
--
ALTER TABLE `tensach`
  ADD PRIMARY KEY (`MaSach`),
  ADD UNIQUE KEY `TenSach` (`TenSach`),
  ADD KEY `fk_cat` (`MaLoaiSach`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `loaisach`
--
ALTER TABLE `loaisach`
  MODIFY `MaLoaiSach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tensach`
--
ALTER TABLE `tensach`
  MODIFY `MaSach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tensach`
--
ALTER TABLE `tensach`
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`MaLoaiSach`) REFERENCES `loaisach` (`MaLoaiSach`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
