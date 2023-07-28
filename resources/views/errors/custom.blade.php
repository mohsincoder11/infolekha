<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 - Page Not Found</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background-color: #f7f7f7;
  color: #333;
}

.error-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.error-content {
  text-align: center;
  padding: 30px;
}

h1 {
  font-size: 120px;
  margin: 0;
  padding: 0;
  color: #073D5F;
}

h2 {
  font-size: 36px;
  margin: 10px 0;
  padding: 0;
  color: #333;
}

p {
  font-size: 18px;
  line-height: 1.6;
  color: #666;
}

a {
  display: inline-block;
  margin-top: 20px;
  padding: 10px 20px;
  background-color: #073D5F;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
  font-weight: bold;
  transition: background-color 0.3s ease;
}

a:hover {
  background-color: #0c5b8d;
}

.error-image img {
  max-width: 100%;
  height: auto;
}

  </style>
</head>
<body>
  <div class="error-container">
    <div class="error-content">
      <h2>Unknown Error</h2>
      <p>Oops! Something went wrong. Please contact to system administrator.</p>
      <a href="{{route('index')}}">Go to Home</a>
    </div>
   
  </div>
</body>
</html>
