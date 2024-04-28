<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Loggable\Entity\MappedSuperclass\AbstractLogEntry;

#[ORM\Entity]
#[ORM\Table(name: 'qr_log_entry', options: ['row_format' => 'DYNAMIC'])]
#[ORM\Index(name: 'log_class_lookup_idx', columns: ['object_class'])]
#[ORM\Index(name: 'log_date_lookup_idx', columns: ['logged_at'])]
#[ORM\Index(name: 'log_user_lookup_idx', columns: ['username'])]
#[ORM\Index(name: 'log_version_lookup_idx', columns: ['object_id', 'object_class', 'version'])]
class LogEntry extends AbstractLogEntry
{
    /*
     * All required columns are mapped through inherited superclass
     */
}
