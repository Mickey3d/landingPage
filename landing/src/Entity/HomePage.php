<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HomePageRepository")
 */
class HomePage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $siteName;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $menu;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $header;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $services;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $portofolio;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $footer;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $copyrightYear;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $copyrightName;

    public function getId()
    {
        return $this->id;
    }

    public function getSiteName(): ?string
    {
        return $this->siteName;
    }

    public function setSiteName(?string $siteName): self
    {
        $this->siteName = $siteName;

        return $this;
    }

    public function getMenu(): ?bool
    {
        return $this->menu;
    }

    public function setMenu(?bool $menu): self
    {
        $this->menu = $menu;

        return $this;
    }

    public function getHeader(): ?bool
    {
        return $this->header;
    }

    public function setHeader(?bool $header): self
    {
        $this->header = $header;

        return $this;
    }

    public function getServices(): ?bool
    {
        return $this->services;
    }

    public function setServices(?bool $services): self
    {
        $this->services = $services;

        return $this;
    }

    public function getPortofolio(): ?bool
    {
        return $this->portofolio;
    }

    public function setPortofolio(?bool $portofolio): self
    {
        $this->portofolio = $portofolio;

        return $this;
    }

    public function getFooter(): ?bool
    {
        return $this->footer;
    }

    public function setFooter(?bool $footer): self
    {
        $this->footer = $footer;

        return $this;
    }

    public function getCopyrightYear(): ?\DateTimeInterface
    {
        return $this->copyrightYear;
    }

    public function setCopyrightYear(?\DateTimeInterface $copyrightYear): self
    {
        $this->copyrightYear = $copyrightYear;

        return $this;
    }

    public function getCopyrightName(): ?string
    {
        return $this->copyrightName;
    }

    public function setCopyrightName(?string $copyrightName): self
    {
        $this->copyrightName = $copyrightName;

        return $this;
    }
}
