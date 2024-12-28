-- Base de données : Bibliothèque
CREATE DATABASE Library;
USE Library;

-- Table des utilisateurs
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'authenticated', 'visitor') DEFAULT 'visitor',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des catégories de livres
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Table des livres
CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    category_id INT NOT NULL,
    cover_image VARCHAR(255), 
    summary TEXT,
    status ENUM('available', 'borrowed', 'reserved') DEFAULT 'available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

-- Table des emprunts
CREATE TABLE borrowings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    book_id INT NOT NULL,
    borrow_date DATE NOT NULL,
    due_date DATE NOT NULL,
    return_date DATE DEFAULT NULL,
    notification_sent TINYINT(1) DEFAULT 0, -- 1 si un e-mail a été envoyé
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE
);
select * from users;
select * from categories;
select * from books;
select * from borrowings;
delete from books;
set sql_safe_updates = 0;
delete from books;
INSERT INTO books (title, author, category_id, cover_image, summary, status)
VALUES
('The Catcher in the Rye', 'J.D. Salinger', 1, 'https://example.com/images/catcher_rye.jpg', 'A story about teenage rebellion and alienation through the eyes of Holden Caulfield.', 'available'),
('Brave New World', 'Aldous Huxley', 2, 'https://example.com/images/brave_new_world.jpg', 'A dystopian society controlled by technology, conditioning, and a lack of individuality.', 'borrowed'),
('The Hobbit', 'J.R.R. Tolkien', 3, 'https://example.com/images/the_hobbit.jpg', 'Bilbo Baggins embarks on an epic adventure with dwarves to reclaim their homeland.', 'available'),
('Jane Eyre', 'Charlotte Brontë', 4, 'https://example.com/images/jane_eyre.jpg', 'The journey of an orphaned governess as she discovers love, independence, and self-respect.', 'reserved'),
('The Alchemist', 'Paulo Coelho', 1, 'https://example.com/images/alchemist.jpg', 'A philosophical tale of a shepherd’s quest to find his personal legend.', 'available'),
('Dune', 'Frank Herbert', 2, 'https://example.com/images/dune.jpg', 'A sci-fi epic exploring politics, religion, and ecology on the desert planet Arrakis.', 'borrowed'),
('Treasure Island', 'Robert Louis Stevenson', 3, 'https://example.com/images/treasure_island.jpg', 'A thrilling tale of pirates, treasure maps, and adventure on the high seas.', 'available'),
('Wuthering Heights', 'Emily Brontë', 4, 'https://example.com/images/wuthering_heights.jpg', 'A passionate story of love and revenge set on the Yorkshire moors.', 'reserved'),
('The Road', 'Cormac McCarthy', 2, 'https://example.com/images/the_road.jpg', 'A post-apocalyptic tale of survival and a father-son journey.', 'available'),
('Les Misérables', 'Victor Hugo', 4, 'https://example.com/images/les_miserables.jpg', 'An epic story of redemption, love, and struggle during 19th-century France.', 'available');
INSERT INTO categories (name)
VALUES
('Fiction'),
('Science Fiction'),
('Adventure'),
('Romance'),
('Mystery'),
('History'),
('Biography'),
('Fantasy'),
('Horror'),
('Self-Help');
INSERT INTO books (title, author, category_id, cover_image, summary, status)
VALUES
('To Kill a Mockingbird', 'Harper Lee', 1, 'https://example.com/images/mockingbird.jpg', 'A novel about the moral growth of a young girl in the racially charged American South.', 'available'),
('1984', 'George Orwell', 2, 'https://example.com/images/1984.jpg', 'A dystopian novel depicting a totalitarian society under constant surveillance.', 'borrowed'),
('Moby Dick', 'Herman Melville', 3, 'https://example.com/images/mobydick.jpg', 'The narrative of Captain Ahab’s obsessive quest to hunt the white whale.', 'reserved'),
('Pride and Prejudice', 'Jane Austen', 4, 'https://example.com/images/pride_prejudice.jpg', 'A classic romance novel that explores themes of love, class, and reputation.', 'available'),
('The Great Gatsby', 'F. Scott Fitzgerald', 1, 'https://example.com/images/gatsby.jpg', 'A critique of the American Dream set in the Jazz Age.', 'available'),
('The Da Vinci Code', 'Dan Brown', 5, 'https://example.com/images/da_vinci_code.jpg', 'A mystery thriller involving secret societies and a historical conspiracy.', 'borrowed'),
('Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 6, 'https://example.com/images/sapiens.jpg', 'A narrative history of the human species.', 'available'),
('The Diary of a Young Girl', 'Anne Frank', 7, 'https://example.com/images/diary_anne_frank.jpg', 'The poignant diary of Anne Frank during the Holocaust.', 'reserved'),
('Harry Potter and the Sorcerer\'s Stone', 'J.K. Rowling', 8, 'https://example.com/images/harry_potter.jpg', 'The magical journey of a young wizard discovering his destiny.', 'available'),
('The Shining', 'Stephen King', 9, 'https://example.com/images/shining.jpg', 'A chilling story about a haunted hotel and a family in peril.', 'borrowed'),
('The Power of Habit', 'Charles Duhigg', 10, 'https://example.com/images/power_habit.jpg', 'An exploration of how habits form and how they can be changed.', 'available');
delete from books;
INSERT INTO books (title, author, category_id, cover_image, summary, status)
VALUES ('1984', 'George Orwell', 2, 'https://thewonk.in/wp-content/uploads/2024/02/ninteen-eighty-four-book-review.jpg', 'A dystopian novel depicting a totalitarian society under constant surveillance.', 'available');
select * from books;
