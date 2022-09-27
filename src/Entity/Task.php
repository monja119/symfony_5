<?php
// src/Entity/Task.php
namespace App\Entity;

class Task
{
    #[Assert\NotBlank]
    protected $task;
    #[Assert\NotBlank]
    #[Assert\Type(\DateTime::class)]
    protected $dueDate;

    public function getTask(): string
    {
        return $this->task;
    }

    public function setTask(string $task): void
    {
        $this->task = $task;
    }

    public function getDueDate(): ?\DateTime
    {
        return $this->dueDate;
    }

    public function setDueDate(?\DateTime $dueDate): void
    {
        $this->dueDate = $dueDate;
    }
}