DELIMITER //
CREATE TRIGGER on_order
    BEFORE INSERT ON `order` FOR EACH ROW
    BEGIN
        UPDATE location SET available_quantity = (available_quantity - NEW.quantity) WHERE location_id = NEW.location;
    end //
DELIMITER ;

DELIMITER //
CREATE TRIGGER log_update_order
    BEFORE UPDATE ON `order`
    FOR EACH ROW
    INSERT INTO order_history SET sales_order = OLD.sales_order,
                                  commerce_user = OLD.commerce_user,
                                  logistics_user = OLD.logistics_user,
                                  location = OLD.location,
                                  shipment = OLD.shipment,
                                  date = OLD.date,
                                  time = OLD.time,
                                  status = OLD.status,
                                  item = OLD.item,
                                  quantity = OLD.quantity,
                                  price = OLD.price,
                                  action = 'UPDATE',
                                  change_time = NOW();
DELIMITER ;

DELIMITER //
CREATE TRIGGER log_delete_order
    BEFORE DELETE ON `order`
    FOR EACH ROW
    INSERT INTO order_history SET sales_order = OLD.sales_order,
                                  commerce_user = OLD.commerce_user,
                                  logistics_user = OLD.logistics_user,
                                  location = OLD.location,
                                  shipment = OLD.shipment,
                                  date = OLD.date,
                                  time = OLD.time,
                                  status = OLD.status,
                                  item = OLD.item,
                                  quantity = OLD.quantity,
                                  price = OLD.price,
                                  action = 'DELETE',
                                  change_time = NOW();
DELIMITER ;

DELIMITER //
CREATE TRIGGER quantity_check
    BEFORE INSERT
    ON `order`
    FOR EACH ROW
BEGIN
    DECLARE item_quantity INT;
    SET item_quantity = (SELECT available_quantity FROM location WHERE location_id = NEW.location);
    IF (item_quantity < NEW.quantity) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'The order can not be completed as there are too few items available';
    END if;
end //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE add_item (IN i_name varchar(64), i_ean bigint, i_price int, l_location varchar(64), l_available_quantity int, l_total_quantity int)
    BEGIN
        INSERT INTO item (name, ean, price) VALUES (i_name, i_ean, i_price);
        SET @item_number = (SELECT number FROM item WHERE ean = i_ean);
        INSERT INTO location (location_id, item_number, available_quantity, total_quantity) VALUES (l_location, @item_number, l_available_quantity, l_total_quantity);
    end //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE delete_order (IN o_sales INT)
    BEGIN
        DELETE FROM `order` WHERE sales_order = o_sales;
    end //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE create_shipment (IN s_desc text)
    BEGIN
        SET @latest_shipment = (SELECT MAX(number) FROM shipment);
        INSERT INTO shipment VALUES ((@latest_shipment + 1), s_desc);
    end //
DELIMITER ;

DELIMITER //
CREATE TRIGGER price_order
    BEFORE INSERT ON `order` FOR EACH ROW
    BEGIN
        DECLARE latest_sale INT;
        SET latest_sale = (SELECT MAX(sales_order) FROM `order`);
        SET @price = (SELECT price FROM item WHERE number = NEW.item);
        SET NEW.price = (@price * NEW.quantity);
    end //
DELIMITER ;

DELIMITER //
CREATE FUNCTION most_expensive_order()
RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE largestSum BIGINT;
    DECLARE most_expensive_order int;
    SET largestSum = (SELECT MAX(price) FROM `order`);
    SET most_expensive_order = (SELECT sales_order FROM `order` WHERE price = largestSum);
    RETURN (most_expensive_order);
end //
DELIMITER ;

DELIMITER //
CREATE FUNCTION promised_income()
RETURNS BIGINT
DETERMINISTIC
BEGIN
    RETURN (SELECT SUM(price) FROM `order` WHERE status = 0);
end //
