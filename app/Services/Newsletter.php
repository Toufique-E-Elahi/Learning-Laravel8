<?php

namespace App\Services;

class Newsletter
{
    public function subscribe(string $email, $list=null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');


        return $this->client()->lists->addListMember($list,[
            "email_address" => $email,
            "status" => "subscribed",
            ]);
    }

    protected function client()
    {
        return (new \MailchimpMarketing\ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us5'
        ]);
    }
}
