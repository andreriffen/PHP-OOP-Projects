<?php


class CartItem
{
    private Product $product;
    private int $quantity;

    /**
     * CartItem constructor.
     *
     * @param Product $product
     * @param int      $quantity
     */
    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @throws Exception
     */
    public function increaseQuantity($amount=1)
    {
        if ($this->getQuantity()+$amount>$this->getProduct()->getAvailableQuantity()){
            throw new Exception("Product quantity cannot be more than ".$this->getProduct()->getAvailableQuantity());
        }
        $this->quantity += $amount;
    }

    /**
     * @throws Exception
     */
    public function decreaseQuantity($amount=1)
    {
        if ($this->getQuantity()-$amount<1){
            throw new Exception("Product quantity cannot be less than 1");
        }
        $this->quantity -= $amount;
    }
}