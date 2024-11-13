## 🧴 Fragrance Guide by Muhammad Semab 

---
### Table of Contents
- [Scenario](#scenario)
- [Key Requirements](#key-requirements)
- [CRUD Operations](#crud-operations)
- [Core Laravel Components](#core-laravel-components)
- [Additional Requirements](#-additional-requirements)
- [Conclusion](#conclusion)
---
### Scenario
- My app allows my users to browse a collection of fragrances, allowing them to search by type, and access detailed information on each fragrance.
---
### Key requirements
  - Built using Laravel Framework with MySQL
  - Using a single table which is also in first normal form.
    - `name`, `brand`, `scent_type`, `description` and `price` all contain one value ensuring no redundancy.
  - Features migrations and seeders
    - `FragranceSeeder.php` is the seeder adding some of the sample fragrances into my database.
    - `2024_11_01_202805_create_fragrances_table.php` defines the structure of fragrances table.

- Custom CSS used allowing for consistent yet unique CSS for each page improving usability.
- Persistent navigation on web app which is easy to navigate.
---
### CRUD operations
- users can perform `create`, `read`, `update` or `delete` on any fragrance in my table.
- done using `Route::resource('fragrances', FragranceController::class)` to simplify the process.
---
### Core Laravel components
- my app uses Routes (example above in `web.php`), Controllers(`FragranceController.php`)  and models(`Fragrance.php`) to manage the fragrance data
- Blade views (`index.blade.php`) and directives(`@foreach` in `index.blade.php`) rendering the front end.
  - allows for easy to read modular code
- Eloquent used for pagination and alongside with chaining methods for query building. Example in: `FragranceController.php`
---
### Additional Requirements
- Successful implementation of Search bar with custom CSS in `index.blade.php` for usability
- Successful implementation of pagination with custom CSS in `index.blade.php` for usability
- Back-end and front end user input validation using the Laravel Framework.
  - used in `store` function in `FragranceController.php`
- Ambitious use of css for page layouts in `public\css\fragranecs` for usability
- Templating used in my views to create a consistent layout
  - use of `@extends('layouts.app')` and `@section('content')` to organise pages
- Components used for website layout like navbar, header and footer in `app.blade.php` for modular code
- Successful implementation of filtering data with customer CSS in `index.blade.php` further improving usability
  - implemented using complex queries with Eloquent in `index` function found in `FragranceController.php`
- Route resourcing used to set up resource routes for CRUD operations allowing for cleaner code
  - in `web.php`
---
### Conclusion

My web app provides a easy-to-navigate website to explore a collection of fragrances. By implementing core Laravel features, including CRUD operations, search and filter functionality, and custom input validation, the app demonstrates my solid foundation of the Laravel framework.

---
