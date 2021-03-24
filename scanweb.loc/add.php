<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<container>
    <div class="header">
        <div class="title">
            <h1>Product Add</h1>
        </div>
        <div class="button">
            <button>Save</button>
            <button>Cancel</button>
        </div>
    </div>
</container>
<hr>
<div class="form_add">
    <form action="sripts.php" method="post" >
          <div class="aritle_name">
            SKU &nbsp &nbsp &nbsp<input type="text" >
          </div>
        <div class="aritle_name">
           Name &nbsp &nbsp &nbsp<input type="text" >
        </div>
        <div class="aritle_name">
            Price ($) &nbsp <input type="number" step="0.01" />
        </div>
        <select name="switcher" id="">
            <option disabled>Type switcher</option>
            <option value="dvd">DVD</option>
            <option selected value=" book"> Book</option>
            <option value="furniture">Furniture</option>
        </select>
    </form>
</div>
<hr>
<br>
</body>
</html>