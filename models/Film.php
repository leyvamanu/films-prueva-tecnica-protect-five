<?php

class Film
{
    private int $id;
    private string $title;
    private ?int $year;
    private ?float $rating;
    private ?string $imageUrl;

    public function __construct($id, $title, $year = null, $rating = null, $imageUrl = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->year = $year;
        $this->rating = $rating;
        $this->imageUrl = $imageUrl;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'year' => $this->year,
            'rating' => $this->rating,
            'image_url' => $this->imageUrl
        ];
    }
}