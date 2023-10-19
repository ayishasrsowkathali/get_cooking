CREATE DATABASE Recipe_App_db;
USE Recipe_App_db;

CREATE TABLE Users(
    id int AUTO_INCREMENT,
    full_name varchar(128),
    email varchar(255),
    password varchar(255),
    PRIMARY KEY (id)
);

CREATE TABLE Recipes (
    RecipeID INT AUTO_INCREMENT PRIMARY KEY,
    RecipeName VARCHAR(255) NOT NULL,
    Category VARCHAR(50),
    Instructions TEXT,
    ImageURL VARCHAR(255)
);

CREATE TABLE Ingredients (
    IngredientID INT AUTO_INCREMENT PRIMARY KEY,
    RecipeID INT,
    IngredientName VARCHAR(100),
    Amount VARCHAR(50),
    FOREIGN KEY (RecipeID) REFERENCES Recipes(RecipeID)
);

CREATE TABLE UserSavedRecipes (
    UserSavedRecipesID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    RecipeID INT,
    FOREIGN KEY (UserID) REFERENCES Users(id),
    FOREIGN KEY (RecipeID) REFERENCES Recipes(RecipeID)
);

-- Insert recipes to the recipe table --
INSERT INTO Recipes (RecipeName, Category, Instructions, ImageURL)
VALUES ('Chicken Parmesan', 'Italian', '1. Preheat oven to 400 degrees F (200 degrees C). Line a baking sheet with aluminum foil and lightly grease with cooking spray. 2. Place chicken breasts between two sheets of heavy plastic (resealable freezer bags work well) on a solid, level surface. Firmly pound chicken with the smooth side of a meat mallet to a thickness of 1/2-inch. Season chicken thoroughly with salt and pepper. 3. Beat egg and water together in a shallow bowl. Mix bread crumbs and 1/2 cup Parmesan cheese in a separate bowl. Dip chicken into egg mixture, then into bread crumb mixture to coat. 4. Heat olive oil in a large skillet over medium-high heat. Place chicken in the hot oil, reduce heat to medium, and cook until golden brown, about 2 minutes. Flip chicken and cook until browned on the other side, 2 to 3 minutes more. Transfer chicken to the prepared baking sheet. 5. Bake in the preheated oven until chicken is no longer pink in the center and the juices run clear, 8 to 12 minutes. An instant-read thermometer inserted into the center should read at least 165 degrees F (74 degrees C). 6. Place 1 to 2 tablespoons of spaghetti sauce on each chicken piece; top each chicken breast with about 1/3 cup mozzarella cheese and 1 tablespoon Parmesan cheese. Return chicken to oven and bake until cheese is melted, about 5 minutes more.', 'image/chickenparmesan.png');
INSERT INTO Recipes (RecipeName, Category, Instructions, ImageURL)
VALUES ('Chicken Alfredo', 'Italian', '1. Bring a large pot of lightly salted water to a boil. Add fettuccini and cook for 8 to 10 minutes or until al dente; drain. 2. In a large skillet, saute chicken in butter until no longer pink and juices run clear. Add cream, garlic powder, salt and pepper; heat through. Add fettuccini and toss; heat through. Sprinkle with Parmesan cheese if desired.', 'image/chickenalfredo.png');
INSERT INTO Recipes (RecipeName, Category, Instructions, ImageURL)
VALUES ('Chicken Tikka Masala', 'Indian', '1. In a large bowl, combine yogurt, lemon juice, 2 teaspoons cumin, cinnamon, cayenne, black pepper, ginger, and salt. Stir in chicken, cover, and refrigerate for 1 hour. 2. Preheat a grill for high heat. 3. Lightly oil the grill grate. Thread chicken onto skewers, and discard marinade. Grill until juices run clear, about 5 minutes on each side. 4. Melt butter in a large heavy skillet over medium heat. Saute garlic and jalapeno for 1 minute. Season with 2 teaspoons cumin, paprika, and 3 teaspoons salt. Stir in tomato sauce and cream. Simmer on low heat until sauce thickens, about 20 minutes. Add grilled chicken, and simmer for 10 minutes. Transfer to a serving platter, and garnish with fresh cilantro.', 'image/chickentikkamasala.png');
-- Insert ingredients to the ingredients table --
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (1, 'Chicken Breast', '4');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (1, 'Egg', '1');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (1, 'Bread Crumbs', '1/2 cup');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (1, 'Parmesan Cheese', '1/2 cup');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (1, 'Spaghetti Sauce', '1/2 cup');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (1, 'Mozzarella Cheese', '1/3 cup');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (1, 'Olive Oil', '2 tablespoons');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (1, 'Salt', '1/2 teaspoon');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (1, 'Pepper', '1/4 teaspoon');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (2, 'Fettuccini', '1 (12 ounce) package');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (2, 'Chicken Breast', '2');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (2, 'Butter', '1/2 cup');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (2, 'Heavy Cream', '1 pint');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (2, 'Garlic Powder', '1/2 teaspoon');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (2, 'Salt', '1/4 teaspoon');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (2, 'Pepper', '1/8 teaspoon');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (2, 'Parmesan Cheese', '1/2 cup');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (3, 'Yogurt', '1 cup');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (3, 'Lemon Juice', '1 tablespoon');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (3, 'Cumin', '2 teaspoons');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (3, 'Cinnamon', '1 teaspoon');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (3, 'Cayenne Pepper', '1 teaspoon');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (3, 'Black Pepper', '1 teaspoon');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (3, 'Ginger', '1 teaspoon');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (3, 'Salt', '1 teaspoon');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (3, 'Chicken Breast', '1 pound');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (3, 'Butter', '1 tablespoon');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (3, 'Garlic', '1 clove');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (3, 'Jalapeno Pepper', '1');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (3, 'Paprika', '2 teaspoons');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (3, 'Tomato Sauce', '8 ounces');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (3, 'Heavy Cream', '1 cup');
INSERT INTO Ingredients (RecipeID, IngredientName, Amount) VALUES (3, 'Cilantro', '1/4 cup');