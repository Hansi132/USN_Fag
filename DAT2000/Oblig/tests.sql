CALL add_item('TestItem', '1234567896593', '1000', '5F-12-1-01', '100', '100');
CALL create_shipment('porterbuddy');
CALL delete_order(1);
CALL most_expensive_order();
SELECT * FROM `order` WHERE sales_order = most_expensive_order();
SELECT promised_income() as "order_total";


insert, Update and delete on order
INSERT INTO `order` (commerce_user, logistics_user, location, shipment, date, time, status, item, quantity, price) VALUES ('64','hkom','1F-12-1-02','4','2020-10-23','16:04:21','0','1','4','0');
Dette vil kjøre trigger for å telle ned varer, som da holder en forretningsregler om databasen, siden vi kan ikke selge flere varer enn det vi har på lager. Den sjekker også om vi har nok varer på lager. Om vi ikke har det sender den en error melding.
Denne vil også kjøre price_order som er en trigger som regner ut den totale prisen på ordren basert på hvor mange av ordren man kjøper.

UPDATE `order` SET status = 1 WHERE sales_order = MAX(sales_order);
Dette vil kjøre trigger for å telle ned total_quantity og lagre den historiske dataen om ordren.

DELETE FROM `order` WHERE sales_order = (SELECT MAX(sales_order));
Dette vil kjøre triggeren som lagrer historiske data om sletting av ordre.
