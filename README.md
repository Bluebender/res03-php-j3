# res03-php-j3

1-La liste de tous les utilisateurs :
SELECT * FROM users 

2-La liste de tous les utilisateurs rangée par noms de famille ;
SELECT * FROM users ORDER BY last_name

3-Le dernier utilisateur inscrit ;
SELECT * FROM users ORDER BY registration_date DESC LIMIT 1

4-La liste de tous les utilisateurs fêtant leur anniversaire ce mois-ci ;
SELECT * FROM users WHERE MONTH(birthdate)=1

5-Le nombre total d'utilisateurs ;
SELECT COUNT(*) FROM users

6-La liste de tous les utilisateurs associés à leurs villes respectives ;
SELECT users.*, addresses.city 
FROM users JOIN addresses
ON users.address_id = addresses.id

7-La liste de tous les utilisateurs vivant à une adresse sans numéro ;
SELECT users.*
FROM users JOIN addresses
ON users.address_id = addresses.id
WHERE addresses.number IS null

8-La liste de tous les produits dont le prix est supérieur à 1 000 € ;
SELECT * from products WHERE price>1000

9-La liste de tous les produits associés à leurs photos respectives ;
SELECT products.*, pictures.*
FROM products JOIN pictures
ON products.id=pictures.product_id

10-La liste de tous les produits appartenant à la catégorie « Voyage » ;
SELECT products.*
FROM products
JOIN products_categories
ON products.id=products_categories.product_id
JOIN categories
ON products_categories.category_id=categories.id
WHERE categories.title="Voyage"

11-La liste de tous les utilisateurs ayant effectué plus de dix commandes ;
SELECT users.*, orders.user_id
FROM users join orders
ON users.id = orders.user_id
GROUP BY orders.user_id
HAVING COUNT(orders.user_id) > 10

12-La liste de tous les produits achetés par le premier utilisateur inscrit.
SELECT *
FROM users
ORDER BY registration_date
LIMIT 1