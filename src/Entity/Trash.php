<?php

namespace App\Entity;

use App\Repository\TrashRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrashRepository::class)
 */
class Trash
{
    const TYPE = [
        1 => "Déchets provenant de l'exploration et de l'exploitation des mines et des carrières ainsi que  du traitement physique et chimique des minéraux",
        2 => "Déchets provenant de l'agriculture, de l'horticulture, de l'aquaculture, de la sylviculture, de  la chasse et de la pêche ainsi que de la préparation et de la transformation des aliments",
        3=> "Déchets provenant de la transformation du bois et de la production de panneaux et de  meubles, de pâte à papier, de papier et de carton",
        4=> "Déchets provenant des industries du cuir, de la fourrure et du textile",
        5=> "Déchets provenant du raffinage du pétrole, de la purification du gaz naturel et du  traitement pyrolytique du charbon",
        6=> "Déchets des procédés de la chimie minérale",
        7=> "Déchets des procédés de la chimie organique",
        8=> "Déchets provenant de la fabrication, de la formulation, de la distribution et de l'utilisation  (FFDU) de produits de revêtement (peintures, vernis et émaux vitrifiés), mastics et encres  d'impression",
        9=> "Déchets provenant de l'industrie photographique",
        10=> "Déchets provenant de procédés thermiques",
        11=> "Déchets provenant du traitement chimique de surface et du revêtement des métaux et  autres matériaux, et de l'hydrométallurgie des métaux non ferreux",
        12=> "Déchets provenant de la mise en forme et du traitement physique et mécanique de surface  des métaux et matières plastiques",
        13 => "Huiles et combustibles liquides usagés (sauf huiles alimentaires et huiles figurant aux  chapitres 05 et 12)",
        14 => "Déchets de solvants organiques, d'agents réfrigérants et propulseurs (sauf chapitres 07 et  08)",
        15=> "Emballages et déchets d'emballages; absorbants, chiffons d'essuyage, matériaux filtrants et vêtements de protection non spécifiés ailleurs",
        16=> "Déchets non décrits ailleurs sur la liste",
        17=> "Déchets de construction et de démolition (y compris déblais provenant de sites  contaminés)",
        18=> "Déchets provenant des soins médicaux ou vétérinaires et/ou de la recherche associée (sauf  déchets de cuisine et de restauration ne provenant pas directement des soins médicaux)",
        19=> "Déchets provenant des installations de gestion des déchets, des stations d'épuration des  eaux usées hors site et de la préparation d'eau destinée à la consommation humaine et  d'eau à usage industriel",
        20=>"Déchets municipaux (déchets ménagers et déchets assimilés provenant des commerces, des industries et des administrations), y compris les fractions collectées séparément"
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="float")
     */
    private $Weight;

    /**
     * @ORM\Column(type="integer")
     */
    private $TrashType;

    /**
     * @ORM\Column(type="date")
     */
    private $CreationDate;

    /**
     * @ORM\Column(type="date")
     */
    private $PickupDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->Weight;
    }

    public function setWeight(float $Weight): self
    {
        $this->Weight = $Weight;

        return $this;
    }

    public function getTrashType(): ?int
    {
        return $this->TrashType;
    }

    public function setTrashType(int $TrashType): self
    {
        $this->TrashType = $TrashType;

        return $this;
    }

    public function getType(): string
    {
        $TYPE = [
            1 => "Déchets provenant de l'exploration et de l'exploitation des mines et des carrières ainsi que  du traitement physique et chimique des minéraux",
            2 => "Déchets provenant de l'agriculture, de l'horticulture, de l'aquaculture, de la sylviculture, de  la chasse et de la pêche ainsi que de la préparation et de la transformation des aliments",
            3=> "Déchets provenant de la transformation du bois et de la production de panneaux et de  meubles, de pâte à papier, de papier et de carton",
            4=> "Déchets provenant des industries du cuir, de la fourrure et du textile",
            5=> "Déchets provenant du raffinage du pétrole, de la purification du gaz naturel et du  traitement pyrolytique du charbon",
            6=> "Déchets des procédés de la chimie minérale",
            7=> "Déchets des procédés de la chimie organique",
            8=> "Déchets provenant de la fabrication, de la formulation, de la distribution et de l'utilisation  (FFDU) de produits de revêtement (peintures, vernis et émaux vitrifiés), mastics et encres  d'impression",
            9=> "Déchets provenant de l'industrie photographique",
            10=> "Déchets provenant de procédés thermiques",
            11=> "Déchets provenant du traitement chimique de surface et du revêtement des métaux et  autres matériaux, et de l'hydrométallurgie des métaux non ferreux",
            12=> "Déchets provenant de la mise en forme et du traitement physique et mécanique de surface  des métaux et matières plastiques",
            13 => "Huiles et combustibles liquides usagés (sauf huiles alimentaires et huiles figurant aux  chapitres 05 et 12)",
            14 => "Déchets de solvants organiques, d'agents réfrigérants et propulseurs (sauf chapitres 07 et  08)",
            15=> "Emballages et déchets d'emballages; absorbants, chiffons d'essuyage, matériaux filtrants et vêtements de protection non spécifiés ailleurs",
            16=> "Déchets non décrits ailleurs sur la liste",
            17=> "Déchets de construction et de démolition (y compris déblais provenant de sites  contaminés)",
            18=> "Déchets provenant des soins médicaux ou vétérinaires et/ou de la recherche associée (sauf  déchets de cuisine et de restauration ne provenant pas directement des soins médicaux)",
            19=> "Déchets provenant des installations de gestion des déchets, des stations d'épuration des  eaux usées hors site et de la préparation d'eau destinée à la consommation humaine et  d'eau à usage industriel",
            20=>"Déchets municipaux (déchets ménagers et déchets assimilés provenant des commerces, des industries et des administrations), y compris les fractions collectées séparément"
        ];
        return $TYPE[$this->TrashType];
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->CreationDate;
    }

    public function setCreationDate(\DateTimeInterface $CreationDate): self
    {
        $this->CreationDate = $CreationDate;

        return $this;
    }

    public function getPickupDate(): ?\DateTimeInterface
    {
        return $this->PickupDate;
    }

    public function setPickupDate(\DateTimeInterface $PickupDate): self
    {
        $this->PickupDate = $PickupDate;

        return $this;
    }
}
