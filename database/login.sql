-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/11/2024 às 20:44
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `login`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `quantidade` decimal(10,2) NOT NULL,
  `obra_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mao_obras`
--

CREATE TABLE `mao_obras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `funcao` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `horas_trabalhadas` decimal(10,2) NOT NULL,
  `obra_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_26_184150_create_permissions_table', 2),
(6, '2024_10_26_185912_create_permission_user_table', 2),
(7, '2024_10_30_125402_add_cpf_to_users_table', 3),
(8, '2024_11_02_002647_add_access_level_to_users_table', 4),
(9, '2024_11_09_002451_create_obras_table', 5),
(10, '2024_11_09_003735_create_equipamentos_table', 5),
(11, '2024_11_09_003919_create_mao_obras_table', 5),
(12, '2024_11_09_021005_create_rdo_equipamentos_table', 5),
(13, '2024_11_09_021116_create_rdo_mao_obras_table', 5),
(14, '2024_11_09_025259_remove_equipamentos_utilizados_and_mao_de_obra_utilizada_from_rdos_table', 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `obras`
--

CREATE TABLE `obras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `empresa_contratada` varchar(255) NOT NULL,
  `objeto_contrato` varchar(255) NOT NULL,
  `tempo_total_contrato` varchar(255) NOT NULL,
  `data_prevista_inicio_obra` date NOT NULL,
  `data_real_inicio_obra` date DEFAULT NULL,
  `data_prevista_termino_obra` date NOT NULL,
  `data_real_termino_obra` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `permission_user`
--

CREATE TABLE `permission_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `rdos`
--

CREATE TABLE `rdos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero_rdo` varchar(255) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp(),
  `dia_da_semana` varchar(255) NOT NULL,
  `obra_id` bigint(20) UNSIGNED NOT NULL,
  `manha` enum('Bom','Chuva leve','Chuva forte') NOT NULL,
  `tarde` enum('Bom','Chuva leve','Chuva forte') NOT NULL,
  `noite` enum('Bom','Chuva leve','Chuva forte') NOT NULL,
  `condicao_area` enum('Operável','Operável parcialmente','Inoperável') NOT NULL,
  `acidente` enum('Nao houve','Sem afastamento','Com afastamento') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `rdo_equipamentos`
--

CREATE TABLE `rdo_equipamentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rdo_id` bigint(20) UNSIGNED NOT NULL,
  `equipamento_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `rdo_mao_obras`
--

CREATE TABLE `rdo_mao_obras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rdo_id` bigint(20) UNSIGNED NOT NULL,
  `mao_obra_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `access_level` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `cpf`, `name`, `email`, `access_level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, '66218327754', 'Claude Little', 'kyleigh.howell@example.net', 0, '2024-10-30 16:20:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DxgpxbF5LX', '2024-10-30 16:20:06', '2024-10-30 16:20:06'),
(10, '76723085665', 'Prof. Kelton Pagac DVM', 'harmon.bailey@example.com', 0, '2024-10-30 16:20:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NukZCu1w2K', '2024-10-30 16:20:06', '2024-10-30 16:20:06'),
(11, '55295191779', 'Dr. Wilfred Denesik', 'qrunolfsson@example.org', 0, '2024-10-30 16:20:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9gSGqUGR1h', '2024-10-30 16:20:06', '2024-10-30 16:20:06'),
(12, '01234567890', 'Gabriel', 'gabriel@terra', 1, '2024-10-31 16:20:06', '$2y$10$3Qq5nB6MB6wHia1gKsn/gOCyv2zopHVjfmwVLApEI0QdMjLGfxHMC', NULL, '2024-11-01 01:49:03', '2024-11-01 01:49:03'),
(13, '09876543210', 'Tiao', 'tiao@yahoo.com', 0, NULL, '$2y$10$XVn.7Y5yfLTmpYNHgC1q3O6qTCI.2OaLvHNDu7e1JH2kNTAgSQ9iS', NULL, '2024-11-01 04:35:38', '2024-11-01 04:35:38');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipamentos_obra_id_foreign` (`obra_id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `mao_obras`
--
ALTER TABLE `mao_obras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mao_obras_obra_id_foreign` (`obra_id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `rdos`
--
ALTER TABLE `rdos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `rdo_equipamentos`
--
ALTER TABLE `rdo_equipamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rdo_equipamentos_rdo_id_foreign` (`rdo_id`),
  ADD KEY `rdo_equipamentos_equipamento_id_foreign` (`equipamento_id`);

--
-- Índices de tabela `rdo_mao_obras`
--
ALTER TABLE `rdo_mao_obras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rdo_mao_obras_rdo_id_foreign` (`rdo_id`),
  ADD KEY `rdo_mao_obras_mao_obra_id_foreign` (`mao_obra_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mao_obras`
--
ALTER TABLE `mao_obras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `obras`
--
ALTER TABLE `obras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `rdos`
--
ALTER TABLE `rdos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `rdo_equipamentos`
--
ALTER TABLE `rdo_equipamentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `rdo_mao_obras`
--
ALTER TABLE `rdo_mao_obras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD CONSTRAINT `equipamentos_obra_id_foreign` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `mao_obras`
--
ALTER TABLE `mao_obras`
  ADD CONSTRAINT `mao_obras_obra_id_foreign` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `rdo_equipamentos`
--
ALTER TABLE `rdo_equipamentos`
  ADD CONSTRAINT `rdo_equipamentos_equipamento_id_foreign` FOREIGN KEY (`equipamento_id`) REFERENCES `equipamentos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rdo_equipamentos_rdo_id_foreign` FOREIGN KEY (`rdo_id`) REFERENCES `rdos` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `rdo_mao_obras`
--
ALTER TABLE `rdo_mao_obras`
  ADD CONSTRAINT `rdo_mao_obras_mao_obra_id_foreign` FOREIGN KEY (`mao_obra_id`) REFERENCES `mao_obras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rdo_mao_obras_rdo_id_foreign` FOREIGN KEY (`rdo_id`) REFERENCES `rdos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
