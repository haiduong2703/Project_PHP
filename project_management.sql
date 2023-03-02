-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th2 22, 2023 lúc 06:50 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_management`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `department`
--

CREATE TABLE `department` (
  `idDepartment` int(11) NOT NULL,
  `nameDepartment` varchar(100) NOT NULL,
  `detailDepartment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Đang đổ dữ liệu cho bảng `department`
--

INSERT INTO `department` (`idDepartment`, `nameDepartment`, `detailDepartment`) VALUES
(1, 'Kế toán', 'Thực hiện tính toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project`
--

CREATE TABLE `project` (
  `idProject` int(11) NOT NULL,
  `nameProject` varchar(100) NOT NULL,
  `start_dateP` datetime NOT NULL,
  `end_dateP` datetime NOT NULL,
  `statusP` varchar(100) NOT NULL,
  `idDepartment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `projectmember_user`
--

CREATE TABLE `projectmember_user` (
  `idProjectMember` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project_document`
--

CREATE TABLE `project_document` (
  `idProDoc` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `idProject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project_member`
--

CREATE TABLE `project_member` (
  `idProjectMember` int(11) NOT NULL,
  `idProject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `idUser` int(11) NOT NULL,
  `nameRole` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`idUser`, `nameRole`) VALUES
(1, 'h');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `task`
--

CREATE TABLE `task` (
  `idTask` int(11) NOT NULL,
  `nameTask` varchar(100) NOT NULL,
  `start_dateT` datetime NOT NULL,
  `end_dateT` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `idWorks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `task_user`
--

CREATE TABLE `task_user` (
  `idTask` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `Confirm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nameUser` varchar(100) NOT NULL,
  `emailUser` varchar(100) NOT NULL,
  `passUser` varchar(100) NOT NULL,
  `idDepartment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`idUser`, `nameUser`, `emailUser`, `passUser`, `idDepartment`) VALUES
(1, 'hieu', 'hiawe2123', '123', 1),
(2, 'hiếu', 'hieubvc159@', '123456', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `works`
--

CREATE TABLE `works` (
  `idWorks` int(11) NOT NULL,
  `titleWorks` varchar(100) NOT NULL,
  `idProject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`idDepartment`);

--
-- Chỉ mục cho bảng `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`idProject`),
  ADD KEY `FK_Project_Department` (`idDepartment`);

--
-- Chỉ mục cho bảng `projectmember_user`
--
ALTER TABLE `projectmember_user`
  ADD PRIMARY KEY (`idProjectMember`,`idUser`),
  ADD KEY `FK_projectmember_user2` (`idUser`);

--
-- Chỉ mục cho bảng `project_document`
--
ALTER TABLE `project_document`
  ADD PRIMARY KEY (`idProDoc`),
  ADD KEY `FK_projectdocument_project` (`idProject`);

--
-- Chỉ mục cho bảng `project_member`
--
ALTER TABLE `project_member`
  ADD PRIMARY KEY (`idProjectMember`),
  ADD KEY `FK_projectmember_project` (`idProject`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idUser`);

--
-- Chỉ mục cho bảng `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`idTask`),
  ADD KEY `FK_task_work` (`idWorks`);

--
-- Chỉ mục cho bảng `task_user`
--
ALTER TABLE `task_user`
  ADD PRIMARY KEY (`idTask`,`idUser`),
  ADD KEY `FK_task_user1` (`idUser`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `FK_User_Department` (`idDepartment`);

--
-- Chỉ mục cho bảng `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`idWorks`),
  ADD KEY `FK_work_project` (`idProject`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `department`
--
ALTER TABLE `department`
  MODIFY `idDepartment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `project`
--
ALTER TABLE `project`
  MODIFY `idProject` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `project_document`
--
ALTER TABLE `project_document`
  MODIFY `idProDoc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `project_member`
--
ALTER TABLE `project_member`
  MODIFY `idProjectMember` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `task`
--
ALTER TABLE `task`
  MODIFY `idTask` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `works`
--
ALTER TABLE `works`
  MODIFY `idWorks` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_Project_Department` FOREIGN KEY (`idDepartment`) REFERENCES `department` (`idDepartment`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `projectmember_user`
--
ALTER TABLE `projectmember_user`
  ADD CONSTRAINT `FK_projectmember_user1` FOREIGN KEY (`idProjectMember`) REFERENCES `project_member` (`idProjectMember`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_projectmember_user2` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `project_document`
--
ALTER TABLE `project_document`
  ADD CONSTRAINT `FK_projectdocument_project` FOREIGN KEY (`idProject`) REFERENCES `project` (`idProject`);

--
-- Các ràng buộc cho bảng `project_member`
--
ALTER TABLE `project_member`
  ADD CONSTRAINT `FK_projectmember_project` FOREIGN KEY (`idProject`) REFERENCES `project` (`idProject`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `FK_user_role` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Các ràng buộc cho bảng `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `FK_task_work` FOREIGN KEY (`idWorks`) REFERENCES `works` (`idWorks`);

--
-- Các ràng buộc cho bảng `task_user`
--
ALTER TABLE `task_user`
  ADD CONSTRAINT `FK_task_user1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `FK_task_user2` FOREIGN KEY (`idTask`) REFERENCES `task` (`idTask`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_User_Department` FOREIGN KEY (`idDepartment`) REFERENCES `department` (`idDepartment`);

--
-- Các ràng buộc cho bảng `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `FK_work_project` FOREIGN KEY (`idProject`) REFERENCES `project` (`idProject`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
