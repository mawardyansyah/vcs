<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>insert data user</title>
</head>

<body>


    <div class="container">

        <!-- <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal">Content</button> -->
        <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="post" action="/edit">
                            <div class="form-group">
                                {{csrf_field()}}
                                <label for="modalUsername">username</label>
                                <input id="modalId" type="hidden" name="modalId">
                                <input id="modalUsername" class="form-control" type="text" name="modalUsername">
                            </div>
                            <div class="form-group">
                                <label for="modalPassword">Text</label>
                                <input id="modalPassword" class="form-control" type="text" name="modalPassword">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit" onclick="return confirm('yakin edit..?')">edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="row align-items-center">

            <div class="col-md-4  w-100 my-auto">
                <h1>buku tamu</h1>

                <form method="post" action="/insert">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="username">username</label>
                        <input id="username" class="form-control" type="text" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input id="password" class="form-control" type="password" name="password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">
                            submit
                        </button>
                    </div>


                </form>

            </div>

            <div class="col-md-6 tableArea">

                <table class="table table-light">

                    <tbody>
                        <?php $num = 1;  ?>
                        @foreach($userdata as $dt)
                        <tr>
                            <td id="id{{$dt->id}}">{{$num}}</td>
                            <td id="username{{$dt->id}}">{{$dt->username}}</td>
                            <td id="password{{$dt->id}}">{{$dt->password}}</td>
                            <td>
                                <i class="fa fa-edit" style="color: green;margin-right: 10px" id="icon1" data-toggle="modal" data-target="#modal" onclick="{edit({{$dt->id}})}"></i>
                                <i class="fa fa-close" style="color: red" onclick="{
                                    del('{{$dt->username}}', '{{$dt->id}}')
                                    
                                    }"></i>
                            </td>
                        </tr>
                    </tbody>
                    <?php $num += 1; ?>
                    @endforeach

                </table>
            </div>
        </div>


    </div>


    <script>
        var del = (x, y) => {
            // var id = document.getElementById('userId').value
            $yakin = confirm(`yakin delete ${x}`)
            if ($yakin) {

                window.location.href = `/delete/${y}`
            }
        }

        var edit = (x) => {
            masId = x
            var id = document.getElementById(`id${x}`).textContent
            var username = document.getElementById(`username${x}`).textContent
            var password = document.getElementById(`password${x}`).textContent

            var mdUsername = document.getElementById('modalUsername')
            var mdPassword = document.getElementById('modalPassword')
            var mdId = document.getElementById('modalId')

            mdUsername.setAttribute('value', `${username}`)
            mdPassword.setAttribute('value', `${password}`)
            mdId.setAttribute('value', `${id}`)

            console.log(id)

        }
    </script>











    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>



















<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEQenPMJNuqUwhg5W8UMFs66YBXrBVhhZzMFyRJVAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>