# HTMX Todo List

This is a simple todo list application built with PHP, Slim Framework, and HTMX. The goal of this project is to demonstrate how to create a todo list application with add and remove task functionalities using HTMX.

## How to Run

1. Clone the repository to your local environment:

    ```sh
    git clone https://github.com/your-username/htmx-todo.git
    cd htmx-todo
    ```

2. Install the project dependencies using Composer:

    ```sh
    composer install
    ```

3. Start the PHP built-in server:

    ```sh
    php -S localhost:8000 -t public
    ```

4. Open your browser and navigate to [http://localhost:8000](http://localhost:8000).


## Project Structure

```sh
├── app.php
├── composer.json
├── composer.lock
├── public
│   ├── index.php
│   └── style.css
├── README.md
├── routes
│   ├── add.php
│   ├── delete.php
│   └── tasks.php
└── views
    ├── index.html
    └── partials
```
