# Event_calendar

This is Responsive Event_Calendar

For Creating database


CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    description TEXT,
    type VARCHAR(50),
    every_year BOOLEAN DEFAULT FALSE,
    badge VARCHAR(50),
    color VARCHAR(7)
);


After creating DB go to this page "add_event.html" and add Event Details and check into calendar(index.html) .



