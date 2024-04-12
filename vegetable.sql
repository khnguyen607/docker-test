-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th4 10, 2024 lúc 04:37 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vegetable`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `ID` int NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nutritionists`
--

CREATE TABLE `nutritionists` (
  `ID` int NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nutritionists`
--

INSERT INTO `nutritionists` (`ID`, `Name`) VALUES
(1, 'Protein'),
(2, 'Zinc'),
(3, 'Iron'),
(4, 'Vitamin A'),
(5, 'Vitamin C'),
(6, 'Calcium'),
(7, 'Fiber'),
(8, 'Potassium'),
(9, 'Magnesium'),
(10, 'Omega-3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ID` int NOT NULL,
  `Name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` int NOT NULL,
  `Subtitle` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Img` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Unit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ID`, `Name`, `Price`, `Subtitle`, `Description`, `Img`, `Unit`) VALUES
(1, 'Cà rốt', 15, 'Rau củ giàu vitamin A', '<p>Cà rốt là một loại rau củ giàu vitamin A, thích hợp cho sức khỏe của mắt và da.</p>', 'assets/images/product/product1.png', 'kg'),
(2, 'Cải bắp', 20, 'Rau củ chứa nhiều chất dinh dưỡng', '<p>Cải bắp là một loại rau củ giàu chất dinh dưỡng, cung cấp nhiều vitamin và khoáng chất cho cơ thể.</p>', 'assets/images/product/product2.png', 'kg'),
(3, 'Cải thảo', 18, 'Rau củ có hàm lượng chất xơ cao', '<p>Cải thảo là một loại rau củ có hàm lượng chất xơ cao, giúp cải thiện tiêu hóa và duy trì sức khỏe đường ruột.</p>', 'assets/images/product/product3.png', 'kg'),
(4, 'Bắp cải', 25, 'Rau củ giàu chất chống oxy hóa', '<p>Bắp cải là một loại rau củ giàu chất chống oxy hóa, giúp ngăn ngừa sự lão hóa và bảo vệ cơ thể khỏi các bệnh tật.</p>', 'assets/images/product/product4.png', 'kg'),
(5, 'Cải xoong', 22, 'Rau củ chứa nhiều vitamin C', '<p>Cải xoong là một loại rau củ giàu vitamin C, giúp tăng cường hệ miễn dịch và chống vi khuẩn.</p>', 'assets/images/product/product5.png', 'kg'),
(6, 'Bí ngô', 30, 'Rau củ giàu vitamin E và K', '<p>Bí ngô là một loại rau củ giàu vitamin E và K, giúp duy trì sức khỏe của da và xương.</p>', 'assets/images/product/product6.png', 'kg'),
(7, 'Cà chua', 12, 'Rau củ giàu lycopene', '<p>Cà chua là một loại rau củ giàu lycopene, một chất chống oxy hóa mạnh mẽ giúp bảo vệ tim và gan.</p>', 'assets/images/product/product7.png', 'kg'),
(8, 'Bí đỏ', 28, 'Rau củ giàu chất chống oxy hóa', '<p>Bí đỏ là một loại rau củ giàu chất chống oxy hóa, giúp ngăn ngừa các bệnh ung thư và tăng cường sức khỏe tim mạch.</p>', 'assets/images/product/product8.png', 'kg'),
(9, 'Rau muống', 15, 'Rau củ giàu chất dinh dưỡng', '<p>Rau muống là một loại rau củ giàu chất dinh dưỡng, cung cấp nhiều vitamin và khoáng chất cho cơ thể.</p>', 'assets/images/product/product9.png', 'kg'),
(10, 'Cải ngọt', 20, 'Rau củ giàu vitamin K', '<p>Cải ngọt là một loại rau củ giàu vitamin K, giúp tăng cường sức khỏe của hệ xương và giảm nguy cơ loãng xương.</p>', 'assets/images/product/product10.png', 'kg'),
(11, 'Bắp cải xanh', 25, 'Rau củ giàu chất xơ', '<p>Bắp cải xanh là một loại rau củ giàu chất xơ, giúp cải thiện tiêu hóa và duy trì sức khỏe đường ruột.</p>', 'assets/images/product/product11.png', 'kg'),
(12, 'Củ cải trắng', 18, 'Rau củ giàu vitamin C', '<p>Củ cải trắng là một loại rau củ giàu vitamin C, giúp tăng cường hệ miễn dịch và chống vi khuẩn.</p>', 'assets/images/product/product12.png', 'kg'),
(13, 'Cà rốt sạch', 22, 'Rau củ hữu cơ', '<p>Cà rốt sạch là một loại rau củ hữu cơ, không chứa các hóa chất độc hại, an toàn cho sức khỏe.</p>', 'assets/images/product/product13.png', 'kg'),
(14, 'Khoai tây', 18, 'Rau củ giàu kali', '<p>Khoai tây là một loại rau củ giàu kali, giúp duy trì cân bằng nước và điện giải trong cơ thể.</p>', 'assets/images/product/product14.png', 'kg'),
(15, 'Khoai lang', 20, 'Rau củ giàu chất chống oxy hóa', '<p>Khoai lang là một loại rau củ giàu chất chống oxy hóa, giúp ngăn ngừa sự lão hóa và bảo vệ cơ thể khỏi các bệnh tật.</p>', 'assets/images/product/product10.png', 'kg'),
(16, 'Cần tây', 15, 'Rau củ giàu chất xơ', '<p>Cần tây là một loại rau củ giàu chất xơ, giúp cải thiện tiêu hóa và duy trì sức khỏe đường ruột.</p>', 'assets/images/product/product9.png', 'kg'),
(17, 'Khoai mỡ', 22, 'Rau củ giàu vitamin C', '<p>Khoai mỡ là một loại rau củ giàu vitamin C, giúp tăng cường hệ miễn dịch và chống vi khuẩn.</p>', 'assets/images/product/product8.png', 'kg'),
(18, 'Cải đắng', 25, 'Rau củ giàu chất chống oxy hóa', '<p>Cải đắng là một loại rau củ giàu chất chống oxy hóa, giúp ngăn ngừa các bệnh ung thư và tăng cường sức khỏe tim mạch.</p>', 'assets/images/product/product7.png', 'kg'),
(19, 'Cà rốt baby', 30, 'Rau củ giàu vitamin A', '<p>Cà rốt baby là một loại rau củ giàu vitamin A, thích hợp cho sức khỏe của mắt và da.</p>', 'assets/images/product/product19.png', 'kg'),
(20, 'Bắp cải đỏ', 35, 'Rau củ giàu chất dinh dưỡng', '<p>Bắp cải đỏ là một loại rau củ giàu chất dinh dưỡng, cung cấp nhiều vitamin và khoáng chất cho cơ thể.</p>', 'assets/images/product/product6.png', 'kg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `syn_products_nutritionists`
--

CREATE TABLE `syn_products_nutritionists` (
  `ID` int NOT NULL,
  `productID` int NOT NULL,
  `nutritionistID` int NOT NULL,
  `Value` int NOT NULL,
  `Unit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `syn_products_nutritionists`
--

INSERT INTO `syn_products_nutritionists` (`ID`, `productID`, `nutritionistID`, `Value`, `Unit`) VALUES
(1, 4, 5, 10, 'g'),
(2, 4, 2, 12, 'g');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `nutritionists`
--
ALTER TABLE `nutritionists`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `syn_products_nutritionists`
--
ALTER TABLE `syn_products_nutritionists`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `syn_products_nutritionists_products` (`productID`),
  ADD KEY `syn_products_nutritionists_nutritionists` (`nutritionistID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nutritionists`
--
ALTER TABLE `nutritionists`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `syn_products_nutritionists`
--
ALTER TABLE `syn_products_nutritionists`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `syn_products_nutritionists`
--
ALTER TABLE `syn_products_nutritionists`
  ADD CONSTRAINT `syn_products_nutritionists_nutritionists` FOREIGN KEY (`nutritionistID`) REFERENCES `nutritionists` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `syn_products_nutritionists_products` FOREIGN KEY (`productID`) REFERENCES `products` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
