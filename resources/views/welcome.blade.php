<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Daraja</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Obtain Token
                    </div>
                    <div class="card-body">
                        <h3 id="accessToken"></h3>
                        <button id="getAccessToken" class="btn btn-info">Request Access Token</button>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        Register URL's
                    </div>
                    <div class="card-body">
                        <button id="registerURLS" class="btn btn-info">Register URLs</button>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        Simulate Transaction
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" name="amount" class="form-control" id="amount">
                            </div>
                            <div class="form-group">
                                <label for="account">Account</label>
                                <input type="text" name="account" class="form-control" id="account">
                            </div>
                            <button class="btn btn-info mt-3">Simulate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
        document.getElementById('getAccessToken').addEventListener('click',(event)=>{
            event.preventDefault()
     
        axios.post('/get-token',{})
        .then((response)=>{
            document.getElementById('accessToken').innerHTML=response.data
        })
        .catch((err)=>{
            console.log(err)
        })
        })
        
        document.getElementById('registerURLS').addEventListener('click',(event)=>{
            event.preventDefault()
            axios.post('register-urls',{})
            .then((response)=>{
                console.log(response)
            })
            .catch((err)=>{
                console.log(err)
            })
        })

</script>

</body>
</html>