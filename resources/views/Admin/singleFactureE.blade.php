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
         img {
         position: relative;
         margin-left: 83%;
         margin-top: -86px;
         width: 105px;
         }
         footer{
         margin-bottom:0%
         }
      </style>
   </head>
   <body>
      <div class="container">
         <nav>
            <ul style>
               <li>
                  DATE : <b>{{$facture->created_at}}</b>
               </li>
               <li>
                  NOM ET PRENOM : <b>{{$facture->client->nom}} {{$facture->client->prenom}}</b>
               </li>
               <li>
                  N° TELEPHONE :  <b> {{$facture->client->tele}}</b> 
               </li>
               <li>
                  Adresse :<b>{{$facture->client->adresse}}, {{$facture->client->codePostal}}</b> 
               
            </ul>
         </nav>
         <hr>
         <center>
            <p>
               FACTURE N° : <b> {{$facture->N_Facture}}</b>  <br>
               DATE EMISSION: <b> {{$facture->Date_emission}}</b> 
            </p>
         </center>
         REGLEMENT : <b> {{$facture->Reglement}}</b>  <br> <br><br>
         <table>
            <tr>
               <th> DESIGNATION</th>
               <th> MONTANT HT </th>
            </tr>
            <tr>
               <td>
                  {{ $facture->Designation }}
               </td>
               <td>
                  {{ $facture->Montant }} DH 
               </td>
            </tr>
         </table>
         <br>
         <table style="margin-bottom:5%;">
            @php
             $montant = $facture->Montant;
             $tva = $facture->taux_tva;
             $montant_tva = ($montant + $montant * $tva) /100 ;
             $montant_ttc = $montant + $montant_tva;   
            @endphp
            <tr>
               <th><b> TVA ({{$facture->taux_tva}} %) </b></th>
            
               <th>  <b> {{$montant_tva}} DH </b></th>
            </tr>
            <tr>
               <th> <b>  MONTANT TTC</b></th>
               <th><b> {{ $montant_ttc }} DH </b></th>
            </tr>
         </table>
         <br><br><br>
         <div>
            <p>
               En cas de retard de paiement, une pénalité de 3 fois le taux d'intérêt légal sera appliquée, à laquelle s'ajoutera une indemnité forfaitaire
               pour frais de recouvrement de 40€.
               <br>
               Pas d’escompte en cas de paiement anticipé.
               <br><br>
               Les opérations d'assurances sont exonérées de TVA, Article 261 C2° du CG.
               <br> <br>
            <center> 
               CARREZ CONSEIL ASSURANCES – 3 rue du pré d'Aubiat 19200 USSEL –France <br>
               Tél : 05 19 79 97 67 email : contact@carrezconseil.fr <br>
               RCS Brive 830 933 040 – Numéro ORIAS 17005138 – WWW orias .fr
               <br> <br>
               Activité des agents et courtiers d’assurances(6622Z). <br> <br>
               Garantie Financière et Responsabilité Civile Professionnelle conformes aux articles L530.1 et L530.2.
            </center>
            </p>
         </div>
      </div>
      </div> <br><br><br><br> <br><br><br><br><br> <br><br><br>
      <hr>
      </div>
      <center>
         <footer>
            <p>CARREZ CONSEIL ASSURANCES &copy; 2022 | All Rights Reserved</p>
         </footer>
      </center>
   </body>
</html>