<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.8">
    <title>Blog</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>
<?php
    include "class/db.php";
    include "modules/banner.php";
    include 'modules/header.php';
?>
<?php if(!isset($_GET["article"])):?>
    <main>
        <h2 data-aos="slide-right" data-aos-duration="1000" data-aos-easing="ease-out">PRESENTATION DU BLOG</h2>
        <p class="center"><em>Lorem ipsum</em> dolor sit amet, consectetur adipiscing elit. Maecenas odio enim, pellentesque ut vulputate quis,
            mollis efficitur urna. Curabitur ultrices nulla vel neque feugiat, ut auctor ligula accumsan. Mauris eros lacus,
            laoreet nec est vitae, vehicula scelerisque tortor. Phasellus quis quam sed augue dictum tincidunt ut id est.
            Ut gravida eros ut dapibus aliquam. Sed non blandit mauris. Nam volutpat lectus nec porttitor mollis.
            <em>Lorem ipsum</em> dolor sit amet, consectetur adipiscing elit. Mauris faucibus luctus est et mattis. Aenean at ullamcorper metus.
            Maecenas ac est suscipit odio sodales luctus eu ut velit. Nam convallis blandit sollicitudin. Duis blandit erat at.
        </p>
        <h2 data-aos="slide-right" data-aos-duration="1000" data-aos-easing="ease-out">ARTICLES RECENTS</h2>
        <?php
            $db = new db();
            $articles = $db->getLastsArticles(true);
        ?>
        <ul>
            <?php foreach ($articles as $value){?>
                <li><a href="blog.php?article=<?php echo $value['id'] ?>"><p class="center"><?php echo $value['titre'] ?></p></a></li>
            <?php } unset($value)?>
        </ul>
    </main>
<?php else:?>
    <main id="mainArticle">
        <article>
            <section class="title-group">
                <h1 data-aos="fade-down" data-aos-duration="1000" data-aos-easing="ease-out">
                    <?php
                    $db = new db();
                        echo $db->getTitreArticle($_GET["article"]);
                    ?>
                </h1>
                <h2 data-aos="slide-right" data-aos-duration="1000" data-aos-easing="ease-out">
                    <?php
                        echo $db->getDescriptionArticle($_GET["article"]);
                    ?>
                </h2>
                <div id="auteur">
                    <em>
                        By <a href="#" >Timofei Rostilov</a>
                            <div title="2018-09-03 16:15:00">2 years ago</div>
                    </em>
                </div>
            </section>
            <div class="wrapper" id="article">
                <picture class="intro-pic">
                    <img src="<?php
                        echo $db->getImageArticle($_GET["article"]);
                    ?>" alt="image crypto mining" id="imgMinecraft">
                </picture>
                <div class="articleBody">
                    <?php
                        echo $db->getContenuArticle($_GET["article"]);
                    ?>
                    <p class="noMargin" id="share">Share this article:</p>
                    <a href="https://facebook.com" class="reseauSocial">
                        <svg version="1.1" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve"><path d="M18.768,7.465H14.5V5.56c0-0.896,0.594-1.105,1.012-1.105s2.988,0,2.988,0V0.513L14.171,0.5C10.244,0.5,9.5,3.438,9.5,5.32 v2.145h-3v4h3c0,5.212,0,12,0,12h5c0,0,0-6.85,0-12h3.851L18.768,7.465z"></path></svg>
                    </a>
                    <a href="https://twitter.com" class="reseauSocial">
                        <svg version="1.1" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
