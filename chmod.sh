#!/bin/sh
sudo chown -R apache:apache /var/www/html/raspi_web_service/holiday_application/holiday_application.php
sudo chown -R apache:apache /var/www/html/raspi_web_service/holiday_application/template/template.html
sudo chmod 775 /var/www/html/raspi_web_service/holiday_application/holiday_application.php
sudo chmod 775 /var/www/html/raspi_web_service/holiday_application/template/template.html