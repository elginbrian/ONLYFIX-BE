# ONLYFIX by Team 3 PAW TI-C

OnlyFix adalah platform digital yang menghubungkan pemilik rumah dengan teknisi profesional di seluruh Indonesia. Kami hadir untuk memudahkan pengguna menemukan tenaga ahli berkualitas dalam berbagai bidang, mulai dari perbaikan listrik, pipa ledeng, perawatan peralatan rumah tangga, hingga renovasi. OnlyFix memberikan akses mudah dan terpercaya ke layanan teknisi yang terverifikasi, sehingga Anda dapat memastikan perbaikan dilakukan dengan aman, efisien, dan transparan.

## Team Member:
- Muhammad Zaidan Azizi (PM)
- Muhammad Tony Putra (UI/UX)
- Dimas Rezananda (FE)
- Edgar Davin Danuarta (FE)
- Elgin Brian Wahyu Bramadhika (BE)

## Tech Stack
- **Front-end:** `ReactJS, Tailwind CSS, Vercel`
- **Back-end:** `PHP, Laravel, MySQL, Railway`

## GitHub Repository
[![Readme Card](https://github-readme-stats.vercel.app/api/pin/?username=elginbrian&repo=ONLYFIX-FE&theme=radical)](https://github.com/elginbrian/ONLYFIX-FE)
[![Readme Card](https://github-readme-stats.vercel.app/api/pin/?username=elginbrian&repo=ONLYFIX-BE&theme=radical)](https://github.com/elginbrian/ONLYFIX-BE)

## Base URL
`https://onlyfix-be.up.railway.app/`

## User End Points

These routes handle user management, including viewing and modifying user profiles.

-   **`GET|HEAD`** `/users` → `UserController@index` - List all users.
-   **`POST`** `/users` → `UserController@store` - Store a new user.
-   **`GET|HEAD`** `/users/create` → `UserController@create` - Show the form to create a new user.
-   **`GET|HEAD`** `/users/{user}` → `UserController@show` - Show a specific user profile.
-   **`PUT|PATCH`** `/users/{user}` → `UserController@update` - Update a user's information.
-   **`DELETE`** `/users/{user}` → `UserController@destroy` - Delete a user.
-   **`GET|HEAD`** `/users/{user}/edit` → `UserController@edit` - Show the form to edit a user.

## Customer End Points

These routes are related to managing customer data, including viewing, creating, updating, and deleting customers.

-   **`GET|HEAD`** `/customers` → `CustomerController@index` - List all customers.
-   **`POST`** `/customers` → `CustomerController@store` - Store a new customer.
-   **`GET|HEAD`** `/customers/create` → `CustomerController@create` - Show the form to create a new customer.
-   **`GET|HEAD`** `/customers/{customer}` → `CustomerController@show` - Show a specific customer by ID.
-   **`PUT|PATCH`** `/customers/{customer}` → `CustomerController@update` - Update a specific customer's information.
-   **`DELETE`** `/customers/{customer}` → `CustomerController@destroy` - Delete a specific customer.
-   **`GET|HEAD`** `/customers/{customer}/edit` → `CustomerController@edit` - Show the form to edit a customer.

## Order Attachment End Points

These routes handle order attachments, including file uploads and management for each order.

-   **`GET|HEAD`** `/order_attachments` → `OrderAttachmentController@index` - List all order attachments.
-   **`POST`** `/order_attachments` → `OrderAttachmentController@store` - Store a new order attachment.
-   **`GET|HEAD`** `/order_attachments/create` → `OrderAttachmentController@create` - Show the form to upload a new attachment.
-   **`GET|HEAD`** `/order_attachments/{order_attachment}` → `OrderAttachmentController@show` - Show a specific order attachment.
-   **`PUT|PATCH`** `/order_attachments/{order_attachment}` → `OrderAttachmentController@update` - Update an order attachment.
-   **`DELETE`** `/order_attachments/{order_attachment}` → `OrderAttachmentController@destroy` - Delete a specific order attachment.
-   **`GET|HEAD`** `/order_attachments/{order_attachment}/edit` → `OrderAttachmentController@edit` - Show the form to edit an order attachment.

## Order End Points

These routes are used for managing orders in the system, including creation, update, and deletion of orders.

-   **`GET|HEAD`** `/orders` → `OrderController@index` - List all orders.
-   **`POST`** `/orders` → `OrderController@store` - Store a new order.
-   **`GET|HEAD`** `/orders/create` → `OrderController@create` - Show the form to create a new order.
-   **`GET|HEAD`** `/orders/{order}` → `OrderController@show` - Show a specific order by ID.
-   **`PUT|PATCH`** `/orders/{order}` → `OrderController@update` - Update a specific order.
-   **`DELETE`** `/orders/{order}` → `OrderController@destroy` - Delete a specific order.
-   **`GET|HEAD`** `/orders/{order}/edit` → `OrderController@edit` - Show the form to edit an order.

## Review End Points

These routes manage customer reviews, allowing users to create, view, edit, and delete reviews.

-   **`GET|HEAD`** `/reviews` → `ReviewController@index` - List all reviews.
-   **`POST`** `/reviews` → `ReviewController@store` - Store a new review.
-   **`GET|HEAD`** `/reviews/create` → `ReviewController@create` - Show the form to create a new review.
-   **`GET|HEAD`** `/reviews/{review}` → `ReviewController@show` - Show a specific review by ID.
-   **`PUT|PATCH`** `/reviews/{review}` → `ReviewController@update` - Update a specific review.
-   **`DELETE`** `/reviews/{review}` → `ReviewController@destroy` - Delete a specific review.
-   **`GET|HEAD`** `/reviews/{review}/edit` → `ReviewController@edit` - Show the form to edit a review.

## Technician End Points

These routes manage technician information, such as viewing, creating, and updating technician profiles.

-   **`GET|HEAD`** `/technicians` → `TechnicianController@index` - List all technicians.
-   **`POST`** `/technicians` → `TechnicianController@store` - Store a new technician.
-   **`GET|HEAD`** `/technicians/create` → `TechnicianController@create` - Show the form to create a new technician.
-   **`GET|HEAD`** `/technicians/{technician}` → `TechnicianController@show` - Show a specific technician.
-   **`PUT|PATCH`** `/technicians/{technician}` → `TechnicianController@update` - Update a technician's information.
-   **`DELETE`** `/technicians/{technician}` → `TechnicianController@destroy` - Delete a technician.
-   **`GET|HEAD`** `/technicians/{technician}/edit` → `TechnicianController@edit` - Show the form to edit a technician.
