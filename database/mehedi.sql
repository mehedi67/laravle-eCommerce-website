-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2021 at 09:25 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mehedi`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `generated_cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `generated_cart_id`, `product_id`, `cart_amount`, `created_at`, `updated_at`) VALUES
(9, 'p0MIF1634136417', 23, 1, '2021-10-13 23:41:21', NULL),
(16, 'dpFUT1634555760', 14, 10, '2021-10-18 06:39:11', '2021-10-18 06:40:26'),
(17, 'dpFUT1634555760', 17, 5, '2021-10-18 06:39:20', '2021-10-18 06:44:56'),
(18, 'dpFUT1634555760', 16, 4, '2021-10-18 06:39:30', '2021-10-18 06:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(11) NOT NULL,
  `category_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `added_by`, `category_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kids', 8, NULL, '2021-09-20 12:02:32', '2021-10-03 04:21:09', '2021-10-03 04:21:09'),
(2, 'Man', 8, NULL, '2021-09-20 12:02:46', '2021-10-03 04:21:07', '2021-10-03 04:21:07'),
(3, 'Women', 8, NULL, '2021-09-20 12:05:38', '2021-10-03 04:21:06', '2021-10-03 04:21:06'),
(4, 'Gadget', 8, NULL, '2021-09-20 12:15:31', '2021-10-03 04:21:04', '2021-10-03 04:21:04'),
(5, 'Stationary', 1, NULL, '2021-09-20 12:16:40', '2021-10-03 04:20:59', '2021-10-03 04:20:59'),
(6, 'Foods', 3, NULL, '2021-09-28 12:31:52', '2021-10-03 04:21:01', '2021-10-03 04:21:01'),
(7, 'Home', 3, NULL, '2021-10-03 03:19:56', '2021-10-03 04:20:54', '2021-10-03 04:20:54'),
(9, 'FRUITS & VEGETABLES', 3, 'f6nUXojt821633254491.jpg', '2021-10-03 03:48:11', NULL, NULL),
(10, 'DELICATESSEN & CHEESE', 3, 'gN66OawreD1633254665.png', '2021-10-03 03:51:05', NULL, NULL),
(11, 'HEALTH', 3, 'Cvbl3CJEKG1633254721.jpg', '2021-10-03 03:52:01', NULL, NULL),
(12, 'INTERNATIONAL CUISINE', 3, '5C3rc0B2Cu1633254798.jpg', '2021-10-03 03:53:18', NULL, NULL),
(13, 'MEATS, SEAFOOD & EGGS', 3, 'Eni2pU0KvF1633254861.jpg', '2021-10-03 03:54:21', NULL, NULL),
(14, 'BREAKFAST, DAIRY & BAKERY', 3, 'bwaLxXBlsb1633254951.jpg', '2021-10-03 03:55:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount_amount` int(11) NOT NULL,
  `coupon_validity_till` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount_amount`, `coupon_validity_till`, `created_at`, `updated_at`) VALUES
(1, 'Black_Friday', 10, '2021-10-20', '2021-10-18 07:50:52', NULL),
(2, 'CIT50', 20, '2021-10-30', '2021-10-18 08:30:12', NULL),
(3, 'CIT50', 50, '2021-11-30', '2021-10-18 08:30:33', NULL),
(4, 'Friday30', 30, '2021-10-23', '2021-10-18 08:44:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_20_173425_create_categories_table', 2),
(6, '2021_09_20_181812_create_sub_categories_table', 3),
(8, '2021_09_25_165011_create_products_table', 4),
(10, '2021_10_04_205123_create_product_thumbnail_photos_table', 5),
(12, '2021_10_13_143306_create_carts_table', 6),
(13, '2021_10_18_134428_create_coupons_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `product_name`, `product_description`, `product_price`, `product_quantity`, `product_photo`, `created_at`, `updated_at`) VALUES
(14, 9, 10, 'Musk Melon', 'A delicious, refreshing juice made from musk melon is a summer favorite!', 89, 20, 'rbSyQQJdTS1633257199.JPG', '2021-10-03 04:33:19', NULL),
(15, 9, 10, 'MELON WATER KIRAN', 'Watermelon is delicious, hydrating and refreshing; a summer star!!', 49, 2, 'pLOeB53SRu1633257290.jpg', '2021-10-03 04:34:51', NULL),
(16, 9, 11, 'Mango Raw - 250 g', 'Best Mango', 65, 20, 'BGiE7wtvHE1633257411.jpg', '2021-10-03 04:36:51', NULL),
(17, 9, 11, 'Alphonso Mango - 1 Pc', 'Who doesn\'t enjoy the creamy flesh and fruity aroma of this \"King of fruits\"!', 120, 32, '0YhGyF0qNs1633257455.jpg', '2021-10-03 04:37:35', NULL),
(18, 11, 14, 'GSC QUINOA PUFFS PEPPY CHEESE 50g - 1 Pc', 'Quinoa Puffs in Peppy Cheese flavour is a delectable union of cheese and five Super Grains like Quinoa , Amaranth , Ragi , Soy and Maize , this healthy, cheesy and savoury treat makes one feel healthi', 256, 12, 'nmKQTjJB3f1633290877.jpg', '2021-10-03 13:54:37', NULL),
(19, 11, 14, 'ORGANIC INDIA TURMERIC FORMULA 60S - 1 Pc', 'A cheesy relationship with five nutritious grains, Quinoa, Amaranth, Ragi, Soy and Maize. They are a great source of Proteins , Fibre & Minerals along with Vitamin B and Antioxidants.To maintain the fine balance between taste and health, our puffs are ne', 230, 22, 'FOOiBOoRYq1633290961.jpg', '2021-10-03 13:56:01', NULL),
(20, 11, 14, 'GAIA SPIRULINA 60 CAPSULES - 1 Pc', 'Give nutritional support to maintain proper functioning of your body with this Spirulina Capsules by Gaia.', 180, 23, 'k8GQLd7nRW1633291027.JPG', '2021-10-03 13:57:08', NULL),
(21, 11, 15, 'AASHIRVAAD ATTA MULTI GRAIN 1kg - 1 Pc', 'Aashirvaad Atta With Multigrains is a unique combination of 6 natural grains- Wheat, Chana, Oats, Maize and Psyllium husk. Aashirvaad Atta With Multigrains provides a wholesome nutrtion and keeps you healthy. It absorbs more water, which results in smooth, soft and great tasting chapattis.', 64, 0, 'ofXP457p5E1633291385.jpg', '2021-10-03 14:03:05', NULL),
(22, 12, 17, 'BARILLA LASAGNE BOLOGNESI PASTA 500g - 1 Pc', 'BARILLA LASAGNE BOLOGNESI PASTA 500g - 1 Pc', 462, 2, 'X8zlZQt2s11633291861.jpg', '2021-10-03 14:11:01', NULL),
(23, 14, 18, 'D Lecta Milke Dairy Creamer', 'Liquid Cow Milk Dairy Creamer, Sugar Free', 550, 20, '23.jpg', '2021-10-05 05:18:47', '2021-10-05 05:18:47'),
(25, 14, 18, 'EVERYDAY DAIRY WHTN PCH', 'EVERYDAY DAIRY WHTN PCH 400g - 1 Pc', 203, 30, 'ZmOms163343824325.JPG', '2021-10-05 06:50:43', '2021-10-05 06:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_thumbnail_photos`
--

CREATE TABLE `product_thumbnail_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_thumbnail_photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_thumbnail_photos`
--

INSERT INTO `product_thumbnail_photos` (`id`, `product_id`, `product_thumbnail_photo_name`, `created_at`, `updated_at`) VALUES
(1, 23, '23-1.jpg', '2021-10-05 05:18:47', NULL),
(2, 23, '23-2.jpg', '2021-10-05 05:18:48', NULL),
(3, 23, '23-3.jpg', '2021-10-05 05:18:48', NULL),
(4, 24, '7vJcv163343330224-1.JPG', '2021-10-05 05:28:23', NULL),
(5, 25, 'vCcNy163343824325-1.JPG', '2021-10-05 06:50:44', NULL),
(6, 25, '73aqN163343824425-2.JPG', '2021-10-05 06:50:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 9, 'MELONS', '2021-10-03 04:30:25', NULL, NULL),
(11, 9, 'MANGOES', '2021-10-03 04:30:38', NULL, NULL),
(12, 9, 'BERRIES', '2021-10-03 04:30:47', NULL, NULL),
(13, 9, 'CHILIES & LIME', '2021-10-03 04:30:57', NULL, NULL),
(14, 11, 'SUPPLEMENTS', '2021-10-03 13:52:31', NULL, NULL),
(15, 11, 'FLOURS & GRAINS', '2021-10-03 13:53:02', NULL, NULL),
(16, 11, 'SOUPS & DRESSINGS', '2021-10-03 13:53:18', NULL, NULL),
(17, 12, 'PASTA', '2021-10-03 14:09:53', NULL, NULL),
(18, 14, 'DAIRY WHITENERS', '2021-10-04 15:06:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `profile_photo`, `created_at`, `updated_at`) VALUES
(1, 'mehedi', 'mehedi@gmail.com', NULL, 'a203415a47236f0563475daffb5cef81', NULL, 'default.jpg', '2021-09-20 11:18:56', '2021-09-22 07:36:59'),
(2, 'miraj', 'miraj@gmail.com', NULL, '$2y$10$o9JMytLu270PZ0F7WqvtWOvCaJTdZ09ERJvT0.bljVTdCxRTxJxHC', NULL, 'miraj.jpg', '2021-09-20 11:20:12', '2021-09-22 11:54:46'),
(3, 'rita', 'rita@gmail.com', NULL, '$2y$10$5fJZyiBHmt/Jl8Uqi3uvY.AzflGATOjnS1mWW7r0o7p0kJIigjSgm', NULL, 'rita.jpg', '2021-09-20 11:20:28', '2021-09-25 10:31:09'),
(4, 'ma', 'ma@gmail.com', NULL, '$2y$10$rY9q4ZJWJQ25NR81./T0qel4cNCnLCAofyazj2h6lFM9wwR/C9RPq', NULL, 'default.jpg', '2021-09-20 11:20:46', '2021-09-20 11:20:46'),
(5, 'baba', 'baba@gmail.com', NULL, '$2y$10$hj9U3eGFSLqPZIWFo4uhRuyDsi4jASbE.JYtoIQA.syzCgKyP474e', NULL, 'default.jpg', '2021-09-20 11:21:03', '2021-09-20 11:21:03'),
(6, 'mama', 'mama@gmail.com', NULL, '$2y$10$W9dLDumg29x4QHwC7rTwUO4Sk/WT5DIylovgkMHKM5IC.Bb3pvDFO', NULL, 'default.jpg', '2021-09-20 11:21:19', '2021-09-20 11:21:19'),
(7, 'Nana', 'nana@gmail.com', NULL, '$2y$10$km.G/tnknj56ICkjOb2tM.29iD1yhuQ7gobI1fdcFR49Odfm.5ddm', NULL, 'default.jpg', '2021-09-20 11:21:35', '2021-09-20 11:21:35'),
(8, 'Nani', 'nani@gmail.com', NULL, '$2y$10$B.Qzk9mkvTIr/.uRYWgSjuBJ6QX8YBqBz2L/lc3vHrSyaZr3dlvtK', NULL, 'default.jpg', '2021-09-20 11:21:54', '2021-09-20 11:21:54'),
(9, 'jihad', 'jihad@gmail.com', NULL, '$2y$10$P1xUwYFKp2mwYo0XljohQObn3qBdcJnnu.5f4z5agqbtLDy2odOAW', NULL, 'default.jpg', '2021-09-21 12:59:26', '2021-09-21 12:59:26'),
(10, 'momotaz', 'momotaz@gmail.com', NULL, '$2y$10$C8clDwEDQn22ZA8ZTQhjDOyFK0Q4xhJKUuPUlMiiIHJ8Ji3fDH2mq', NULL, 'default.jpg', '2021-09-21 13:33:03', '2021-09-21 13:33:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_thumbnail_photos`
--
ALTER TABLE `product_thumbnail_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_subcategory_name_unique` (`subcategory_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_thumbnail_photos`
--
ALTER TABLE `product_thumbnail_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
