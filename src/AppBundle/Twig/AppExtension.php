<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 5/23/2016
 * Time: 8:54 PM
 */

namespace AppBundle\Twig;


class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('class', array($this, 'classFilter')),
        );
    }

    public function classFilter($entity)
    {
        return preg_split("#\\\\#",get_class($entity));
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'app_extension';    }
}