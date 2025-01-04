<?php namespace App\Libraries;

class SelectItems
{
    public function sin_buscador($opciones, $opcionSeleccionada, $nombreSelect, $tipoOperacion, $camposAuxiliares = '')
    {
        $html = '<select name="' . $nombreSelect . '" id="' . $nombreSelect . '" class="form-control" ' . ($camposAuxiliares ? $camposAuxiliares : '') . '>';
        
        if ($tipoOperacion == '') {
            $html .= '<option value="">Seleccione una opción</option>';
            foreach ($opciones as $row) {
                $html .= '<option value="' . strval($row->ID) . '">' . $row->NOMBRE . '</option>';
            }
        } else {
            $html .= '<option value=""></option>';
            foreach ($opciones as $row) {
                $selected = (strval($opcionSeleccionada) == strval($row->ID)) ? 'selected' : '';
                $html .= '<option value="' . strval($row->ID) . '" ' . $selected . '>' . $row->NOMBRE . '</option>';
            }
        }
        
        $html .= '</select>';
        return $html;
    }

    public function sin_buscador_priv($opciones, $opcionSeleccionada, $nombreSelect, $tipoOperacion, $camposAuxiliares = '')
    {
        $html = '<select name="' . $nombreSelect . '" id="' . $nombreSelect . '" class="form-control" ' . ($camposAuxiliares ? $camposAuxiliares : '') . '>';
        
        if ($tipoOperacion == '') {
            $html .= '<option value="">Seleccione una opción</option>';
            foreach ($opciones as $row) {
                $html .= '<option value="' . strval($row->idRol) . '">' . $row->nombre_tipo . '</option>';
            }
        } else {
            $html .= '<option value=""></option>';
            foreach ($opciones as $row) {
                $selected = (strval($opcionSeleccionada) == strval($row->idRol)) ? 'selected' : '';
                $html .= '<option value="' . strval($row->idRol) . '" ' . $selected . '>' . $row->nombre_tipo . '</option>';
            }
        }
        
        $html .= '</select>';
        return $html;
    }

    public function sin_buscadormultiple($opciones, $opcionSeleccionada, $nombreSelect, $tipoOperacion, $camposAuxiliares = '')
    {
        $html = '<select name="' . $nombreSelect . '[]" id="' . $nombreSelect . '" class="js-example-basic-multiple" ' . ($camposAuxiliares ? $camposAuxiliares : '') . ' multiple="multiple" style="width: 75%">';
        
        if ($tipoOperacion == '') {
            $html .= '<option value="">Seleccione una opción</option>';
            foreach ($opciones as $row) {
                $html .= '<option value="' . strval($row->ID) . '">' . $row->NOMBRE . '</option>';
            }
        } else {
            $html .= '<option value=""></option>';
            foreach ($opciones as $row) {
                $selected = (strval($opcionSeleccionada) == strval($row->ID)) ? 'selected' : '';
                $html .= '<option value="' . strval($row->ID) . '" ' . $selected . '>' . $row->NOMBRE . '</option>';
            }
        }
        
        $html .= '</select>';
        return $html;
    }

    public function sin_buscador2($opciones, $opcionSeleccionada, $nombreSelect, $tipoOperacion, $camposAuxiliares = '')
    {
        $html = '<select name="' . $nombreSelect . '" id="' . $nombreSelect . '" class="form-control" ' . ($camposAuxiliares ? $camposAuxiliares : '') . '>';
        
        if ($tipoOperacion == '') {
            $html .= '<option value="">Seleccione una opción</option>';
            foreach ($opciones as $row) {
                $html .= '<option value="' . strval($row->IdCliente) . '">' . $row->NOMBRE . '</option>';
            }
        } else {
            $html .= '<option value=""></option>';
            foreach ($opciones as $row) {
                $selected = (strval($opcionSeleccionada) == strval($row->IdCliente)) ? 'selected' : '';
                $html .= '<option value="' . strval($row->IdCliente) . '" ' . $selected . '>' . $row->NOMBRE . '</option>';
            }
        }
        
        $html .= '</select>';
        return $html;
    }

    public function sin_buscador5($opciones, $opcionSeleccionada, $nombreSelect, $tipoOperacion, $camposAuxiliares = '')
    {
        $html = '<select name="' . $nombreSelect . '" id="' . $nombreSelect . '" class="form-control" ' . ($camposAuxiliares ? $camposAuxiliares : '') . '>';
        
        if ($tipoOperacion == '') {
            $html .= '<option value="">Seleccione una opción</option>';
            foreach ($opciones as $row) {
                $html .= '<option value="' . strval($row->IdCliente) . '">' . $row->NOMBRE . '</option>';
            }
        } else {
            $html .= '<option value=""></option>';
            foreach ($opciones as $row) {
                $selected = (strval($opcionSeleccionada) == strval($row->IdCliente)) ? 'selected' : '';
                $html .= '<option value="' . strval($row->IdCliente) . '" ' . $selected . '>' . $row->NOMBRE . '</option>';
            }
        }
        
        $html .= '</select>';
        return $html;
    }

