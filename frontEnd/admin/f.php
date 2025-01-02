<?php
require_once('../database/db.php');


document.addEventListener("DOMContentLoaded",()=>{
        let afficherSection = document.getElementById("afficher");
        let buttonsAffichage = document.getElementById("buttonsAffichage");
        fetch('../commands/afficher.php')
        .then(response => response.json())
        .then(data=>{
        afficherSection.innerHTML = '';
            if(data.getData.length > 0){
                data.getData.forEach(element => {
                afficherSection.innerHTML += <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img src="../img/imgPages/${element.imgSrc}" alt="SUV" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-bold">${element.name}</h3>
                            <p class="text-gray-600">Starting at $${element.prix}/day</p>
                            <h6 class="text-lg text-blue-600">${element.modele}</h6>
                            <a href="reservation.html" class="mt-4 block text-center py-2 px-4 bg-blue-600 text-white rounded hover:bg-blue-700">Reserve Now</a>
                        </div>
                    </div>;
                });
            }

            for(let i = 1; i <= data.totalPages; i++){
                buttonsAffichage.innerHTML += <li>
                    <a href="explore.php?page=${i}" class="px-4 py-2 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-blue-600 hover:text-white transition duration-300">${i}</a>
                </li>;
            }

        })

    })