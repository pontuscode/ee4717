-- Category 1: Pizza; Category 2: Salad; Category 3: Drinks; Category 4: Desserts;
CREATE DATABASE IF NOT EXISTS f32ee;
use f32ee;

CREATE TABLE IF NOT EXISTS de_category (
category_id INT UNSIGNED PRIMARY KEY,
category_name VARCHAR(30),
category_description VARCHAR(500)
);

CREATE TABLE IF NOT EXISTS de_products (
product_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(30) NOT NULL,
product_price DOUBLE NOT NULL,
product_category INT UNSIGNED,
product_description VARCHAR(500),
CONSTRAINT FOREIGN KEY(product_category) REFERENCES de_category(category_id)
);

CREATE TABLE IF NOT EXISTS de_sales (
product_id INT UNSIGNED,
quantity INT UNSIGNED,
CONSTRAINT FOREIGN KEY fk_sales(product_id) REFERENCES de_products(product_id)
);

CREATE TABLE IF NOT EXISTS de_positions (
position_id INT PRIMARY KEY,
position_name VARCHAR(40),
position_salary INT
);

CREATE TABLE IF NOT EXISTS de_employees (
ssn BIGINT PRIMARY KEY,
first_name VARCHAR(40),
last_name VARCHAR(40),
pos INT,
CONSTRAINT FOREIGN KEY fk_employee(pos) REFERENCES de_positions(position_id)
);

CREATE TABLE IF NOT EXISTS de_applicants (
application_id INT PRIMARY KEY,
applied_for INT,
first_name VARCHAR(40),
last_name VARCHAR(40),
email VARCHAR(40),
CONSTRAINT FOREIGN KEY fk_applicant(applied_for) REFERENCES de_positions(position_id)
);

INSERT INTO f32ee.de_category (category_id, category_name, category_description) VALUES (1, "Pizza", "All pizzas include durian, mozzarella, and tomato sauce.");
INSERT INTO f32ee.de_category (category_id, category_name, category_description) VALUES (2, "Salad", "All salads include durian, iceberg lettuce, tomatoes, and cucumber.");
INSERT INTO f32ee.de_category (category_id, category_name, category_description) VALUES (3, "Drink", "All drinks include durian and ice as standard.");
INSERT INTO f32ee.de_category (category_id, category_name, category_description) VALUES (4, "Dessert", "All desserts include durian as standard.");

INSERT INTO f32ee.de_products (product_id, product_name, product_price, product_description, product_category) VALUES (NULL, "The Original", 12.95, "Ham", 1);
INSERT INTO f32ee.de_products (product_id, product_name, product_price, product_description, product_category) VALUES (NULL, "Tutti Frutti", 15.95, "Mango, Pineapple, Banana, Curry powder", 1);
INSERT INTO f32ee.de_products (product_id, product_name, product_price, product_description, product_category) VALUES (NULL, "Meatzza", 21.95, "Ham, Pepperoni, Bacon, Chicken", 1);
INSERT INTO f32ee.de_products (product_id, product_name, product_price, product_description, product_category) VALUES (NULL, "Durian Overload", 23.95, "Extra Durian, Extra Cheese", 1);
INSERT INTO f32ee.de_products (product_id, product_name, product_price, product_description, product_category) VALUES (NULL, "Peanut pizza", 14.95, "Peanuts, Banana", 1);
INSERT INTO f32ee.de_products (product_id, product_name, product_price, product_description, product_category) VALUES (NULL, "Greek Salad", 9.95, "Feta cheese, Olives, Red bellpepper", 2);
INSERT INTO f32ee.de_products (product_id, product_name, product_price, product_description, product_category) VALUES (NULL, "Mango Juice", 4.95, "Mango/Durian Juice", 3);
INSERT INTO f32ee.de_products (product_id, product_name, product_price, product_description, product_category) VALUES (NULL, "Watermelon Juice", 2.95, "Watermelon/Durian Juice", 3);
INSERT INTO f32ee.de_products (product_id, product_name, product_price, product_description, product_category) VALUES (NULL, "Hot mess", 1.95, "Warm durian drink", 3);
INSERT INTO f32ee.de_products (product_id, product_name, product_price, product_description, product_category) VALUES (NULL, "Chocolate Milkshake", 3.95, "Chocolate/Durian milkshake", 4);
INSERT INTO f32ee.de_products (product_id, product_name, product_price, product_description, product_category) VALUES (NULL, "Lemon Pudding", 4.95, "Lemon/Durian pudding",  4);

INSERT INTO f32ee.de_positions (position_id, position_name, position_salary) VALUES (1, "Cook", 1000);
INSERT INTO f32ee.de_positions (position_id, position_name, position_salary) VALUES (2, "Manager", 1500);
INSERT INTO f32ee.de_positions (position_id, position_name, position_salary) VALUES (3, "Delivery Driver", 750);

INSERT INTO f32ee.de_employees (ssn, first_name, last_name, pos) VALUES (9212281234, "Luigi", "Marinho", 1);
INSERT INTO f32ee.de_employees (ssn, first_name, last_name, pos) VALUES (1234567890, "Spider", "Man", 3);
INSERT INTO f32ee.de_employees (ssn, first_name, last_name, pos) VALUES (1337420690, "Mister", "BigBoss", 2);