    public function sin_buscador_roles($opciones, $opcionSeleccionada, $nombreSelect, $tipoOperacion, $camposAuxiliares = '')
    {
        $html = '<select name="' . $nombreSelect . '" id="' . $nombreSelect . '" class="form-control" ' . ($camposAuxiliares ? $camposAuxiliares : '') . '>';
        
        if ($tipoOperacion == '') {
            $html .= '<option value="">Seleccione una opción</option>';
            foreach ($opciones as $row) {
                $html .= '<option value="' . strval($row->ID) . '">' . $row->NOMBRE . '</option>';
            }
        } else {
            $html .= '<option value=""></option>';
            foreach ($opciones as $row) {
                $selected = (strval($opcionSeleccionada) == strval($row->ID)) ? 'selected' : '';
                $html .= '<option value="' . strval($row->ID) . '" ' . $selected . '>' . $row->NOMBRE . '</option>';
            }
        }
        
        $html .= '</select>';
        return $html;
    }

    public function sin_buscador3($opciones, $opcionSeleccionada, $nombreSelect, $tipoOperacion, $camposAuxiliares = '')
    {
        $html = '<select name="' . $nombreSelect . '" id="' . $nombreSelect . '" class="form-control" ' . ($camposAuxiliares ? $camposAuxiliares : '') . '>';
        
        if ($tipoOperacion == '') {
            $html .= '<option value="">Seleccione una opción</option>';
            foreach ($opciones as $row) {
                $html .= '<option value="' . strval($row->ID_GRUPOS) . '">' . $row->NOMBRE . '</option>';
            }
        } else {
            $html .= '<option value=""></option>';
            foreach ($opciones as $row) {
                $selected = (strval($opcionSeleccionada) == strval($row->ID_GRUPOS)) ? 'selected' : '';
                $html .= '<option value="' . strval($row->ID_GRUPOS) . '" ' . $selected . '>' . $row->NOMBRE . '</option>';
            }
        }
        
        $html .= '</select>';
        return $html;
    }

    public function sin_buscador4($opciones, $opcionSeleccionada, $nombreSelect, $tipoOperacion, $camposAuxiliares = '')
    {
        $html = '<select name="' . $nombreSelect . '" id="' . $nombreSelect . '" class="form-control" ' . ($camposAuxiliares ? $camposAuxiliares : '') . '>';
        
        if ($tipoOperacion == '') {
            $html .= '<option value="">Seleccione una opción</option>';
            foreach ($opciones as $row) {
                $html .= '<option value="' . strval($row->ID) . '">' . $row->NOMBRE . '</option>';
            }
        } else {
            $html .= '<option value=""></option>';
            foreach ($opciones as $row) {
                $selected = (strval($opcionSeleccionada) == strval($row->ID)) ? 'selected' : '';
                $html .= '<option value="' . strval($row->ID) . '" ' . $selected . '>' . $row->NOMBRE . '</option>';
            }
        }
        
        $html .= '<option value="999" ' . ($opcionSeleccionada == 999 ? 'selected' : '') . '>TODOS</option>';
        $html .= '</select>';
        return $html;
    }

    public function con_buscador_multiselect($opciones, $opcionSeleccionada, $nombreSelect, $tipoOperacion, $camposAuxiliares = '')
    {
        $html = '<select name="' . $nombreSelect . '[]" id="' . $nombreSelect . '" class="form-control" ' . ($camposAuxiliares ? $camposAuxiliares : '') . ' multiple="multiple" style="white-space: nowrap;">';
        
        if ($tipoOperacion == '') {
            foreach ($opciones as $row) {
                $html .= '<option value="' . $row->id . '" title="' . $row->nombre . '">' . $row->nombre . '</option>';
            }
        } else {
            $html .= '<option value=""></option>';
            foreach ($opciones as $row) {
                $selected = ($opcionSeleccionada == $row->id) ? 'selected' : '';
                $html .= '<option value="' . $row->id . '" ' . $selected . '>' . $row->nombre . '</option>';
            }
        }
        
        $html .= '</select>';
        return $html;
    }

    public function con_buscador($opciones, $opcionSeleccionada, $nombreSelect, $tipoOperacion, $camposAuxiliares = '')
    {
        $html = '<select name="' . $nombreSelect . '" id="' . $nombreSelect . '" class="form-control form-group select_buscador" ' . ($camposAuxiliares ? $camposAuxiliares : '') . ' style="white-space: nowrap;">';
        
        if ($tipoOperacion == '') {
            $html .= '<option value="" selected>Seleccione una Opción</option>';
            foreach ($opciones as $row) {
                $html .= '<option value="' . $row->id . '" title="' . $row->nombre . '">' . $row->nombre . '</option>';
            }
        } else {
            $html .= '<option value=""></option>';
            foreach ($opciones as $row) {
                $selected = ($opcionSeleccionada == $row->id) ? 'selected' : '';
                $html .= '<option value="' . $row->id . '" ' . $selected . '>' . $row->nombre . '</option>';
            }
        }
        
        $html .= '</select>';
        return $html;
    }
}
