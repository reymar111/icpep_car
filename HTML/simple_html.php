<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Simple HTML</title>
    <style>
      body {
        background-color: rgb(192, 218, 235);
      }
      h1 {
        color: red;
        text-align: left;
      }
      p {
        color: rgb(12, 29, 24);
      }
    </style>
  </head>
  <body>
    <h1>Hello, ICpEP CAR</h1>
    <p>Welcome.</p>

    <!-- for javascript-->
    <button id="demo" onclick="myFunction()">Click Me!</button><br />

    <!-- for javascript another example-->
    <!-- <button id="background" onclick="changeBackground()">Change Background Color</button><br /> -->

    <!-- for php -->
    <?php echo "Hello ICpEP CAR. This is my PHP Script"; ?>

    <!-- for php another example -->
    <?php
    //  for($i = 0; $i <= 10; $i++) {
          ?>

        <?php // echo "Hello ICpEP CAR. This is my PHP Script"; ?><br>

    <?php //} ?>
  </body>
  <script>
    function myFunction() {
      alert("I am Clicked");
    }

    // function changeBackground() {
    //     document.body.style.backgroundColor = "gray";
    // }
  </script>
</html>
