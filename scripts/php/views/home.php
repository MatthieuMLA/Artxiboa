<!-- 
    Example HTML file to showcase a simple login form which uses
        - a php controller script (logic-related aspects) that calls a php model script (data-related aspects)
        - a php view script (UI-related aspects)

* @author: w.delamare
* @date: Dec. 2023
-->


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/home.css">
        <title>Accueil</title>
    </head>
    <body>
        
        <!-- PHP only used to display stuff -->
        <?php include_header_home(); ?>
        
        <?php include_menubar(); ?>

        <main>
            
            <div class="flex-container">

                <div class="box">Mes Document Récents
                    <div class="div2">
                        <div class="h1">
                            <a href="https://calculettes.energie-info.fr/fichier/FactureElectricite.pdf"><i class="fa-solid fa-file"></i></a>Facture.V1      Safran<br>
                            <a href="https://www.easycompta.eu/wp-content/uploads/2018/09/exemple-Devis.pdf"><i class="fa-solid fa-file"></i></a>Devis.V2      Adour BTP<br>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <table id="customers">
                        <tr>
                            <th>Dernier Document Visualiser</th>
                            <th>Noms</th>
                            <th>Version</th>
                        </tr>
                        <tr>
                            <td>Facture </td>
                            <td>Safran</td>
                            <td>V1</td>
                        </tr>
                        <tr>
                            <td>Devis</td>
                            <td>Adour BTP</td>
                            <td>V3</td>
                        </tr>
                    </table>
                </div>


        </main>

        <?php include_footer(); ?>

    </body>
</html>