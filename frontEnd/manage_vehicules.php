class="min-h-screen bg-black text-white p-8"> <!-- Navigation --> <nav class="bg-black shadow-lg"> <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> <div class="flex justify-between h-16 items-center"> <div class="flex items-center"> <svg class="w-8 h-8 text-silver-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /> </svg> <span class="ml-2 text-xl font-bold text-white">Drive & Loc</span> </div> <div class="hidden md:flex items-center space-x-8"> <a href="index.php" class="text-white hover:text-silver-300 transition-colors">Accueil</a> <a href="vehicules.php" class="text-white hover:text-silver-300 transition-colors">Véhicules</a> <a href="reservations.php" class="text-white hover:text-silver-300 transition-colors">Réservations</a> <a href="contact.php" class="text-white hover:text-silver-300 transition-colors">Contact</a> <button class="bg-transparent border-2 border-white text-white px-4 py-2 rounded-md hover:bg-white hover:text-black transition-all"> Log out </button> </div> </div> </div> </nav> <!-- Vehicle Details Section --> <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12"> <h2 class="text-3xl font-bold text-white mb-8">Détails du Véhicule</h2> <div class="bg-black rounded-lg shadow-md overflow-hidden"> <div class="h-64 bg-silver-300"> <img src="../uploads/<?php echo $vehicule->getImage(); ?>" alt="Car" class="w-full h-full object-cover"> </div> <div class="p-6"> <h3 class="text-2xl font-bold text-white mb-2"><?php echo $vehicule->getModele(); ?></h3> <p class="text-silver-300 mb-4">Marque : <?php echo $vehicule->getMarque(); ?></p> <p class="text-silver-300 mb-4">Catégorie : <?php echo $vehicule->getCategorieId(); ?></p> <p class="text-silver-300 mb-4">Description : <?php echo $vehicule->getDescription(); ?></p> <p class="text-silver