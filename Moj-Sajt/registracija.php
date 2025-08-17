<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registracija</title>
</head>

<body>
  <h3>Registracija</h3>
  <form action="modeli/registracijaUser.php" method="POST">
    <input type="text" name="ime" placeholder="Unesi ime"><br>
    <input type="email" name="email" placeholder="Unesi email"><br>
    <input type="text" name="lozinka" placeholder="Unesi lozinku"><br>
    <input type="text" name="ponovljenaLozinka" placeholder="Ponovno unesi lozinku"><br>
    <button>Registriraj se</button>
  </form>
</body>

</html>