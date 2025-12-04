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
