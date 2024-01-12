<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #c8f2ff;
    }

    .login-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    .input-group {
      margin-bottom: 15px;
    }

    label {
      margin-bottom: 5px;
      display: block;
    }

    input[type="email"],
    input[type="password"],
    button {
      padding: 8px;
      border-radius: 3px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    button {
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

  <div class="login-container">

  @if ($errors->any())
      @foreach ($errors->all() as $error)
        {{ $error }}
      @endforeach
  @endif
    <h2>Login</h2>
    <form action="/alogin" method="POST">
      @csrf
      <div class="input-group">
        <label for="email">Email:</label>
        <input type="email" name="username" required autofocus>
      </div>
      <div class="input-group">
        <label for="password">Password:</label>
        <input type="password" name="password" required>
      </div>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
