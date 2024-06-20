CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       name VARCHAR(100) NOT NULL,
                       email VARCHAR(100) NOT NULL UNIQUE,
                       password VARCHAR(255) NOT NULL,
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE posts (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       user_id INT NOT NULL,
                       title VARCHAR(255) NOT NULL,
                       body TEXT NOT NULL,
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE comments (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          post_id INT NOT NULL,
                          user_id INT NOT NULL,
                          comment TEXT NOT NULL,
                          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                          FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
                          FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);