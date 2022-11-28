<?php

namespace App\Entity;

use App\Repository\CheckoutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CheckoutRepository::class)]
class Checkout
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $shippingAddress = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\OneToMany(mappedBy: 'checkout', targetEntity: CheckoutProduct::class)]
    private Collection $checkoutProducts;

    public function __construct()
    {
        $this->checkoutProducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShippingAddress(): ?string
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress(?string $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, CheckoutProduct>
     */
    public function getCheckoutProducts(): Collection
    {
        return $this->checkoutProducts;
    }

    public function addCheckoutProduct(CheckoutProduct $checkoutProduct): self
    {
        if (!$this->checkoutProducts->contains($checkoutProduct)) {
            $this->checkoutProducts->add($checkoutProduct);
            $checkoutProduct->setCheckout($this);
        }

        return $this;
    }

    public function removeCheckoutProduct(CheckoutProduct $checkoutProduct): self
    {
        if ($this->checkoutProducts->removeElement($checkoutProduct)) {
            // set the owning side to null (unless already changed)
            if ($checkoutProduct->getCheckout() === $this) {
                $checkoutProduct->setCheckout(null);
            }
        }

        return $this;
    }
}
