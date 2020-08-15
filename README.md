# Ticketing-System
Ticketing System - SoloDesk SBS19017

Before deploying site be sure to create your MySQL databases named ticketsystem with the below commands. 
*--- Tickets Table ---*

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `submitter` varchar(50) NOT NULL,
  `Title` varchar(250) DEFAULT NULL,
  `issue_type` varchar(70) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Department` varchar(75) DEFAULT NULL,
  `Date_Logged` datetime DEFAULT current_timestamp(),
  `Last_Reply` int(11) DEFAULT NULL,
  `Assigned_Agent` varchar(50) DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL,
  `SLA` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `fk_submitter` (`submitter`),
  ADD KEY `fk_agent` (`Assigned_Agent`);

ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=398;

ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_agent` FOREIGN KEY (`Assigned_Agent`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_submitter` FOREIGN KEY (`submitter`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;
 ---------------------------------------------------------------------------------
 *--- Tickets Response Table ---*
 
 CREATE TABLE `ticket_response` (
  `Id` int(11) NOT NULL,
  `parent_ticket` int(11) NOT NULL,
  `User` varchar(50) NOT NULL,
  `responder_role` varchar(70) NOT NULL,
  `Text` text NOT NULL,
  `Reply_Date` varchar(20) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `ticket_response`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_parent_ticket` (`parent_ticket`);

ALTER TABLE `ticket_response`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `ticket_response`
  ADD CONSTRAINT `fk_parent_ticket` FOREIGN KEY (`parent_ticket`) REFERENCES `tickets` (`ticket_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
 ---------------------------------------------------------------------------------
*--- User Table ---*
  
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `acc_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
   ---------------------------------------------------------------------------------
Once the tables are created you may deploy your site. 
  - To create an admin account, register a new user with the username "admin" and your chosen password. 
  - Once the user is created go to your mySQL table within your MySQL admin panel and change the acc_type to "admin" this will set the admin role to the specificed uder. 
  
