<?php

namespace App\Modules\CMS\Client\App;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

class ClientEntity extends Entity
{
  protected $attributes = [
    'name' => null,
    'email' => null,
    'phone' => null,
    'segment_id' => null,
    'created_at' => null,
    'deleted_at' => null,
    'updated_at' => null
  ];

  public function setCreatedAt(string $dateString)
  {
    $this->attributes['created_at'] = new Time($dateString, 'UTC');

    return $this;
  }

  public function getCreatedAt(string $format = 'Y-m-d H:i:s')
  {
    $this->attributes['created_at'] = $this->mutateDate($this->attributes['created_at']);

    $timezone = $this->timezone ?? app_timezone();

    $this->attributes['created_at']->setTimezone($timezone);

    return $this->attributes['created_at']->format($format);
  }
}
