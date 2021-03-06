<?php 

class ICC_Blog_Block_Admin_Data_Grid_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Action { 

    public function render(Varien_Object $row)
    {
        return $this->_getValue($row);
    }


	public function _getValue(Varien_Object $row)
    {
        if ($getter = $this->getColumn()->getGetter()) {
            $val = $row->$getter();
        }

        $val = $row->getData($this->getColumn()->getIndex());
        $val = str_replace("no_selection", "", $val);
        $url = Mage::getBaseUrl('media') . $val;

        $out = '<center><a href="'.$url.'" target="_blank" id="imageurl">';
        $out .= "<img src=". $url ." width='100px' ";
        $out .=" />";
        $out .= '</a></center>';

        return $out;

    }


}