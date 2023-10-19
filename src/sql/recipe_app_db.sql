-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 12:42 PM
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
-- Database: `recipe_app_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `IngredientID` int(11) NOT NULL,
  `RecipeID` int(11) DEFAULT NULL,
  `IngredientName` varchar(100) DEFAULT NULL,
  `Amount` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`IngredientID`, `RecipeID`, `IngredientName`, `Amount`) VALUES
(1, 1, 'Chicken Breast', '4'),
(2, 1, 'Egg', '1'),
(3, 1, 'Bread Crumbs', '1/2 cup'),
(4, 1, 'Parmesan Cheese', '1/2 cup'),
(5, 1, 'Spaghetti Sauce', '1/2 cup'),
(6, 1, 'Mozzarella Cheese', '1/3 cup'),
(7, 1, 'Olive Oil', '2 tablespoons'),
(8, 1, 'Salt', '1/2 teaspoon'),
(9, 1, 'Pepper', '1/4 teaspoon'),
(10, 2, 'Fettuccini', '1 (12 ounce) package'),
(11, 2, 'Chicken Breast', '2'),
(12, 2, 'Butter', '1/2 cup'),
(13, 2, 'Heavy Cream', '1 pint'),
(14, 2, 'Garlic Powder', '1/2 teaspoon'),
(15, 2, 'Salt', '1/4 teaspoon'),
(16, 2, 'Pepper', '1/8 teaspoon'),
(17, 2, 'Parmesan Cheese', '1/2 cup'),
(18, 3, 'Yogurt', '1 cup'),
(19, 3, 'Lemon Juice', '1 tablespoon'),
(20, 3, 'Cumin', '2 teaspoons'),
(21, 3, 'Cinnamon', '1 teaspoon'),
(22, 3, 'Cayenne Pepper', '1 teaspoon'),
(23, 3, 'Black Pepper', '1 teaspoon'),
(24, 3, 'Ginger', '1 teaspoon'),
(25, 3, 'Salt', '1 teaspoon'),
(26, 3, 'Chicken Breast', '1 pound'),
(27, 3, 'Butter', '1 tablespoon'),
(28, 3, 'Garlic', '1 clove'),
(29, 3, 'Jalapeno Pepper', '1'),
(30, 3, 'Paprika', '2 teaspoons'),
(31, 3, 'Tomato Sauce', '8 ounces'),
(32, 3, 'Heavy Cream', '1 cup'),
(33, 3, 'Cilantro', '1/4 cup'),
(35, 4, 'Fish', '300 gms'),
(36, 4, 'Grated coconut', '1.5 cup'),
(37, 4, 'Turmeric powder', '1/2 tsp'),
(38, 4, 'Chili powder', '1 tbsp'),
(39, 4, 'Chopped ginger', '1 tsp'),
(40, 4, 'Tamarind pulp', '3 tbsp'),
(41, 4, 'Green chili', '1'),
(42, 4, 'Shallots (sliced)', '3'),
(43, 4, 'Mustard seeds', '1 tsp'),
(44, 4, 'Curry leaves', '1 sprig'),
(45, 4, 'Coconut oil', '1 tbsp'),
(46, 4, 'Salt', '1 tsp');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `RecipeID` int(11) NOT NULL,
  `RecipeName` varchar(255) NOT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Instructions` text DEFAULT NULL,
  `ImageURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`RecipeID`, `RecipeName`, `Category`, `Instructions`, `ImageURL`) VALUES
(1, 'Chicken Parmesan', 'Italian', '1. Preheat oven to 400 degrees F (200 degrees C). Line a baking sheet with aluminum foil and lightly grease with cooking spray. \r\n2. Place chicken breasts between two sheets of heavy plastic (resealable freezer bags work well) on a solid, level surface. Firmly pound chicken with the smooth side of a meat mallet to a thickness of 1/2-inch. Season chicken thoroughly with salt and pepper. \r\n3. Beat egg and water together in a shallow bowl. Mix bread crumbs and 1/2 cup Parmesan cheese in a separate bowl. Dip chicken into egg mixture, then into bread crumb mixture to coat. \r\n4. Heat olive oil in a large skillet over medium-high heat. Place chicken in the hot oil, reduce heat to medium, and cook until golden brown, about 2 minutes. Flip chicken and cook until browned on the other side, 2 to 3 minutes more. Transfer chicken to the prepared baking sheet. \r\n5. Bake in the preheated oven until chicken is no longer pink in the center and the juices run clear, 8 to 12 minutes. An instant-read thermometer inserted into the center should read at least 165 degrees F (74 degrees C). \r\n6. Place 1 to 2 tablespoons of spaghetti sauce on each chicken piece; top each chicken breast with about 1/3 cup mozzarella cheese and 1 tablespoon Parmesan cheese. Return chicken to oven and bake until cheese is melted, about 5 minutes more.', 'image/chickenparmesan.png'),
(2, 'Chicken Alfredo', 'Italian', '1. Bring a large pot of lightly salted water to a boil. Add fettuccini and cook for 8 to 10 minutes or until al dente; drain. \r\n2. In a large skillet, saute chicken in butter until no longer pink and juices run clear. Add cream, garlic powder, salt and pepper; heat through. Add fettuccini and toss; heat through. Sprinkle with Parmesan cheese if desired.', 'image/chickenalfredo.png'),
(3, 'Chicken Tikka Masala', 'Indian', '1. In a large bowl, combine yogurt, lemon juice, 2 teaspoons cumin, cinnamon, cayenne, black pepper, ginger, and salt. Stir in chicken, cover, and refrigerate for 1 hour. \r\n2. Preheat a grill for high heat. \r\n3. Lightly oil the grill grate. Thread chicken onto skewers, and discard marinade. Grill until juices run clear, about 5 minutes on each side. \r\n4. Melt butter in a large heavy skillet over medium heat. Saute garlic and jalapeno for 1 minute. Season with 2 teaspoons cumin, paprika, and 3 teaspoons salt. Stir in tomato sauce and cream. Simmer on low heat until sauce thickens, about 20 minutes. Add grilled chicken, and simmer for 10 minutes. Transfer to a serving platter, and garnish with fresh cilantro.', 'image/chickentikkamasala.png'),
(4, 'Fish Fry', 'Indian', '1. Take coconut and turmeric powder in a blender and puree till it is smooth.\r\n2. Add the pureed coconut to a earthernware kadai or any kadai.\r\n3.Add in ginger, chilli powder, salt, tamarind pulp, green chilli and some water. Mix well.\r\n4. Bring this to a boil, add in fish piece and simmer for 8 to 10 mins till the fish is cooked.\r\n5. Now make seasoning, heat oil and crackle in mustard, shallots and curry leaves. Pour this over the curry and mix well. Cover the pan with a lid till serving.\r\n6. Serve with rice.', 'image/fishfry.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Ayisha Riham', 'ayishariham@gmail.com', '$2y$10$h0/DLkd0ldv4qcWf5g3BQeLhy7Umn8wb3OaHyT2KT62XepDncyzzu'),
(2, 'Majid', 'majidmubeen@gmail.com', '$2y$10$.AcPAhjujYYpSiSqIQCsr.udNL7zwu2R.eG805QhJmcXjvGTep1Ri'),
(3, 'Mafaz', 'maf@gmail.com', '$2y$10$2PJ.C4O.1iwYnGNlRG.vCO4jlAf8kXmknvtLAYUMLEm.XLZPL3zDG');

-- --------------------------------------------------------

--
-- Table structure for table `usersavedrecipes`
--

CREATE TABLE `usersavedrecipes` (
  `UserSavedRecipesID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `RecipeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`IngredientID`),
  ADD KEY `RecipeID` (`RecipeID`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`RecipeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersavedrecipes`
--
ALTER TABLE `usersavedrecipes`
  ADD PRIMARY KEY (`UserSavedRecipesID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `RecipeID` (`RecipeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `IngredientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `RecipeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usersavedrecipes`
--
ALTER TABLE `usersavedrecipes`
  MODIFY `UserSavedRecipesID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`RecipeID`) REFERENCES `recipes` (`RecipeID`);

--
-- Constraints for table `usersavedrecipes`
--
ALTER TABLE `usersavedrecipes`
  ADD CONSTRAINT `usersavedrecipes_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `usersavedrecipes_ibfk_2` FOREIGN KEY (`RecipeID`) REFERENCES `recipes` (`RecipeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
