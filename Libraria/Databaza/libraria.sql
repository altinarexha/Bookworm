-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 11:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraria`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonimi`
--

CREATE TABLE `abonimi` (
  `id` int(11) NOT NULL,
  `lloji` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abonimi`
--

INSERT INTO `abonimi` (`id`, `lloji`) VALUES
(1, 'Basic'),
(2, 'Pro'),
(3, 'Premium');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `card_holder` char(20) NOT NULL,
  `card_number` int(11) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `cvc` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `emri` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `emri`) VALUES
(1, 'Aksion'),
(2, 'Aventurë'),
(3, 'Klasik'),
(4, 'Mister'),
(5, 'Fantazi'),
(6, 'Horror'),
(7, 'Romancë');

-- --------------------------------------------------------

--
-- Table structure for table `kerkesa`
--

CREATE TABLE `kerkesa` (
  `id` int(11) NOT NULL,
  `subjekti` char(30) DEFAULT NULL,
  `pershkrimi` char(200) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kerkesa`
--

INSERT INTO `kerkesa` (`id`, `subjekti`, `pershkrimi`, `user_id`) VALUES
(1, 'libri', 'Kerkoj Librin Keshtjella Ismail Kadare', 2),
(2, 'libri', 'kerkoj librin sikur te isha djale', 1),
(3, 'libri', 'pershendetje,\r\nkerkoj librin Meshari te gjon buzukut', 6);

-- --------------------------------------------------------

--
-- Table structure for table `lexon`
--

CREATE TABLE `lexon` (
  `user_id` int(11) NOT NULL,
  `libri_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lexon`
--

INSERT INTO `lexon` (`user_id`, `libri_id`) VALUES
(1, 1),
(1, 2),
(1, 5),
(1, 6),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 10),
(2, 14),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(6, 1),
(6, 2),
(6, 7),
(6, 8),
(7, 6),
(13, 14);

-- --------------------------------------------------------

--
-- Table structure for table `librat`
--

CREATE TABLE `librat` (
  `id` int(11) NOT NULL,
  `emri` char(100) NOT NULL,
  `emri_autorit` char(30) NOT NULL,
  `Nr_faqeve` int(11) DEFAULT NULL,
  `viti` date NOT NULL,
  `pershkrimi` longtext NOT NULL,
  `foto` longtext NOT NULL,
  `pdf` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `librat`
--

INSERT INTO `librat` (`id`, `emri`, `emri_autorit`, `Nr_faqeve`, `viti`, `pershkrimi`, `foto`, `pdf`) VALUES
(1, 'A Court Of Thorns And Roses', 'Sarah J Maas', 419, '2015-05-05', '', 'images/ACOTAR.jpg', 'Librat/Sarah_J_Maas_-_A_Court_of_Thorns_and_Roses.pdf'),
(2, 'A Kingdom Of Flesh And Fire', 'Jennifer L. Armentrout', 582, '2020-09-01', 'A Betrayal…\r\n\r\nEverything Poppy has ever believed in is a lie, including the man she was falling in love with. Thrust among those who see her as a symbol of a monstrous kingdom, she barely knows who she is without the veil of the Maiden. But what she does know is that nothing is as dangerous to her as him. The Dark One. The Prince of Atlantia. He wants her to fight him, and that’s one order she’s more than happy to obey. He may have taken her, but he will never have her.\r\n\r\nA Choice...\r\n\r\nCasteel Da’Neer is known by many names and many faces. His lies are as seductive as his touch. His truths as sensual as his bite. Poppy knows better than to trust him. He needs her alive, healthy, and whole to achieve his goals. But he’s the only way for her to get what she wants—to find her brother Ian and see for herself if he has become a soulless Ascended. Working with Casteel instead of against him presents its own risks. He still tempts her with every breath, offering up all she’s ever wanted. Casteel has plans for her. Ones that could expose her to unimaginable pleasure and unfathomable pain. Plans that will force her to look beyond everything she thought she knew about herself—about him. Plans that could bind their lives together in unexpected ways that neither kingdom is prepared for. And she’s far too reckless, too hungry, to resist the temptation.\r\n\r\nA Secret…\r\n\r\nBut unrest has grown in Atlantia as they await the return of their Prince. Whispers of war have become stronger, and Poppy is at the very heart of it all. The King wants to use her to send a message. The Descenters want her dead. The wolven are growing more unpredictable. And as her abilities to feel pain and emotion begin to grow and strengthen, the Atlantians start to fear her. Dark secrets are at play, ones steeped in the blood-drenched sins of two kingdoms that would do anything to keep the truth hidden. But when the earth begins to shake, and the skies start to bleed, it may already be too late.', 'images\\L1.jpg', 'Librat\\A_Kingdom_of_Flesh_and_Fire_-_Jennifer_L_Armentrout.pdf'),
(3, 'The Cruel Prince', 'Holly Black', 370, '2018-01-02', 'Of course I want to be like them. They’re beautiful as blades forged in some divine fire. They will live forever.\r\n\r\nAnd Cardan is even more beautiful than the rest. I hate him more than all the others. I hate him so much that sometimes when I look at him, I can hardly breathe.\r\n\r\nJude was seven when her parents were murdered and she and her two sisters were stolen away to live in the treacherous High Court of Faerie. Ten years later, Jude wants nothing more than to belong there, despite her mortality. But many of the fey despise humans. Especially Prince Cardan, the youngest and wickedest son of the High King.\r\n\r\nTo win a place at the Court, she must defy him–and face the consequences.\r\n\r\nAs Jude becomes more deeply embroiled in palace intrigues and deceptions, she discovers her own capacity for trickery and bloodshed. But as betrayal threatens to drown the Courts of Faerie in violence, Jude will need to risk her life in a dangerous alliance to save her sisters, and Faerie itself.', 'images\\L2.jpg', 'Librat\\Holly_Black_-_The_Folk_of_the_Air_01_-_The_Cruel_Prince.pdf'),
(4, 'From Blood And Ash', ' Jennifer L. Armentrout', 634, '2020-03-20', 'A Maiden…\r\n\r\nChosen from birth to usher in a new era, Poppy’s life has never been her own. The life of the Maiden is solitary. Never to be touched. Never to be looked upon. Never to be spoken to. Never to experience pleasure. Waiting for the day of her Ascension, she would rather be with the guards, fighting back the evil that took her family, than preparing to be found worthy by the gods. But the choice has never been hers.\r\n\r\nA Duty…\r\n\r\nThe entire kingdom’s future rests on Poppy’s shoulders, something she’s not even quite sure she wants for herself. Because a Maiden has a heart. And a soul. And longing. And when Hawke, a golden-eyed guard honor bound to ensure her Ascension, enters her life, destiny and duty become tangled with desire and need. He incites her anger, makes her question everything she believes in, and tempts her with the forbidden.\r\n\r\nA Kingdom…\r\n\r\nForsaken by the gods and feared by mortals, a fallen kingdom is rising once more, determined to take back what they believe is theirs through violence and vengeance. And as the shadow of those cursed draws closer, the line between what is forbidden and what is right becomes blurred. Poppy is not only on the verge of losing her heart and being found unworthy by the gods, but also her life when every blood-soaked thread that holds her world together begins to unravel.', 'images\\L4.jpg', 'Librat\\From_Blood_and_Ash_-_Jennifer_L_Armentrout.pdf'),
(5, 'Lothaire', 'Kresley Cole', 468, '2012-01-10', 'All fear the enemy of old.\r\n\r\nDriven by his insatiable need for revenge, Lothaire, the Lore’s most ruthless vampire, plots to seize the Horde’s crown. But bloodlust and torture have left him on the brink of madness—until he finds Elizabeth Peirce, the key to his victory. He captures the unique young mortal, intending to offer up her very soul in exchange for power, yet Elizabeth soothes his tormented mind and awakens within him emotions Lothaire believed he could no longer experience.\r\n\r\nA deadly force dwells within her.\r\n\r\nGrowing up in desperate poverty, Ellie Peirce yearned for a better life, never imagining she’d be convicted of murder—or that an evil immortal would abduct her from death row. But Lothaire is no savior, as he himself plans to sacrifice Ellie in one month’s time. And yet the vampire seems to ache for her touch, showering her with wealth and sexual pleasure. In a bid to save her soul, Ellie surrenders her body to the wicked vampire, while vowing to protect her heart.\r\n\r\nCenturies of cold indifference shattered.\r\n\r\nElizabeth tempts Lothaire beyond reason, as only his fated mate could. As the month draws to a close, he must choose between a millennia-old blood vendetta and his irresistible prisoner. Will Lothaire succumb to the miseries of his past—or risk everything for a future with her?', 'images\\81q-Xa6lZmL.jpg', 'Librat\\Lothaire_-_Kresley_Cole.pdf'),
(6, 'Sweet Ruin', 'Kresley Cole', 529, '2015-12-01', 'An immortal assassin is caught between desire and duty...\r\n\r\nA foundling raised in a world of humans\r\n\r\nGrowing up, orphaned Josephine didn’t know who or what she was—just that she was “bad,” an outcast with strange powers. Her baby brother Thaddeus was as perfect as she was flawed; protecting him became her entire life. The day he was taken away began Jo’s transition from angry girl... to would-be superhero... to enchanting, ruthless villain.\r\n\r\nA lethally sensual enforcer on a mission\r\n\r\nA threat to the Møriør has brought archer Rune the Baneblood to the mortal realm to slay the oldest living Valkyrie. Whether by bow or in bed, he never fails to eliminate his target. Yet before he can strike, he encounters a vampiric creature whose beauty conceals a black heart. With one bite, she pierces him with aching pleasure, taking his forbidden blood - and jeopardizing the secrets of his brethren.\r\n\r\nA boundless passion that will lead to sweet ruin...\r\n\r\nCould this exquisite female be a spy sent by the very Valkyrie he hunts? Rune knows he must not trust Josephine, yet he’s unable to turn her away. Despite his millennia of sexual conquests, he can’t ignore the unfamiliar longing she arouses deep within him. When Jo betrays the identity of the one man she will die to protect, she and Rune become locked in a treacherous battle of wills that pits ultimate loyalty against unbridled lust. ', 'images\\24002318.jpg', 'Librat\\Kresley_Cole_-_Sweet_Ruin_Immortals_After_Dark_16.pdf'),
(7, 'Kingdom Of Ash', 'Sarah J Maas', 984, '2018-10-23', 'Aelin Galathynius has vowed to save her people ― but at a tremendous cost. Locked within an iron coffin by the Queen of the Fae, Aelin must draw upon her fiery will as she endures months of torture. The knowledge that yielding to Maeve will doom those she loves keeps her from breaking, but her resolve is unraveling with each passing day…\r\n\r\nWith Aelin captured, friends and allies are scattered to different fates. Some bonds will grow even deeper, while others will be severed forever. As destinies weave together at last, all must fight if Erilea is to have any hope of salvation.\r\n\r\nYears in the making, Sarah J. Maas\'s New York Times bestselling Throne of Glass series draws to an explosive conclusion as Aelin fights to save herself―and the promise of a better world.', 'images/ImageHandler.jpg', 'Librat\\Kingdom_of_Ash_-_Sarah_J_Maas.pdf'),
(8, 'The Queen Of Nothing', 'Holly Black', 300, '2019-11-19', 'He will be destruction of the crown and the ruination of the throne.\r\n\r\nPower is much easier to acquire than it is to hold onto. Jude learned this lesson when she released her control over the wicked king, Cardan, in exchange for immeasurable power.\r\n\r\nNow as the exiled mortal Queen of Faerie, Jude is powerless and left reeling from Cardan’s betrayal. She bides her time determined to reclaim everything he took from her. Opportunity arrives in the form of her deceptive twin sister, Taryn, whose mortal life is in peril.\r\n\r\nJude must risk venturing back into the treacherous Faerie Court, and confront her lingering feelings for Cardan, if she wishes to save her sister. But Elfhame is not as she left it. War is brewing. As Jude slips deep within enemy lines she becomes ensnared in the conflict’s bloody politics.\r\n\r\nAnd, when a dormant yet powerful curse is unleashed, panic spreads throughout the land, forcing her to choose between her ambition and her humanity…\r\n\r\nFrom the #1 New York Times bestselling author Holly Black, comes the highly anticipated and jaw-dropping finale to The Folk of the Air trilogy.', 'images\\The_Queen_of_Nothing_by_Holly_Black-212x300.jpg', 'Librat\\The_Queen_of_Nothing_3_Holly_Black.pdf'),
(9, 'Harry Potter and the Sorcerer\'s Stone', 'J.K. Rowling', 309, '2003-11-01', 'Harry Potter\'s life is miserable. His parents are dead and he\'s stuck with his heartless relatives, who force him to live in a tiny closet under the stairs. But his fortune changes when he receives a letter that tells him the truth about himself: he\'s a wizard. A mysterious visitor rescues him from his relatives and takes him to his new home, Hogwarts School of Witchcraft and Wizardry.\r\n\r\nAfter a lifetime of bottling up his magical powers, Harry finally feels like a normal kid. But even within the Wizarding community, he is special. He is the boy who lived: the only person to have ever survived a killing curse inflicted by the evil Lord Voldemort, who launched a brutal takeover of the Wizarding world, only to vanish after failing to kill Harry.\r\n\r\nThough Harry\'s first year at Hogwarts is the best of his life, not everything is perfect. There is a dangerous secret object hidden within the castle walls, and Harry believes it\'s his responsibility to prevent it from falling into evil hands. But doing so will bring him into contact with forces more terrifying than he ever could have imagined.\r\n\r\nFull of sympathetic characters, wildly imaginative situations, and countless exciting details, the first installment in the series assembles an unforgettable magical world and sets the stage for many high-stakes adventures to come.', 'images\\51DF6ZR8G7L._SX329_BO1,204,203,200_.jpg', 'Librat\\harry-potter-book-1.pdf'),
(10, 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', 341, '1999-06-02', 'Ever since Harry Potter had come home for the summer, the Dursleys had been so mean and hideous that all Harry wanted was to get back to the Hogwarts School for Witchcraft and Wizardry. But just as he’s packing his bags, Harry receives a warning from a strange impish creature who says that if Harry returns to Hogwarts, disaster will strike.\r\n\r\nAnd strike it does. For in Harry’s second year at Hogwarts, fresh torments and horrors arise, including an outrageously stuck-up new professor and a spirit who haunts the girls’ bathroom. But then the real trouble begins – someone is turning Hogwarts students to stone. Could it be Draco Malfoy, a more poisonous rival than ever? Could it possible be Hagrid, whose mysterious past is finally told? Or could it be the one everyone at Hogwarts most suspects… Harry Potter himself!', 'images\\Chamber_of_Secrets_New_UK_Cover.jpg', 'Librat\\HP-chamber-of-secret.pdf'),
(11, 'Harry Potter and the Prisoner of Azkaban', 'J.K. Rowling', 435, '2004-05-01', 'For twelve long years, the dread fortress of Azkaban held an infamous prisoner named Sirius Black. Convicted of killing thirteen people with a single curse, he was said to be the heir apparent to the Dark Lord, Voldemort.\r\n\r\nNow he has escaped, leaving only two clues as to where he might be headed: Harry Potter\'s defeat of You-Know-Who was Black\'s downfall as well. And the Azkaban guards heard Black muttering in his sleep, \"He\'s at Hogwarts . . . he\'s at Hogwarts.\"\r\n\r\nHarry Potter isn\'t safe, not even within the walls of his magical school, surrounded by his friends. Because on top of it all, there may well be a traitor in their midst.', 'images\\81lAPl9Fl0L.jpg', 'Librat\\Harry-potter-prison-of-azkaban.pdf'),
(12, 'The Hunger Games', ' Suzanne Collins', 374, '2008-09-14', 'Could you survive on your own in the wild, with every one out to make sure you don\'t live to see the morning?\r\n\r\nIn the ruins of a place once known as North America lies the nation of Panem, a shining Capitol surrounded by twelve outlying districts. The Capitol is harsh and cruel and keeps the districts in line by forcing them all to send one boy and one girl between the ages of twelve and eighteen to participate in the annual Hunger Games, a fight to the death on live TV.\r\n\r\nSixteen-year-old Katniss Everdeen, who lives alone with her mother and younger sister, regards it as a death sentence when she steps forward to take her sister\'s place in the Games. But Katniss has been close to dead before—and survival, for her, is second nature. Without really meaning to, she becomes a contender. But if she is to win, she will have to start making choices that weight survival against humanity and life against love.', 'images\\41V56ye3PrL._SX328_BO1,204,203,200_.jpg', 'Librat\\The_Hunger_Games_The_Hunger_Games_1_-_Suzanne_Collins.pdf'),
(13, 'Catching Fire', 'Suzanne Collins', 291, '2009-09-01', 'Sparks are igniting.\r\nFlames are spreading.\r\nAnd the Capitol wants revenge.\r\n\r\nAgainst all odds, Katniss Everdeen has won the Hunger Games. She and fellow District 12 tribute Peeta Mellark are miraculously still alive. Katniss should be relieved, happy even. After all, she has returned to her family and her longtime friend, Gale. Yet nothing is the way Katniss wishes it to be. Gale holds her at an icy distance. Peeta has turned his back on her completely. And there are whispers of a rebellion against the Capitol—a rebellion that Katniss and Peeta may have helped create.\r\n\r\nMuch to her shock, Katniss has fueled an unrest that she\'s afraid she cannot stop. And what scares her even more is that she\'s not entirely convinced she should try. As time draws near for Katniss and Peeta to visit the districts on the Capitol\'s cruel Victory Tour, the stakes are higher than ever. If they can\'t prove, without a shadow of a doubt, that they are lost in their love for each other, the consequences will be horrifying.\r\n\r\nIn Catching Fire, the second novel of the Hunger Games trilogy, Suzanne Collins continues the story of Katniss Everdeen, testing her more than ever before . . . and surprising readers at every turn.', 'images\\61VUik8NJ8L.jpg', 'Librat\\Catching_Fire_The_Hunger_Games_2_-_Suzanne_Collins.pdf'),
(14, 'Mockingjay', ' Suzanne Collins', 349, '2010-08-24', 'The final book in the ground-breaking HUNGER GAMES trilogy, this new foiled edition of MOCKINGJAY is available for a limited period of time. Against all odds, Katniss Everdeen has survived the Hunger Games twice. But now that she\'s made it out of the bloody arena alive, she\'s still not safe. The Capitol is angry. The Capitol wants revenge. Who do they think should pay for the unrest? Katniss. And what\'s worse, President Snow has made it clear that no one else is safe either. Not Katniss\'s family, not her friends, not the people of District 12.', 'images\\05af23c869bfad14cd8367d94836c592.jpg', 'Librat\\Mockingjay_The_Hunger_Games_3_-_Suzanne_Collins.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `libri_ka_kategori`
--

CREATE TABLE `libri_ka_kategori` (
  `libri_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `libri_ka_kategori`
--

INSERT INTO `libri_ka_kategori` (`libri_id`, `kategori_id`) VALUES
(2, 1),
(2, 4),
(2, 5),
(2, 7),
(3, 5),
(3, 7),
(5, 5),
(5, 6),
(5, 7),
(6, 1),
(6, 6),
(6, 7),
(7, 1),
(7, 4),
(7, 5),
(7, 7),
(9, 1),
(9, 2),
(9, 5),
(11, 1),
(11, 2),
(11, 5),
(12, 1),
(12, 2),
(12, 6),
(12, 7),
(13, 1),
(13, 2),
(13, 4),
(13, 7);

-- --------------------------------------------------------

--
-- Table structure for table `pagesa`
--

CREATE TABLE `pagesa` (
  `id` int(11) NOT NULL,
  `abonimi_id` int(11) DEFAULT NULL,
  `username` char(15) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pagesa`
--

INSERT INTO `pagesa` (`id`, `abonimi_id`, `username`, `data`) VALUES
(1, 1, 'altinarexha', '2020-12-16'),
(2, 1, 'altinarexha', '2021-01-11'),
(3, 1, 'altinarexha', '2021-01-11'),
(4, 1, 'altinarexha', '2021-01-11'),
(5, 1, 'diella', '2021-01-11'),
(6, 2, 'Melshani', '2021-01-12'),
(7, 3, 'Dafinaelshani1', '2021-01-05'),
(8, 1, 'nelshani', '2021-01-12'),
(9, 3, 'princeshAurora', '2021-01-12'),
(10, 2, 'prove', '2021-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `perdoruesi`
--

CREATE TABLE `perdoruesi` (
  `id` int(11) NOT NULL,
  `emri` char(15) NOT NULL,
  `mbiemri` char(20) NOT NULL,
  `username` char(15) NOT NULL,
  `fjalkalimi` char(100) NOT NULL,
  `email` char(30) NOT NULL,
  `roli_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perdoruesi`
--

INSERT INTO `perdoruesi` (`id`, `emri`, `mbiemri`, `username`, `fjalkalimi`, `email`, `roli_id`) VALUES
(1, 'Altina', 'Rexha', 'altinarexha', '25d55ad283aa400af464c76d713c07ad', 'altinarexha@gmail.com', 2),
(2, 'Dafina', 'Elshani', 'Dafinaelshani1', '25d55ad283aa400af464c76d713c07ad', 'dafinaelshani5@gmail.com', 2),
(4, 'Dukagjin', 'Elshani', 'delshani', '25d55ad283aa400af464c76d713c07ad', 'delshani@gmail.com', 1),
(5, 'Tringa', 'Restelica', 'Trestelica', '25d55ad283aa400af464c76d713c07ad', 'tringarestelica@gmail.com', 2),
(6, 'Marigona', 'Elshani', 'Melshani', '25d55ad283aa400af464c76d713c07ad', 'melshani@gmail.com', 2),
(7, 'Nushe', 'Elshani', 'nelshani', '25d55ad283aa400af464c76d713c07ad', 'nusheelshani@gmail.com', 2),
(8, 'Genta', 'Sopa', 'GentaSopa', 'md5(12345678)', 'gentasopa@gmail.com', 2),
(11, 'Diella', 'Sallauka', 'diella', '5858b321fc4f14bf15083e9f91a55926', 'diella@gmail.com', 2),
(12, 'Aurora', 'Pincesha', 'princeshAurora', '5858b321fc4f14bf15083e9f91a55926', 'aurora@gmail.com', 2),
(13, 'prove', 'prove', 'prove', '5858b321fc4f14bf15083e9f91a55926', 'prove@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `libri_id` int(11) DEFAULT NULL,
  `username` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `rating`, `review`, `libri_id`, `username`) VALUES
(11, 4, 'i mbrekullueshem', 1, 'princeshAurora'),
(12, 4, 'shum liber i mire', 14, 'prove'),
(13, 4, 'gsh', 6, 'nelshani');

-- --------------------------------------------------------

--
-- Table structure for table `roli`
--

CREATE TABLE `roli` (
  `id` int(11) NOT NULL,
  `pershkrimi` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roli`
--

INSERT INTO `roli` (`id`, `pershkrimi`) VALUES
(1, 'Admin'),
(2, 'Perdorues');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonimi`
--
ALTER TABLE `abonimi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `card_number` (`card_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kerkesa`
--
ALTER TABLE `kerkesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `lexon`
--
ALTER TABLE `lexon`
  ADD PRIMARY KEY (`user_id`,`libri_id`),
  ADD KEY `libri_id` (`libri_id`);

--
-- Indexes for table `librat`
--
ALTER TABLE `librat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libri_ka_kategori`
--
ALTER TABLE `libri_ka_kategori`
  ADD PRIMARY KEY (`libri_id`,`kategori_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `pagesa`
--
ALTER TABLE `pagesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abonimi_id` (`abonimi_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `perdoruesi`
--
ALTER TABLE `perdoruesi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `roli_id` (`roli_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `libri_id` (`libri_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `roli`
--
ALTER TABLE `roli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kerkesa`
--
ALTER TABLE `kerkesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `librat`
--
ALTER TABLE `librat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4543;

--
-- AUTO_INCREMENT for table `pagesa`
--
ALTER TABLE `pagesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `perdoruesi`
--
ALTER TABLE `perdoruesi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `perdoruesi` (`id`);

--
-- Constraints for table `kerkesa`
--
ALTER TABLE `kerkesa`
  ADD CONSTRAINT `kerkesa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `perdoruesi` (`id`);

--
-- Constraints for table `lexon`
--
ALTER TABLE `lexon`
  ADD CONSTRAINT `lexon_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `perdoruesi` (`id`),
  ADD CONSTRAINT `lexon_ibfk_2` FOREIGN KEY (`libri_id`) REFERENCES `librat` (`id`);

--
-- Constraints for table `libri_ka_kategori`
--
ALTER TABLE `libri_ka_kategori`
  ADD CONSTRAINT `libri_ka_kategori_ibfk_1` FOREIGN KEY (`libri_id`) REFERENCES `librat` (`id`),
  ADD CONSTRAINT `libri_ka_kategori_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `pagesa`
--
ALTER TABLE `pagesa`
  ADD CONSTRAINT `pagesa_ibfk_1` FOREIGN KEY (`abonimi_id`) REFERENCES `abonimi` (`id`),
  ADD CONSTRAINT `pagesa_ibfk_2` FOREIGN KEY (`username`) REFERENCES `perdoruesi` (`username`);

--
-- Constraints for table `perdoruesi`
--
ALTER TABLE `perdoruesi`
  ADD CONSTRAINT `perdoruesi_ibfk_1` FOREIGN KEY (`roli_id`) REFERENCES `roli` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`libri_id`) REFERENCES `librat` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`username`) REFERENCES `perdoruesi` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
