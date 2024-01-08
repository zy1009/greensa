<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Greensa | Training Center</title>

    <style>
        body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
          background-color: #ffd6d6;
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

@include('partials/navbar')

<div>
    <h1>Training Center</h1>
    <form action="/glogout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>

</body>
</html>