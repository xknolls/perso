<?php
namespace Model;

trait Positionable {

    /** @var int */
    protected int $x;

    /** @var int */
    protected int $y;

    /**
     * Get the value of x and y
     *
     * @return array
     */
    public function getPosition() : array
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
        ];
    }

    /**
     * Set the value of x and y
     *
     * @param int $x
     * @param int $y
     *
     * @return self
     */
    public function setPosition(int $x, int $y) : self
    {

        $this->x = $x;
        $this->y = $y;

        return $this;
    }
}