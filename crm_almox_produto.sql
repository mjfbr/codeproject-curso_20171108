
CREATE TABLE `crm_almox_produto` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` smallint(6) DEFAULT NULL,
  `descricao` text COLLATE utf8_unicode_ci,
  `unidade` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proporcao` smallint(6) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `tmd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barcode` text COLLATE utf8_unicode_ci,
  `owner_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `crm_almox_produto`
--

INSERT INTO `crm_almox_produto` (`id`, `tipo`, `descricao`, `unidade`, `proporcao`, `valor`, `tmd`, `barcode`, `owner_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'Placeat magnam sit excepturi illum. Alias nihil animi rerum porro quam qui dicta. Tempore facere rerum rem distinctio.', 'Elige', 2, 79, 'Quis itaque et non. Commodi quibusdam magnam consequatur odit. Doloremque exercitationem nulla ab occaecati reiciendis modi quo. Saepe est qui veniam repudiandae officiis.', 'Nobis consequuntur dolorum aut sunt praesentium. Et qui non consequatur nihil quidem quibusdam nihil. Quibusdam assumenda odit eos veritatis provident aperiam sapiente.', NULL, '2017-11-30 15:33:33', '2017-11-30 15:33:33'),
(2, 4, 'Earum natus quas molestiae non id. Qui qui laboriosam minus nesciunt voluptates voluptatem. Fuga doloremque rem ut. Labore voluptatem ut et molestiae et incidunt.', 'Tempo', 9, 2, 'Explicabo et minima est. Rerum nostrum laborum aut expedita quae corporis quidem. Autem deleniti iusto earum architecto quibusdam. Omnis perferendis perspiciatis soluta nesciunt quo.', 'Laboriosam aliquam est et non. Unde dolorem commodi in ut. Et debitis est enim sint omnis magni facere.', NULL, '2017-11-30 15:33:33', '2017-11-30 15:33:33'),
(3, 5, 'Non nisi corporis sit rerum veritatis sed. Odit id dolorem eligendi quibusdam optio recusandae sunt. Et possimus dignissimos adipisci est sint. Ratione asperiores odit voluptatem.', 'Odit ', 4, 45, 'Dicta nihil temporibus est itaque. Praesentium cumque sit voluptates ut. Expedita quisquam consequuntur aliquam debitis.', 'Eveniet perferendis qui est libero earum aut. Aspernatur aliquam est quo dolores modi illo autem. Quo eveniet qui ut non ipsam ullam accusamus.', NULL, '2017-11-30 15:33:33', '2017-11-30 15:33:33'),
(4, 4, 'Nobis exercitationem repellat voluptatem maxime eaque rerum a sit. Magni saepe aut rem accusantium quae recusandae inventore. Iusto iusto atque magnam.', 'Omnis', 4, 87, 'Sed ea voluptatum a laboriosam. Libero est dolores ad. Vel autem dolorem qui dolorem.', 'Ex ea quis aut consequuntur velit blanditiis mollitia incidunt. Non eligendi quaerat ad tempora laborum distinctio.', NULL, '2017-11-30 15:33:33', '2017-11-30 15:33:33'),
(5, 1, 'Voluptatem nobis corporis eaque quo et. Error consequatur modi expedita ut doloribus earum. Voluptatem et possimus dicta aspernatur velit. Cupiditate voluptatem sapiente sit et eveniet.', 'Maxim', 3, 15, 'Inventore iusto voluptatem voluptate ad doloribus. Nesciunt eum hic et beatae. Nulla nulla ipsum est ipsum quis eum. Quis aliquam eos dicta nihil porro rerum.', 'Aut nesciunt saepe at odio aspernatur maiores. Sequi et laboriosam eius. Qui rem provident a qui id.', NULL, '2017-11-30 15:33:33', '2017-11-30 15:33:33'),
(6, 2, 'Reprehenderit sint expedita eos ut. Est voluptatem necessitatibus maxime officiis delectus illo.', 'Omnis', 9, 79, 'Ratione et ut perferendis amet. Veritatis et nulla illum inventore nam. Dolor voluptas itaque vitae quis enim et culpa assumenda. Earum id quia dolorem quidem.', 'Maiores recusandae expedita vel voluptatem sunt. Et voluptatem dicta et vero exercitationem harum nihil. Ullam accusamus ipsum repellat voluptas ut voluptatum. Est ipsam laborum ut neque.', NULL, '2017-11-30 15:33:33', '2017-11-30 15:33:33'),
(7, 1, 'Eaque ut porro odio ipsam ullam. Consequatur officia ab qui blanditiis eligendi. Enim sequi deserunt dignissimos suscipit itaque. Sunt at quis et ex consequatur sint.', 'Nam n', 10, 64, 'Dignissimos labore autem nesciunt molestias laborum laudantium voluptas. Debitis numquam et occaecati quos. Ipsum quo nisi alias est voluptatibus et.', 'Ut delectus voluptatum provident voluptates id ex nostrum ipsam. Quis est laborum quia eligendi animi error quis. Necessitatibus beatae fuga sit quam. Sunt sit magnam qui quam sit modi.', NULL, '2017-11-30 15:33:33', '2017-11-30 15:33:33'),
(8, 4, 'Molestiae sit reprehenderit dolorem id omnis cumque mollitia. Animi voluptatem aut qui eius ab ut laborum. Quos quod rerum assumenda. Est voluptatem necessitatibus rem et eaque in ea.', 'Quis ', 6, 23, 'Cupiditate rerum modi perspiciatis eum ratione qui. Sed ratione facilis qui consequuntur. Laudantium aspernatur nihil commodi perspiciatis sed odio ab. Consequatur impedit nemo ut sunt.', 'Rerum veritatis consequatur omnis consequuntur. Quas quas iste repellat quo ut porro in. Consequuntur consectetur maiores ullam est. Voluptatem quia eos sed quasi.', NULL, '2017-11-30 15:33:33', '2017-11-30 15:33:33'),
(9, 4, 'Praesentium repellendus cumque dolores cupiditate debitis repudiandae similique. Autem quasi aut ut enim ut. Accusamus iusto officiis suscipit omnis sit fuga aspernatur.', 'Volup', 6, 63, 'Quod ut unde repellendus voluptatem quasi officiis nulla. Fugiat laboriosam dolorem sed ratione vero. Ipsa consequatur libero minima quo voluptas. Aliquam voluptatem et iure et.', 'Quia in nam et. Quae qui quia et minus praesentium nostrum dolorem et. Quae ab ut eveniet error ut dolorem odit. Atque ut recusandae enim occaecati.', 12, '2017-11-30 15:33:33', '2017-11-30 15:33:33'),
(10, 4, 'Autem cupiditate provident quod porro. Placeat et sunt et perferendis qui sint. Totam tempora est quod dolorem.', 'Error', 3, 100, 'Suscipit nobis eveniet consequuntur soluta. Totam quam sint possimus. Tempora esse vero molestias quisquam consequuntur vel autem. Aperiam qui officiis quo.', 'Alias enim consequuntur facilis voluptas molestiae eos. Ea suscipit ipsa ipsam possimus aut sint. Rerum inventore quam voluptatum et. Esse nostrum illum architecto est maiores in dolor.', 12, '2017-11-30 15:33:33', '2017-11-30 15:33:33'),
(11, 1, 'teste de descricao', '5', 2, 10.2, 'teste de tmd', 'barcode123', 12, '2017-11-30 20:48:43', '2017-11-30 20:48:43'),
(12, 1, 'teste de descricao 123456', '4', 1, 10.2, 'teste de tmd - 123', 'barcode123', 12, '2017-11-30 21:17:19', '2017-11-30 21:17:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crm_almox_produto`
--
ALTER TABLE `crm_almox_produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crm_almox_produto`
--
ALTER TABLE `crm_almox_produto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
