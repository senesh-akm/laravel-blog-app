## Laravel Blog App

To perform the steps you've listed, here's what you generally need to do:

### 1. Clone the GitHub Project
- Open a terminal and run the following command to clone the repository:
  ```bash
  git clone <https://github.com/senesh-akm/laravel-blog-app.git>
  ```

### 2. Open the Project and Migrate the Database
- Open the project and install the composer dependacies:
  ```bash
  composer install
  ```

- Copy the `.env.example` file to `.env` and update your environment variables, especially the database configuration:
  ```bash
  DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_blog_app
DB_USERNAME=root
DB_PASSWORD=
  ```

- Generate an application key:
  ```bash
  php artisan key:generate
  ```

- Run the database migrations:
  ```bash
  php artisan migrate
  ```

### 3. Run the Node
- If the project uses Node.js, navigate to the project’s root directory and install the required Node packages:
  ```bash
  npm install
  ```

- If there’s a script defined to start the node process (like `npm run dev`), execute it:
  ```bash
  npm run dev
  ```

### 4. Run the Laravel Project
- Start the Laravel development server:
  ```bash
  php artisan serve
  ```
- This will start the project at `http://127.0.0.1:8000` by default.

### 5. Run the Tests
- Run the test cases using PHPUnit:
  ```bash
  php artisan test
  ```

These steps cover the typical requirements for setting up and running a Laravel project, including running tests.
