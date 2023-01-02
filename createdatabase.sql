CREATE database project;
CREATE TABLE Poolvilla(
    poolvilla_id INT NOT NULL PRIMARY KEY,
    poolvilla_name VARCHAR(50) NOT NULL,
    limit_guest INT NOT NULL,
    total_cost INT NOT NULL,
    deposit INT NOT NULL
);
CREATE TABLE user(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    phone  CHAR(10) NOT NULL,
    email VARCHAR(50) NOT NULL
);
CREATE TABLE Booking_details( 
    booking_id INT NOT NULL AUTO_INCREMENT,
    user_id INT,
    poolvilla_id INT NOT NULL,
    checkin_date DATE NOT NULL,
    checkout_date DATE NOT NULL,
    pay_date DATE NOT NULL,
    PRIMARY KEY(booking_id),
    foreign key(user_id) references user(user_id) on delete cascade,
    foreign key(poolvilla_id) references Poolvilla(poolvilla_id) on delete cascade
);
CREATE TABLE Payment(
    payment_id INT(4) zerofill PRIMARY KEY NOT NULL AUTO_INCREMENT,
    booking_id INT NOT NULL,
    payment_type varchar(20),
    pay_status varchar(20),
    foreign key(booking_id) references Booking_details(booking_id) on delete cascade
);
INSERT INTO Poolvilla(poolvilla_id,poolvilla_name, limit_guest,total_cost,deposit)
    VALUES 
    (1,'Exclusive Type J Pool Villa',10,12500,1000),
    (2,'Sky Breeze Pool Villa',12,5900,1000),
    (3,'Moonlight Pool Villa',18,7900,1000),
    (4,'Exclusive Type G Pool Villa',15,8900,1000);