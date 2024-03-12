-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 02:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `recipe_id`, `user_id`, `comment_text`, `created_at`) VALUES
(1, 3, 1, 'hi', '2023-11-14 10:31:21'),
(2, 3, 1, 'hi', '2023-11-14 10:31:29'),
(3, 3, 1, 'This is an interesting recipe', '2023-11-14 10:32:32'),
(4, 3, 1, 'My favorite', '2023-11-14 10:38:27'),
(5, 3, 1, 'Good guide', '2023-11-14 11:12:53'),
(6, 3, 1, 'Hi', '2023-11-17 08:18:02'),
(15, 3, 6, 'hgvh', '2023-11-17 13:59:33'),
(16, 4, 7, 'Great recipe', '2024-01-08 07:36:06'),
(17, 7, 8, 'Very easy recipe', '2024-02-01 10:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) DEFAULT NULL,
  `ingredient` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `recipe_id`, `ingredient`) VALUES
(3, 3, '1 ½ cups cups uncooked short-grain rice (such as kekulu haal, white Calrose, or white jasmine)'),
(4, 3, '3 cups water, plus more for rinsing rice'),
(5, 3, '2 cardamom pods (optional)'),
(6, 3, '1 (13 1/2 -ounce) can coconut milk, well shaken and stirred'),
(7, 3, '½ teaspoon kosher salt'),
(8, 4, '1 cup roasted channa dhal flour'),
(9, 4, '½ cup steamed wheat flour'),
(10, 4, '1 teaspoon of cumin'),
(11, 4, '2-4 dried red chili'),
(12, 4, '1 teaspoon of Omam (Carom seeds/ Ajwain) powder'),
(13, 4, '2 teaspoon margarine or olive oil'),
(14, 4, '½ cup water'),
(15, 4, 'Salt as needed'),
(16, 4, 'Oil to fry'),
(17, 4, 'Murukku ural/ mould'),
(28, 6, '1 kg mince beef'),
(29, 6, '1 1/2 tsp salt'),
(30, 6, '1 tsp ground cinnamon'),
(31, 6, '2 tsp freshly ground black pepper'),
(32, 6, '1/2 tsp ground cloves'),
(33, 6, '2 small shallots (or red onion finely chopped)'),
(34, 6, '1 thick slice bread (toasted & grated or 2 tbsp bread crumbs)'),
(35, 6, '1 tsp fennel seeds (toasted & finely ground)'),
(36, 6, '1 pinch saffron threads (crushed)'),
(37, 6, '1 tbsp chopped fennel'),
(38, 6, '4 cm piece of ginger (grated)'),
(39, 6, '4 cloves garlic (finely chopped)'),
(40, 6, 'juice of 1 lime'),
(41, 6, '6 eggs lightly beaten'),
(42, 6, '400 g dried breadcrumbs for coating'),
(43, 6, 'oil for frying or ghee (I used oil for this recipe Rice Bran Oil)'),
(44, 7, '500g flour'),
(45, 7, '300g caster sugar'),
(46, 7, '250g butter'),
(47, 7, '2 heaped tsp of cinnamon'),
(48, 7, '1 egg'),
(49, 7, 'Pinch of salt'),
(50, 8, '500g Egg Plant cut and deepfried'),
(51, 8, '250g Ash Plantain cut and deepfried'),
(52, 8, '200g Potatoes cut and deepfried'),
(53, 8, '1/2 tsp turmeric into each veggie before deep frying'),
(54, 8, '1 sliced B.Onion'),
(55, 8, '1 Tomato chopped'),
(56, 8, '2 Green Chillies slit'),
(57, 8, '5 Curry Leaves'),
(58, 8, '1 piece Rampe/Pandan leaf'),
(59, 8, '1” Cinnamon'),
(60, 8, '2 Cardamom'),
(61, 8, '2 Cloves'),
(62, 8, 'Salt to taste'),
(63, 8, '1tsp Ginger and Garlic crushed'),
(64, 8, '02 Cups Thin Coconut Milk or Stock'),
(65, 8, '01 Cup Thick Coconut Milk'),
(66, 8, '1 tsp Chilli Powder'),
(67, 8, '1 tsp Cumin Powder'),
(68, 8, '1/2 tsp Black Pepper Powder'),
(69, 8, '1 tsp Unoasted Curry Powder'),
(70, 8, '1/2 tsp Maldive Fish Powder'),
(71, 8, '1/2 tsp Turmeric'),
(72, 8, 'Drizzle of Lime Juice(1 tbsp)'),
(73, 9, '500g fish'),
(74, 9, '½ onion- sliced'),
(75, 9, '8 tbsp Black Pepper'),
(76, 9, '10 pcs of Goraka (Indian Tamarind / Brindleberry / Gambooge).'),
(77, 9, '½ tablespoon Chili Powder'),
(78, 9, '¼ teaspoon Turmeric'),
(79, 9, '3 Curry Leaves'),
(80, 9, 'Salt – to taste'),
(81, 9, '3 cups water (It is depend on the size of the saucepan)');

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) DEFAULT NULL,
  `instruction` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`id`, `recipe_id`, `instruction`) VALUES
