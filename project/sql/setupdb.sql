CREATE DATABASE IF NOT EXISTS f32ee;
USE f32ee;

SELECT "Dropping tables" AS MESSAGE;
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS de_applicants;
DROP TABLE IF EXISTS de_category;
DROP TABLE IF EXISTS de_products;
DROP TABLE IF EXISTS de_sales;
DROP TABLE IF EXISTS de_positions;
DROP TABLE IF EXISTS de_employees;
SET FOREIGN_KEY_CHECKS = 1;

SELECT "Creating new tables" AS MESSAGE;
CREATE TABLE de_category (
    category_id INT UNSIGNED PRIMARY KEY,
    category_name VARCHAR(30),
    category_description VARCHAR(500)
);

CREATE TABLE de_products (
    product_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(30) NOT NULL,
    product_price DOUBLE NOT NULL,
    product_category INT UNSIGNED,
    product_description VARCHAR(500),
    product_allergen VARCHAR(100),

    CONSTRAINT FOREIGN KEY(product_category) REFERENCES de_category(category_id)
);

CREATE TABLE de_sales (
    product_id INT UNSIGNED,
    quantity INT UNSIGNED,

    CONSTRAINT FOREIGN KEY fk_sales(product_id) REFERENCES de_products(product_id)
);

CREATE TABLE de_positions (
    position_id INT PRIMARY KEY,
    position_name VARCHAR(40),
    position_salary INT
);

CREATE TABLE de_employees (
    ssn BIGINT PRIMARY KEY,
    first_name VARCHAR(40),
    last_name VARCHAR(40),
    pos INT,

    CONSTRAINT FOREIGN KEY fk_employee(pos) REFERENCES de_positions(position_id)
);

CREATE TABLE de_applicants (
    application_id INT PRIMARY KEY,
    applied_for INT,
    first_name VARCHAR(40),
    last_name VARCHAR(40),
    email VARCHAR(40),
    experience VARCHAR(500),

    CONSTRAINT FOREIGN KEY fk_applicant(applied_for) REFERENCES de_positions(position_id)
);

SELECT "Filling category table" AS MESSAGE;
INSERT INTO f32ee.de_category (category_id, category_name, category_description)
    VALUES (1, "Pizza", "All pizzas include durian, mozzarella, and tomato sauce."),
    (2, "Salad", "All salads include durian, iceberg lettuce, tomatoes, and cucumber."),
    (3, "Drink", "All drinks include durian and ice as standard."),
    (4, "Dessert", "All desserts include durian as standard.");

SELECT "Filling product table" AS MESSAGE;
INSERT INTO f32ee.de_products (product_id, product_name, product_price, product_description, product_category, product_allergen)
    VALUES (NULL, "The Original", 12.95, "Ham", 1, "Dairy"),
    (NULL, "Tutti Frutti", 15.95, "Mango, Pineapple, Banana, Curry powder", 1, "Dairy"),
    (NULL, "Meatzza", 21.95, "Ham, Pepperoni, Bacon, Chicken", 1, "Dairy"),
    (NULL, "Durian Overload", 23.95, "Extra Durian, Extra Cheese", 1, "Dairy"),
    (NULL, "Peanut pizza", 14.95, "Peanuts, Banana", 1, "Dairy, Nuts"),
    (NULL, "Greek Salad", 9.95, "Feta cheese, Olives, Red bellpepper", 2, "Dairy"),
    (NULL, "Mango Juice", 4.95, "Mango/Durian Juice", 3, "None"),
    (NULL, "Watermelon Juice", 2.95, "Watermelon/Durian Juice", 3, "None"),
    (NULL, "Hot mess", 1.95, "Warm durian drink", 3, "None"),
    (NULL, "Chocolate Milkshake", 3.95, "Chocolate/Durian milkshake", 4, "Dairy"),
    (NULL, "Lemon Pudding", 4.95, "Lemon/Durian pudding",  4, "None"),
    (NULL, "Durian Pancake", 5.95, "Served with Durian Jam",4, "Dairy, Eggs");

SELECT "Filling position table" AS MESSAGE;
INSERT INTO f32ee.de_positions (position_id, position_name, position_salary)
    VALUES (1, "Cook", 1000),
    (2, "Manager", 1500),
    (3, "Delivery Driver", 750);

SELECT "Filling employee table" AS MESSAGE;
INSERT INTO f32ee.de_employees (ssn, first_name, last_name, pos)
    VALUES (9212281234, "Luigi", "Marinho", 1),
    (1234567890, "Spider", "Man", 3),
    (1337420690, "Mister", "BigBoss", 2);
