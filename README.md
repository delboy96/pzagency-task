# pzagency-task : simple blog app

## Setup

### Requirements
- PHP >= 5.6
- Composer
- NPM

### Installation
1. Clone the repository:
   ```sh
   git clone git@github.com:delboy96/pzagency-task.git
   cd pzagencytask
2. Run migration:
    ```sh
   php database/run_migrations.php   
3. Seed database: 
    ```sh
   php database/seeders/DatabaseSeeder.php
   
### Description
##### Simple blog application with users, posts and comments. Only registered users can post blogs and leave comments. Also they can edit and delete their blogs and comments.
