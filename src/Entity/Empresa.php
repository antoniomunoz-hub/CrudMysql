<?php

namespace App\Entity;

use App\Repository\EmpresaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpresaRepository::class)
 */
class Empresa
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    /** * @ORM\Column
     * (type="string", length=255) * 
     * */ 
    private $name;
    public function getName(): string
    {
        return $this->name;
    }

    /** * @ORM\Column
     * (type="string", length=255) * 
     * */ 
    private $email;
    public function getEmail(): string
    {
        return $this->email;
    }

    /** * @ORM\Column
     * (type="string", length=255) * 
     * */ 
    private $telefono;
    public function getTelefono(): string
    {
        return $this->telefono;
    }

    /** * @ORM\Column
     * (type="string", length=255) * 
     * */ 
    private $sector;
    public function getSector(): string
    {
        return $this->sector;
    }
}
