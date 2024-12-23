# Sử dụng PHP chính thức với phiên bản phù hợp với Laravel của bạn
FROM php:8.3.9-apache

# Cài đặt các tiện ích phụ thuộc
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libmcrypt-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Kích hoạt các module của Apache cần thiết
RUN a2enmod rewrite

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

# Copy toàn bộ mã nguồn vào Docker container
# COPY . /var/www/html

# Expose port 80
EXPOSE 80

RUN a2enmod rewrite

RUN useradd -ms /bin/bash -u 1000 app

# Khởi động Apache
CMD ["apache2-foreground"]