<                               <path d="M23.444,4.834c-0.814,0.363-1.5,0.375-2.228,0.016c0.938-0.562,0.981-0.957,1.32-2.019c-0.878,0.521-1.851,0.9-2.886,1.104 C18.823,3.053,17.642,2.5,16.335,2.5c-2.51,0-4.544,2.036-4.544,4.544c0,0.356,0.04,0.703,0.117,1.036 C8.132,7.891,4.783,6.082,2.542,3.332C2.151,4.003,1.927,4.784,1.927,5.617c0,1.577,0.803,2.967,2.021,3.782 C3.203,9.375,2.503,9.171,1.891,8.831C1.89,8.85,1.89,8.868,1.89,8.888c0,2.202,1.566,4.038,3.646,4.456 c-0.666,0.181-1.368,0.209-2.053,0.079c0.579,1.804,2.257,3.118,4.245,3.155C5.783,18.102,3.372,18.737,1,18.459 C3.012,19.748,5.399,20.5,7.966,20.5c8.358,0,12.928-6.924,12.928-12.929c0-0.198-0.003-0.393-0.012-0.588 C21.769,6.343,22.835,5.746,23.444,4.834z"></path></svg>
                    </a>
                    <a href="http://reddit.com" class="reseauSocial">
                        <svg version="1.1" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                                <path d="M24,11.5c0-1.654-1.346-3-3-3c-0.964,0-1.863,0.476-2.422,1.241c-1.639-1.006-3.747-1.64-6.064-1.723 c0.064-1.11,0.4-3.049,1.508-3.686c0.72-0.414,1.733-0.249,3.01,0.478C17.189,6.317,18.452,7.5,20,7.5c1.654,0,3-1.346,3-3 s-1.346-3-3-3c-1.382,0-2.536,0.944-2.883,2.217C15.688,3,14.479,2.915,13.521,3.466c-1.642,0.945-1.951,3.477-2.008,4.551 C9.186,8.096,7.067,8.731,5.422,9.741C4.863,8.976,3.964,8.5,3,8.5c-1.654,0-3,1.346-3,3c0,1.319,0.836,2.443,2.047,2.844 C2.019,14.56,2,14.778,2,15c0,3.86,4.486,7,10,7s10-3.14,10-7c0-0.222-0.019-0.441-0.048-0.658C23.148,13.938,24,12.795,24,11.5z  M2.286,13.366C1.522,13.077,1,12.351,1,11.5c0-1.103,0.897-2,2-2c0.635,0,1.217,0.318,1.59,0.816 C3.488,11.17,2.683,12.211,2.286,13.366z M6,13.5c0-1.103,0.897-2,2-2s2,0.897,2,2c0,1.103-0.897,2-2,2S6,14.603,6,13.5z  M15.787,18.314c-1.063,0.612-2.407,0.949-3.787,0.949c-1.387,0-2.737-0.34-3.803-0.958c-0.239-0.139-0.321-0.444-0.182-0.683 c0.139-0.24,0.444-0.322,0.683-0.182c1.828,1.059,4.758,1.062,6.59,0.008c0.239-0.138,0.545-0.055,0.683,0.184 C16.108,17.871,16.026,18.177,15.787,18.314z M16,15.5c-1.103,0-2-0.897-2-2c0-1.103,0.897-2,2-2s2,0.897,2,2 C18,14.603,17.103,15.5,16,15.5z M21.713,13.365c-0.397-1.155-1.201-2.195-2.303-3.048C19.784,9.818,20.366,9.5,21,9.5 c1.103,0,2,0.897,2,2C23,12.335,22.468,13.073,21.713,13.365z"></path>
                            </svg>
                    </a>
                </div>
            </div>
        </article>
    </main>
    <aside data-aos="slide-left" data-aos-duration="1000" data-aos-easing="ease-out">
        <nav id="navAside">
            <h2 id="titreAside"><a href="">MOST READ</a></h2>
            <ul id="asideArticle">
                <li>
                    <a href="#">17 comments</a>
                    <a href="#">
                        11 Great Free Steam Games
                    </a>
                </li>
                <li>
                    <a href="#">17 comments</a>
                    <a href="#">
                        11 Great Free Steam Games
                    </a>
                </li>
                <li>
                    <a href="#">17 comments</a>
                    <a href="#">
                        11 Great Free Steam Games
                    </a>
                </li>
                <li>
                    <a href="#">17 comments</a>
                    <a href="#">
                        11 Great Free Steam Games
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    <section id="comments">
        <h2 data-aos="slide-right" data-aos-duration="1000" data-aos-easing="ease-out">COMMENTAIRES</h2>
        <div id="tous-les-commentaires">
            <div class="commentaire">
                <a href="#" class="photoProfil">
                    <img alt="user_avatar" src="https://picsum.photos/150/150?1">
                </a>
                <a href="">
                    <span>User_Pseudo</span>
                </a>
                <a href="" class="heureCommentaire">hier à 13:14</a>
                <div class="bloc-contenu">
                    <div>
                        <p class="noMargin">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p class="noMargin">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, consectetur cumque debitis ducimus eum ipsa nemo nesciunt quia quod recusandae saepe sapiente vero, voluptate voluptatibus.</p>
                        <p class="noMargin">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci ducimus eius eum itaque quaerat!</p>
                    </div>
                    <div>
                        <a href="#">Lire la suite...</a>
                    </div>
                </div>
            </div>
            <div class="commentaire">
                <a href="#" class="photoProfil">
                    <img alt="user_avatar" src="https://picsum.photos/150/150?2">
                </a>
                <a href="">
                    <span>User_Pseudo</span>
                </a>
                <a href="" class="heureCommentaire">hier à 13:14</a>
                <div class="bloc-contenu">
                    <div>
                        <p class="noMargin">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p class="noMargin">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, consectetur cumque debitis ducimus eum ipsa nemo nesciunt quia quod recusandae saepe sapiente vero, voluptate voluptatibus.</p>
                        <p class="noMargin">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci ducimus eius eum itaque quaerat!</p>
                    </div>
                    <div>
                        <a href="#">Lire la suite...</a>
                    </div>
                </div>
            </div>
            <div class="commentaire">
                <a href="#" class="photoProfil">
                    <img alt="user_avatar" src="https://picsum.photos/150/150?3">
                </a>
                <a href="">
                    <span>User_Pseudo</span>
                </a>
                <a href="" class="heureCommentaire">hier à 13:14</a>
                <div class="bloc-contenu">
                    <div>
                        <p class="noMargin">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p class="noMargin">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, consectetur cumque debitis ducimus eum ipsa nemo nesciunt quia quod recusandae saepe sapiente vero, voluptate voluptatibus.</p>
                        <p class="noMargin">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci ducimus eius eum itaque quaerat!</p>
                    </div>
                    <div>
                        <a href="#">Lire la suite...</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif?>
<?php include 'modules/footer.php'?>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="js/script.js"></script>
</body>
</html>
