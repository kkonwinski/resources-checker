<?php


namespace App\Service\TimeUpdater;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

interface TimeUpdaterInterface
{
    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps(): void;

    /**
     * Get createdAt
     *
     * @return null|DateTime
     */
    public function getCreatedAt(): ?DateTime;

    /**
     * Set createdAt
     *
     * @param DateTime $createdAt
     * @return self
     */
    public function setCreatedAt(DateTime $createdAt): self;

    /**
     * Get updatedAt
     *
     * @return DateTime|null
     */
    public function getUpdatedAt(): ?DateTime;

    /**
     * Set updatedAt
     *
     * @param DateTime $updatedAt
     * @return self
     */
    public function setUpdatedAt(DateTime $updatedAt): self;
}
