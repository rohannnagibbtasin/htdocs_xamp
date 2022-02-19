
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Tasin</title>
  </head>
  <body>

    <div class="container mt-5">

        <div class="row">
            <form action="" class="col-sm-5" id="myform">
                <h3 class="alert-warning text-center p-2">Add/Update Student</h3>
                <div>
                    <input type="text" name="" id="stuid" class="form-control" style="display: none;">
                    <label for="nameid" class="form-label">Name</label>
                    <input type="text" name="" id="nameid" class="form-control">
                </div>
                <div class="">
                    <label for="emailid" class="form-label">Email</label>
                    <input type="email" name="" id="emailid" class="form-control">
                </div>
                <div class="">
                    <label for="passwprdid" class="form-label">Password</label>
                    <input type="password" name="" id="passwordid" class="form-control">
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary" id="btnadd">Save</button>
                </div>
                <div id="msg"></div>
            </form>

            <div class="col-sm-7 text-center">
                <h3 class="alert-warning p-2">Show Student Information</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="./js/ajaxscript.js">

    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>
