<?php

namespace App\Entity;

use App\Repository\QrRequestRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: QrRequestRepository::class)]
#[ORM\Table(name: 'qr_qr_request')]
class QrRequest
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function __construct(
        #[ORM\ManyToOne]
        #[ORM\JoinColumn(nullable: false)]
        private ?Qr $qr
    ) {
    }

    public function getQr(): ?Qr
    {
        return $this->qr;
    }
}
