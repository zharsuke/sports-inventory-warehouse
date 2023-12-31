<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Borrower</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <style>
    .navbar a:hover {
      font-weight: bold;
    }
    .btn:hover {
      background-color: #FFFFFF;
      color: #000000;
      border: #000000 solid 2px;
      font-weight: bold;
    }    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap');
        .jumbotron {
          padding: 50px 0;
        }
        
        body {
          font-family: 'Quicksand', sans-serif;
        }
    </style>
  </head>
  <body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-white">
      <div class="container">
        <a class="navbar-brand" href="#">Sports Inventory Warehouse</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/admin/home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/borrower/item">Item</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/borrower/loan">Loan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/borrower/return">Return</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/logout">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav><br>

    <!-- content -->
  <div class="container">
    <h2>Return Lists</h2>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Loan Id</th>
          <th scope="col">Username</th>
          <th scope="col">Item Name</th>
          <th scope="col">Quantity</th>
          <th scope="col">Loan Date</th>
          <th scope="col">Due Date</th>
          <th scope="col">Return Date</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($loan_data as $loan) : ?>
          <?php if ($loan['ReturnDate'] !== NULL) { ?>
            <tr>
              <td><?= $loan['LoanId'] ?></td>
              <td><?= $loan['Username'] ?></td>
              <td><?= $loan['ItemName'] ?></td>
              <td><?= $loan['Quantity'] ?></td>
              <td><?= $loan['LoanDate'] ?></td>
              <td><?= $loan['DueDate'] ?></td>
              <td><?= $loan['ReturnDate'] ?></td>
            </tr>
          <?php } ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>