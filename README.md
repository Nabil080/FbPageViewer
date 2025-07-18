# FbPageViewer

This is a small PHP prototype that interacts with the Facebook Graph API to retrieve and display all posts from a specific Facebook page. It is designed to be easily integrated into an existing website.

## Features

- **Object-Oriented PHP**:
    - An `API` class handles communication with Facebook's API.
    - Retrieved posts are turned into `Post` objects that can display themselves in styled HTML cards.

- **Pagination Support**:
    - The script calculates and manages API request ranges to support paginated content retrieval.

- **Custom JavaScript Slider**:
    - Multi-image posts use a simple custom slider to navigate between images in a single post.

## Setup

1. **Get a Facebook API Token**:
    - Go to [Meta for Developers](https://developers.facebook.com/) and create an app.
    - Generate an access token with read permissions for the Facebook Page you're targeting.

2. **Configure the Project**:
    - Create a `config.php` file at the root of the project.
    - Add your access token:
        ```php
        <?php define('API_TOKEN', 'your-access-token-here'); ?>
        ```

3. **Run the Project Locally**:
    - In your terminal, navigate to the project directory and start a local PHP server:
        ```bash
        php -S localhost:8000
        ```
    - Open your browser and go to [http://localhost:8000](http://localhost:8000) to view the app.

## Notes

- This project is meant as a prototype or base for deeper integration.
- You may need to refresh the token regularly depending on your app's permissions.
