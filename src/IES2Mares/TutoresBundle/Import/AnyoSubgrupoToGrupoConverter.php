<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 26/01/15
 * Time: 20:51
 */
namespace IES2Mares\TutoresBundle\Import;

use Ddeboer\DataImport\ValueConverter\ValueConverterInterface;
use IES2Mares\TutoresBundle\Entity\GrupoRepository;

class AnyoSubgrupoToGrupoConverter implements ValueConverterInterface
{
    /**
     * @var GrupoRepository
     */
    private $repository;

    /**
     * @var string
     */
    private $property;

    public function __construct(GrupoRepository $repository, $property)
    {
        $this->repository = $repository;
        $this->property = $property;
    }

    /**
     * {@inheritDoc}
     */
    public function convert($input)
    {
        $method = 'findOneBy'.ucfirst($this->property);
        return $this->repository->$method($input);
    }


}