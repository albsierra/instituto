<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 23/01/15
 * Time: 22:58
 */

namespace IES2Mares\TutoresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ddeboer\DataImport\ValueConverter\CharsetValueConverter;
use Ddeboer\DataImport\Workflow;
use Ddeboer\DataImport\Reader\CsvReader;
use Ddeboer\DataImport\Writer\DoctrineWriter;
use Ddeboer\DataImport\ValueConverter\DateTimeValueConverter;
use Ddeboer\DataImport\ValueConverter\StringToObjectConverter;
use Ddeboer\DataImport\ItemConverter\MappingItemConverter;

use \IES2Mares\TutoresBundle\Import\AnyoSubgrupoToGrupoConverter;



class ImportController extends Controller {

    /**
     * @var \Symfony\Component\HttpFoundation\File\UploadedFile
     */
    private $ficheroCSV;

    public function indexAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('tabla', 'choice',array(
                'choices' => array(
                    'Profesores' => 'Profesores',
                    'Alumnos' => 'Alumnos',
                    'Grupos' => 'Grupos',
                    'Matriculas' => 'Matrículas',
                    'Materias' => 'Materias',
                    'MateriasMatriculadas' => 'Materias Matriculadas',
                    'MateriasImpartidas' => 'Materias Impartidas',
                    ),
                'required' => true,
                'placeholder' => 'Elija la tabla destino',
                'error_bubbling' => true,
                )
            )
            ->add('ficheroCSV', 'file', array(
                'required' => true,
                'error_bubbling' => true,
                'label' => 'Fichero CSV',
            ))
            ->add('send', 'submit', array(
                'label' => 'Enviar',
            ))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
        // data is an array with ""tabla" and "file" indexes
            $data = $form->getData();
            $this->ficheroCSV = $data["ficheroCSV"];
            $action = 'import'.$data["tabla"];
            $workflow = call_user_func(array($this, $action));
            $result = $workflow->process();

        }
        // ... render the form
        return $this->render('TutoresBundle:Import:index.html.twig', array(
            'form' => $form->createView(),
            'result' => isset($result) ? $result : null,
        ));
    }

    protected function importProfesores()
    {
        // Create and configure the reader
        $file = $this->ficheroCSV->openFile();
        $csvReader = new CsvReader($file, ';');

// Tell the reader that the first row in the CSV file contains column headers
        $csvReader->setHeaderRowNumber(0);

// Create the workflow from the reader
        $workflow = new Workflow($csvReader);

// Create a writer: you need Doctrine’s EntityManager.
        $entityManager = $this->getDoctrine()->getEntityManager();
        $doctrineWriter = new DoctrineWriter($entityManager, 'TutoresBundle:Profesor', 'id');
        $doctrineWriter->disableTruncate();
        $doctrineWriter->setBatchSize(1);
        $workflow->addWriter($doctrineWriter);

// Add a converter
        $converter = new MappingItemConverter();
        $converter
            ->addMapping('Profesor', 'id')
            ->addMapping('Apellidos', 'apellidos')
            ->addMapping('Nombre', 'nombre')
            ->addMapping('DNI', 'dni')
            ->addMapping(iconv("UTF-8", "ISO-8859-15", 'Móvil'), 'movil')
            ->addMapping('Departamento', 'departamento')
            ->addMapping('Email', 'email')
        ;

        $workflow->addItemConverter($converter);

// create the workflow and reader etc.
        $workflow->addValueConverter('apellidos', new CharsetValueConverter('UTF-8', 'ISO-8859-15'));
        $workflow->addValueConverter('nombre', new CharsetValueConverter('UTF-8', 'ISO-8859-15'));


        return $workflow;
    }

    protected function importAlumnos()
    {

        // Create and configure the reader
        $file = $this->ficheroCSV->openFile();
        $csvReader = new CsvReader($file, ';');

// Tell the reader that the first row in the CSV file contains column headers
        $csvReader->setHeaderRowNumber(0);

// Create the workflow from the reader
        $workflow = new Workflow($csvReader);

// Create a writer: you need Doctrine’s EntityManager.
        $entityManager = $this->getDoctrine()->getEntityManager();
        $doctrineWriter = new DoctrineWriter($entityManager, 'TutoresBundle:Alumno', 'id');
        $doctrineWriter->disableTruncate();
        $doctrineWriter->setBatchSize(1);
        $workflow->addWriter($doctrineWriter);


// Add a converter
        $converter = new MappingItemConverter();
        $converter
            ->addMapping('Exp.', 'id')
            ->addMapping('DNI', 'dni')
            ->addMapping('1er. Apellido', 'apellido1')
            ->addMapping(iconv("UTF-8", "ISO-8859-15", '2º Apellido'), 'apellido2')
            ->addMapping('Nombre', 'nombre')
            ->addMapping('Fecha Nac.', 'fechanac')
            ->addMapping(iconv("UTF-8", "ISO-8859-15", 'Móvil'), 'movil')
            ->addMapping('Padre', 'padre')
            ->addMapping('Madre', 'madre')
            ->addMapping('Tel. Casa', 'telcasa')
            ->addMapping(iconv("UTF-8", "ISO-8859-15", 'Móvil Padre'), 'movilpadre')
            ->addMapping(iconv("UTF-8", "ISO-8859-15", 'Móvil Madre'), 'movilmadre')
            ->addMapping('Domicilio', 'domicilio')
            ->addMapping('C.P.', 'cp')
            ->addMapping('Localidad', 'localidad')
            ->addMapping('Provincia', 'provincia');

        $workflow->addItemConverter($converter);

// Add a converter CharsetValueConverter

        $workflow->addValueConverter('apellido1', new CharsetValueConverter('UTF-8', 'ISO-8859-15'));
        $workflow->addValueConverter('apellido2', new CharsetValueConverter('UTF-8', 'ISO-8859-15'));
        $workflow->addValueConverter('nombre', new CharsetValueConverter('UTF-8', 'ISO-8859-15'));
        $workflow->addValueConverter('padre', new CharsetValueConverter('UTF-8', 'ISO-8859-15'));
        $workflow->addValueConverter('madre', new CharsetValueConverter('UTF-8', 'ISO-8859-15'));
        $workflow->addValueConverter('domicilio', new CharsetValueConverter('UTF-8', 'ISO-8859-15'));
        $workflow->addValueConverter('localidad', new CharsetValueConverter('UTF-8', 'ISO-8859-15'));
        $workflow->addValueConverter('provincia', new CharsetValueConverter('UTF-8', 'ISO-8859-15'));

// Add a DateTimeValueConverter converter
        $dateConverter = new DateTimeValueConverter('d/m/Y');
        $workflow->addValueConverter("fechanac", $dateConverter);


        return $workflow;
    }

    protected function importGrupos()
    {

        // Create and configure the reader
        $file = $this->ficheroCSV->openFile();
        $csvReader = new CsvReader($file, ';');

// Tell the reader that the first row in the CSV file contains column headers
        $csvReader->setHeaderRowNumber(0);

// Create the workflow from the reader
        $workflow = new Workflow($csvReader);

// Create a writer: you need Doctrine’s EntityManager.
        $entityManager = $this->getDoctrine()->getEntityManager();
        $doctrineWriter = new DoctrineWriter($entityManager, 'TutoresBundle:Grupo', array('anyo','grupo','subgrupo'));
        $doctrineWriter->disableTruncate();
        $doctrineWriter->setBatchSize(1);
        $workflow->addWriter($doctrineWriter);


// Add a converter
        $converter = new MappingItemConverter();
        $converter
            ->addMapping(iconv("UTF-8", "ISO-8859-15", 'Año'), 'anyo')
            ->addMapping('Grupo', 'grupo')
            ->addMapping('Subgrupo', 'subgrupo')
            ->addMapping('Diccionario', 'ensenanza')
            ->addMapping('Curso', 'curso')
            ->addMapping('Tutor', 'tutor')
            ->addMapping('Horario Visita', 'horariovisita');

        $workflow->addItemConverter($converter);

        $converter = new StringToObjectConverter($this->getDoctrine()->getRepository('TutoresBundle:Profesor'), 'id');
        $workflow->addValueConverter('tutor', $converter);
// Add a converter CharsetValueConverter

        $workflow->addValueConverter('ensenanza', new CharsetValueConverter('UTF-8', 'ISO-8859-15'));
        $workflow->addValueConverter('grupo', new CharsetValueConverter('UTF-8', 'ISO-8859-15'));
        $workflow->addValueConverter('subgrupo', new CharsetValueConverter('UTF-8', 'ISO-8859-15'));

        return $workflow;
    }

    protected function importMaterias()
    {

        // Create and configure the reader
        $file = $this->ficheroCSV->openFile();
        $csvReader = new CsvReader($file, ';');

// Tell the reader that the first row in the CSV file contains column headers
        $csvReader->setHeaderRowNumber(0);

// Create the workflow from the reader
        $workflow = new Workflow($csvReader);

// Create a writer: you need Doctrine’s EntityManager.
        $entityManager = $this->getDoctrine()->getEntityManager();
        $doctrineWriter = new DoctrineWriter($entityManager, 'TutoresBundle:Materia', 'codigo');
        $doctrineWriter->disableTruncate();
        $doctrineWriter->setBatchSize(1);
        $workflow->addWriter($doctrineWriter);


// Add a converter
        $converter = new MappingItemConverter();
        $converter
            ->addMapping(iconv("UTF-8", "ISO-8859-15", 'Código'), 'codigo')
            ->addMapping('Materia', 'materia')
            ->addMapping(iconv("UTF-8", "ISO-8859-15", 'Enseñanza'), 'ensenanza')
            ->addMapping('Curso', 'curso');

        $workflow->addItemConverter($converter);

        $workflow->addValueConverter('materia', new CharsetValueConverter('UTF-8', 'ISO-8859-15'));
        $workflow->addValueConverter('ensenanza', new CharsetValueConverter('UTF-8', 'ISO-8859-15'));

        return $workflow;
    }

    protected function importMatriculas()
    {

        // Create and configure the reader
        $file = $this->ficheroCSV->openFile();
        $csvReader = new CsvReader($file, ';');

// Tell the reader that the first row in the CSV file contains column headers
        $csvReader->setHeaderRowNumber(0);

// Create the workflow from the reader
        $workflow = new Workflow($csvReader);

// Create a writer: you need Doctrine’s EntityManager.
        $entityManager = $this->getDoctrine()->getEntityManager();
        $doctrineWriter = new DoctrineWriter($entityManager, 'TutoresBundle:Matricula', array('expediente','grupo'));
        //$doctrineWriter->disableTruncate();
        $doctrineWriter->setBatchSize(1);
        $workflow->addWriter($doctrineWriter);


// Add a converter
        $converter = new MappingItemConverter();
        $converter
            ->addMapping('Subgrupo', 'grupo')
            ->addMapping('Exp.', 'expediente');

        $workflow->addItemConverter($converter);

        $converter = new AnyoSubgrupoToGrupoConverter($this->getDoctrine()->getRepository('TutoresBundle:Grupo'), 'anyosubgrupo');
        $workflow->addValueConverter('grupo', $converter);

        $converter = new StringToObjectConverter($this->getDoctrine()->getRepository('TutoresBundle:Alumno'), 'id');
        $workflow->addValueConverter('expediente', $converter);

        return $workflow;
    }

    protected function importMateriasMatriculadas()
    {

        // Create and configure the reader
        $file = $this->ficheroCSV->openFile();
        $csvReader = new CsvReader($file, ';');

// Tell the reader that the first row in the CSV file contains column headers
        $csvReader->setHeaderRowNumber(0);

// Create the workflow from the reader
        $workflow = new Workflow($csvReader);

// Create a writer: you need Doctrine’s EntityManager.
        $entityManager = $this->getDoctrine()->getEntityManager();
        $doctrineWriter = new DoctrineWriter($entityManager, 'TutoresBundle:Materiamatriculada', array('expediente','anyo','materia'));
        //$doctrineWriter->disableTruncate();
        $doctrineWriter->setBatchSize(50);
        $workflow->addWriter($doctrineWriter);


// Add a converter
        $converter = new MappingItemConverter();
        $converter
            ->addMapping(iconv("UTF-8", "ISO-8859-15", 'Año'), 'anyo')
            ->addMapping('Exp.', 'expediente')
            ->addMapping('Materia', 'materia')
            ->addMapping('Profesor', 'profesor');

        $workflow->addItemConverter($converter);

        $converter = new StringToObjectConverter($this->getDoctrine()->getRepository('TutoresBundle:Alumno'), 'id');
        $workflow->addValueConverter('expediente', $converter);

        $converter = new StringToObjectConverter($this->getDoctrine()->getRepository('TutoresBundle:Profesor'), 'id');
        $workflow->addValueConverter('profesor', $converter);

        $converter = new StringToObjectConverter($this->getDoctrine()->getRepository('TutoresBundle:Materia'), 'codigo');
        $workflow->addValueConverter('materia', $converter);

        return $workflow;
    }

    protected function importMateriasImpartidas()
    {

        // Create and configure the reader
        $file = $this->ficheroCSV->openFile();
        $csvReader = new CsvReader($file, ';');

// Tell the reader that the first row in the CSV file contains column headers
        $csvReader->setHeaderRowNumber(0);

// Create the workflow from the reader
        $workflow = new Workflow($csvReader);

// Create a writer: you need Doctrine’s EntityManager.
        $entityManager = $this->getDoctrine()->getEntityManager();
        $doctrineWriter = new DoctrineWriter($entityManager, 'TutoresBundle:Materiaimpartida', array('materia','profesor','grupo'));
        //$doctrineWriter->disableTruncate();
        $doctrineWriter->setBatchSize(50);
        $workflow->addWriter($doctrineWriter);


// Add a converter
        $converter = new MappingItemConverter();
        $converter
            ->addMapping('Subgrupo', 'grupo')
            ->addMapping('Materia', 'materia')
            ->addMapping('Profesor', 'profesor');

        $workflow->addItemConverter($converter);

        $converter = new AnyoSubgrupoToGrupoConverter($this->getDoctrine()->getRepository('TutoresBundle:Grupo'), 'anyosubgrupo');
        $workflow->addValueConverter('grupo', $converter);

        $converter = new StringToObjectConverter($this->getDoctrine()->getRepository('TutoresBundle:Profesor'), 'id');
        $workflow->addValueConverter('profesor', $converter);

        $converter = new StringToObjectConverter($this->getDoctrine()->getRepository('TutoresBundle:Materia'), 'codigo');
        $workflow->addValueConverter('materia', $converter);

        return $workflow;
    }

}