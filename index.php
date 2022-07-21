<?php
    $title = "page d'accueil";
    require 'header.php';
    require 'login/logout.php';
?>
        
            <section class="top">
                <h2>Bienvenue sur <span>Ma Biblio</span></h2>
                <div class="widget">
                    <input class="input" type="text" placeholder="Search...">
                    <button class="btn"><i class="fas fa-search"></i></button>
                </div>
            </section>
            <section class="contain">
                <div class="book">
                    <button class="btn1 active">Tous les livres publiés</button>
                    <button class="btn2">Toutes les catégories</button>
                </div>
                <div class="all-book">
                    <!-- c'est ici que seront publiés les livres -->
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt, vero quasi nulla perspiciatis, vel in quo voluptas temporibus possimus, harum doloribus voluptates? Atque maiores, ratione labore unde blanditiis laudantium veniam?</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt, vero quasi nulla perspiciatis, vel in quo voluptas temporibus possimus, harum doloribus voluptates? Atque maiores, ratione labore unde blanditiis laudantium veniam?</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt, vero quasi nulla perspiciatis, vel in quo voluptas temporibus possimus, harum doloribus voluptates? Atque maiores, ratione labore unde blanditiis laudantium veniam?</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt, vero quasi nulla perspiciatis, vel in quo voluptas temporibus possimus, harum doloribus voluptates? Atque maiores, ratione labore unde blanditiis laudantium veniam?</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt, vero quasi nulla perspiciatis, vel in quo voluptas temporibus possimus, harum doloribus voluptates? Atque maiores, ratione labore unde blanditiis laudantium veniam?</p>
                </div>
            </section>
            <div class="btn4">
                <button><a href="publier.php">Publier un livre</a></button>
            </div>
            <footer>
                <p>&copy; MK - Ubix 2022</p>
            </footer>
        </div>
    </body>
</html>

