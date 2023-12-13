<?php

namespace Models;
require_once '../app/config/connection.php';
use config\Connection;

class Loan {
    private $connect;

    public function __construct() {
        $connection = new Connection();
        $this->connect = $connection->connect;
    }

    public function getAll() {
        try {
            $query = "SELECT * FROM [master].[dbo].[Loan]";
            $stmt = $this->connect->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function create($data) {
        try {
            $query = "INSERT INTO [master].[dbo].[Loan] (ItemId, UserId, Quantity, LoanDate, DueDate, ReturnDate, Status) VALUES (:ItemId, :UserId, :Quantity, :LoanDate, :DueDate, NULL, :Status)";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':ItemId', $data['ItemId']);
            $stmt->bindParam(':UserId', $data['UserId']);
            $stmt->bindParam(':Quantity', $data['Quantity']);
            $stmt->bindParam(':LoanDate', $data['LoanDate']);
            $stmt->bindParam(':DueDate', $data['DueDate']);
            $stmt->bindParam(':Status', $data['Status']);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function getDataById($itemId) {
        try {
            $query = "SELECT * FROM [master].[dbo].[Loan] WHERE ItemId = :ItemId";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':ItemId', $itemId);
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function updateLoanStatusById($loanId, $status) {
        try {
            $query = "UPDATE [master].[dbo].[Loan] SET Status = :Status WHERE LoanId = :LoanId";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':LoanId', $loanId);
            $stmt->bindParam(':Status', $status);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function getAcceptedLoan() {
        try {
            $query = "SELECT * FROM [master].[dbo].[Loan] WHERE Status = 'Accepted'";
            $stmt = $this->connect->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function updateReturnDate($loanId, $returnDate) {
        try {
            $query = "UPDATE [master].[dbo].[Loan] SET ReturnDate = :ReturnDate WHERE LoanId = :LoanId";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':LoanId', $loanId);
            $stmt->bindParam(':ReturnDate', $returnDate);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function updateQuantityAfterReturn($itemId, $quantity) {
        try {
            $query = "UPDATE [master].[dbo].[Item] SET QuantityAvailable = QuantityAvailable + :Quantity WHERE ItemId = :ItemId";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':ItemId', $itemId);
            $stmt->bindParam(':Quantity', $quantity);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

}

?>