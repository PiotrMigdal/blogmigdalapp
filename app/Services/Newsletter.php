<?php

namespace App\Services;

use \MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email, string $list = null)
    {
        // ??= is Null Coalesce Assignment Operator. If the $list isn't set, give this value. Otherwise use the $list value from request
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client()->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
    protected function client()
    {
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us5'
        ]);

    }
}
