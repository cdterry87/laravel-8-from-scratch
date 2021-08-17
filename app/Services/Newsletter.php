<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
  public function subscribe(String $email, String $list = null)
  {
    // ??= Null Coalesce Assignment Operator - assign the value on the right if value on left is null
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
