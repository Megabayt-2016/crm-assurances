<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Document</title>
      <style>
         table {
         width: 100%;
         border-collapse: collapse;
         border: 1;
         margin: auto;
         }
         td {
         border: 1px solid black;
         text-align: center;
         }
         ul li {
         list-style: none;
         margin-left: auto;
         }
         b {
         color:#000;
         }
         #img {
         margin-left: 65%;
         margin-top: -86px;
         }
         footer{
         margin-bottom:0%
         }
      </style>
   </head>
   <body>
      <div class="container">
         <nav>
            <ul>
               <li>
                  <b>Votre contrat d'{{$contrat->AssurancePersonne->type}}</b>
               </li>
               <li>
                  Contrat N° : <b>{{$contrat->N_Contrat}}</b>
               </li>
               <li>
                  Date d'effet : <b>{{$contrat->debutEffet}}</b> 
               </li>
               <li>
                  Date d'échéance principale : <b>{{$contrat->dateEcheance}}</b> 
               </li>
            </ul>
            <ul>
               <li>
                  <b>Contrat réalisé par votre conseiller</b>
               </li>
               <li>
                  <b>CARREZ CONSEIL ASSURANCES</b>
               </li>
               <li>
                  Numéro ORIAS : <b>17005138 www.orias.fr</b>
               </li>
               <li>
                  N° TELEPHONE : <b>05 19 79 97 69</b>
               </li>
               <li>
                  MAIL : <b>contact@carrezconseil.fr</b>
               </li>
               <li>
                  COURRIER : <b>CARREZ CONSEIL ASSURANCES,<br>
                     3 rue du pré d aubiat,<br>
                     19200 USSEL</b>
               </li>

               
            </ul>

            <ul id="img">
                <li>
                   NOM ET PRENOM : <b>{{$contrat->client->nom}} {{$contrat->client->prenom}}</b>
                </li>
                <li>
                   N° TELEPHONE :  <b> {{$contrat->client->tele}}</b> 
                </li>
                <li>
                   Adresse :<b>{{$contrat->client->adresse}}, {{$contrat->client->codePostal}}</b> 
                </li>
             </ul>
         </nav>
         <br><br>
         <div>
            <p>
               
               {{$contrat->client->civilite}},<br><
               Nous vous remercions d'avoir choisi {{$contrat->compagnie}} comme compagnie d'assurance. <br><br>
               Nous vous remercions de nous renvoyer un exemplaire des présentes Dispositions Particulières ainsi que le mandat de
               prélèvement SEPA signé dans vos meilleurs délais, à l'adresse ci-dessus afin de ne pas risquer l'interruption de vos garanties
               d'assurance.<br><br>

               Vous disposez d’un délai de 30 jours pour nous faire parvenir les pièces justificatives listées à la fin de votre contrat, dès leur
               réception et leur validation, nous vous adresserons une carte verte définitive. <br><br>
               Nous vous rappelons que si l'une des informations déclarées lors de la souscription de votre contrat Auto évolue dans le temps,
               vous devez nous en informer afin de modifier votre contrat en conséquence.<br><br>
               Nous vous remercions de votre confiance et vous prions d'agréer, Madame, l'expression de notre considération distinguée.
               Votre chargé de clientèle.<br> <br>
      </div>
      </div> <br><br><br><br> <br><br><br><br><br> <br><br><br>
      </div>
      <center>
         <footer>
            <p>CARREZ CONSEIL ASSURANCES &copy; 2022 | All Rights Reserved</p>
         </footer>
      </center>
   </body>
</html>