<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(min=3)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(min=3)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $color;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     */
    private $weight;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $price_ht;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $price_ttc;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank
     */
    private $stock;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function __construct()
    {
        $this->created_at = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getPriceHt(): ?int
    {
        return $this->price_ht;
    }

    public function setPriceHt(int $price_ht): self
    {
        $this->price_ht = $price_ht;

        return $this;
    }

    public function getPriceTtc(): ?int
    {
        return $this->price_ttc;
    }

    public function setPriceTtc(int $price_ttc): self
    {
        $this->price_ttc = $price_ttc;

        return $this;
    }

    public function getStock(): ?bool
    {
        return $this->stock;
    }

    public function setStock(bool $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
