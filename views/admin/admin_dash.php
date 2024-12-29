<?php
    require_once '../../classes/controllers/bookController.php';
    $book = new bookController();
    $rows = $book->showBooks();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrateur - Système de Bibliothèque</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-black text-white">
            <div class="p-4">
                <h1 class="text-2xl text-red-500 text-center font-bold pb-5 border-b-2">Admin</h1>
            </div>
            <nav class="mt-4">
                <a href="#" data-section="dashboard" class="nav-link block py-2 px-4 hover:bg-blue-700 active">
                    <i class="fas fa-home mr-2"></i>Tableau de bord
                </a>
                <a href="#" data-section="users" class="nav-link block py-2 px-4 hover:bg-blue-700">
                    <i class="fas fa-users mr-2"></i>Gestion Utilisateurs
                </a>
                <a href="#" data-section="catalog" class="nav-link block py-2 px-4 hover:bg-blue-700">
                    <i class="fas fa-book mr-2"></i>Catalogue
                </a>
                <a href="#" data-section="stats" class="nav-link block py-2 px-4 hover:bg-blue-700">
                    <i class="fas fa-chart-bar mr-2"></i>Statistiques
                </a>
                <a href="#" data-section="notifications" class="nav-link block py-2 px-4 hover:bg-blue-700">
                    <i class="fas fa-bell mr-2"></i>Notifications
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Top Bar -->
            <div class="bg-white shadow-md p-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold" id="section-title">Tableau de Bord</h2>
                <div class="flex items-center">
                    <span class="mr-4">Admin</span>
                    <a href="../aut/login.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                    </a>
                </div>
            </div>

            <!-- Content Sections -->
            <div class="p-6">
                <!-- Dashboard Section -->
                <div id="dashboard-section" class="section active">
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-gray-500 text-sm uppercase">Total Livres</h3>
                            <p class="text-3xl font-bold"><?=count($rows)?></p>
                        </div>
                        <!-- <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-gray-500 text-sm uppercase">Emprunts Actifs</h3>
                            <p class="text-3xl font-bold">183</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-gray-500 text-sm uppercase">Retards</h3>
                            <p class="text-3xl font-bold text-red-500">12</p>
                        </div> -->
                    </div>
                    <!-- Most Borrowed Books -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4">Livres les plus empruntés</h3>
                        <!-- Add content here -->
                    </div>
                </div>

                <!-- Users Section -->
                <div id="users-section" class="section hidden">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4">Gestion des Utilisateurs</h3>
                        <?php include 'allUsers.php'?>
                        
                    </div>
                </div>

                <!-- Catalog Section -->
                <div id="catalog-section" class="section hidden">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4">Catalogue de Livres</h3>
                        <div class="flex justify-between items-center">
                            <a href="../books/createBook.php" class="bg-green-500 text-white px-4 py-2 rounded mb-4">
                                <i class="fas fa-plus mr-2"></i>Ajouter un livre
                            </a>
                            <a href="../admin/addCat.php" class="bg-green-500 text-white px-4 py-2 rounded mb-4">
                                <i class="fas fa-plus mr-2"></i>Ajouter une Categorie
                            </a>
                        </div>
                        <?php include 'showBooksAdmin.php'?>
                    </div>
                </div>

                <!-- Stats Section -->
                <div id="stats-section" class="section hidden">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4">Statistiques et Rapports</h3>
                        <!-- Add stats content here -->
                    </div>
                </div>

                <!-- Notifications Section -->
                <div id="notifications-section" class="section hidden">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4">Notifications</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <i class="fas fa-exclamation-circle text-red-500 mt-1"></i>
                                <div class="ml-4">
                                    <h4 class="font-medium">Retard d'emprunt</h4>
                                    <p class="text-sm text-gray-500">Jean Dupont - Le Petit Prince</p>
                                    <button class="text-sm text-blue-500 mt-1">Envoyer un rappel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
            // Get all navigation links
            const navLinks = document.querySelectorAll('.nav-link');
            
            // Get the section title element
            const sectionTitle = document.getElementById('section-title');
            
            // Function to show section
            function showSection(sectionId) {
                // Hide all sections
                document.querySelectorAll('.section').forEach(section => {
                    section.classList.add('hidden');
                });
                
                // Show the selected section
                const selectedSection = document.getElementById(sectionId + '-section');
                if (selectedSection) {
                    selectedSection.classList.remove('hidden');
                }
                
                // Update active state in navigation
                navLinks.forEach(link => {
                    link.classList.remove('bg-blue-700');
                    if (link.dataset.section === sectionId) {
                        link.classList.add('bg-blue-700');
                    }
                });
                
                // Update section title
                const activeLink = document.querySelector(`[data-section="${sectionId}"]`);
                if (activeLink) {
                    sectionTitle.textContent = activeLink.textContent.trim();
                }
            }
            
            // Add click event listeners to navigation links
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const sectionId = this.dataset.section;
                    showSection(sectionId);
                });
            });
            
            // MOdal for editing users role
            function openModal(userName, currentRole) {
            // Display modal
            const modal = document.getElementById('roleModal');
            modal.classList.remove('hidden');

            // Set user name and current role
            document.getElementById('modalUserName').innerText = userName;
            document.getElementById('userRole').value = currentRole.toLowerCase();
        }

        function closeModal() {
            // Hide modal
            const modal = document.getElementById('roleModal');
            modal.classList.add('hidden');
        }
</script>
    <?php if(isset($_GET['page'])){
        switch($_GET['page']){
            case 'catalogue':
                echo "<script>document.querySelector('a[data-section=\"catalog\"]').click();</script>";
                break;
            case 'users':
                echo "<script>document.querySelector('a[data-section=\"users\"]').click();</script>";
                break;
        }
    }
    ?>
</body>
</html>


