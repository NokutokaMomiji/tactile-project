<?php

namespace App\Mail;
use MailchimpMarketing\ApiClient;

class Mailchimp {

    public function create_cliente() {
        require_once(__DIR__ . '/../../vendor/autoload.php'); 

        $mailchimp = new ApiClient();
        $mailchimp->setConfig([
            'apiKey' => "7960058124b930bfa59c3e425854424a-us10",
            'server' => "us10",  
        ]);

        return $mailchimp;
    }

    public function add_or_update_list_member($listId, $email, $data)
    {
        error_log("Intentando registrar en Mailchimp: Email={$email}, Lista={$listId}, Data=" . json_encode($data));
        
        $response = $this->makeApiRequest($listId, $email, $data);
        
        error_log("Respuesta de Mailchimp: " . print_r($response, true));
        
        if (!isset($response->id)) { 
            return ['success' => false, 'error' => $response->detail ?? 'Error desconocido'];
        }
        
        return ['success' => true];
    }
    
    

    private function makeApiRequest($listId, $email, $data)
{
    try {
        ini_set('memory_limit', '1024M');

        $mailchimp = $this->create_cliente();

        error_log("➡️ Enviando datos a Mailchimp: " . json_encode($data));

        $response = $mailchimp->lists->addListMember($listId, [
            'email_address' => $data['email_address'],
            'status' => 'subscribed',
            'merge_fields' => $data['merge_fields'] ?? [],
        ]);

        error_log("✅ Respuesta de Mailchimp (tipo: " . gettype($response) . "): " . substr(json_encode($response), 0, 500));

        return $response;
    } catch (\Exception $e) {
        error_log("❌ Error en la API de Mailchimp: " . $e->getMessage());
        return ['success' => false, 'error' => $e->getMessage()];
    }
}


}

?>