(3, 3, 'Place rice in a medium saucepan; add water to cover. Swirl rice to rinse, and drain. Repeat process twice, pouring off as much water as possible. Add 3 cups water and cardamom, if using, to rice; bring to a boil over high. Reduce heat to low; cover and cook until water is mostly absorbed, about 15 minutes.'),
(4, 3, 'Uncover rice; stir in coconut milk and salt. Cook over low, stirring often, until coconut milk is mostly absorbed and mixture is creamy and thick, about 5 minutes. Discard cardamom. Transfer rice to a platter or baking sheet; top with a piece of parchment paper. Spread rice into a 1 1/2-inch-thick rectangle; use a spatula to flatten top. Let cool at room temperature until set, about 5 minutes. Remove parchment paper; cut rice into 3-inch squares or diamonds.'),
(5, 4, 'Soak the Omam powder in 1/8 cup of water for 30 minutes.'),
(6, 4, 'In a mixing bowl, take 1 cup of roasted Channa Dhal flour and ½ of steamed Atta flour and add together.'),
(7, 4, 'Take cumin and dry chili and grind it well until it becomes a fine powder. Add this to the flour mixture in the bowl and mix well.'),
(8, 4, 'Filter the Omam water and gradually add to flour mixture.'),
(9, 4, 'Then add salt and margarine to the flour mixture.'),
(10, 4, 'Gradually add water to the mixture and make very soft, non sticky dough (same as the consistency level for string hopper dough)'),
(11, 4, 'Insert clove shape disc into bottom of murukku ural and add small portion of dough into the murukku ural and press softly to make coil shaped murukku. Note: If the dough is not soft enough (due to not enough water), it will feel hard to press the ural. Add little bit of water and make the dough soft. This will result in very soft murukku.'),
(12, 4, 'In a pan take required amount of oil and heat it over medium heat.'),
(13, 4, 'Once the oil is hot enough, transfer the pressed murukku into the oil.'),
(14, 4, 'Once the murukku is cooked well on both side and has turned light golden brown in colour, take it out from the pan and drain the grease using paper towel.'),
(15, 4, 'Keep them in an air tight container and serve whenever you feel like eating crispy, spicy snack.'),
(27, 6, 'Line a baking tray with baking paper.  Preheat oven at 180ºC for approximately 15 minutes.'),
(28, 6, 'In a large bowl place the mince beef, salt, cinnamon, pepper, clove, shallots, bread, fennel seeds, saffron, chopped fennel, ginger, garlic, half the eggs and lime juice.'),
(29, 6, 'Combine using your hands and mix well.'),
(30, 6, 'Roll the mixture into golf size balls. Moisten your hands with water to make rolling the balls easier.'),
(31, 6, 'Roll the balls in the remainder of beaten egg.'),
(32, 6, 'Coat all the meat balls in breadcrumbs.'),
(33, 6, 'Heat oil or ghee and fry until golden on all sides.  Remove from the pan.'),
(34, 6, 'Place on lined tray and finish off in the oven and bake for approximately 5 minutes. Check to make sure that they are cooked through. Finally, Serve Hot.'),
(35, 7, 'Mix all ingredients together by hand to form a solid dough.'),
(36, 7, 'Store the dough in fridge for 20 minutes.'),
(37, 7, 'Roll out until 6mm-thick and cut into oval shapes. (Use an oval cookie cutter around 8cm long, 5cm across).'),
(38, 7, 'Heat your baking plate. This is a bit like making pikelets, you will know when you get the right temperature by testing a little of the dough.'),
(39, 7, 'Cook few minutes on both sides until golden brown, but make sure you don\'t burn them.'),
(40, 7, 'Let them cool off and enjoy with your coffee at morning tea.'),
(41, 8, 'CHICKEN STOCK : Par boil chicken(500g) with 1 tsp salt, 1/2 tsp black pepper, 1/4 tsp turmeric, 1/4 tsp chilli powder, 2″ pandan leaf and 3 whole garlic cloves with skin on'),
(42, 8, 'Clean and cut the veggies into chunks of desired size. We usually prefer our veggie cubes in kaliya abit chunky.However in Srilanka we mostly find the small sized eggplant. When cutting the eggplant I would first remove stem and check for black spots.\r\nCut into half first,makes the job easier.\r\nThen cut through the middle horizontally and start cutting thick slices (1”)which would leave you with half circle shaped eggplant chunks .If that is too big for you,cut that into half because sometimes the eggplant can be be big,everything depends on the size of the eggplant.'),
(43, 8, 'Peel the ash plantain by cutting off both ends and from the sides till you see least amount of green skin on.'),
(44, 8, 'Peel the potatoes and cut them into cubes sized approximately 1 & 1/2 “\r\nDo not boil before deep frying.'),
(45, 8, 'Potatoes take about 10 minutes to get done when DeepFrying,however Ash plantain takes a little longer maybe.Brinjal will take the least amount of time out of all three veggies. Once you have peeled the veggies, immerse them in cold water to avoid them from discoloring till you actually start cutting them. Drain off water and pat dry using a kitchen towel.'),
(46, 8, 'Sprinkle a tsp of turmeric powder over the cut veggies and toss it around making sure all parts are well coated.Do not add salt when frying the veggies,this absorbs more oil while deep frying and gets too soggy once fried…'),
(47, 8, 'Deep fry the veggies to a beautiful golden colour by maintaining the heat in the oil. Fry each vegetable separately as each one has a different cooking timing. Stir occasionally when deep fried to make sure all sides get beautiful and golden evenly.'),
(48, 8, 'Wash and clean the gizzard or liver if you’re adding it into this dish.Boil for 10 minutes with salt,turmeric,pepper,cumin powder and tamarind pulp.Cut into small pieces and set aside to be used when adding into this dish.'),
(49, 8, 'I used a clay pot but you can use your regular saucepan.Add the thin coconut milk or stock with all the ingredients except the fried veggies and bring it to a boil on high flame(05 minutes) (Onions, tomato, green chilli, ginger, garlic, maldive fish powder, curry leaves, pandan leaf, salt, unroasted curry powder, chilli powder, pepper powder, turmeric , whole spices and cashew)\r\nCumin Powder and Thick Milk will be added in later'),
(50, 8, 'Reduce heat and cook for atleast 05 more minutes to make sure the spices are cooked with the gravy base.'),
(51, 8, 'Time to add the fried veggies.First add the ash plantain and potatoes'),
(52, 8, 'Add the brinjals and do not mix with a spoon, use the back of the spoon handle to prevent it from getting mushy. Move the pot around carefully and mix everything together gently till the gravy soaks up without smashing the veggies.'),
(53, 8, 'Check for salt and seasonings and adjust accordingly. Now you can sprinkle cumin powder. Let this cook on high and cook for about 03 minutes and pour the thick milk.'),
(54, 8, 'You will realize the gravy has thickened up and is absorbing all that goodness !!! Drizzle with lime juice at the end.'),
(55, 8, 'If the Kaliya looks like it has more gravy,keep on high flame till it simmers down to almost the consistency you prefer,as it will continue to cook for awhile even after you switch off the flame. You could garnish with fried onions and curry leaves if you’re cooking for guests'),
(56, 8, 'Let this sit for another 05 minutes before plating and watch how it changes to a beautiful deep brown colour within the next few minutes\r\nThe Kaliya is now ready to be devoured with your choice of Main Meal'),
(57, 9, 'Boil the Goraka with 1/2 cup of water in a small saucepan'),
(58, 9, 'Once it is well boiled mince the goraka with a little bit of boiled water until it becomes a fine black paste.'),
(59, 9, 'Cut the fish into cubes preferably, wash it well with salt water and add it into the saucepan'),
(60, 9, 'Add the rest of the ingredients and Spices along with the Goraka Paste and mix it well with a tiny bit of water so that the mixture is well distributed among the pieces of fish (Keep in mind not to break the pieces while mixing)'),
(61, 9, 'Add the rest of the water about 2 - 2 1/2 cups in to the saucepan and let it cook in medium heat till the gravy is a thick paste'),
(62, 9, 'Add Salt to taste');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `preparation_time` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `user_id`, `category_id`, `image`, `name`, `preparation_time`, `description`, `category`) VALUES
(3, NULL, NULL, './uploads/kiribath.jpg', 'Kiribath (Milk Rice)', 40, 'Spicy red onion sambal is spooned over diamonds of coconut rice in this Sri Lankan dish, served to commemorate new beginnings. While a mortar and pestle is traditionally used to pound the sambal, it also can be gently pulsed together in a food processor.', 'sinhala'),
(4, NULL, NULL, './uploads/murukku.jpg', 'Murukku', 60, 'This snack has a prominent place in all Tamil celebrations. There are several types of murukku available and they differ based on ingredients. Today I have chosen Channa Dhal flour and Atta flour murukku.', 'tamil'),
(6, NULL, NULL, './uploads/Dutch meatballs.jpeg', 'Sri Lankan Dutch Meat Balls', 30, 'This Sri Lankan Dutch influenced dish for home made spicy meat balls is a favourite of ours.  The recipe is easy to make with the aromatics combined with the mince meat.  The spices elevate the meatballs to another level.  Coated with breadcrumbs, fried and then finished off in a hot oven.  Makes for a delicious snack, appetiser and can be included as part of a main meal.', 'burgher'),
(7, NULL, NULL, './uploads/Ijzerkoekjes (Iron-plate biscuits).jpg', 'Ijzerkoekjes (Iron-plate biscuits)', 60, 'These biscuits originated from the city of Vlaardingen in South Holland. Made by a Dutch grocer named Daatje de Koe around 1838, they have become a basic staple biscuit for bakers. The ijzerkoekjes used to be popular with fishermen because of their high nutrional value and could be kept for a long time without spoiling. The iron baking plate pattern gives the biscuit its distinctive look. You could cook these in a cast-iron pan or a hot plate.', 'burgher'),
(8, NULL, NULL, './uploads/Kaliya Curry.jpeg', 'Kaliya Curry', 60, 'Kaliya is a popular dish made using fried Eggplant,Ash Plantain and Potatoes. Ideally paired with fragrant ghee rice,dhal and meat curry accompanied with a tangy mango curry maybe…Twice cooked means first the veggies are fried and then cooked in coconut milk based gravy.', 'muslim'),
(9, NULL, NULL, './uploads/ambulthiyal.jpeg', 'Maalu Ambulthiyal(Sour fish curry)', 50, 'A tangy, spicy fish curry that has been devoured for centuries by Sri Lankans, the Sour Fish Curry or well known as the Maalu Ambulthiyal is a favourite in many households and can be enjoyed with Rice, string Hoppers and even hot Coconut Roti. Believed to have originated from the South of the Island, this dish is enjoyed not only because of its rich flavours but also because it could be preserved in room temperature up to a week or refrigerated even more. The most commonly used fish for this recipe is the Kelawalla (Yellowfin Tuna), Balaya (Skipjack Tuna) or Sailfish (Thalapath) but any type of firm fish would do.', 'sinhala');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'Hashini', '$2y$10$Xg1tpxjNi0ejCcW5TntUDORRd0fk6Ei5y8Z1UwbAexV9iaceAVVIS', 'hashini@gmail.com'),
(2, 'Heshani', '$2y$10$LDr0Moyt/0s8g5NLsL5OAulrcrZBLCS.qnuhgcp/o7ZlYxCG3iJby', 'heshani@gmail.com'),
(6, 'Mithara', '$2y$10$Dy7QawcwA8L9IEZ3gWydpe2pSJ2iRkZDt5rE6FXbH0DMVLNzlnqDe', 'mithara@gmail.com'),
(7, 'Sarani', '$2y$10$vWRWGFR25a0hn5kLiMu4p.rcS6l6OLzoOSmkWOGtifLkn0qYyuqfq', 'Sarani@gmail.com'),
(8, 'User1', '$2y$10$33ELOemFY1Vg8b1RBjnqZ.KymCcnjuYSYOmBKjc4TcZVTpO9xBTAS', 'user1@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recipe` (`recipe_id`);

--
-- Indexes for table `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Constraints for table `instructions`
--
ALTER TABLE `instructions`
  ADD CONSTRAINT `instructions_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `recipes_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
