<!--
Référence pour l'objet XMLHttpRequest
https://developer.mozilla.org/fr/docs/Web/API/XMLHttpRequest
https://msdn.microsoft.com/en-us/ie/ms535874(v=vs.94)
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ajax Post JSON</title>
        <style>
            .conteneur { width: 1000px; margin: 0 auto; padding: 20px; border:1px solid #333;}
            select { width:100%; height: 30px; border: 1px solid #333; }
            table { width: 100%; border-collapse: collapse; text-align: center; }
            td,th { padding:10 px; }
        </style>
    </head>
    <body>
        <div class="conteneur">
            <hr>
            <select id="choix">
                <option></option>
                <option value="7782">Laura</option>
                <option value="7566">Stéphanie</option>
            </select>
            <hr>
            <div id="resultat"></div>
        </div>
        <script>
            // mise en place de l'evennement
            document.getElementById('choix').addEventListener('change', function() {

                // url cible
                var url = 'ajax.php';

                // instanciation de l'objet ajax
                if(window.XMLHttpRequest) {
                    var xhttp = new XMLHttpRequest(); // pour tous les navigateurs
                } else {
                    var xhttp = new ActiveXObject("Microsoft.XMLHTTP"); // pour IE <9
                }
                // var idEmploye = document.getElementById('choix').value; OU var idEmploye = this.value;
                var idEmploye = this.value;
                console.log(idEmploye);

                var param = 'choix=' + idEmploye;
                console.log(param);


                
                // on prepare la requete
                xhttp.open('POST', url, true);
                xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                // on met en place l'evenement changement de statut
                xhttp.onreadystatechange = function () {
                    if(xhttp.status == 200 && xhttp.readyState == 4) {
                        console.log(xhttp.responseText);
                        

                        var reponse = JSON.parse(xhttp.responseText);
                        console.log(reponse);
                        document.getElementById('resultat').innerHTML = reponse.tableau;
                    }
                }
                xhttp.send(param);
            });
        </script>
    </body>
</html>