



<!DOCTYPE html>

<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/css/styles.css') }}">
</head>
<body class="gradient-color">
    <div class="container vh-100">
        <div class="row justify-content-center h-100">
            <div class="card w-50 my-auto shadow border-0">
                <!-- card header -->
                <div class="card-header text-center bg-dark text-white">
                    <h2>Welcome to Libshare</h2>
                </div>
                <!-- card body -->
                <div class="card-body">
                    <form action="/validateAdmin" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" class="btn btn-dark w-100" value="Login" name="login">
                        </div>
                    </form>
                    <div class="card-footer text-right">
                        <small>&copy; UPortal Developer</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>