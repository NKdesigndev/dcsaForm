<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" type="text/css" href="http://127.0.0.1/dcsaForm/assets/css/bootstrap.min.css"> -->

</head>
<body>
    <h1 class="alert alert-danger">Test Print</h1>

    <div class="row">

        <p class="col-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident, quo similique non soluta voluptatibus amet ex voluptate rem sint dolores perspiciatis tempora illum natus, neque voluptas aliquid facilis. Iusto, deleniti.</p>
        <p class="col-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident, quo similique non soluta voluptatibus amet ex voluptate rem sint dolores perspiciatis tempora illum natus, neque voluptas aliquid facilis. Iusto, deleniti.</p>
    </div>
    
</body>

<style>
    h1 {
        color: red;
    }
    .row {
      display: flex;
      flex-wrap: wrap;
      float: left;
    }
    .col-6 {
      float: left;
      flex: 0 0 50%;
      width: 50%;
      padding: 0.5rem;
      box-sizing: border-box;
    }

    .left {
    float: left;
    border: 1px solid green;
    width: 50%;
  }
  
  .right {
    float: right;
    border: 1px solid blue;
    width: 50%;
  }
  

</style>

</html>