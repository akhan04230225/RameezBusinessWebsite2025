# Rameez Business Website - Services

This repository contains a basic WordPress setup for **R & J Brothers Services LLC**.

## Features
- Custom theme designed for home services (pressure washing, lawn care, painting, repairs, and more).
- Service scheduling form storing requests in WordPress.
- Simple chatbot integrating with the OpenAI API to answer common questions.
- Docker setup for local development.

## Getting Started
1. Install [Docker](https://www.docker.com/) and [Docker Compose](https://docs.docker.com/compose/).
2. Clone this repository and run:
   ```bash
   docker-compose up -d
   ```
3. Access WordPress at [http://localhost:8080](http://localhost:8080).
4. Complete the WordPress installation wizard.
5. Activate the **RJB Services** theme and the **RJB Scheduler** and **RJB Chatbot** plugins.
6. Define an `OPENAI_API_KEY` constant in your `wp-config.php` to enable chatbot responses:
   ```php
   define('OPENAI_API_KEY', 'your_api_key_here');
   ```

## Notes
- Appointments submitted via the scheduling form are stored as a custom post type `rjb_appointment`.
- The chatbot uses the OpenAI Chat Completions API. Ensure you have an API key and sufficient quota.
