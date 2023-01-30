<?php
    class Utilities{
        public function randomStrGenerator(){
            $tmp = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $result = '';
            $len = strlen($tmp);
            for ($i = 0; $i < 8; $i++)
                $result .= $tmp[rand() & ($len - 1)];
            return $result;
        }
    }
?>