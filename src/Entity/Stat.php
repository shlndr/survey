<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatRepository")
 */
class Stat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=400)
     */
    private $surveyTitle;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $surveyId;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $surveyUrl;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $others;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $visitorEmail;

    /**
     * @ORM\Column(type="text")
     */
    private $surveyOption;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $surveyOptionSelected;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $utmSource;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $utmMedium;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $utmCampaign;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $utmTerm;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $utmContent;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurveyTitle(): ?string
    {
        return $this->surveyTitle;
    }

    public function setSurveyTitle(string $surveyTitle): self
    {
        $this->surveyTitle = $surveyTitle;

        return $this;
    }

    public function getSurveyId(): ?string
    {
        return $this->surveyId;
    }

    public function setSurveyId(string $surveyId): self
    {
        $this->surveyId = $surveyId;

        return $this;
    }

    public function getSurveyUrl(): ?string
    {
        return $this->surveyUrl;
    }

    public function setSurveyUrl(string $surveyUrl): self
    {
        $this->surveyUrl = $surveyUrl;

        return $this;
    }

    public function getOthers(): ?string
    {
        return $this->others;
    }

    public function setOthers(string $others): self
    {
        $this->others = $others;

        return $this;
    }

    public function getVisitorEmail(): ?string
    {
        return $this->visitorEmail;
    }

    public function setVisitorEmail(?string $visitorEmail): self
    {
        $this->visitorEmail = $visitorEmail;

        return $this;
    }

    public function getSurveyOption(): ?string
    {
        return $this->surveyOption;
    }

    public function setSurveyOption(string $surveyOption): self
    {
        $this->surveyOption = $surveyOption;

        return $this;
    }

    public function getSurveyOptionSelected(): ?string
    {
        return $this->surveyOptionSelected;
    }

    public function setSurveyOptionSelected(string $surveyOptionSelected): self
    {
        $this->surveyOptionSelected = $surveyOptionSelected;

        return $this;
    }

    public function getUtmSource(): ?string
    {
        return $this->utmSource;
    }

    public function setUtmSource(?string $utmSource): self
    {
        $this->utmSource = $utmSource;

        return $this;
    }

    public function getUtmMedium(): ?string
    {
        return $this->utmMedium;
    }

    public function setUtmMedium(?string $utmMedium): self
    {
        $this->utmMedium = $utmMedium;

        return $this;
    }

    public function getUtmCampaign(): ?string
    {
        return $this->utmCampaign;
    }

    public function setUtmCampaign(?string $utmCampaign): self
    {
        $this->utmCampaign = $utmCampaign;

        return $this;
    }

    public function getUtmTerm(): ?string
    {
        return $this->utmTerm;
    }

    public function setUtmTerm(?string $utmTerm): self
    {
        $this->utmTerm = $utmTerm;

        return $this;
    }

    public function getUtmContent(): ?string
    {
        return $this->utmContent;
    }

    public function setUtmContent(?string $utmContent): self
    {
        $this->utmContent = $utmContent;

        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?string $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

}
