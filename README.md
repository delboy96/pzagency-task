# pzagency-task : simple blog app

## Setup

### Requirements
- PHP >= 5.6
- Composer
- NPM

### Installation
1. Clone the repository:
   ```sh
   git clone git@github.com:delboy96/pzagencytask.git
   cd pzagencytask
2. Run migration:
    ```sh
   php database/run_migrations.php   
3. Seed database: 
    ```sh
   php database/seeders/DatabaseSeeder.php
4. IMPORTANT:  
   If path is "localhost/pzagencytask/public/" then app will work fine. 
   If you clone repo in some folder ("pza" for example) and then url is "localhost/pza/pzagencytask/public/",
   changes would have to be made manually in 3 files (config/config.php, public/.htaccess, routes/web.php)    
   _config/config.php:_  
   const BASE_URL = 'http://localhost/pza/pzagencytask/public/';  
   const ASSETS_URL = 'http://localhost/pza/pzagencytask/assets/';  
   _public/.htaccess:_  
   RewriteBase /pza/pzagencytask/public/  
   _routes/web.php:_  
   $basePath = 'pza/pzagencytask/public';    
   In lack of time, I couldn't make this universal and dynamic. Hope you wouldn't mind! 
   
### Description
##### Simple blog application with users, posts and comments. Only registered users can post blogs and leave comments. Also they can edit and delete their blogs and comments.
