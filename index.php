<?php

$db = new PDO(
    'mysql:host=db.3wa.io;port=3306;dbname=vincentollivier_',
    'vincentollivier',
    '98f74e8350a6f9da22f312f5162d2994',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);

$query = $db->prepare('SELECT users.first_name, users.last_name, products.*
FROM products

JOIN products_orders
ON products.id=products_orders.product_id

JOIN orders
ON products_orders.order_id=orders.id

JOIN users
ON orders.user_id=users.id

WHERE users.id = (
    SELECT users.id
    FROM users
    ORDER BY registration_date
	LIMIT 1
	)
');
$query->execute();
$users = $query->fetchAll(PDO::FETCH_ASSOC);

var_dump ($users);

?>