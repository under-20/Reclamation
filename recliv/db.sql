-- Create database
CREATE DATABASE manel;
USE manel;

-- Create subjects table
CREATE TABLE subjects (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Create claims table
CREATE TABLE claims (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    subject_id INT(11) NOT NULL,
    content TEXT NOT NULL,
    status ENUM('open', 'closed') DEFAULT 'open',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE
);

-- Create responses table
CREATE TABLE responses (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    claim_id INT(11) NOT NULL,
    content TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (claim_id) REFERENCES claims(id) ON DELETE CASCADE
);

-- Add indexes for better performance
CREATE INDEX idx_claims_subject_id ON claims(subject_id);
CREATE INDEX idx_responses_claim_id ON responses(claim_id);