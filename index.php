<?php include "config.php";


$sql = "SELECT * FROM `GROUPE` ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$resultgr = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>WordCup</title>
</head>

<body>
    <section class="firstSection">
        <nav class="navbar navbar-light bg-transparent">

            <div class="container col-md-7">
                <a class="navbar-brand" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com/ License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M417.3 360.1l-71.6-4.8c-5.2-.3-10.3 1.1-14.5 4.2s-7.2 7.4-8.4 12.5l-17.6 69.6C289.5 445.8 273 448 256 448s-33.5-2.2-49.2-6.4L189.2 372c-1.3-5-4.3-9.4-8.4-12.5s-9.3-4.5-14.5-4.2l-71.6 4.8c-17.6-27.2-28.5-59.2-30.4-93.6L125 228.3c4.4-2.8 7.6-7 9.2-11.9s1.4-10.2-.5-15l-26.7-66.6C128 109.2 155.3 89 186.7 76.9l55.2 46c4 3.3 9 5.1 14.1 5.1s10.2-1.8 14.1-5.1l55.2-46c31.3 12.1 58.7 32.3 79.6 57.9l-26.7 66.6c-1.9 4.8-2.1 10.1-.5 15s4.9 9.1 9.2 11.9l60.7 38.2c-1.9 34.4-12.8 66.4-30.4 93.6zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm14.1-325.7c-8.4-6.1-19.8-6.1-28.2 0L194 221c-8.4 6.1-11.9 16.9-8.7 26.8l18.3 56.3c3.2 9.9 12.4 16.6 22.8 16.6h59.2c10.4 0 19.6-6.7 22.8-16.6l18.3-56.3c3.2-9.9-.3-20.7-8.7-26.8l-47.9-34.8z" />
                    </svg>
                </a>

                <a href="#" class="text-light text-decoration-none">Equipe</a>
                <a href="#" class="text-light text-decoration-none">Groupe</a>
            </div>
        </nav>

        <div class="backfirstsection">
            <p class="firstparagraphe">Bienvenue sur notre site dédié à la Coupe du Monde de la FIFA ! Nous sommes ravis de vous accueillir au cœur de l'action, où le monde entier se réunit pour célébrer l'excellence du football. Plongez dans l'univers palpitant de la plus prestigieuse compétition de football, où les nations s'affrontent pour décrocher la gloire suprême.</p>
        </div>
    </section>
    <section class=" pt-5">
        <div class="row d-flex gap-5 justify-content-center">
            <?php if (mysqli_num_rows($resultgr) > 0) {
                while ($row = mysqli_fetch_assoc($resultgr)) {
                    $groupid = $row["groupid"];
                    $stade = $row["stade"];


            ?>

                    <div class="card mb-3 row row-cols-4 px-0" style="max-width: 18rem; height: fit;">
                        <div class="card-header bg-black w-100 text-center" style="color: white;"><?php echo $row["name"]; ?></div>
                        <div class="card-body w-auto d-flex flex-column gap-3">
                            <p class="card-text"><span>STADE : </span><?php echo $row["stade"]; ?></p>
                            <?php
                            $sql = "SELECT * FROM `EQUIPE` WHERE id_gr = $groupid ";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $resulteq = $stmt->get_result();
                            if (mysqli_num_rows($resulteq) > 0) {
                                while ($row2 = mysqli_fetch_assoc($resulteq)) {
                                    $nom = $row2["nom"];
                                    $joueurcl = $row2["joueurcl"];
                                    $img = $row2["img"];
                                    $id_gr = $row2["id_gr"];


                            ?>
                                    <div class="d-flex gap-3">
                                        <img class="card-img w-25" src="<?php echo $img; ?>" alt="">
                                        <p class="card-text"><?php echo $nom; ?></p>
                                    </div>
                                <?php } ?>
                        </div>
                    </div>
                    

        <?php }
                        }
                    } ?>
        </div>

</body>

</html>
