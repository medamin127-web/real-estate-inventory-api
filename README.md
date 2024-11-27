** Real Estate Inventory Management API ** 

Project Description
A Laravel-based REST API for managing and searching real estate properties with advanced geospatial search capabilities.

Features:

- Create real estate properties (Houses and Apartments)
- Search properties with multiple filters
- Geospatial search within a specified radius
- Supports various search criteria:
   Property type
   Address
   Size range
   Bedroom count
   Price range
   Geographical location



Technical Specifications:

Framework: Laravel 11
Database: MySQL
PHP Version: 8.3+

Setup Instructions:

1 - Clone repository

- git clone https://github.com/medamin127-web/real-estate-inventory-api.git
- cd real-estate-inventory-api

2 -Install dependencies

- composer install
- cp .env.example .env
- php artisan key:generate

3 - Database Configuration

- Create database
- Update .env with credentials
- php artisan migrate
- php artisan db:seed


API Endpoints

POST /api/properties: Create property
    Property details

GET /api/properties: Search properties

Query params: type, address, size, bedrooms, price

GET /api/properties/nearby: Geospatial search

Query params: latitude, longitude, radius


** Improvement Backlog ** 

- Implement user authentication
- Add comprehensive input validation
- Create more advanced search filters
- Develop comprehensive test coverage
- Implement caching mechanisms
- Add logging for API interactions
