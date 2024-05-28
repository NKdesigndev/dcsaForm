CREATE TABLE `employment_details` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nominee_id` int DEFAULT NULL,
  `period_form` date DEFAULT NULL,
  `period_to` date DEFAULT NULL,
  `place_of_employment` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `scale_of_pay` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;