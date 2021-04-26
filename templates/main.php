
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$static?>index.css">
    <title>Document</title>
</head>
<body>
<div id="app">
   <div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead >
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Действие</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in items">
            <td>{{item.id}}</td>
            <td>{{item.name}}</td>
            <td>{{item.price}}</td>
            <td>{{item.description}}</td>
            <td><img class="img-fluid" :src="item.url" alt=""></td>
            <td><button class="btn btn-danger  .btn-sm" v-on:click="delItem">X</button> </td>
          </tr>
          <tr v-if="form == false" v-on:click="addItem">
            <td colspan="5"><button class="btn btn-primary full-width">+</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  <div v-if="form == true " class="add_form" onsubmit="return false;">
      <div class="row align-items-center">
          <div class="col-md-2 col-sm-0"></div>
          <div class="col"><input type="text" name="name" class="full-width" placeholder="Введите имя товара" required></div>
          <div class="col"><input type="text" name="price" class="full-width" placeholder="Введите цену товара" required></div>
          <div class="col-md-2 col-sm-0"></div>
      </div>
      <div class="row">
        <div class="col-md-2 col-sm-0"></div>
        <div class="col"><textarea name="description" class="full-width"></textarea></div>
        <div class="col-md-2 col-sm-0"></div>
      </div>
      <div class="row">
        <div class="col-md-2 col-sm-0"></div>
        <div class="col"><input name="file" type="file" required ></div>
        <div class="col-md-2 col-sm-0"></div>
      </div>
      <div class="row">
        <div class="col-md-2 col-sm-0"></div>
        <div class="col"><button v-on:click="save_data" class="btn btn-success full-width">Загрузить</button></div>
        <div class="col-md-2 col-sm-0"></div>
      </div>
  </div>
  </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
      <script src="<?=$static?>index.js"></script>
</body>
</html>