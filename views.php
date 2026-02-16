CREATE OR REPLACE VIEW items_view AS
SELECT *
FROM items
INNER JOIN categories
ON items.items_id = categories.categories_id;

CREATE OR REPLACE VIEW favorites_view AS
SELECT items_view.*, users.users_id, favorites.*
FROM favorites
INNER JOIN users
ON favorites.favorites_users_id = users.users_id
INNER JOIN items_view
ON items_view.items_id = favorites.favorites_items_id;

CREATE VIEW CART_VIEW AS
SELECT SUM(items.items_price) as item_total_price, COUNT(cart.cart_item_id) as no_item, items.*, cart.*
FROM items
INNER JOIN cart
ON items.items_id = cart.cart_item_id
WHERE is_added_orders = 0
GROUP BY cart.cart_item_id, cart.user_id;

CREATE OR REPLACE VIEW orders_items_details
AS
SELECT *
FROM cart
JOIN orders
ON cart.user_id = orders.orders_user_id
JOIN items 
ON cart.cart_item_id = items.items_id;