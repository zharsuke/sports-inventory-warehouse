<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    .navbar a:hover {
      font-weight: bold;
    }
    .navbar a:hover {
      font-weight: bold;
    }
    .btn:hover {
      background-color: #FFFFFF;
      color: #000000;
      border: #000000 solid 2px;
      font-weight: bold;
    }.btn:hover {
      background-color: #FFFFFF;
      color: #000000;
      border: #000000 solid 2px;
      font-weight: bold;
    }
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap');
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
            <a class="nav-link" href="/admin/user">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/admin/inventory">Inventory</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/loan">Loan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/totalLoan">Total Loan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/return">Return</a>
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
    <h2>Inventory Management</h2>
        <!-- Search Form -->
        <form class="d-flex" role="search" action="/admin/getItem" method="post">
        <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="data">
        <button class="btn btn-dark" type="submit">Search</button>
      </form><br>
    <div class="row col-md-5">
      <div class="col">
        <a style="width: 100%;" class="btn btn-dark" href="/admin/addItem">Add Item</a>
      </div>
      <div class="col col-md-5">
        <a style="width: 100%;" class="btn btn-dark" href="/admin/itemReport">Print Item Report</a>
      </div>
      <div class="col col-md-2">
      </div>
    </div>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Item Id</th>
          <th scope="col">Item Name</th>
          <th scope="col">Item Type</th>
          <th scope="col">Quantity Available</th>
          <th scope="col">Quantity Total</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($item_data as $item) { ?>
          <tr>
            <td><?php echo $item['ItemId']; ?></td>
            <td><?php echo $item['ItemName']; ?></td>
            <td><?php echo $item['ItemType']; ?></td>
            <td><?php echo $item['QuantityAvailable']; ?></td>
            <td><?php echo $item['QuantityTotal']; ?></td>
            <td>
              <div class="row">
                <div class="col">
                  <a style="width: 100%;" class="btn btn-dark" href="/admin/editItem?ItemId=<?php echo $item['ItemId']; ?>">Edit</a>
                </div>
                <div class="col">
                  <form action="/admin/deleteItem" method="post">
                    <input type="hidden" name="ItemId" value="<?php echo $item['ItemId']; ?>">
                    <button style="width: 100%;" type='submit' class="btn btn-dark">Delete</button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
