<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0089)https://www.alsacreations.com/xmedia/tuto/email/responsive/email-template-responsive.html -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Template mailing Alsacreations</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
    /* Fonts and Content */
    body, td { font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif; font-size:14px; }
    body { background-color: #2A374E; margin: 0; padding: 0; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; }
    h2{ padding-top:12px; /* ne fonctionnera pas sous Outlook 2007+ */color:#0E7693; font-size:22px; }
    
    @media only screen and (max-width: 480px) { 

        table[class=w275], td[class=w275], img[class=w275] { width:135px !important; }
        table[class=w30], td[class=w30], img[class=w30] { width:10px !important; }  
        table[class=w580], td[class=w580], img[class=w580] { width:280px !important; }
        table[class=w640], td[class=w640], img[class=w640] { width:300px !important; }
        img{ height:auto;}
         /*illisible, on passe donc sur 3 lignes */
        table[class=w180], td[class=w180], img[class=w180] { 
            width:280px !important; 
            display:block;
        }    
        td[class=w20]{ display:none; }    
    } 

    </style>
   
</head>
<body style="margin:0px; padding:0px; -webkit-text-size-adjust:none;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:rgb(42, 55, 78)">
        <tbody>
            <tr>
                <td align="center" bgcolor="#2A374E">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>                            
                            <tr>
                                <td class="w640" width="640" height="10"></td>
                            </tr>

                            
                            <tr>
                                <td class="w640" width="640" height="10"></td>
                            </tr>


                            <!-- entete -->
                            <tr class="pagetoplogo">
                                <td class="w640" width="640">
                                    <table class="w640" width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#F2F0F0">
                                        <tbody>
                                            <tr>
                                                <td class="w30" width="30"></td>
                                                <td class="w580" width="580" valign="middle" align="left">
                                                    <div class="pagetoplogo-content">
                                                        <img class="w580" style="text-decoration: none; display: block; color:#476688; font-size:30px;" src="{!! asset('img/logoprincipal.png') !!}" alt="Mon Logo" width="300" height="108">
                                                    </div>
                                                </td> 
                                                <td class="w30" width="30"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <!-- separateur horizontal -->
                            <tr>
                                <td class="w640" width="640" height="1" bgcolor="#d7d6d6"></td>
                            </tr>

                             <!-- contenu -->
                            <tr class="content">
                                <td class="w640" width="640" bgcolor="#ffffff">
                                    <table class="w640" width="640" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                            <tr>
                                                <td class="w30" width="30"></td>
                                                <td class="w580" width="580">
                                                    <!-- une zone de contenu -->
                                                    <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>                                                            
                                                            <tr>
                                                                <td class="w580" width="580">
                                                                    <h2 style="color:#0E7693; font-size:22px; padding-top:12px;">
                                                                        Cher Internaute </h2>

                                                                    <div align="left" class="article-content">
                                                                 
                                                                        
                                                                        
                                                                        <p>
                                                                          Nous vous enverrons une sélection d'annonces pour vous aider à vendre , à louer ou chercher plus rapidement vos biens. 
                                                                        </p>
                                                                    
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w580" width="580" height="1" bgcolor="#c7c5c5"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- fin zone -->                                                   

                                                    <!-- une autre zone de contenu -->
                                                    <table class="w580" width="580" cellspacing="0" cellpadding="0" border="0">
                                                        <tbody>
                                                         @foreach($annonce as $annonces)
                                                            <tr>

                                                                <td colspan="3">
                                                                 
                                                                   <h2 style="color:#0E7693; font-size:22px; padding-top:12px;">
                                                                        Nouvelle annonce </h2>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w275" width="275" valign="top">
                                                                    <div align="left" class="article-content">
                                                                      
                                                                        
                                                                        <ul>
                                                                            <h1 style="color:#0E7693; font-size:12px"> Titre de l'annonce</h1> 
                                                                            <li>{!! $annonces->title !!}</li>
                                                                             <h1 style="color:#0E7693; font-size:12px"> Petite description de l'annonce</h1> 
                                                                            <li> {!! $annonces->short_desc !!} </li>
                                                                            <h1 style="color:#0E7693; font-size:12px"> Description de l'annonce</h1> 
                                                                            <li>{!! $annonces->description !!}</li>
                                                                            <li>
                                                                             @if($annonces->images()->count() > 0)
                                        <img src="{!! url('images/'.$annonces->images->first()->id)!!}" style="width: 550px;height: 200px;"" alt="">
                                                @else
                                        <img src="" alt="">
                                        @endif
                                        </li>
                                         <a href="{!! url('/aboutannonce',$annonces->id) !!}" class="btn"><strong>Read More</strong></a>

                                                                            
                                                                        </ul>

                                                                    </div>
                                                                </td>
                                                                <td class="w30" width="30"></td>
                                                                  @endforeach
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" class="w580" height="1" bgcolor="#c7c5c5"></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>

                                                    <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="5">
                                                                   <h2 style="color:#0E7693; font-size:22px; padding-top:12px;">
                                                                       Merci de votre confiance et à très bientôt sur Tunisien En France </h2>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w180" width="180" valign="top">
                                                                    <div align="left" class="article-content">
                                                                       
                                                                    </div>
                                                                </td>

                                                                <td class="w20" width="20"></td>
                                                                <td class="w180" width="180" valign="top">
                                                                    <div align="left" class="article-content">
                                                                       
                                                                    </div>
                                                                </td>

                                                                <td class="w20" width="20"></td>
                                                                <td class="w180" width="180" valign="top">
                                                                    <div align="left" class="article-content">
                                                                        <p><img class="w180" width="180"</p>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="5" class="w580" width="580" height="1" bgcolor="#c7c5c5"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="w30" width="30"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <!--  separateur horizontal de 15px de haut -->
                            <tr>
                                <td class="w640" width="640" height="15" bgcolor="#ffffff"></td>
                            </tr>

                            <!-- pied de page -->
                            <tr class="pagebottom">
                                <td class="w640" width="640">
                                    <table class="w640" width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#c7c7c7">
                                        <tbody>
                                            <tr>
                                                <td colspan="5" height="10"></td>
                                            </tr>
                                            <tr>
                                                <td class="w30" width="30"></td>
                                                <td class="w580" width="580" valign="top">
                                                    <p align="right" class="pagebottom-content-left">
                                                        <a style="color:#255D5C;" href="http://127.0.0.1:8000/"><span style="color:#255D5C;">Vous recevez cet email car vous êtes inscrit au site www.TunisienEnFrance.com</span></a>
                                                    </p>
                                                </td>

                                                <td class="w30" width="30"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" height="10"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="w640" width="640" height="60"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

</body></html>