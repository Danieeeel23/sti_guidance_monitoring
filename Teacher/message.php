<?php
if (isset($_SESSION['message'])) :
?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
      .alert-container {
        width: 100%;
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .alert {
        /* margin: 0 190px 0 300px; */
        width: 70%;
        padding: 2rem;
        background-color: #B2C8DF;
        color: black;
        z-index: 2;
        border-radius: 10px;
        font-size: 1.5rem;
        text-align: center;
        margin-top: 1rem;
      }
    </style>
  </head>

  <body>
    <div class="alert-container" id="alert">
      <div class="alert">
        <span onclick="this.parentElement.style.display='none';"></span>
        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
      </div>
    </div>
    <!-- automatically close alert message -->
    <script type="text/javascript">
      $("#alert").show().delay(2000).fadeOut();
    </script>

  </body>

  </html>


<?php
  unset($_SESSION['message']);
endif;
?>