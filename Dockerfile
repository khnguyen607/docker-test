FROM php:7.4-apache

# Cài đặt MySQLi extension
RUN docker-php-ext-install mysqli

# Chỉnh sửa cấu hình PHP để bật MySQLi extension
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN sed -i 's/;extension=mysqli/extension=mysqli/' "$PHP_INI_DIR/php.ini"

# Copy các file và thư mục của ứng dụng vào container
COPY . /var/www/html

# Expose port 80
EXPOSE 80
