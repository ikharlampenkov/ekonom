<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Moris
 * Date: 21.11.11
 * Time: 20:54
 * To change this template use File | Settings | File Templates.
 */

class TM_Attribute_AttributeTypeFactory
{

    /**
     * @static
     * @param TM_Attribute_AttributeTypeMapper $mapper
     * @param $id
     * @return TM_Attribute_AttributeType
     */
    public static function getAttributeTypeById(TM_Attribute_AttributeTypeMapper $mapper, $id)
    {

        $result = $mapper->selectFromDB($id);

        if ($result !== false) {
            $class = $result['handler'];
            $o = new $class($mapper);
            $o->fillFromArray($result);
            return $o;
        } else {
            return false;
        }
    }

    public static function getAttributeTypeByArray(TM_Attribute_AttributeTypeMapper $mapper, $values)
    {
        $class = $values['handler'];
        $o = new $class($mapper);
        $o->fillFromArray($values);
        return $o;
    }
}
