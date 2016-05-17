<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paciente
 *
 * @ORM\Table(name="Paciente")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\PacienteRepository")
 */
class Paciente
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Nombre")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Primer_Apellido")
     */
    private $primerApellido;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Segundo_Apellido")
     */
    private $segundoApellido;

    /**
     * @var string
     *
     * @ORM\Column(name="Sexo", type="string", length=255)
     */
    private $sexo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true, name="fecha_nacimiento")
     */
    private $fechaNacimiento;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", unique=true, nullable=true, name="c_id")
     */
    private $cId;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Color_Piel")
     */
    private $colorPiel;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Estado_Conyugal")
     */
    private $estadoConyugal;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Pais_Nacimiento")
     */
    private $paisNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Provincia_Nacimiento")
     */
    private $provinciaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Municipio_Nacimiento")
     */
    private $municipioNacimiento;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true, name="telefono")
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Direccion_Calle")
     */
    private $direccionCalle;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Direccion_Casa_No")
     */
    private $direccionCasaNo;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Direccion_EntreCalles")
     */
    private $direccionEntreCalles;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Direccion_Localidad")
     */
    private $direccionLocalidad;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Direccion_Municipio")
     */
    private $direccionMunicipio;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Direccion_Provincia")
     */
    private $direccionProvincia;


    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Nombre_centro_trabajo")
     */
    private $nombreCentroTrabajo;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Direccion_centro_trabajo")
     */
    private $direccionCentroTrabajo;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Emergencias_nombre")
     */
    private $EmergenciasNombre;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Emergencias_primer_apellido")
     */
    private $EmergenciasPrimerApellido;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Emergencias_segundo_apellido")
     */
    private $EmergenciasSegundoApellido;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true, name="Emrgencias_telefono")
     */
    private $Emergenciastelefono;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Emergencias_Direccion_Calle")
     */
    private $emergenciasDireccionCalle;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Emergencias_Direccion_Casa_No")
     */
    private $emergenciasDireccionCasaNo;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Emergencias_Direccion_EntreCalles")
     */
    private $emergenciasDireccionEntreCalles;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Emergencias_Direccion_Localidad")
     */
    private $emergenciasDireccionLocalidad;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Emergencias_Direccion_Municipio")
     */
    private $emergenciasDireccionMunicipio;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Emergencias_Direccion_Provincia")
     */
    private $emergenciasDireccionProvincia;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Paciente
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set primerApellido
     *
     * @param string $primerApellido
     *
     * @return Paciente
     */
    public function setPrimerApellido($primerApellido)
    {
        $this->primerApellido = $primerApellido;

        return $this;
    }

    /**
     * Get primerApellido
     *
     * @return string
     */
    public function getPrimerApellido()
    {
        return $this->primerApellido;
    }

    /**
     * Set segundoApellido
     *
     * @param string $segundoApellido
     *
     * @return Paciente
     */
    public function setSegundoApellido($segundoApellido)
    {
        $this->segundoApellido = $segundoApellido;

        return $this;
    }

    /**
     * Get segundoApellido
     *
     * @return string
     */
    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     *
     * @return Paciente
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     *
     * @return Paciente
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set cId
     *
     * @param integer $cId
     *
     * @return Paciente
     */
    public function setCId($cId)
    {
        $this->cId = $cId;

        return $this;
    }

    /**
     * Get cId
     *
     * @return integer
     */
    public function getCId()
    {
        return $this->cId;
    }

    /**
     * Set colorPiel
     *
     * @param string $colorPiel
     *
     * @return Paciente
     */
    public function setColorPiel($colorPiel)
    {
        $this->colorPiel = $colorPiel;

        return $this;
    }

    /**
     * Get colorPiel
     *
     * @return string
     */
    public function getColorPiel()
    {
        return $this->colorPiel;
    }

    /**
     * Set estadoConyugal
     *
     * @param string $estadoConyugal
     *
     * @return Paciente
     */
    public function setEstadoConyugal($estadoConyugal)
    {
        $this->estadoConyugal = $estadoConyugal;

        return $this;
    }

    /**
     * Get estadoConyugal
     *
     * @return string
     */
    public function getEstadoConyugal()
    {
        return $this->estadoConyugal;
    }

    /**
     * Set paisNacimiento
     *
     * @param string $paisNacimiento
     *
     * @return Paciente
     */
    public function setPaisNacimiento($paisNacimiento)
    {
        $this->paisNacimiento = $paisNacimiento;

        return $this;
    }

    /**
     * Get paisNacimiento
     *
     * @return string
     */
    public function getPaisNacimiento()
    {
        return $this->paisNacimiento;
    }

    /**
     * Set provinciaNacimiento
     *
     * @param string $provinciaNacimiento
     *
     * @return Paciente
     */
    public function setProvinciaNacimiento($provinciaNacimiento)
    {
        $this->provinciaNacimiento = $provinciaNacimiento;

        return $this;
    }

    /**
     * Get provinciaNacimiento
     *
     * @return string
     */
    public function getProvinciaNacimiento()
    {
        return $this->provinciaNacimiento;
    }

    /**
     * Set municipioNacimiento
     *
     * @param string $municipioNacimiento
     *
     * @return Paciente
     */
    public function setMunicipioNacimiento($municipioNacimiento)
    {
        $this->municipioNacimiento = $municipioNacimiento;

        return $this;
    }

    /**
     * Get municipioNacimiento
     *
     * @return string
     */
    public function getMunicipioNacimiento()
    {
        return $this->municipioNacimiento;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     *
     * @return Paciente
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set direccionCalle
     *
     * @param string $direccionCalle
     *
     * @return Paciente
     */
    public function setDireccionCalle($direccionCalle)
    {
        $this->direccionCalle = $direccionCalle;

        return $this;
    }

    /**
     * Get direccionCalle
     *
     * @return string
     */
    public function getDireccionCalle()
    {
        return $this->direccionCalle;
    }

    /**
     * Set direccionCasaNo
     *
     * @param string $direccionCasaNo
     *
     * @return Paciente
     */
    public function setDireccionCasaNo($direccionCasaNo)
    {
        $this->direccionCasaNo = $direccionCasaNo;

        return $this;
    }

    /**
     * Get direccionCasaNo
     *
     * @return string
     */
    public function getDireccionCasaNo()
    {
        return $this->direccionCasaNo;
    }

    /**
     * Set direccionEntreCalles
     *
     * @param string $direccionEntreCalles
     *
     * @return Paciente
     */
    public function setDireccionEntreCalles($direccionEntreCalles)
    {
        $this->direccionEntreCalles = $direccionEntreCalles;

        return $this;
    }

    /**
     * Get direccionEntreCalles
     *
     * @return string
     */
    public function getDireccionEntreCalles()
    {
        return $this->direccionEntreCalles;
    }

    /**
     * Set direccionLocalidad
     *
     * @param string $direccionLocalidad
     *
     * @return Paciente
     */
    public function setDireccionLocalidad($direccionLocalidad)
    {
        $this->direccionLocalidad = $direccionLocalidad;

        return $this;
    }

    /**
     * Get direccionLocalidad
     *
     * @return string
     */
    public function getDireccionLocalidad()
    {
        return $this->direccionLocalidad;
    }

    /**
     * Set direccionMunicipio
     *
     * @param string $direccionMunicipio
     *
     * @return Paciente
     */
    public function setDireccionMunicipio($direccionMunicipio)
    {
        $this->direccionMunicipio = $direccionMunicipio;

        return $this;
    }

    /**
     * Get direccionMunicipio
     *
     * @return string
     */
    public function getDireccionMunicipio()
    {
        return $this->direccionMunicipio;
    }

    /**
     * Set direccionProvincia
     *
     * @param string $direccionProvincia
     *
     * @return Paciente
     */
    public function setDireccionProvincia($direccionProvincia)
    {
        $this->direccionProvincia = $direccionProvincia;

        return $this;
    }

    /**
     * Get direccionProvincia
     *
     * @return string
     */
    public function getDireccionProvincia()
    {
        return $this->direccionProvincia;
    }

    /**
     * Set nombreCentroTrabajo
     *
     * @param string $nombreCentroTrabajo
     *
     * @return Paciente
     */
    public function setNombreCentroTrabajo($nombreCentroTrabajo)
    {
        $this->nombreCentroTrabajo = $nombreCentroTrabajo;

        return $this;
    }

    /**
     * Get nombreCentroTrabajo
     *
     * @return string
     */
    public function getNombreCentroTrabajo()
    {
        return $this->nombreCentroTrabajo;
    }

    /**
     * Set direccionCentroTrabajo
     *
     * @param string $direccionCentroTrabajo
     *
     * @return Paciente
     */
    public function setDireccionCentroTrabajo($direccionCentroTrabajo)
    {
        $this->direccionCentroTrabajo = $direccionCentroTrabajo;

        return $this;
    }

    /**
     * Get direccionCentroTrabajo
     *
     * @return string
     */
    public function getDireccionCentroTrabajo()
    {
        return $this->direccionCentroTrabajo;
    }

    /**
     * Set emergenciasNombre
     *
     * @param string $emergenciasNombre
     *
     * @return Paciente
     */
    public function setEmergenciasNombre($emergenciasNombre)
    {
        $this->EmergenciasNombre = $emergenciasNombre;

        return $this;
    }

    /**
     * Get emergenciasNombre
     *
     * @return string
     */
    public function getEmergenciasNombre()
    {
        return $this->EmergenciasNombre;
    }

    /**
     * Set emergenciasPrimerApellido
     *
     * @param string $emergenciasPrimerApellido
     *
     * @return Paciente
     */
    public function setEmergenciasPrimerApellido($emergenciasPrimerApellido)
    {
        $this->EmergenciasPrimerApellido = $emergenciasPrimerApellido;

        return $this;
    }

    /**
     * Get emergenciasPrimerApellido
     *
     * @return string
     */
    public function getEmergenciasPrimerApellido()
    {
        return $this->EmergenciasPrimerApellido;
    }

    /**
     * Set emergenciasSegundoApellido
     *
     * @param string $emergenciasSegundoApellido
     *
     * @return Paciente
     */
    public function setEmergenciasSegundoApellido($emergenciasSegundoApellido)
    {
        $this->EmergenciasSegundoApellido = $emergenciasSegundoApellido;

        return $this;
    }

    /**
     * Get emergenciasSegundoApellido
     *
     * @return string
     */
    public function getEmergenciasSegundoApellido()
    {
        return $this->EmergenciasSegundoApellido;
    }

    /**
     * Set emergenciastelefono
     *
     * @param integer $emergenciastelefono
     *
     * @return Paciente
     */
    public function setEmergenciastelefono($emergenciastelefono)
    {
        $this->Emergenciastelefono = $emergenciastelefono;

        return $this;
    }

    /**
     * Get emergenciastelefono
     *
     * @return integer
     */
    public function getEmergenciastelefono()
    {
        return $this->Emergenciastelefono;
    }

    /**
     * Set emergenciasDireccionCalle
     *
     * @param string $emergenciasDireccionCalle
     *
     * @return Paciente
     */
    public function setEmergenciasDireccionCalle($emergenciasDireccionCalle)
    {
        $this->emergenciasDireccionCalle = $emergenciasDireccionCalle;

        return $this;
    }

    /**
     * Get emergenciasDireccionCalle
     *
     * @return string
     */
    public function getEmergenciasDireccionCalle()
    {
        return $this->emergenciasDireccionCalle;
    }

    /**
     * Set emergenciasDireccionCasaNo
     *
     * @param string $emergenciasDireccionCasaNo
     *
     * @return Paciente
     */
    public function setEmergenciasDireccionCasaNo($emergenciasDireccionCasaNo)
    {
        $this->emergenciasDireccionCasaNo = $emergenciasDireccionCasaNo;

        return $this;
    }

    /**
     * Get emergenciasDireccionCasaNo
     *
     * @return string
     */
    public function getEmergenciasDireccionCasaNo()
    {
        return $this->emergenciasDireccionCasaNo;
    }

    /**
     * Set emergenciasDireccionEntreCalles
     *
     * @param string $emergenciasDireccionEntreCalles
     *
     * @return Paciente
     */
    public function setEmergenciasDireccionEntreCalles($emergenciasDireccionEntreCalles)
    {
        $this->emergenciasDireccionEntreCalles = $emergenciasDireccionEntreCalles;

        return $this;
    }

    /**
     * Get emergenciasDireccionEntreCalles
     *
     * @return string
     */
    public function getEmergenciasDireccionEntreCalles()
    {
        return $this->emergenciasDireccionEntreCalles;
    }

    /**
     * Set emergenciasDireccionLocalidad
     *
     * @param string $emergenciasDireccionLocalidad
     *
     * @return Paciente
     */
    public function setEmergenciasDireccionLocalidad($emergenciasDireccionLocalidad)
    {
        $this->emergenciasDireccionLocalidad = $emergenciasDireccionLocalidad;

        return $this;
    }

    /**
     * Get emergenciasDireccionLocalidad
     *
     * @return string
     */
    public function getEmergenciasDireccionLocalidad()
    {
        return $this->emergenciasDireccionLocalidad;
    }

    /**
     * Set emergenciasDireccionMunicipio
     *
     * @param string $emergenciasDireccionMunicipio
     *
     * @return Paciente
     */
    public function setEmergenciasDireccionMunicipio($emergenciasDireccionMunicipio)
    {
        $this->emergenciasDireccionMunicipio = $emergenciasDireccionMunicipio;

        return $this;
    }

    /**
     * Get emergenciasDireccionMunicipio
     *
     * @return string
     */
    public function getEmergenciasDireccionMunicipio()
    {
        return $this->emergenciasDireccionMunicipio;
    }

    /**
     * Set emergenciasDireccionProvincia
     *
     * @param string $emergenciasDireccionProvincia
     *
     * @return Paciente
     */
    public function setEmergenciasDireccionProvincia($emergenciasDireccionProvincia)
    {
        $this->emergenciasDireccionProvincia = $emergenciasDireccionProvincia;

        return $this;
    }

    /**
     * Get emergenciasDireccionProvincia
     *
     * @return string
     */
    public function getEmergenciasDireccionProvincia()
    {
        return $this->emergenciasDireccionProvincia;
    }
}
