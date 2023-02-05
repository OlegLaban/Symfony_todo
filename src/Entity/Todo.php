<?php

namespace App\Entity;

use App\Exception\Todo\InvalidStatusTodoException;
use App\Repository\TodoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TodoRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Todo extends BaseEntity
{
    public const STATUS_CRAETED = 'CREATED';
    
    public const STATUS_IN_PROGRESS = 'IN_PROGRESS';
    
    public const STATUSES = [
        self::STATUS_CRAETED,
        self::STATUS_IN_PROGRESS,
    ];
    
    #[ORM\Column(length: 50)]
    private ?string $status = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;
    
    /**
     * 
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    
    /**
     * 
     * @param string $status
     * @throws InvalidStatusTodoException
     * @return self
     */
    public function setStatus(string $status): self
    {
        if (!in_array($status, self::STATUSES)) {
            throw new InvalidStatusTodoException(
                sprintf(
                        'Status %s is not allowed. Allowed statuses are %s',
                        $status,
                        implode(', ', self::STATUSES)
                )
            );
        }

        $this->status = $status;

        return $this;
    }
    
    /**
     * 
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    
    /**
     * 
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
    
    /**
     * 
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    
    /**
     * 
     * @param string|null $description
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
