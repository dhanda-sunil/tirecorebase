Casing Logic
============
The DOT number is in the following format: ABCDEFGH1234

* AB: two char alphanumeric code for the manufacturer plant (manufacturer_plants.code)
* CD: two char alphanumeric code for tire size (manufacturer_plant_sizes.size_code) => tire_sizes.id
* EFGH: 4 char alphanumeric code for the manufacturer product line (manufacturer_product_lines.dot_code)
* 1234: 4 digit number where the first two digits represent the production week and the last two digits represent the production year

It seems like the AB part is fairly well defined, but CD & EFGH are not. So, the game plan is as follows:

Get the DOT code and interpret what the letters represent. These are the likely formats:

* 1234
* AB
* AB1234
* ABCD
* ABCD1234
* ABCDEFGH
* ABCDEFGH1234

Override fields
===============

The override fields are as follows:

* manufacturer_id
* tire_size_id
* product_line_txt

Looking up override fields
--------------------------

* Once DOT code is parsed, place the raw values in plant_dot, size_dot, product_line_dot, and production_week.
* Look up AB to find the plant, then look up the plant's manufacturer. If the plant code is not in manufacturer_plants, allow the user to select the manufacturer_id from a dropdown and store it in casings_manufacturer_id. Otherwise, store the correct value in the manufacturer_plant_id field.
* Look up CD to find the size code. If the size code is not in manufacturer_plant_sizes, allow the user to select a size from the tire_sizes table and store it in tire_size_id
* Look up EFGH to find the manufacturer product line. If not found, allow the user to enter the text manually for the product line and store it in product_line_txt
* 1234 can go in to production_week without any modifications.

When looking up details, look in the override fields first. If it's not null, then use that information. Otherwise, look at manufacturer_plant_id, manufacturer_plant_size_id, manufacturer_product_line_id.
 