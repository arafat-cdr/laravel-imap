<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Webklex\IMAP\Client;

class WebklexLaravelImapExampleController extends Controller
{
    public function index()
    {
        $oClient = new Client();
        #Connect to the IMAP Server the setting is in the .env folder
        $oClient->connect();

        #$sendMail = $oClient->getFolders();

        $sendMail = $oClient->getFolder("[Gmail]/Sent Mail");

        #$sendMail = $oClient->getFolder("INBOX");

        #$sendMail = $oClient->getFolder("[Gmail]/Important");

        #$sendMail = $oClient->getFolder("[Gmail]/Spam");

        #$sendMail = $oClient->getFolder("[Gmail]/Starred");

        #$sendMail = $oClient->getFolder("[Gmail]/Starred");

        #$sendMail = $oClient->getFolder("[Gmail]/Trash");

        #$sendMail = $oClient->getFolder("[Gmail]/Drafts");

        $aMessage = $sendMail->getMessages();

        foreach($aMessage as $oMessage){

            echo "<table border='0px; position:center;'>";
            echo "<pre>";
            print_r($oMessage->getSender()[0]->mail);
            echo "</pre>";

            echo "<tr> <td> MailDate: ".$oMessage->getHeaderInfo()->MailDate."</td> </tr>";
            echo "<tr> <td> Mail To: ".$oMessage->getHeaderInfo()->toaddress."</td> </tr>";
            echo "<tr> <td> sender address: ".$oMessage->getHeaderInfo()->senderaddress."</td> </tr>";
            echo "<tr> <td> Form Mail: ".$oMessage->getSender()[0]->mail."</td> </tr>";
            echo "<tr> <td> Subject: ".$oMessage->subject."</td> </tr>";
            echo "<tr> <td>".'Attachments: '.$oMessage->getAttachments()->count()."</td> </tr>";
            echo "<tr> <td> Body: ".$oMessage->getHTMLBody(true)."</td> </tr>";
            echo "</table>";
            echo "<hr/>";
        }
    }
}