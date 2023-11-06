-- Sample user entries
INSERT INTO users (username, email, password, full_name, address, city, state, country, phone_number, is_admin)
VALUES
    ('john_doe', 'john.doe@example.com', 'hashed_password', 'John Doe', '123 Main St', 'Casablanca', 'Grand Casablanca', 'Morocco', '+1234567890', 0),
    ('jane_smith', 'jane.smith@example.com', 'hashed_password', 'Jane Smith', '456 Elm St', 'Marrakech', 'Marrakech-Safi', 'Morocco', '+9876543210', 0),
    ('admin_user', 'admin@example.com', 'hashed_admin_password', 'Admin User', '789 Oak St', 'Rabat', 'Rabat-Salé-Kénitra', 'Morocco', '+1112223333', 1);

-- Sample category entries
INSERT INTO categories (category_name)
VALUES
    ('Handmade Jewelry'),
    ('Home Decor'),
    ('Textiles'),
    ('Pottery & Ceramics'),
    ('Wood Crafts');

-- Sample product entries
INSERT INTO products (product_name, category_id, description, price, stock_quantity, image_url)
VALUES
    ('Handcrafted Silver Necklace', 1, 'Beautiful silver necklace with intricate design.', 49.99, 50, 'image1.jpg'),
    ('Moroccan-Style Rug', 3, 'Colorful and elegant Moroccan-style rug.', 129.99, 25, 'image2.jpg'),
    ('Ceramic Vase', 4, 'Hand-painted ceramic vase with floral patterns.', 34.99, 30, 'image3.jpg'),
    ('Wooden Serving Tray', 5, 'Sturdy wooden serving tray with handles.', 19.99, 40, 'image4.jpg');

-- Sample order entries
INSERT INTO orders (user_id, total_amount, order_status)
VALUES
    (1, 89.98, 'Shipped'),
    (2, 129.99, 'Delivered'),
    (1, 34.99, 'Pending');

-- Sample order item entries
INSERT INTO order_items (order_id, product_id, quantity, price)
VALUES
    (1, 1, 2, 99.98),
    (2, 2, 1, 129.99),
    (3, 3, 1, 34.99);
